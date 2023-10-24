<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Resources\AdminCollection;
use App\Models\Admin;

class AdminController extends Controller
{
    // Metode untuk menampilkan semua admin
    public function index()
    {
        return new AdminCollection(Admin::all());
    }
    
    public function show($id)
    {
        $admin = Admin::find($id);
    
        if (!$admin) {
            return response()->json(['message' => 'Admin tidak ditemukan11.'], 404);
        }
    
        return response()->json($admin, 200);
    }
    


    
  

    
    public function store(Request $request)
    {
       

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
        ]);

        
        return response()->json("Admin Created");

    }

    public function update(AdminStoreRequest $request, $id)
{
    
    $admin = Admin::find($id);

    if (!$admin) {
        return response()->json(['message' => 'Admin tidak ditemukan.'], 404);
    }

    
    $admin->name = $request->name;
    $admin->email = $request->email;

    
    if ($request->has('password')) {
        $admin->password = bcrypt($request->password);
    }

    $admin->level = $request->level;
    $admin->save();

    return response()->json(['message' => 'Admin telah diperbarui.'], 200);
}




    // Metode untuk menghapus admin
    public function destroy($id)
    {
        $admin = Admin::find($id);
    
        if (!$admin) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    
        $admin->delete();
    
        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    
    
}
