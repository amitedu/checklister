<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\view\view;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Checklist $checklist
     * @return RedirectResponse
     */
    public function create(Checklist $checklist): RedirectResponse
    {
        return redirect()->to(route('admin.checklist_groups.checklist.edit', $checklist));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest $taskRequest
     * @param Checklist $checklist
     * @return RedirectResponse
     */
    public function store(TaskRequest $taskRequest, Checklist $checklist)
    {
        $checklist->tasks()->create($taskRequest->validated());

        return redirect()->route('admin.checklist_groups.checklist.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Checklist $checklist
     * @param Task $task
     * @return view
     */
    public function edit(Checklist $checklist, Task $task)
    {
        return view('admin.tasks.edit', compact(['checklist', 'task']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $taskRequest
     * @param Checklist $checklist
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(TaskRequest $taskRequest, Checklist $checklist, Task $task)
    {
        $task->update($taskRequest->validated());

        return redirect()->route('admin.checklist_groups.checklist.edit', [
            $checklist->checklist_group_id,
            $checklist
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Checklist $checklist
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Checklist $checklist, Task $task)
    {
        $task->delete();

        return redirect()->route('admin.checklist_groups.checklist.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }
}
