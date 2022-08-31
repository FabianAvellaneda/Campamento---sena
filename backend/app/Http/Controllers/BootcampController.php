<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
//use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcampRequest;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //metodo json de los response tranmsite una response en formato json
        //parametros: datos a transmitir 
        // codigo http de respuesta ( response)
        return response()->json( ["success"=> true,
        "data"=> Bootcamp::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        /*1. Establecer validadciones
        $reglas = [
            "name" => 'required'
        ];
        //2. Objeto validador
        $v = validator::make($request->all(),$reglas);
        //3. validar
        if($v->fails()){
            //4. si falla la validacion
            return response()->json( ["success"=> false,
            "error"=> $v->errors()
            ], 404);
        }*/
        return response()->json( ["success"=> true,
        "data"=> Bootcamp::create($request->all())
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( ["success"=> true,
        "data"=> Bootcamp::find($id)
        ], 200);
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
        $b=Bootcamp::find($id);
        $b->update($request->all());
        return response()->json( ["success"=> true,
        "data"=> $b 
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b=Bootcamp::find($id);
        $b->delete();
        return response()->json( ["success"=> true,
        "data"=> $b 
        ], 200);
    }
}
