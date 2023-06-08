<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        return view('admin.users.index');
    }

    public function create(){

         return view();
    }

    public function store(){
        
    }

    public function edit(){

         return view();
    }

     public function update(){

    }

    public function delete(){

    }
}
