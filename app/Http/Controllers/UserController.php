<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;


class UserController extends Controller
{
    public function create() {
     
        return View('users.create');
    }

    public function store(Request $request) {
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $request->profile;
        $user->save();

    return redirect('/users/dashboard')->with('mensagem', 'Usuario Cadastrado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }

    public function dashboard() {
        $users = User::all();

    return View('users.dashboard', compact('users')); 
    }

    public function edit($id) {
        $user = User::findOrFail($id);
       

    return view('users.edit', ['user' => $user]); 
    }


    public function update(Request $request) {

        $data = $request->all(); 
        
        $data['password'] = Hash::make($request->password);

        User::findOrFail($request->id)->update($data);
    return redirect('/users/dashboard')->with('mensagem', 'Usuario editado com Sucesso!', ['data' => $data]);
    }


    public function destroy(Request $request, $id) {
        $id = $request['index_id'];
        User::findOrFail($id)->delete();

    return redirect('/users/dashboard')->with('mensagem', 'Usuario deletado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }
}  