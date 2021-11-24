@extends('layouts.app')

@section('content')
<div class="container fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Todo List</h4>
                    <a href="{{ route('todo-list-create') }}" class="btn btn-sm btn-primary">+ Add New</a>
                </div>

                <div class="card-body">
                    @foreach ($todolists as $item )

                    <div class="card shadow rounded mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }} <sub>{{ $item->user->name }}</sub></h5>
                            <p>{{ $item->created_at->diffForHumans() }}</p>
                            <p class="card-text">{{ $item->discription }}</p>
                            <a href="{{ route('todo-list-edit',$item->id) }}" class="card-link btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('todd-list-delete',$item->id) }}" class="card-link btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection