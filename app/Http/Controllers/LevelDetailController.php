<?php

namespace App\Http\Controllers;

use App\LevelDetail;
use Illuminate\Http\Request;

class LevelDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $detalleNivel = LevelDetail::create($request->all());
        $detalleNivel->user()->associate(auth()->user());

        if ($detalleNivel->save()) {
            return response()->json(['success' => true, 'detalleNivel' => $detalleNivel], 200);
        }

        return response()->json(['success' => false, 'msg' => 'Error al guardar'], 400);
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
    public function edit(LevelDetail $level_detail)
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
    public function update(Request $request, LevelDetail $level_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LevelDetail $levelDetail)
    {
        $id = $levelDetail->id;
        if ($levelDetail->delete()) {
            return response()->json(['success' => true, 'id' => $id], 200);
        }

        return response()->json(['success' => false, 'msg' => 'No se pudo eliminar el detalle'], 500);
    }
}
