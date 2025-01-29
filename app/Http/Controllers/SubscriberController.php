<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\History;
use App\Models\Subscription;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class SubscriberController extends Controller
{
    public function get_themes(Request $request): View
    {
        $subs = Subscription::where('user_id', Auth::id())->with('theme')->get();

        $themes = $subs->pluck('theme')->unique();
        $themes_ids = $themes->pluck('id')->unique();
        $other_themes = Theme::whereNotIn('id', $themes_ids)->get();


        return view('subscriber.themes', [
            'subed_themes' => $themes,
            'other_themes' => $other_themes,
        ]);
    }

    public function unfollow_themes(Request $request): RedirectResponse
    {
        $theme_id = $request->theme_id;
        $abonnement = Subscription::where('theme_id', $theme_id)->where('user_id', Auth::id())->first();
        $abonnement->delete();

        return Redirect::route('get_themes')->with('status', 'abonnement-removed');
    }
    public function follow_themes(Request $request): RedirectResponse
    {
        $theme_id = $request->theme_id;
        Subscription::create(['user_id' => Auth::id(),'theme_id'=> $theme_id]);

        return Redirect::route('get_themes')->with('status', 'abonnement-created');
    }

    public function article_creation(Request $request): View
    {
        $themes = Theme::all();

        return view('subscriber.article', [
            "themes" => $themes,
        ]);
    }

    public function create_article(Request $request): RedirectResponse
    {
        $content = $request->content;
        $title = $request->title;
        $theme = $request->theme;
        $privacy = $request->privacy;

        Article::create(['content' => $content,'title'=> $title,'user_id'=> Auth::id(),'theme_id'=>$theme,'status'=>'pending','privacy'=>$privacy]);

        return Redirect::route('article_creation')->with('status', 'article-created');
    }
    public function get_articles(Request $request): View
    {
        $articles = Article::where('user_id', Auth::id())->get();

        return view('subscriber.suivi', [
            "articles" => $articles,
        ]);
    }

    public function get_history(Request $request): View
    {
        $visites = History::where('user_id', Auth::id())->get();

        return view('subscriber.historique', [
            "visites" => $visites,
        ]);
    }
    public function delete_history(Request $request): RedirectResponse
    {
        $visite = History::where("id",$request->history_id)->first();
        $visite->delete();

        return Redirect::route('dash.history')->with('status', 'history-deleted');
    }
}
