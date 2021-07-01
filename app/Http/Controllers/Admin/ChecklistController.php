<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Response;
use Illuminate\view\view;

class ChecklistController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param ChecklistGroup $checklistGroup
     * @return view
     */
    public function create(ChecklistGroup $checklistGroup): view
    {
        return view('admin.checklist.create', compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChecklistRequest $checklistRequest
     * @param ChecklistGroup $checklistGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(ChecklistRequest $checklistRequest, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->create($checklistRequest->validated());

        return redirect(route('home'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklist.edit', compact(['checklistGroup', 'checklist']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChecklistRequest $checklistRequest
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return Response
     */
    public function update(ChecklistRequest $checklistRequest, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($checklistRequest->validated());

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|view
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();

        return redirect(route('home'));
    }
}
