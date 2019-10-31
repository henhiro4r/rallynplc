<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'plist';
        $photos = Photo::all();
        return view('admin.photo.index', compact('pages', 'photos'));
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
        if ($file = $request->file('photo_path')){
            $tmp = str_replace(" ", "-",$request->title);
            $type = $file->getClientOriginalExtension();
            $name = $tmp."_picture.".$type;
            $file->move('images/photo', $name);
            $input['photo_path'] = $name;
        }
        if ($files = $request->file('qr_code')){
            $tmp = str_replace(" ", "-",$request->title);
            $type = $files->getClientOriginalExtension();
            $name = $tmp."_qrCode.".$type;
            $files->move('images/photo', $name);
            $input['qr_code'] = $name;
        }
//        dd($input);
        Photo::create([
            'title' => $input['title'],
            'photo_path' => $input['photo_path'],
            'code' => $input['code'],
            'qr_code' => $input['qr_code'],
            'value' => $input['value'],
            'badge' => $input['badge']
        ]);
        return redirect()->back()->with('Success', 'Added new photo');
    }

    private function validateImage()
    {
        return request()->validate([
            'photo_path' => 'required|image|max:5000',
            'qr_code' => 'required|image|max:5000'
        ]);
    }

    private function validateImageUpdate()
    {
        return request()->validate([
            'photo_path' => 'sometimes|image|max:5000',
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
        $photo = Photo::findOrFail($id);
        $pages = 'plist';
        return view('admin.photo.show', compact('pages', 'photo'));
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
        $photo = Photo::findOrFail($id);
        $name = $photo->title;
        $photo->delete();
        return redirect()->back()->with('Success', 'Photo '.$name.' deleted');
    }
}
