<?php

namespace App\Http\Controllers;

use App\Models\table_barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storetable_barangRequest;
use App\Http\Requests\Updatetable_barangRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TableBarangController extends Controller
{
    public function show($id) {
        $barang = table_barang::find($id);

        if ($barang) {
            return response()->json($barang, 200);
        } else {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }
    }

    public function index() {
        $barangs = table_barang::all();
        return response()->json($barangs, 200);
    }

    public function store(Request $request) {
        $data = $request->all();
        $barang = table_barang::create($data);
        return response()->json(['message' => 'Barang dibuat']);
    }
}
