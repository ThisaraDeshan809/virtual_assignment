@extends('layouts.default')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Employees List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee )
                    <tr>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->designation}}</td>
                        <td>{{$employee->role}}</td>
                        <td>{{$employee->email}}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Assign Tasks</a>
                            <a href="{{route('Employees.edit',$employee->id)}}" class="btn btn-success btn-sm">Update</a>
                            <a href="{{route('Employees.delete',$employee->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
