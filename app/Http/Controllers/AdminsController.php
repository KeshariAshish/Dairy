<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function create(){
        return view('admin.create');
    }

    public function store(){
       request()->validate([
           
       ]);
    }
}
