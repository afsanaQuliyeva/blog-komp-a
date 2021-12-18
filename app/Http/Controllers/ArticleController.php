<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $articles = Article::all('id','title','desc','image');
        //$articles = Article::simplePaginate(5);
        $articles = Article::latest()->paginate(Article::ARTICLE_PAGE_COUNT);
        //latest() -> orderBy('created_at', 'desc')
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all('id', 'category_name');
        return view('admin.articles.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            //$myImage = $request->file('image');
            //Yeni bir fayl adi yaradir
            $uniqName= 'image_'.time();
            //image_2245454546
            $imageExt = strtolower($request->file('image')->getClientOriginalExtension());
            //JPG -> jpg
            $newImageName = $uniqName.".".$imageExt;
            //image_2245454546.jpg
            //---End--
            $request->image->move('uploads/', $newImageName);
            $validated['image'] = $newImageName;
            //cat.png <- $validated['image']
        }

        $article = Article::create(Arr::except($validated,'categories'));
        $article->getCategories()->attach($validated['categories']);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit($id)
    {
//        $text = 'Bakı Mühəndislik Universiteti!!!';
//        dd(Str::slug($text));
        $categories = Category::all('id', 'category_name');
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        //Str::slug('Əfsanə Quliyeva?') -> 'efsane-quliyeva'
        //$oldImage = Article::findOrFail($id)->pluck('image');
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $uniqName= 'image_'.time();
            $imageExt = strtolower($request->file('image')->getClientOriginalExtension());
            $newImageName = $uniqName.".".$imageExt;
            $request->image->move('uploads/', $newImageName);
            $validated['image'] = $newImageName;
            $oldImage = $request->old_image;
            unlink('uploads/'.$oldImage);
        }

        //15
        $article = Article::findOrFail($id); //object
        $article->update(Arr::except($validated,'categories')); //bool
        $article->getCategories()->sync($validated['categories']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
