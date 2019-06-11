<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Entities\WasteLog as WasteLog;
use Modules\Inventory\Entities\Unity as Unity;
use Modules\Inventory\Entities\TypeWaste as TypeWaste;
use app\User as User;


class WastesLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $wastes = WasteLog::all();
        $unities = Unity::all();
        $typeWastes = TypeWaste::all();
        $users = User::all();
        return view('inventory::BitacoraDesechos.bitacoraDesecho',compact('wastes', 'unities', 'typeWastes','users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('inventory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('inventory::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
