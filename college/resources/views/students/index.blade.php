@extends('students.layout')

@section('content')
    <div class="pull-left"> 
        <h2>Student Crud Operation</h2>
    </div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('students.create')}}">Create New Student</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message}}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Fee</th>
        <th>Uploaded File</th>
        <th width="280px">Action</th>
    </tr>

@foreach ($students as $student)

    <tr>
        <td>{{++$i}}</td>
        <td>{{$student->studname}}</td>
        <td>{{$student->course}}</td>
        <td>{{$student->fee}}</td>
       
        <td><img src="/upload/{{ $student->uploadfile }}" width="100px"></td>
        <td>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('students.destroy',$student->id)}}" method="POST">

               
                <a class="btn btn-primary" href="{{route('students.edit',$student->id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>

@endforeach
</table>