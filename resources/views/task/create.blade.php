@extends('layout.app')
@section('content')
    <div class="container">
        <div class="m-auto">
            <h1> Hello {{ Auth::user()->name }},</h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h2>Create Task</h2>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary float-end">
                Back
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('task.create') }}" method="post">
                    @csrf
                    <label for="title" class="form-label mt-2">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="description" class="form-label mt-2">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="due_date" class="form-label mt-2">Due date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date') }}">
                    @error('due_date')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="priority" class="form-label mt-2">Priority</label>
                    <select name="priority" id="priority" class="form-select">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    @error('priority')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="tags" class="form-label mt-2">Tags</label>
                    <select name="tags[]" id="tags" class="form-select multi-select" multiple>
                        <option value="1">Personel</option>
                        <option value="2">Business</option>
                        <option value="3">Design</option>
                        <option value="4">Development</option>
                        <option value="5">Marketing</option>
                        <option value="6">Sales</option>
                    </select>
                    @error('tags')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-success mt-2 float-end">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
