<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\User;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::pluck('name','id');
        //return view('areas.index',compact('user')); //muestra en la vista index de areas
        return view('areas.index');
    }
    public function get_areas(){
        try
        {
            $areas = Area::all(); // Obtiene todos los datos
            $resources["data"] = [];
            foreach ($areas as $key => $value) {
                $resources['data'][]=$value;
            }
        }
        catch (Exception $e) {
            $resources["data"] = [];
        }
            return response()->json($resources);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if ($request->ajax()) {
        Area::create([
            'nombre'=>$request['nombre'],
            'sector'=>$request['sector'],
            ]);
        }
        /*return response()->json([
            "mensaje"=>"Registro Agregado"
            ]);*/
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
        $area =Area::findOrFail($id);
        return response()->json(
          $area->toArray()
        );
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
        $area =Area::findOrFail($id);
        $area->fill([
                'nombre'=>$request['nombre_a'],
                'sector'=>$request['sector_a'],
        ]);
        $area->save();

        return response()->json([
            "mensaje"=>"modificación exitosa"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=Area::findOrFail($id);
        $usuario->delete();
        //return $this->index();
    }
}
