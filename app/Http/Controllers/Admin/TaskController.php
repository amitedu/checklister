<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    public function create(Checklist $checklist): RedirectResponse
    {
        return redirect()->to(route('admin.checklist_groups.checklist.edit', $checklist));
    }


    public function store(TaskRequest $taskRequest, Checklist $checklist): RedirectResponse
    {
        $position = $checklist->tasks()->max('position') + 1;
        $checklist->tasks()->create($taskRequest->validated() + ['position' => $position]);

        return redirect()->route('admin.checklist_groups.checklist.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }


    public function edit(Checklist $checklist, Task $task): View
    {
        return view('admin.tasks.edit', compact(['checklist', 'task']));
    }


    public function update(TaskRequest $taskRequest, Checklist $checklist, Task $task): RedirectResponse
    {
        $task->update($taskRequest->validated());

        return redirect()->route('admin.checklist_groups.checklist.edit', [
            $checklist->checklist_group_id,
            $checklist
        ]);
    }


    public function destroy(Checklist $checklist, Task $task): RedirectResponse
    {
        $checklist->tasks()->where('position', '>', $task->position)->update(
            ['position' => \DB::raw('position - 1')]
        );

        $task->delete();

        return redirect()->route('admin.checklist_groups.checklist.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }
}
