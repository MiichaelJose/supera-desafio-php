<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{
   
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('user')->with('status', 'Cadastrado com sucesso!');
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function view() {
        return view('user');
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        // $user = User::onlyTrashed()->findOrFail($id);
        // $user->forceDelete();

        return redirect('user')->with('status', 'Deletado com sucesso!');
    }
}
