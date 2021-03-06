<?php

namespace Modules\Documents\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Documents\Entities\Group;
use Modules\Documents\Http\Requests\GroupRequest;
use Datatables;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('profesor')->get();
        return view('documents::groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = null;
        $action = route('groups.store');
        $users = User::all();

        return view('documents::groups.form', compact('group', 'action', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $group = Group::create($request->validated());
        $profesor = User::find($request->id_profesor);
        $group->profesor()->associate($profesor);
        $group->save();
        alert()->success('Los datos se guardaron correctamente', 'OK')->autoclose(env('NOTIFICATION_TIME', 1500));

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('documents::groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $action = route('groups.update', $group);
        $users = User::all();

        return view('documents::groups.form', compact('group', 'action', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        $profesor = User::find($request->id_profesor);
        $group->profesor()->associate($profesor);
        $group->save();
        alert()->success('Los datos se guardaron correctamente', 'OK')->autoclose(env('NOTIFICATION_TIME', 1500));

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json(['success' => true], 200);
    }

    public function addStudent(Request $request, Group $group)
    {
        $fields = $request->validate([
            'id_student' => 'bail|required|integer'
        ]);

        $group->alumnos()->attach($fields['id_student']);
        $student = User::find($fields['id_student']);
        $urlRemove = route('groups.remove-student', [$group, $student]);

        return response()->json(['success' => true, 'url' => $urlRemove, 'student' => $student], 200);
    }

    public function removeStudent(Group $group, User $student)
    {
        $id = $student->id;
        $group->alumnos()->detach($id);

        return response()->json(['success' => true, 'id' => $id], 200);
    }

    public function availableUsers(Group $group)
    {
        $usersGroupIds = $group->alumnos->modelKeys();
        $users = User::whereNotIn('id', $usersGroupIds)->get();

        return response()->json(compact('users'));
    }
}
