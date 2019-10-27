<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function admin()
    {
        $ids = Auth::id();
        $pages = 'uadm';
        $admin = User::all()->where('role_id', 1)->where('id', '!=', $ids);
        return view('admin.user.list.admin', compact('pages', 'admin'));
    }

    public function liaison()
    {
        $pages = 'ulo';
        $lo = User::all()->where('role_id', 2);
        return view('admin.user.list.liaison', compact('pages', 'lo'));
    }

    public function participant()
    {
        $pages = 'upar';
        $par = User::all()->where('role_id', 3);
        return view('admin.user.list.participant', compact('pages', 'par'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->back()->with('Success', 'User Deleted');
    }

    public function deactivate(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update(['status' => 'D']);
        return redirect()->back()->with('Success', 'User Deactivated');
    }

    public function activate(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update(['status' => 'E']);
        return redirect()->back()->with('Success', 'User Activated');
    }
}
