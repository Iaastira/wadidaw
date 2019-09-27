<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\Category;
use App\Services;
use App\Gallery;
use App\About;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $article = Article::with('category', 'tag', 'user')->take(1)->get();
        $cari = $request->cari;
        if ($cari) {
            $art = Article::where('judul', 'LIKE', "%$cari%")->paginate(4);
        }
        return view('frontend.index', compact('article'));
    }

    public function about(Request $request){
        $about = About::all();
        $cari = $request->cari;
        if ($cari) {
            $article = Article::where('judul', 'LIKE', "%$cari%")->paginate(4);
        }
        return view('frontend.about', compact('about'));
    }

    public function services(Request $request){
        $services = Services::all();
        $cari = $request->cari;
        if ($cari) {
            $article = Article::where('judul', 'LIKE', "%$cari%")->paginate(4);
        }
        return view('frontend.services', compact('services'));
    }

    public function gallery(Request $request){
        $gallery = Gallery::paginate(12);
        $cari = $request->cari;
        if ($cari) {
            $article = Article::where('judul', 'LIKE', "%$cari%")->paginate(4);
        }
        return view('frontend.gallery', compact('gallery'));
    }

    public function allblog(Request $request)
    {
        $article = Article::with('category', 'tag', 'user')->paginate(5);
        $cari = $request->cari;
        if ($cari) {
            $article = Article::where('judul', 'LIKE', "%$cari%")->paginate(4);
        }
        return view('frontend.blog', compact('article'));
    }

    public function detailblog(Article $article){
        $category = Category::all();
        $tag = Tag::all();
        return view('frontend.single-blog', compact('article','category','tag'));
    }

    public function blogcat(Category $cat)
    {
        $tag = Tag::all();
        $article = $cat->article()->latest()->paginate(5);
        return view('frontend.blog', compact('article', 'cat', 'tag'));
    }
    public function blogtag(Tag $tag)
    {
        $category = Category::all();
        $article = $tag->article()->latest()->paginate(5);
        return view('frontend.blog', compact('article', 'category', 'tag'));
    }
}
