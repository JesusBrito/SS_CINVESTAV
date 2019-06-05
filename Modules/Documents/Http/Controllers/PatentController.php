<?php

namespace Modules\Documents\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Documents\Entities\Patent;
use Modules\Documents\Http\Requests\PatentRequest;

class PatentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patents = auth()->user()->patentes;
        return view('documents::patents.index', compact('patents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patent = null;
        $action = route('patents.store');

        return view('documents::patents.form', compact('patent', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatentRequest $request)
    {
        $patent = Patent::create($request->validated());

        if ($request->hasFile('documento')) {
            $patent->documento = $request->file('documento')->store('patents');
        }

        $patent->autor()->associate(auth()->user());
        $patent->save();
        alert()->success('Los datos se guardaron correctamente', 'OK')->autoclose(env('NOTIFICATION_TIME', 1500));

        return redirect()->route('patents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patent  $patent
     * @return \Illuminate\Http\Response
     */
    public function show(Patent $patent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patent  $patent
     * @return \Illuminate\Http\Response
     */
    public function edit(Patent $patent)
    {
        $action = route('patents.update', $patent);

        return view('documents::patents.form', compact('patent', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patent  $patent
     * @return \Illuminate\Http\Response
     */
    public function update(PatentRequest $request, Patent $patent)
    {
        $patent->update($request->validated());

        if ($request->hasFile('documento')) {
            $patent->documento = $request->file('documento')->store('patents');
            $patent->save();
        }

        alert()->success('Los datos se guardaron correctamente', 'OK')->autoclose(env('NOTIFICATION_TIME', 1500));

        return redirect()->route('patents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patent  $patent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patent $patent)
    {
        $patent->delete();
        return response()->json(['success' => true], 200);
    }
}
