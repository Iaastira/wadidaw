<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use Session;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $article = Article::all();
        $cari = $request->cari;
        if ($cari) {
            $article = Article::where('judul', 'LIKE', "%$cari%")->paginate(5);
        }
        return view('admin.article.index', compact('article'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.article.create', compact('category', 'tag'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $article = new Article();
       $article->judul = $request->judul;
       $article->slug = str_slug($request->judul, '-');
       $article->konten = $request->konten;
       $article->user_id = Auth::user()->id;
       $article->category_id = $request->kategori;
       if ($request->hasFile('foto')){
           $file = $request->file('foto');
           $path = public_path().
                           '/assets/img/article/';
           $filename = str_random(6).'_'
                       .$file->getClientOriginalName();
           $uploadSuccess = $file->move(
               $path,
               $filename
           );
           $article->foto = $filename;
       }
       $article->save();
       Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Saved Article Successfully <b>$article->judul</b>!"
    ]);
       $article->tag()->attach($request->tag);
       return redirect()->route('article.index');    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $category = Category::all();
        $tag = Tag::all();
        $selected = $article->tag->pluck('id')->toArray();
        return view('admin.article.edit', compact('article', 'selected', 'category', 'tag'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->judul = $request->judul;
        $article->slug = str_slug($request->judul);
        $article->konten = $request->konten;
        $article->user_id = Auth::user()->id;
        $article->category_id = $request->kategori;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/article';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama jika ada
            if ($article->foto) {
                $old_foto = $article->foto;
                $filepath = public_path() .
                    '/assets/img/article/' .
                    $article->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // file sudah dihapus/tidak ada
                }
            }
            $article->foto = $filename;
        }
        $article->save();
        $article->tag()->sync($request->tag);
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Edited Article Successfully <b>$article->judul</b>!"
        ]);
        return redirect()->route('article.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::findOrFail($request->id);
        if ($article->foto) {
            $old_foto = $article->foto;
            $filepath = public_path() . '/assets/img/article/' . $article->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }
        $article->tag()->detach($article->id);
        $article->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Deleted Article Successfully!"
        ]);
        return redirect()->route('article.index');
    }
}