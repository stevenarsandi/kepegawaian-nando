<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        $data = User::simplePaginate(5);
        return view('pages.master.user.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('pages.master.user.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ]);
        return redirect()->route('user')->with('succes', 'Data berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.master.user.edit', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role
        ]);
        return redirect()->route('user')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('succes', 'Data berhasil di Hapus!');
    }
}
