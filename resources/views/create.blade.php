@extends('master')


@section('content')

@if(session()->has('message'))
    <div class="alert alert-success" style="margin-left:8%">
        {{ session()->get('message') }}
    </div>
@endif

<h2>Create Page</h2>
<form method= "POST"enctype="multipart/form-data"action="{{route('store')}}"data-parsley-validate >





@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif
{{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"name="name" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="registration_id">Registration No</label>
    <input type="number" class="form-control" id="registration_id"name="registration_id" required>
  </div>
  <div class="form-group">
    <label for="department">Department Name</label>
    <input type="text" class="form-control" id="department"name="department" required>
  </div>
  <div class="form-group">
    <label for="image">Upload File</label>
    <input type="file" class="form-control" id="image"name="image" required>
  </div>
  <div class="form-group">
    <label for="info">Information</label>
    <textarea class="form-control" id="info"name ="info"rows="3"></textarea>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection