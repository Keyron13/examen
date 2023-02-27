<?php

namespace App\Http\Controllers;

use App\Models\youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $youtubes = youtube::all();
        return response()->json(['youtubes'=>$youtubes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        youtube::create([
            'Nombre'=>$request->nombre,
            'url'=>$request->url,
            'seguidores'=>$request->seguidores
        ]);
        return response()->json(['messages'=>'Se creo un Video']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $youtube = youtube::find($id);
        return response()->json(['youtubes'=>$youtube]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $youtube = youtube::find($id);
        $youtube->update([
            'Nombre'=>$request->nombre,
            'url'=>$request->url,
            'seguidores'=>$request->seguidores
        ]);
        return response()->json(['messages'=>'Se Actualizo el Video']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $youtube = youtube::find($id)->delete();
        return response()->json(['messages'=>'Se Elimino el Video']);
    }
}
