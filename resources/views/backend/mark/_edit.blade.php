@extends('layouts.app')
@section('content')
@include('backend._dashboard')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Marks</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/home">Home</a></li>
               <li class="breadcrumb-item">Marks</li>
               <li class="breadcrumb-item active">Edit</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Edit</h3>
         </div>
         <!-- /.card-header -->

 @include('_flash-message')
         <div class="card-body">
<div class="row">
            <div class="col-sm-2">
                <br>
                <a href="/marks" class="btn btn-block btn-success btn-sm">Back</a>

            </div>
         </div><br>
            <form method="post" action="/marks/update/{{ $mark->id }}">
             @csrf
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Student Name</label>
    <select name="student" class="form-control" id="exampleFormControlSelect1">
      <option value="">Select </option>
      
      @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $student->id == $mark->stud_id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                        @endforeach
         
    </select>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlInput1">Maths</label>
    <input type="number" class="form-control" name="maths" value='{{ $mark->maths }}' placeholder="maths">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Science</label>
    <input type="number" class="form-control" name="science" value="{{ $mark->science }}" placeholder="science">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">History</label>
    <input type="number" class="form-control" name="history" value='{{ $mark->history }}' placeholder="history">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlSelect1">Term</label>
    <select name="term" class="form-control" id="exampleFormControlSelect1">
    <option value="">Select </option>
     <option {{ $mark->term == 'One' ? 'selected' : '' }} value="One">
                            One</option>
                        <option {{ $mark->term == 'Two' ? 'selected' : '' }} value="Two">
                            Two
                        </option>
                        <option {{ $mark->term == 'Three' ? 'selected' : '' }} value="Three">
                            Three
                        </option>     
         
    </select>
  </div> 
     <div class="col-sm-2" style="float:right;">
    <input type="submit" class='btn btn-block btn-success btn-sm' value="Submit">
  </div>
</form>
         </div>
        
         <!-- /.card-body -->
      </div>
   </div>
</section>


@endsection
