<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::get(),
        ];
        return view('user.index', $data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->post();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        User::create($data);
        return redirect()->route('user.index')->with('success', 'User berhasil dibuat');
    }

    public function edit($id)
    {
        $data = [
            'user' => User::find($id),
        ];

        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->post();
        if($data['password'] == '')
            unset($data['password']);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        User::find($id)->update($data);
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
