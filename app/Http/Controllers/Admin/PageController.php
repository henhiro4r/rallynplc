<?php

namespace App\Http\Controllers\Admin;

use App\History;
use App\Http\Controllers\Controller;
use App\PhotoPlay;
use App\QuizPlay;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(){
        $pages = 'dash';
        $user = User::all()->where('role_id', '=',3)->count();
        $his = History::all()->where('is_done', '=', '1')->count();
        $qz = QuizPlay::all()->where('is_right','=', '1')->count();
        $ph = PhotoPlay::all()->count();
        return view('admin.dashboard', compact('pages', 'user', 'his', 'qz', 'ph'));
    }
}
