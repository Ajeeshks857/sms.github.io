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
            <h1 class="m-0">Teacher</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/home">Home</a></li>
               <li class="breadcrumb-item">Teacher</li>
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
                <a href="/teachers" class="btn btn-block btn-success btn-sm">Back</a>

            </div>
         </div><br>
            <form method="post" action="/teachers/update/{{ $teacher->id }}">
             @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" class="form-control" value="{{ $teacher->name }}" name="full_name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select name="role" class="form-control" id="exampleFormControlSelect1">
                        <option selected="selected" value='' disabled>Select</option>
                        <option {{ $teacher->role == 'Malyalam' ? 'selected' : '' }} value="Malyalam">
                            Malyalam</option>
                        <option {{ $teacher->role == 'English' ? 'selected' : '' }} value="English">
                            English
                        </option>
                        <option {{ $teacher->role == 'Maths' ? 'selected' : '' }} value="Maths">
                            Maths
                        </option>
                        <option {{ $teacher->role == 'Science' ? 'selected' : '' }} value="Science">
                            Science
                        </option>
                        <option {{ $teacher->role == 'Computer' ? 'selected' : '' }} value="Computer">
                            Computer
                        </option>
                    </select>
    
  </div> 
  <div class="col-sm-2" style="float:right;">
    <input type="submit" class='btn btn-block btn-success btn-sm' value="Update Details">
  </div>
    
</form>
         </div>
        
         <!-- /.card-body -->
      </div>
   </div>
</section>


@endsection
