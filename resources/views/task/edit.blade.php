@extends('layout.app')
@section('content')
    <div class="container">
        <div class="m-auto">
            <h1> Hello {{ Auth::user()->name }},</h1>
            <hr>
        </div>
    </div>
    {{-- @php
        print_r($tasks);
    @endphp --}}
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h2>Edit Task</h2>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary float-end">
                Back
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('task.edit', $tasks->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="taskId" value="{{ $tasks->id }}">
                    <label for="title" class="form-label mt-2">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $tasks->title }}">
                    @error('title')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="description" class="form-label mt-2">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $tasks->description }}</textarea>
                    @error('description')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="due_date" class="form-label mt-2">Due date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date"
                        value="{{ $tasks->due_date }}">
                    @error('due_date')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="priority" class="form-label mt-2">Priority</label>
                    <select name="priority" id="priority" class="form-select">
                        <option value="1" {{ $tasks->priority == 1 ? 'selected' : '' }}>Low</option>
                        <option value="2" {{ $tasks->priority == 2 ? 'selected' : '' }}>Medium</option>
                        <option value="3" {{ $tasks->priority == 3 ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <label for="tags" class="form-label mt-2">Tags</label>
                    <select name="tags[]" id="tags" class="form-select multi-select" multiple>
                        <option value="1" {{ in_array('1', json_decode($tasks->tags)) ? 'selected' : '' }}>Personal
                        </option>
                        <option value="2" {{ in_array('2', json_decode($tasks->tags)) ? 'selected' : '' }}>Business
                        </option>
                        <option value="3" {{ in_array('3', json_decode($tasks->tags)) ? 'selected' : '' }}>Design
                        </option>
                        <option value="4" {{ in_array('4', json_decode($tasks->tags)) ? 'selected' : '' }}>Development
                        </option>
                        <option value="5" {{ in_array('5', json_decode($tasks->tags)) ? 'selected' : '' }}>Marketing
                        </option>
                        <option value="6" {{ in_array('6', json_decode($tasks->tags)) ? 'selected' : '' }}>Sales
                        </option>
                    </select>
                    @error('tags')
                        <p class="alert-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-success mt-2 float-end">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
