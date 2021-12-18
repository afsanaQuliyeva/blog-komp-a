<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $articles = Article::latest()->paginate(Article::ARTICLE_PAGE_COUNT);
        return view('homepage', compact('articles'));
    }
}
