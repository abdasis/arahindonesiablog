<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class PostController extends Controller
{

    public function home(Request $request)
    {
        $pencarian = $request->get('pencarian');
        $kategori = $request->get('kategori');
        if ($kategori){
            $posts = Post::where('kategori_artikel', $kategori)->where('status_artikel', 'Published')->paginate(12);
            $title_post = "Kategori: " . $kategori;
            Session::forget('pencarian');
        }
        elseif(empty($pencarian)) {
            $posts = Post::orderBy('created_at', 'DESC')->where('status_artikel', 'Published')->paginate(12);
            $title_post = "Tulisan Terbaru";
            Session::forget('pencarian');

        }else{
            $posts = Post::where('judul_artikel', 'like', '%' . $pencarian . '%')->paginate(12);
            $title_post = "Hasil pencarian: " . $pencarian;
            Session::flash('pencarian', $pencarian);
        }

        return view('index')->withPosts($posts)->withTitle($title_post);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.post.index')->withPosts($posts);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->judul_artikel = $request->judul_artikel;
        $post->isi_artikel = $request->get('isi_artikel');
        $post->status_artikel = $request->status_artikel;
        $post->excerpt_artikel = Str::limit($request->isi_artikel, 80);
        $post->slug = Str::slug($request->judul_artikel, '-');
        if ($request->hasFile('thumbnail_artikel')) {
            $gambar = $request->file('thumbnail_artikel');
            $gambar_name = date('dmyhs-') . Str::slug($request->judul_artikel, '-') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('thumbnail-artikel'), $gambar_name);
            $post->thumbnail_artikel = $gambar_name;
        }
        $post->kategori_artikel = $request->get('kategori_artikel');
        $post->user_id = 1;
        $post->jumlah_komentar = 0;
        $post->save();
        if ($post) {
            Session::flash('status', 'Artikel berhasil disimpan');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($artikel)
    {
        $post = Post::where('slug', $artikel)->first();
        views($post)->record();
        if ($post) {
            return view('pages.post.show')->withPost($post)->withTotalCount(views($post)->count());
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($artikel)
    {

        $post = Post::where('slug', $artikel)->first();
        return view('pages.post.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('slug', $id)->first();
        $post->judul_artikel = $request->judul_artikel;
        $post->isi_artikel = $request->get('isi_artikel');
        $post->status_artikel = $request->status_artikel;
        $post->excerpt_artikel = Str::limit($request->isi_artikel, 80);
        $post->slug = Str::slug($request->judul_artikel, '-');
        if ($request->hasFile('thumbnail_artikel')) {
            if ($post->thumbnail_artikel  && file_exists(public_path('thumbnail-artikel') . '/' . $post->thumbnail_artikel)) {
                File::delete(public_path('thumbnail-artikel') . $post->thumbnail_artikel);
            }
            $gambar = $request->file('thumbnail_artikel');
            $gambar_name = date('dmyhs-') . Str::slug($request->judul_artikel, '-') . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('thumbnail-artikel'), $gambar_name);
            $post->thumbnail_artikel = $gambar_name;
        }else{
            $post->thumbnail_artikel = $post->thumbnail_artikel;
        }
        $post->user_id = 1;
        $post->jumlah_komentar = 0;
        $post->save();
        if ($post) {
            Session::flash('status', 'Artikel anda berhasil di update');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->thumbnail_artikel  && file_exists(public_path('thumbnail-artikel') . '/' . $post->thumbnail_artikel)) {
            File::delete(public_path('thumbnail-artikel') . $post->thumbnail_artikel);
        }
        $post->delete();
        Session::flash('status', 'Satu Artikel Berhasil di Hapus');
        return redirect()->back();
    }

    public function upload(Request $request)
    {
        $gambar = $request->file('file');
        $gambar_name = date('dmyhs-') . $gambar->getClientOriginalName();
        $gambar->move(public_path('uploads'), $gambar_name);
        return response()->json(['location' => asset('uploads') . '/' . $gambar_name]);
    }
}
