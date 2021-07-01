<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\view\view;

class ChecklistGroupController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(): view
    {
        return view('admin.checklist_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChecklistGroupRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());

        return redirect(route('home'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param ChecklistGroup $checklistGroup
     * @return view
     */
    public function edit(ChecklistGroup $checklistGroup):view
    {
        return view('admin.checklist_group.edit', ['checklistGroup' => $checklistGroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChecklistGroupRequest $checklistGroupRequest
     * @param ChecklistGroup $checklistGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ChecklistGroupRequest $checklistGroupRequest, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($checklistGroupRequest->validated());
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ChecklistGroup $checklistGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();

        return redirect(route('home'));
    }
}
