@extends('master')

@section('content')

<h2>Edit Page</h2>
<form method= "post"action="{{route('update',$student->id)}}">
{{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"name="name" aria-describedby="emailHelp" value="{{$student->name}}"placeholder="Enter Name">
    
  </div>
  <div class="form-group">
    <label for="registration_id">Registration No</label>
    <input type="number" class="form-control" id="registration_id"value="{{$student->registration_id}}"name="registration_id" placeholder="Enter Registration No">
  </div>
  <div class="form-group">
    <label for="department">Department Name</label>
    <input type="text" class="form-control" id="department"value="{{$student->department}}"name="department" placeholder="Enter Department Name">
  </div>
  <div class="form-group">
    <label for="info">Information</label>
    <textarea class="form-control" id="info"name ="info"rows="3">{{$student->info}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection