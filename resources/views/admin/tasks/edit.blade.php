@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>{{ __('Update Task') }}</strong></div>
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
                            <form action="{{ route('admin.checklist.tasks.update', [$checklist, $task]) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">{{ __('Task Name') }}</label>
                                    <input class="form-control" name="name" type="text" value="{{ $task->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" rows="4" id="taskEditor">{{ $task->description }}</textarea>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit"> {{ __('Update Task') }}</button>
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

@section('script')
    <script>
        ClassicEditor
            .create( document.querySelector( '#taskEditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
