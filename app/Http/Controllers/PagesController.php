<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        
        $title = 'Welcome to QuickMatch portal';
        return view('pages.index')->with('title', $title);
    }

    public function mybooking(){
        $title = 'My bookings';
        return view('pages.mybooking')->with('title', $title);
    }
}
