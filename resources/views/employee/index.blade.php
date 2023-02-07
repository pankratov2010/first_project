
@extends('layouts.main')

@section('content')
    <div>
        @foreach($employees as $employee)
        <div>{{$employee->Personnal_number}}</div>
        <div>{{$employee->Full_name}}</div>
        <div>{{$employee->Job_title}}</div>
        <div>{{$employee->Subdivision}}</div>
        @endforeach
    </div>
@endsection