<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ChecklistController extends Controller
{
    public function create(ChecklistGroup $checklistGroup): View
    {
        return view('admin.checklist.create', compact('checklistGroup'));
    }


    public function store(ChecklistRequest $checklistRequest, ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->checklists()->create($checklistRequest->validated());

        return redirect(route('home'));
    }


    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist): View
    {
        return view('admin.checklist.edit', compact(['checklistGroup', 'checklist']));
    }


    public function update(ChecklistRequest $checklistRequest, ChecklistGroup $checklistGroup, Checklist $checklist): RedirectResponse
    {
        $checklist->update($checklistRequest->validated());

        return redirect(route('home'));
    }


    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist): RedirectResponse
    {
        $checklist->delete();

        return redirect(route('home'));
    }
}
