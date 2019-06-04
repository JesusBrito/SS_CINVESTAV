<?php

namespace Modules\Documents\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Documents\Entities\Publication;
use Modules\Documents\Http\Requests\PublicationRequest;
use Datatables;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $publications = Publication::all();
        return view('documents::publications.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $publication = null;
        $action = route('publications.store');
        $users = User::all();

        return view('documents::publications.form', compact('publication', 'action', 'users'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(PublicationRequest $request)
    {
        $publication = Publication::create($request->validated());

        if ($request->hasFile('document')) {
            $file = $request->file('document')->store('Documents');
           // $name = time().$file->getClientOriginalName();
           // $file->putFileAs($name)->store('Documents');
        }

        alert()->success('Los datos se guardaron correctamente', 'OK')->autoclose(env('NOTIFICATION_TIME', 2500));

        return redirect()->route('publications.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('documents::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('documents::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
