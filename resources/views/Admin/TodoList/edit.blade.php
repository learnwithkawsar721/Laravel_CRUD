@extends('layouts.app')
@section('content')
<div class="container fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Edit Todo</h4>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('todo-list-update',$todo->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input value="{{ $todo->name }}" type="text" class="form-control mb-3" name="name" id="name"
                                placeholder="Enter Todo-Name">

                            @error('name')
                            <small class="alert alert-danger mt-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discription">Discription:</label>
                            <textarea name="discription" id="discription" class="form-control mb-3"
                                rows="2">{{ $todo->discription }}
                            </textarea>
                            @error('discription')
                            <small class="alert alert-danger mt-4">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection