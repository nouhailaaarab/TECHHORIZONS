<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\History;
use App\Models\Magazine;
use App\Models\Review;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;



class InviteController extends Controller
{
    public function home(Request $request): View
    {
        $magazines = Magazine::where('privacy',1)->get();
        #status : accepted , rejected , pending
        $articles = Article::where('status','accepted')->where('privacy',1)->get();
        $themes = Theme::all();
        $rec_articles = [];

        if (Auth::check()){
        $visiteCounts = DB::table('histories')
        ->where('histories.user_id',Auth::user()->id)
        ->join('articles', 'histories.article_id', '=', 'articles.id')
        ->join('themes', 'articles.theme_id', '=', 'themes.id')
        ->select('themes.id as theme_id', 'themes.name as theme_name', DB::raw('COUNT(histories.id) as visite_count'))
        ->groupBy('themes.id', 'themes.name')
        ->orderBy('visite_count', 'desc')
        ->first();
        if ($visiteCounts){
        $rec_articles = Article::where('theme_id',$visiteCounts->theme_id)
        ->where('status','accepted')
        ->where('privacy',1)->get();
        }
        }

        return view('home', [
            'magazines' => $magazines,
            'articles' => $articles,
            'themes' => $themes,
            'rec_articles' => $rec_articles,
        ]);
    }

    public function home_articles(Request $request): View
    {
        $magazines = Magazine::where('privacy',1)->get();
        #status : accepted , rejected , pending
        $articles = Article::where('status','accepted')->where('privacy','public')->get();
        $rec_articles = [];

        if (Auth::check()){
        $visiteCounts = DB::table('histories')
        ->where('histories.user_id',Auth::user()->id)
        ->join('articles', 'histories.article_id', '=', 'articles.id')
        ->join('themes', 'articles.theme_id', '=', 'themes.id')
        ->select('themes.id as theme_id', 'themes.name as theme_name', DB::raw('COUNT(histories.id) as visite_count'))
        ->groupBy('themes.id', 'themes.name')
        ->orderBy('visite_count', 'desc')
        ->first();
        if ($visiteCounts){
        $rec_articles = Article::where('theme_id',$visiteCounts->theme_id)
        ->where('status','accepted')
        ->where('privacy',1)->get();
        }
        }
        $prvt_articles = Article::where('status','accepted')->where('privacy','private')->get();
        return view('home_articles', [
            'magazines' => $magazines,
            'articles' => $articles,
            'rec_articles' => $rec_articles,
            'prvt_articles' => $prvt_articles,
        ]);
    }

    public function home_magazines(Request $request): View
    {
        $public_magazines = Magazine::where('privacy',1)->get();

        $private_magazines = Magazine::where('privacy',0)->get();



        return view('home_magazines', [
            'public_magazines' => $public_magazines,
            'private_magazines' => $private_magazines,
        ]);
    }
    public function get_article(Request $request,int $id)
    {
        $article = Article::where('id',$id)->first();
        if((!Auth::check() || Auth::user()->rule == 'just_created' ) && $article->privacy==0) return Redirect::route('home');
        $commentaires = Comment::where('article_id',$article->id)->get();
        if (Auth::check() && Review::where('article_id',$article->id)->where('user_id',Auth::user()->id)->exists()) {
            $rate = Review::where('article_id',$article->id)->where('user_id',Auth::user()->id)->first();
            $rate = $rate->rate;
        }else $rate = 0;
        if(Auth::check()) History::create(['user_id'=>Auth::user()->id,'article_id' => $id]);

        return view('article_page', [
            'article' => $article,
            'commentaires' => $commentaires,
            'rate' => $rate,
        ]);
    }
    public function get_magazine(Request $request,int $id)
    {
        if(Auth::user()->rule == 'just_created') return Redirect::route('home');
        $magazine = Magazine::where('id',$id)->first();
        $articles = Article::where('magazine_id',$id)->get();
        $articles_list = [];

        foreach($articles as $article){
            if (Auth::check() && Review::where('article_id',$article->id)->where('user_id',Auth::user()->id)->exists()) {
                $rate = Review::where('article_id',$article->id)->where('user_id',Auth::user()->id)->first();
                $rate = $rate->rate;
            }else $rate = 0;
            $articles_list[] = [$article,$rate];
        }

        return view('magazine', [
            'magazine' => $magazine,
            'articles' => $articles_list,
        ]);
    }

    public function tableau_de_bord(Request $request)
    {
        $data = ['user'=>Auth::user()];

        $role = Auth::user()->rule;

        $top3articles= DB::table('histories')->select('article_id', DB::raw('COUNT(article_id) as count'))->groupBy('article_id')->orderBy('count', 'desc')->limit(3)->get();

        if ($role == 'Responsable') {
            return view('responsable.profile', $data);
        }
        if ($role == 'Admin') {
            return view('admin.profile', $data);
        }
        if ($role == 'Subscriber') {
            return view('subscriber.profile', $data);
        }
        else {
            return view('home');
        }
    }

    public function update_name(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return Redirect::route('dashboard')->with('status', 'name-updated');
    }
    public function add_commentaire_article(Request $request): RedirectResponse
    {
        if (!Auth::check()){
            return Redirect::route('login');
        }
        $article = $request->article_id;
        $content = $request->content;
        Comment::create(['user_id' => Auth::id(),'article_id'=> $article,'content'=> $content]);

        return redirect()->back()->with('status', 'commentaire-created');
    }

    public function add_review(Request $request): RedirectResponse
    {
    if (!Auth::check()) {
        return Redirect::route('login');
    }

    $article = $request->article_id;
    $rating = $request->rate;

    $rate = Review::where('user_id', Auth::id())
                 ->where('article_id', $article)
                 ->first();

    if ($rate != null) {
        $rate->rate = $rating;  // This is correct, using 'rate'
        $rate->save();
    } else {
        Review::create([
            'user_id' => Auth::id(),
            'article_id' => $article,
            'rate' => $rating    
        ]);
    }

    return redirect()->back()->with('status', 'note-created');
    }


}
