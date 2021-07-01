@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('New Checklist Group') }}</strong></div>
                        <div class="card-body">
                            <form action="{{ route('admin.checklist_groups.update', $checklistGroup) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input class="form-control" name="name" type="text"
                                           value="{{ $checklistGroup->name }}">
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save') }}</button>
                                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <form action="{{ route('admin.checklist_groups.destroy', $checklistGroup) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete Checklist Group</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
