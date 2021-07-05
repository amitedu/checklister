<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistGroupRequest;
use App\Http\Requests\UpdateChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ChecklistGroupController extends Controller
{
    public function create(): View
    {
        return view('admin.checklist_group.create');
    }


    public function store(ChecklistGroupRequest $request): RedirectResponse
    {
        ChecklistGroup::create($request->validated());

        return redirect(route('home'));
    }


    public function edit(ChecklistGroup $checklistGroup): View
    {
        return view('admin.checklist_group.edit', ['checklistGroup' => $checklistGroup]);
    }


    public function update(UpdateChecklistGroupRequest $updateChecklistGroupRequest, ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->update($updateChecklistGroupRequest->validated());
        return redirect(route('home'));
    }


    public function destroy(ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->delete();

        return redirect(route('home'));
    }
}
