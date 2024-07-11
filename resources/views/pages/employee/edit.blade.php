@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Update '{{$employee->name}}' Employee</h1>
            <form method="POST" action="{{route('Employees.update',$employee->id)}}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="name">Employee Name :</label>
                            <input  type="text" class="form-control" name="name" id="name" value="{{$employee->name}}">
                        </div>
                        <div class="form-group col-4">
                            <label for="designation">Employee Designation :</label>
                            <input  type="text" class="form-control" name="designation" id="designation" value="{{$employee->designation}}">
                        </div>
                        <div class="form-group col-4">
                            <label for="role">Employee Role :</label>
                            <input  type="text" class="form-control" name="role" id="role" value="{{$employee->role}}">
                        </div>
                        <div class="form-group col-4">
                            <label for="email">Employee Email :</label>
                            <input  type="text" class="form-control" name="email" id="email" value="{{$employee->email}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-submit">Update Employee</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
