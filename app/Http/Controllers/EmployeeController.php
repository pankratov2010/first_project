<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create() {
        $employeeArr = [
            [
            'Personnal_number' => '1',
            'Full_name' => 'Панкратов Денис Михайлович',
            'Job_title' => 'Аналитик',
            'Subdivision' => 'Отдел аналитики',
            ],
        ];

        foreach ($employeeArr as $item) {
            Employee::create($item);
        }
    }

    public function update() {
        $employee = Employee::find(1);

        $employee->update([
            'Full_name' => 'new name',
            'Job_title' => 'new Job title',
        ]);
    }

    public function delete() {
        $employee = Employee::find(1);

        $employee->delete();
    }
}
