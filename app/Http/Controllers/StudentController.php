<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EstudianteFormRequest;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
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
    public function index(Request $request)
    {
        if($request){

            $query = trim($request->get('search')); //campo que queremos filtrar

                // $students = Student::all();
                $students = DB::table('students AS s')
                            ->join('carreras AS c','c.id','=','s.carrera_id') 
                            ->join('residencias AS r','r.id','=','s.residencia_id') 
                            ->select('s.id', 's.titulo', 's.asesor', 's.autor', 's.autor2', 'c.id as cid', 'c.name as carrera_id', 'r.id as rid', 'r.name as residencia_id', 's.archivo')
                            ->where('carrera_id','LIKE','%'.$query.'%')
                            ->orWhere('s.titulo','LIKE','%'.$query.'%')
                            ->orWhere('s.asesor','LIKE','%'.$query.'%')
                            ->orderBy('s.id','desc')
                            ->paginate(5);

                $carreras = DB::table('carreras')
                            ->select('id', 'name')
                            ->get();

                $residencias = DB::table('residencias')
                            ->select('id', 'name', 'description')
                            ->get();

                // dd($students);

                return view('estudiantes.index', compact('students', 'carreras', 'residencias', 'query'));
        }
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
    public function store(EstudianteFormRequest $request)
    {
        // dd($request->all());
        $student = new Student();
        $student->titulo = $request->titulo;
        $student->asesor = $request->asesor;
        $student->autor = $request->autor;
        $student->autor2 = $request->autor2;
        $student->carrera_id = $request->carrera_id;
        $student->residencia_id = $request->residencia_id;

        if ($request->hasFile('archivo')) {//si nos esta llegando un archivo si existe
            // Archivo del input type file con name "archivo"
            $archivo = $request->file('archivo');
            /*
            // Para usar un nombre de archivo personalizado se usa storeAs() en lugar de store()
            $filepath = str_slug($image->getClientOriginalName())
                . date('YmdHis.')
                . $image->extension();
            $file = $image->storeAs('images/movements', $filepath);
            */
            // Sube la imagen a la carpeta public/images/movements
            $file = $archivo->store('images/residencia');
            // Guarda la ruta de la imagen en el campo image
            $student->archivo = $file;
        }

        // Guarda en la base de datos
        $student->save();

        return redirect('/estudiantes')->withSuccess('El proyecto se ha guardado con exito.');
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
        $student = Student::findOrFail($id);

        $carreras = DB::table('carreras')
                    ->select('id', 'name')
                    ->get();

        $residencias = DB::table('residencias')
                    ->select('id', 'name', 'description')
                    ->get();

        return view('estudiantes.edit', compact('student', 'carreras', 'residencias'));
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
            'titulo' => 'required|min:5|max:250',
            'asesor' => 'required|min:3|max:100',
            'autor' => 'required|min:3|max:100',
            'autor2' => 'max:100',
            'carrera_id' => 'required',
            'residencia_id' => 'required',
            'archivo' => 'mimes:pdf',
        ]);
        
        if($validator->fails()){
            return redirect('/estudiantes/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $student = Student::findOrFail($id);

        $student->titulo = $request->titulo;
        $student->asesor = $request->asesor;
        $student->autor = $request->autor;
        $student->autor2 = $request->autor2;
        $student->carrera_id = $request->carrera_id;
        $student->residencia_id = $request->residencia_id;


        if ($request->hasFile('archivo') !=null) {
            $archivo = $request->file('archivo');
            // Sube la imagen a la carpeta 
            $file = $archivo->store('images/residencia');
            // Guarda la ruta de la imagen en el campo image
            $student->archivo = $file;
        }

        $student->update();

        return redirect('/estudiantes')->withSuccess('El proyecto se ha actualizado con exito.');
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

        $student = Student::findOrFail($id);


        if ($student->delete()) {
            return redirect('/estudiantes')->withSuccess('El proyecto se ha eliminado con exito.');
        }

        return response()->json([
            'mensaje' => 'Error al eliminar el proyecto.'
        ]);
    }
}
