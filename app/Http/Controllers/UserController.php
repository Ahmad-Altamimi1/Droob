<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        $users = User::all();
        return view('pages.tables', compact('admins', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.userCreate');
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
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/users'), $imageName);

        $cv = $request->file('CV');
        $cvName = time() . '.' . $cv->getClientOriginalExtension();
        $cv->move(public_path('cv/users'), $cvName);
                // dd($request->file('CV'));


        // Create a new product with the image filename
        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->input('password')),
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName,
            'CV' => $cvName,
            
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User Created successfully');
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
    public function edit(User $user)
    {
        return view('pages.userUpdate', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $user->id,
            'phone' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp', // Adjust validation rules as needed
        ]);

        // Upload and store the image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/users'), $imageName);

        $cv = $request->file('CV');
        $cvName = time() . '.' . $cv->getClientOriginalExtension();
        $cv->move(public_path('cv/users'), $cvName);
        // dd($request->file('CV'));


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName,
            'CV' => $cvName,

        ]);

        if (!$user->save()) {
            return redirect()->route('admin.users.index')->with('error', 'Error updating user.');
        }

        return redirect()->route('admin.users.index')->with('success', 'user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    public function downloadCV($id)
    {
        $user = User::findOrFail($id);

        // Ensure the CV file exists
        $cvPath = public_path('cv/users/' . $user->CV);
        if (!file_exists($cvPath)) {
            abort(404, 'CV not found');
        }

        return response()->download($cvPath, 'CV_' . $user->name . '.' . pathinfo($cvPath, PATHINFO_EXTENSION));
    }
}
