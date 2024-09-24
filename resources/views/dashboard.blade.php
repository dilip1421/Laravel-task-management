@extends('layout.app')
@section('content')
    <div class="container">
        <div class="m-auto">
            <h1> Welcome {{ Auth::user()->name }},</h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="my-3 d-flex align-items-center justify-content-between">
            <h2>All Tasks</h2>
            <a href="{{ route('task.create') }}" class="btn btn-primary float-end">
                Create Task
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (!empty($tasks) && $tasks != '')
            <table class="display" id="allTasks" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task['title'] }}</td>
                            <td>{{ $task['description'] }}</td>
                            <td>{{ $task['due_date'] }}</td>
                            <td>
                                @if ($task['priority'] == 1)
                                    Low
                                @elseif ($task['priority'] == 2)
                                    Medium
                                @elseif ($task['priority'] == 3)
                                    High
                                @endif
                            </td>
                            <td>@php
                                $tags = json_decode($task['tags']); // Decode the JSON-encoded tags
                            @endphp
                                @if ($tags)
                                    @foreach ($tags as $tag)
                                        @switch($tag)
                                            @case(1)
                                                Personal
                                            @break

                                            @case(2)
                                                Business
                                            @break

                                            @case(3)
                                                Design
                                            @break

                                            @case(4)
                                                Development
                                            @break

                                            @case(5)
                                                Marketing
                                            @break

                                            @case(6)
                                                Sales
                                            @break
                                        @endswitch
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('task.edit', $task['id']) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ route('task.delete', $task['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
