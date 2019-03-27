<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Session;
use Auth;
use File;
use Image;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->get();
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Article::create($request->all());
        
        $article = new Article;

        // upload the article //
        // $file = $request->file('image');
        $file = Image::make($request->file('image'))->resize(300, 300);
        $destination_path = 'uploads/';
        // $filename = str_random(6).'_'.$file->getClientOriginalName();
        $filename = str_random(6).'.png';
        // $file->move($destination_path, $filename);
        $file->save($destination_path.$filename);
        
        // save article data into database //
        $article->author_id = Auth::user()->id; 
        $article->image = $destination_path . $filename;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();

        Session::flash("notice", "Article success created");
        return redirect()->route("articles.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
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
        return view('articles.edit')->with('article', $article);
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
        if($request->hasFile('image')){
            $file = Image::make($request->file('image'))->resize(300, 300);
            $destination_path = 'uploads/';
            // $filename = str_random(6).'_'.$file->getClientOriginalName();
            $filename = str_random(6).'.png';
            // $file->move($destination_path, $filename);
            $file->save($destination_path.$filename);

            // delete the old file
            $old_file = public_path($article->image);
            File::delete($old_file);

            $article->image = $destination_path.$filename;
        }
        
        
        // save article data into database //
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();

        Session::flash("notice", "Article success updated");
        return redirect()->route("articles.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }

}
