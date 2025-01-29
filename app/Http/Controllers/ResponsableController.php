<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Recom;
use App\Models\Subscription;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResponsableController extends Controller
{

    public function respo_stats()
    {
        $theme = Theme::where('user_id', Auth::user()->id)->first();
        if(!$theme) return redirect()->back();

        $articles_count = Article::where('theme_id',$theme->id)->where('status','accepted')->count();
        $pending_articles_count = Article::where('theme_id',$theme->id)->where('status','pending')->count();


        $subs_count = Subscription::where('theme_id',$theme->id)->count();


        return view('responsable.statistic',['articles_count'=>$articles_count,'subs_count'=>$subs_count,'pending_articles_count'=>$pending_articles_count]);
    }

    public function get_theme_subs()
    {
        $theme = Theme::where('user_id', Auth::id())->first();
        if(!$theme) return redirect()->back();
        $subs = Subscription::where('theme_id', $theme->id)->get();

        return view('responsable.gestionabonnement', ['subs'=> $subs]);
    }
    public function delete_theme_subs($sub_id)
    {
        $abonnement = Subscription::where('id', $sub_id)->first();
        $abonnement->delete();

        return redirect()->back()->with('success', 'sub-deleted');
   }


    public function get_theme_articles()
    {
        $themeId = Theme::where('user_id', Auth::id())->pluck('id')->first();
        $articles = Article::where('theme_id', $themeId)
                        ->where('status', 'pending')
                        ->get();

        return view('responsable.articlemanagement', compact('articles'));
    }
    public function update_theme_articles(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if (in_array($request->action, ['accepted', 'rejected'])) {
            $article->status = $request->action;
            $article->save();
            return redirect()->back()->with('success', "L'article a été mis à jour avec succès.");
        }
        elseif ($request->action == "reccomanded") {
            $article->status = 'accepted';
            $article->save();
            Recom::create(['user_id' => Auth::id(),'article_id' => $article->id,]);}

        return redirect()->back()->with('error', "Action invalide.");
    }



}
