@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Edit Checklist') }}</strong></div>
                        <div class="card-body">
                            @error('name')
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                            <form action="{{ route('admin.checklist_groups.checklist.update', [$checklistGroup, $checklist]) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">{{ __('Checklist Name') }}</label>
                                    <input class="form-control" name="name" type="text" value="{{ $checklist->name }}">
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Checklist') }}</button>
                                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form action="{{ route('admin.checklist_groups.checklist.destroy', [$checklistGroup, $checklist]) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Delete Checklist Group</button>
                    </form>

                    <hr>

                    <div class="card">
                        <div class="card-header"><strong>{{ __('All Tasks') }}</strong></div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __('#ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ( $checklist->tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.checklist.tasks.edit', [$checklist, $task]) }}"
                                               class="btn btn-sm btn-info"
                                            >Edit</a>
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
                                                >Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header"><strong>{{ __('New Task') }}</strong></div>
                        <div class="card-body">
                            @if($errors->storeTask->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->storeTask->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.checklist.tasks.store', $checklist) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Task Name') }}</label>
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Task') }}</button>
                                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
