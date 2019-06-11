<?php

namespace Modules\Documents\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Documents\Entities\Publication;
use Modules\Documents\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $publications = Publication::where('id_user',auth()->user()->id)->get();
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
    public function store(PublicationRequest $request, Publication $publication)
    {
        $publication = Publication::create($request->validated());

        if ($request->hasFile('document')) {
            $publication->document = $request->file('document')->store('publications');
        }
        $publication->user()->associate(auth()->user());
        $publication->save();
        alert()->success('Los datos se guardaron correctamente', 'OK')->autoclose(env('NOTIFICATION_TIME', 1500));

        return redirect()->route('publications.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show()
    {
        $publications = Publication::all();
        return view('documents::publications.index',compact('publications'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Publication $publication)
    {
        $action = route('publications.update', $publication);
        return view('documents::publications.form', compact('publication', 'action'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $publication->update($request->validated());

        if ($request->hasFile('document')) {
            $publication->document = $request->file('document')->store('publications');
            $publication->save();
        }

        alert()->success('Los datos se actualizaron correctamente', 'OK')->autoclose(env('NOTIFICATION_TIME', 1500));

        return redirect()->route('publications.index');
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return response()->json(['success' => true], 200);
    }
}
