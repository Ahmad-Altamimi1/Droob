<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
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
    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required|min:5|max:45',
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.email' => 'Invalid email address',
                'login_id.exists' => 'Email does not exists in the system',
                'password.required' => 'Password is required',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|email|exists:admins,username',
                'password' => 'required|min:5|max:45',
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.email' => 'Invalid email address',
                'login_id.exists' => 'Email does not exists in the system',
                'password.required' => 'Password is required',
            ]);
        }

        $credts = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if (Auth::guard('admin')->attempt($credts)) {
            return redirect()->route('admin.dashboard');
        } else {

            $notification = array(
                'message' => 'Incorrect credentials!',
                'alert-type' => 'error',
            );
            return redirect()->route('admin.login')->with($notification);
        }
    }
    public function logoutHandler(Request $request)
    {
        Auth::guard('admin')->logout();
        $notification = array(
            'message' => 'You are logged out successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.login')->with($notification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.adminCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:admins,email,',
            'phone' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        // Upload and store the image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/admins'), $imageName);

        // Create a new product with the image filename
        Admin::create([
            'name' => $request->name,
            'password' => Hash::make($request->input('password')),
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('pages.adminUpdate', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'phone' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp', // Adjust validation rules as needed
        ]);

        // Upload and store the image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/admins'), $imageName);


        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName,
        ]);

        if (!$admin->save()) {
            return redirect()->route('admin.admins.index')->with('error', 'Error updating admin.');
        }

        return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index');
    }
}
