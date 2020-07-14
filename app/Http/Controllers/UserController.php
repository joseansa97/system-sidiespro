<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
            $users = User::all();

            return view('usuarios.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('usuarios.create', ['roles' => $roles, 'user' => new User]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFormRequest $request)
    {
        // dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->first = $request->first;
        $user->second = $request->second;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            // asignar el rol
            $user->assignRole($request->role);
  
            return redirect('/usuarios');
        }
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
        $user = User::findOrFail($id);

        $roles = Role::all()->pluck('name', 'id');

        // dd($roles);

        return view('usuarios.edit', compact('user', 'roles'));
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
        // dd($request->all());

        
       
        $validator = Validator::make($request->all(), [
            
            'name' => 'required|min:3|max:50',
            'first' => 'required|min:3|max:50',
            'second' => 'min:3|max:50',
            'phone' => 'required|min:8|max:20',
            'email' => 'required|min:5|max:100',
            'role' => 'required',
            'password' => 'max:100',
        ]);
        
        if($validator->fails()){
            return redirect('/usuarios/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $user = User::findOrFail($id);
/* 
        $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'first' => ['required', 'min:3', 'max:50'],
            'second' => ['min:3', 'max:50'],
            'phone' => ['required', 'min:8', 'max:20'],
            'email' => ['required', 'min:5', 'max:100', 'unique:users'],
            'role' => ['required'],
            'password' => ['required|min:5|max:100'],
        ]);*/

        $user->name = $request->name;
        $user->first = $request->first;
        $user->second = $request->second;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->password = $request->password;
        }

        $user->syncRoles([$request->role]);

        $user->save();

        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);

        $user = User::findOrFail($id);

        $user->removeRole($user->roles->implode('name', ', '));

        if ($user->delete()) {
            return redirect('/usuarios');
        }

        return response()->json([
            'mensaje' => 'Error al eliminar el usuario.'
        ]);

    }
}
