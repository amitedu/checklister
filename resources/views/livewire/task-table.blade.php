<div>
    <table class="table table-responsive-sm table-striped" wire:sortable="updateTaskOrder">
        <thead>
        <tr>
            <th>{{ __('#ID') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ( $tasks as $task)
            <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $task->name }}</td>
                <td>
                    <a href="{{ route('admin.checklist.tasks.edit', [$checklist, $task]) }}"
                       class="btn btn-sm btn-info"
                    >Edit
                    </a>
                    <form
                        style="display: inline-block"
                        action="{{ route('admin.checklist.tasks.destroy', [$checklist, $task]) }}"
                        method="post"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('{{ __('Are you sure?') }}')"
                        >Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
