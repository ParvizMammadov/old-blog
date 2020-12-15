<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $articles = Article::orderByDesc('created_at')->paginate(5);
        $categories = Category::all();
        return view('homepage', compact('categories', 'articles'));
    }

    public function singlePage($category, $slug) {
        $post = Article::where('slug', $slug)->first() ?? abort(404);
        return view('post', compact('post'));
    }

    public function getArticles($slug) {
        $category = Category::where('slug', $slug)->first() ?? abort(404);
        $articles = Article::where('category_id', $category->id)->orderByDesc('created_at')->paginate(3);
        $categories = Category::all();
        return view('homepage', compact('articles', 'categories'));
    }

    public function getPages($slug) {
        $page = Page::where('slug', $slug)->first();
        return view('page', compact('page'));
    }
}
