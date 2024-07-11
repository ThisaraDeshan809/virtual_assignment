@extends('layouts.default')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Tasks List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Start At</th>
                        <th>Finished At</th>
                        <th>Deadline At</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task )
                    <tr>
                        <td>{{ $task->title ?? 'N/A' }}</td>
                        <td>{{ $task->description ?? 'N/A' }}</td>
                        <td>{{ $task->status ?? 'N/A' }}</td>
                        <td>{{ optional($task->taskAssign)->user->name ?? 'N/A' }}</td>
                        <td>{{ optional($task->taskAssign)->start_at ?? 'N/A' }}</td>
                        <td>{{ optional($task->taskAssign)->finished_at ?? 'N/A' }}</td>
                        <td>{{ optional($task->taskAssign)->deadline_at ?? 'N/A' }}</td>
                        <td>{{ optional($task->taskAssign)->remark ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('Tasks.edit', $task->id) }}" class="btn btn-success btn-sm">Update</a>
                            <a href="{{ route('Tasks.delete', $task->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
