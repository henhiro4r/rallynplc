<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $pages = 'uadd';
        $roles = Role::all();
        return view('admin.user.crud.add', compact('pages', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $input = $request->all();
        $ids = $input['role_id'];
        if ($ids == 1){
            $detail = Detail::create(['other' => '-']);
            $input['detail_id'] = $detail->id;
            $this->new($input);
            return redirect()->route('user.admin')->with('Success', 'Added new administrator');
        } else if ($ids == 2){
            $detail = Detail::create(['other' => '-']);
            $input['detail_id'] = $detail->id;
            $this->new($input);
            return redirect()->route('user.liaison')->with('Success', 'Added new liaison officer');
        } else if ($ids == 3){
            $detail = Detail::create([
                'school_name' => $input['school_name'],
                'city_name' => $input['city_name'],
                'address' => $input['address'],
                'coach_name' => $input['coach_name'],
            ]);
            $input['detail_id'] = $detail->id;
            $this->new($input);
            return redirect()->route('user.participant')->with('Success', 'Added new participant');
        } else {
            return redirect()->back()->with('Fail', 'Failed to add user');
        }
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function new(array $data){
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'detail_id' => $data['detail_id'],
            'role_id' => $data['role_id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $pages = 'upar';
        return view('admin.user.show', compact('user', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        switch ($user->role_id){
            case 1:
                $pages = 'uadm';
                $detail = Detail::findOrFail($user->detail_id);
                return view('admin.user.crud.editUser', compact('pages', 'user','detail'));
            case 2:
                $pages = 'ulo';
                $detail = Detail::findOrFail($user->detail_id);
                return view('admin.user.crud.editUser', compact('pages', 'user','detail'));
            case 3:
                $pages = 'upar';
                $detail = Detail::findOrFail($user->detail_id);
                return view('admin.user.crud.editUser', compact('pages', 'user', 'detail'));
            default:
                return redirect()->back();
        }
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
        $user = User::findOrFail($id);
        if ($request->has('detail')){
            $detail = Detail::findOrfail($user->detail_id);
            $detail->update($request->all());
            return redirect()->route('user.participant')->with('Success', 'Participant '.$user->name.', detail updated');
        }

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        if ($user->role_id == 2){
            $detail = Detail::findOrfail($user->detail_id);
            $detail->update(['other'=>$input['other']]);
            $user->update($input);
            return redirect()->route('user.liaison')->with('Success', 'Liaison '.$user->name.', updated');
        } else {
            $user->update($input);
            if ($user->role_id == 1){
                return redirect()->route('user.admin')->with('Success', 'Admin '.$user->name.', updated');
            } else {
                return redirect()->route('user.participant')->with('Success', 'Participant '.$user->name.', updated');
            }
        }
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
        $user->update(['is_login' => '0', 'status' => 'D']);
        return redirect()->back()->with('Success', 'User Deactivated');
    }

    public function activate(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update(['is_login' => '0', 'status' => 'E']);
        return redirect()->back()->with('Success', 'User Activated');
    }
}
