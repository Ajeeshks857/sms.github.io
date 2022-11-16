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
            <h1 class="m-0">Student</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/home">Home</a></li>
               <li class="breadcrumb-item">Student</li>
               <li class="breadcrumb-item active">Add</li>
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
            <h3 class="card-title">Add</h3>
         </div>
         <!-- /.card-header -->

 @include('_flash-message')
         <div class="card-body">
<div class="row">
            <div class="col-sm-2">
                <br>
                <a href="/students" class="btn btn-block btn-success btn-sm">Back</a>

            </div>
         </div><br>
            <form method="post" action="/students/add">
             @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" class="form-control" name="full_name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Age</label>
    <input type="number" class="form-control" name="age" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Reporting Teacher</label>
    <select name="teacher" class="form-control" id="exampleFormControlSelect1">
      <option value="">Select </option>
     @foreach ( $teachers as $teacher)
         <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>   
     @endforeach
         
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select name="gender" class="form-control" id="exampleFormControlSelect1">
      <option value="">Select </option>
      <option value="Male">Male </option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>    
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
