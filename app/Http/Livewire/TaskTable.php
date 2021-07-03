<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskTable extends Component
{
    public $checklist;

    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task) {
            Task::find($task['value'])->update(['position' => $task['order']]);
        }
    }

    public function render()
    {
        $tasks = $this->checklist->tasks()->orderBy('position')->get();
        return view('livewire.task-table', compact('tasks'));
    }
}
