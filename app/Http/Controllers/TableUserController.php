<?php

namespace App\Http\Controllers;

use App\Models\table_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storetable_userRequest;
use App\Http\Requests\Updatetable_userRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TableUserController extends Controller
{
    public function show($id) {
        $user = table_user::find($id);

        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }
    }

    public function index() {
        $users = table_user::all();
        return response()->json($users, 200);
    }

    public function store(Request $request) {
        $data = $request->all();
        $user = table_user::create($data);
        return response()->json(['message' => 'User dibuat']);
    }
}
