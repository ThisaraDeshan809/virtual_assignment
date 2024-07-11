@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Add New Task</h1>
            <form method="POST" action="{{route('Tasks.store')}}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="title">Task Title :</label>
                            <input  type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group col-12">
                            <label for="description">Task Description :</label>
                            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                        </div>
                        <div class="form-group col-4">
                            <label for="status">Task Status :</label>
                            <select class="form-control" name="status" id="status">
                                <option value="new">New</option>
                                <option value="in progress">In progress</option>
                                <option value="hold">Hold</option>
                                <option value="completed">Completed</option>
                                <option value="failed">Failed</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="assign">Task Assign :</label>
                            <select class="form-control" name="assign" id="assign">
                                @foreach ($employees as $employee )
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="start_at">Task Starts :</label>
                            <input  type="date" class="form-control" name="start_at" id="start_at">
                        </div>
                        <div class="form-group col-4">
                            <label for="finished_at">Task Finished :</label>
                            <input  type="date" class="form-control" name="finished_at" id="finished_at">
                        </div>
                        <div class="form-group col-4">
                            <label for="deadline_at">Task Deadline :</label>
                            <input  type="date" class="form-control" name="deadline_at" id="deadline_at">
                        </div>
                        <div class="form-group col-12">
                            <label for="remark">Task Remark :</label>
                            <textarea class="form-control" name="remark" id="remark" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-submit">Save Task</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
