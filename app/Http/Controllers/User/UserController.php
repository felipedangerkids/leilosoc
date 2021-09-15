<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Escritorio;
use App\Models\Depertamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty($_GET['name'])){
            switch($_GET['coluna']){
                case 'name':
                    $users = User::with('departamento', 'escritorio')->where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
                break;
                case 'email':
                    $users = User::with('departamento', 'escritorio')->where('email', 'like', '%'.$_GET['name'].'%')->paginate(10);
                break;
                case 'departamento':
                    $users = User::with('departamento', 'escritorio')->whereHas('departamento', function ($query){
                        $query->where('name', 'like', '%'.$_GET['name'].'%');
                    })->paginate(10);
                break;
            }
        }else{
            $users = User::with('departamento', 'escritorio')->paginate(10);
        }
        $departamentos = Depertamento::all();
        $escritorios = Escritorio::all();
        return view('users.user', compact('departamentos', 'users', 'escritorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([

            'departamento_id' => $request->departamento_id,
            'escritorio_id' => $request->escritorio_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $request->permission,

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos = Depertamento::all();
        $escritorios = Escritorio::all();
        $user = User::with('departamento', 'escritorio')->find($id);
        return view('users.edit', compact('user', 'departamentos', 'escritorios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::with('departamento')->find($id);
        $user->departamento_id = $request->departamento_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->escritorio_id = $request->escritorio_id;
        $user->permission = $request->permission;
        $user->save();
        return redirect()->route('painel.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('painel.users');
    }
}
