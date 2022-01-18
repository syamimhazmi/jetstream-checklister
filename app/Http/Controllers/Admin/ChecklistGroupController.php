<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Contracts\Repositories\ChecklistGroup as Repository;

class ChecklistGroupController extends Controller
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Inertia::render('Admin/ChecklistGroup');
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
     * @param  \App\Http\Requests\ChecklistGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChecklistGroupRequest $request)
    {
        $request->validate();

        $checklistGroup = $this->repository->create($request->all());

        return redirect()->route('admin.checklist_groups.show', ['checklist_groups' => $checklistGroup->id])
            ->with('success', 'Checklist group created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChecklistGroup  $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ChecklistGroup $checklistGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChecklistGroup  $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ChecklistGroupRequest  $request
     * @param  \App\Models\ChecklistGroup  $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function update(ChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChecklistGroup  $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklistGroup)
    {
        //
    }
}
