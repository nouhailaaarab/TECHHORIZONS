<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Magazine;
use App\Models\Recom;
use App\Models\Subscription;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function admin_stats(): View
    {
        $articles_count = Article::where('status','accepted')->count();

        $magazines_count = Magazine::all()->count();

        $users_count = User::all()->count();


        return view('admin.statistic',['articles_count'=>$articles_count,'magazines_count'=>$magazines_count,'users_count'=>$users_count]);
    }

    public function magazine_creation(Request $request): View
    {
        $recs = Recom::all();
        $recs = $recs->pluck('article_id')->unique();
        $articleIds = Article::whereNotNull('magazine_id')->pluck('id');
        $articles = Article::whereIn('id',$recs)->whereNotIn("id",$articleIds)->get();

        $not_articles = Article::whereIn('id',$recs)->whereNotIn("id",$articles->pluck("id"))->get();


        return view('admin.magazine', [
            'articles' => $articles,
            'not_articles' => $not_articles,
        ]);
    }

    public function create_magazine(Request $request): RedirectResponse
    {
        $article = $request->article_id;
        $number = $request->numero;
        $privacy = $request->privacy;

        $magazine = Magazine::where('N_magazine',$number)->first();
        if($magazine){
            $magazine->update(['privacy'=> $privacy]);
            if($magazine->privacy == 0) $privacy = 'private';
            else $privacy = 'public';
            Article::where('id', $article)->update(['magazine_id' => $magazine->id,'privacy'=> $privacy]);
        }
        else{
            $magazine = Magazine::create(['N_magazine'=> $number,'privacy'=> $privacy]);
            Article::where('id', $article)->update(['magazine_id' => $magazine->id]);
        }

        return Redirect::route('magazine_creation')->with('status', 'magazine-created');
    }

    public function get_subs(Request $request): View
    {
        $subs = Subscription::all();

        return view('admin.subscribers', [
            'subs' => $subs,
        ]);
    }
    public function delete_subs(Request $request): RedirectResponse
    {
        $sub = $request->sub_id;
        $sub = Subscription::where('id', $sub)->first();
        $sub->delete();

        return Redirect::route('get_subs')->with('status', 'sub-deleted');
    }

    public function verify_users(Request $request): View
    {
        $users = User::where('rule','just_created')->get();

        return view('admin.verifyusers', [
            'users' => $users,
        ]);
    }

    public function accept_user(Request $request): RedirectResponse
    {
        $user = User::where('id', $request->user_id)->first();
        $user->rule = 'Subscriber';
        $user->save();

        return Redirect::route('verify_users')->with('status', 'request-accepted');
    }


    public function get_respo(Request $request): View
    {
        $themes = Theme::all();
        $resps = User::where('rule','Responsable')->get();

        return view('admin.respomanagement', [
            'themes' => $themes,
            'resps'=> $resps
        ]);
    }
    public function modify_respo(Request $request): RedirectResponse
    {
        $theme_id = $request->theme_id;
        $resp_id = $request->resp_id;
        $theme = Theme::where('id', $theme_id)->first();
        if($resp_id == 'none') $resp_id = null;
        $theme->user_id = $resp_id;
        $theme->save();


        return Redirect::route('get_respo')->with('status', 'theme-modified');
    }
    public function get_magazines(Request $request): View
    {
        $magazines = Magazine::all();

        return view('admin.magazinevisibility', [
            'magazines' => $magazines,
        ]);
    }
    public function modify_magazines(Request $request): RedirectResponse
    {
        $magazine = Magazine::where('id', $request->magazines_id)->first();
        $magazine->privacy = $request->privacy;
        $magazine->save();

        return Redirect::route('get_magazines')->with('status', 'magazine-modified');
    }
    


}
