<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Game;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        $los = User::all()->where('role_id', 2);
        $pages = 'glist';
        return view('admin.game.index', compact('pages', 'games', 'los'));
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
        $this->validateImage();
        $input = $request->all();
        if ($file = $request->file('qr_code')){
            $tmp = str_replace(" ", "-",$request->title);
            $type = $file->getClientOriginalExtension();
            $name = $tmp."_qrCode.".$type;
            $file->move('images', $name);
//            dd($a);
            $input['qr_code'] = $name;
        }
        Game::create([
           'title' => $input['title'],
           'type' => $input['type'],
           'qr_code' => $input['qr_code'],
           'liaison_id' => $input['liaison_id'],
           'location' => $input['location']
        ]);
        $lo = User::findOrFail($input['liaison_id']);
        $det = Detail::findOrFail($lo->detail_id);
        $det->update([
            'other' => $input['title'],
        ]);
        return redirect()->back()->with('Success', 'Added new game');
    }

    private function validateImage()
    {
        return request()->validate([
            'qr_code' => 'required|image|max:5000'
        ]);
    }

    private function validateImageUpdate()
    {
        return request()->validate([
            'qr_code' => 'sometimes|image|max:5000',

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
        $this->validateImageUpdate();
        $game = Game::find($id);
        $input = $request->all();
        if ($file = $request->file('qr_code')){
            $tmp = str_replace(" ", "-",$request->title);
            $type = $file->getClientOriginalExtension();
            $name = $tmp."_qrCode.".$type;
            $file->move('images', $name);
            $input['qr_code'] = $name;
        }
        $game->update($input);
        return redirect()->back()->with('Success', 'Game '.$game->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        $name = $game->title;
        $game->delete();
        return redirect()->back()->with('Success', 'Voucher '.$name.' deleted');
    }
}
