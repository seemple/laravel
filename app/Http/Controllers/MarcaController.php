<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;


class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::Paginate(5);
        return view("adminMarcas",["marcas"=>$marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("agregarMarca");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ["mkNombre" => "required|min:3|max:50"],
            ["mkNombre.required" =>"El campo nombre es obligatorio",
            "mkNombre.min" =>"El campo nombre debe ingresar al menos 3 caracteres"]
        );

        //Instanciar modelo
        $Marca = new Marca;
        
        //Asignamos atributo
        $Marca->mkNombre = $request->mkNombre;

        //Guardar en la tabla.
        $Marca->save();

        // Asignamos
        return redirect("/adminMarcas")->with(["mensaje"=>"Marca agregada correctamente"]);
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
        $marca = Marca::find($id);
        return view("modificarMarca",["marca" =>$marca]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    private function formValidate($request){
        $request->validate(
            ["mkNombre" => "required|min:3|max:50"],
            ["mkNombre.required" =>"El campo nombre es obligatorio",
            "mkNombre.min" =>"El campo nombre debe ingresar al menos 3 caracteres"]
        );
    } 

    public function update(MarcaRequest $request)
    {
       
        //Busco el item
        $rsMarca = Marca::find($request->idMarca);

        //Asignamos atributo
        $rsMarca->mkNombre = $request->mkNombre;

        //Guardar en la tabla.
        $rsMarca->save();

        // Asignamos
        return redirect("/adminMarcas")->with(["mensaje"=>"Marca MODIFICADA correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
