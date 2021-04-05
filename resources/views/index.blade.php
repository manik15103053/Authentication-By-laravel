@extends('master')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success" style="margin-left:8%">
        {{ session()->get('message') }}
    </div>
@endif

<table class="table table-reponsive table-hover">
        <tr>
            <th>#</th>
             <th>Name</th>
            <th>Registration No</th>
            <th>Department</th>
            <th>Information</th>
            <th>Image</th>
            <th class="text-center">Action</th>
        
        </tr>
            @php $i = 0; @endphp
        @foreach($students as $student)
                @php $i++ @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->registration_id}}</td>
                <td>{{$student->department}}</td>
                <td>{{$student->info}}</td>
                <td>
                
                </td>
                <td class="text-center">
                    <a href="{{route('edit',$student->id)}}"class="btn btn-success">Edit</a> 
                    <a href="{{route('delete',$student->id)}}" class="btn btn-danger">Delete</a>
                    <a href="{{route('show',$student->id)}}" class="btn btn-warning">View</a>
                </td>
            </tr>
        @endforeach
        
        </table>
        {{$students->links()}}

@endsection