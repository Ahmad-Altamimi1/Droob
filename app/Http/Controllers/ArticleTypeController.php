<?php

namespace App\Http\Controllers;

use App\Models\ArticleType;
use Illuminate\Http\Request;

class ArticleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleType = ArticleType::all();
        return view('pages.articleType', compact('articleType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.articleTypeCreate');
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

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/articleType'), $imageName);

        // dd($imageName);
        // Create a new product with the image filename
        ArticleType::create([
            'type' => $request->type,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.articleType.index')->with('success', 'category Created successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleType $articleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleType $articleType)
    {
        return view('pages.articleTypeUpdate', compact('articleType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleType $articleType)
    {
        $image = $request->file('image');

        if ($image) {
            // If a new image is provided, process it
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/articleType'), $imageName);

            // Update the articleType with the new image name
            $articleType->update([
                'type' => $request->type,
                'description' => $request->description,
                'image' => $imageName,
            ]);
        } else {
            // If no new image is provided, update other fields without changing the existing image
            $articleType->update([
                'type' => $request->type,
                'description' => $request->description,
            ]);
        }

        if (!$articleType->save()) {
            return redirect()->route('admin.articleType.index')->with('error', 'Error updating category.');
        }

        return redirect()->route('admin.articleType.index')->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleType $articleType)
    {
        $articleType->delete();
        return redirect()->route('admin.articleType.index')->with('articleType deleated successfully');
    }
}
