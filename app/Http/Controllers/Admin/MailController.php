<?php

namespace App\Http\Controllers\Admin;

use App\Events\ConfirmationEvent;
use App\Http\Controllers\Controller;
use App\Mailing;
use App\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'mail';
        $mails = Mailing::all();
        return view('admin.mail.index', compact('pages', 'mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'send';
        return view('admin.mail.send', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mailing::create($request->all());
        return redirect()->back()->with('Success','Added new participant');
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
        $mail = Mailing::findOrFail($id);
        $mail->update($request->all());
        return redirect()->back()->with('Success','Updated participant '. $mail->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m = Mailing::findOrFail($id);
        $n = $m->name;
        $m->delete();
        return redirect()->back()->with('Success','Deleted participant '.$n);
    }

    public function sendMail(Request $request){
        $mail = $request->all();
        event(new ConfirmationEvent($mail));
        return redirect()->back()->with('Success','An email have broadcast');
    }
}
