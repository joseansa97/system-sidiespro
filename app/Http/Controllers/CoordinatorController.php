<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coordinator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CoordinatorFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinators = DB::table('carrera_user AS cu')
                    ->join('carreras AS c','c.id','=','cu.carrera_id') 
                    ->join('users AS u','u.id','=','cu.user_id') 
                    ->select('cu.id as cuid', 'u.id as uid', 'c.id as cid', 'c.name', DB::raw('CONCAT(u.name," ",u.first," ",u.second) as nombre'))
                    ->orderBy('cuid','desc')
                    ->get();
                    /*
                    SELECT cu.id, c.id, c.name, u.id, u.name, u.first, u.second
                    FROM carrera_user AS cu
                    JOIN carrera AS c
                    ON c.id = cu.carrera_id
                    JOIN users AS u
                    ON u.id = cu.user_id
                    ORDER BY cu.id;
                    */
        $carreras = DB::table('carreras')
                ->select('id', 'name as carrera')
                ->get();

        $users = DB::table('users')
                    ->select('id', DB::raw('CONCAT(name," ",first," ",second) as coordinador'))
                    ->Join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                    ->where('model_has_roles.role_id', '=', '3')
                    ->orwhere('model_has_roles.role_id', '=', '2')
                    ->orderBy('id')
                    ->get();

        /*$users = DB::table('users')
                    ->select('id', DB::raw('CONCAT(name," ",first," ",second) as nombre'))
                    
                    ->get();*/

        // dd($coordinators);
        return view('coordinadores.index', ['coordinators' => $coordinators, 'carreras' => $carreras, 'users' => $users]);
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
    public function store(CoordinatorFormRequest $request)
    {
        // dd($request->all());

        $coordinator = new Coordinator;  
        $coordinator->carrera_id = $request->get('carrera');
        $coordinator->user_id = $request->get('coordinador');
        $coordinator->save();

        return Redirect::to('/coordinadores')->withSuccess('La información de ha guardado con exito.');
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
        //
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

        $validator = Validator::make($request->all(), [
            'carrera' => 'required',
            'coordinador' => 'required',
        ],[
            'carrera.required' => 'Es obligatorio seleccionar una carrera',
            'coordinador.required' => 'Es obligatorio seleccionar un coordinador',
        ]);
        
        if($validator->fails()){
            return redirect('/coordinadores')
                        ->withErrors($validator)
                        ->withInput();
        }

        $coordinator = Coordinator::findOrFail($id);
        $coordinator->carrera_id = $request->get('carrera');
        $coordinator->user_id = $request->get('coordinador');
        $coordinator->save();

        return Redirect::to('/coordinadores')->withSuccess('La información de ha actalizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coordinator = Coordinator::findOrFail($id);
        $coordinator->delete();
        return Redirect::to('/coordinadores ');
    }
}
