<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employees = User::all();
        return view('pages.employee.index',compact('employees'));
    }

    public function create() {
        return view('pages.employee.create');
    }

    public function store(EmployeeRequest $request) {
        $validatedData = $request->validated();

        try {
            $user = new User();
            $user->name = $validatedData['name'];
            $user->designation = $validatedData['designation'];
            $user->role = $validatedData['role'];
            $user->email = $validatedData['email'];
            $user->save();

            return redirect()->route('Employees.index')->with('success', 'Employee added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add employee. ' . $e->getMessage());
        }
    }

    public function edit($id) {
        $employee = User::where('id',$id)->first();
        return view('pages.employee.edit',compact('employee'));
    }

    public function update(EmployeeRequest $request,$id) {
        $validatedData = $request->validated();

        try {
            $user = User::findOrFail($id);
            $user->name = $validatedData['name'];
            $user->designation = $validatedData['designation'];
            $user->role = $validatedData['role'];
            $user->email = $validatedData['email'];
            $user->save();

            return redirect()->route('Employees.index')->with('success', 'Employee updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update employee. ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('Employees.index')->with('success', 'Employee deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('Employees.index')->with('error', 'Employee not found.');
        } catch (\Exception $e) {
            return redirect()->route('Employees.index')->with('error', 'Failed to delete employee. ' . $e->getMessage());
        }
    }
 }
