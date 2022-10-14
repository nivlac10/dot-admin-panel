<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    function getUsers() {
        $req = Http::post('http://127.0.0.1:3333/api/admin/getUsers');
        $data = json_decode($req);
        return view('user-management',compact('data'));
    }

    function editUser($id) {
        $req = Http::post('http://127.0.0.1:3333/api/admin/getUser', ['data' => $id]);
        $data = json_decode($req);
        return view('user.edit', compact('data'));
    }
}
