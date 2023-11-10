<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Image;
use App\Models\ArticleType;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['Image', 'Promotion'])->get();
        // dd($articles);
        return view('pages.article', compact('articles'));
    }
    function download($id)
    {
        $article = Article::findOrFail($id);
        
        $filePath = public_path('CV/users/'.$article->User->CV);
        $fileName =
 $article->User->CV;;

        return response()->download($filePath, $fileName);
    }
    function home()
    {
        $articles = Article::take(4)->get();
        return view('pages.index', compact('articles'));
    }
    public function details($id)
    {
        $article = Article::findOrFail($id);
        // $article->content = str_replace('.', ' ', $article->content);
        return view('pages.details', compact('article'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ArticleType::all();
        return view('pages.articlesCreate',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'password' => 'required',
        //     'email' => 'required|email|unique:admins,email,',
        //     'phone' => 'required|numeric',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        // ]);

        // Upload and store the image
        $image1 = $request->file('image1');
        $image1Name = time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('images/articles'), $image1Name);

        $image2 = $request->file('image2');
        if($image2) {
    

        $image2Name = time() . '.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('images/articles'), $image2Name);
        } else {
            $image2Name = null;
        }
        $image3 = $request->file('image3');
        if ($image2) {

        $image3Name = time() . '.' . $image3->getClientOriginalExtension();
        $image3->move(public_path('images/articles'), $image3Name);
        }else{
            $image3Name=null;
        }
        // Create a new product with the image filename
        // dd($request->type);
        $article = Article::create([
            'title' => $request->title,
            'typeId' => $request->type,
            // 'userId' => auth()->user()->id,
            'description' => $request->description,
            'image1' => $image1Name,
            'image2' => $image2Name,
            'image3' => $image3Name,
        ]);


        return redirect()->route('admin.articles.index')->with('success', 'Article Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $types = ArticleType::all();
        // $articles = Article::all();
        return view('pages.articlesUpdate', compact('article','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:admins,email,' . $admin->id,
        //     'phone' => 'required|numeric',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp', // Adjust validation rules as needed
        // ]);

        // Upload and store the image
        $image1 = $request->file('image1');
        $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('images/articles'), $imageName1);

        $image2 = $request->file('image2');
        $imageName2 = time() . '.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('images/articles'), $imageName2);

        $image3 = $request->file('image3');
        $imageName3 = time() . '.' . $image3->getClientOriginalExtension();
        $image3->move(public_path('images/articles'), $imageName3);


        $article->update([
            'title' => $request->title,
            'typeId' => $request->type,
            // 'userId' => auth()->user()->id,
            'description' => $request->description,
            'iamge1' => $imageName1,
            'iamge2' => $imageName2,
            'iamge3' => $imageName3,
        ]);


        if (!$article->save()) {
            return redirect()->route('admin.articles.index')->with('error', 'Error updating article.');
        }

        return redirect()->route('admin.articles.index')->with('success', 'article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('article deleated successfully');
    }
}
