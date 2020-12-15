<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
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
        $article->title = $request->title;
        $article->author = $request->author;
        $article->content = $request->blogcontent;
        $article->description = $request->description;
        $article->category_id = $request->category;
        $article->slug = Str::slug($request->title);
        
       
        $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg|max:2048',
            'blogcontent' => 'required',
            'description' => 'required'
        ]);
    
        $imageName = time().'.'.$request->photo->extension();  
        Image::make($request->file('photo'))->resize(120, 90)->save(public_path('uploads/thumbnail_'.$imageName));
        // $request->photo->move(public_path('uploads'), $imageName);
        $article->image_url = $imageName;
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
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
        $article = Article::find($id);
        $article->title = $request->title;
        $article->author = $request->author;
        $article->content = $request->blogcontent;
        $article->description = $request->description;
        $article->category_id = $request->category;
        $article->slug = Str::slug($request->title);
        
       
        $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg|max:2048',
            'blogcontent' => 'required',
            'description' => 'required'
        ]);
    
        $imageName = time().'.'.$request->photo->extension();  
        Image::make($request->file('photo'))->resize(120, 90)->save(public_path('uploads/thumbnail_'.$imageName));
        // $request->photo->move(public_path('uploads'), $imageName);
        $article->image_url = $imageName;
        $article->update();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function showArticle($id) {
        $article = Article::find($id);
        return view('admin.articles.view', compact('article'));
    }

    public function deleteArticle($id) {
        $article = Article::find($id);
        return view('admin.articles.delete', compact('article'));
    }
}
