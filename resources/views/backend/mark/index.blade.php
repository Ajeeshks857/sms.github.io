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
               <li class="breadcrumb-item active">Marks</li>
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
            <h3 class="card-title">List</h3>
         </div>
         <!-- /.card-header -->
         
 @include('_flash-message')
         <div class="card-body">
<div class="row">
            <div class="col-sm-2">
                <br>
                <a href="/marks/create/" class="btn btn-block btn-success btn-sm"><i class="nav-icon fas fa-plus"></i>Add New</a>

            </div>
         </div><br>
            <table id="teachers-table" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Maths</th>
                     <th>Science</th>
                     <th>History</th>
                     <th>Term</th>
                     <th>Total Marks</th>
                     <th>Created On</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
@if(!empty($marks) && $marks->count())
               @foreach ($marks as $mark)
                  <tr>
                    <td>{{ $mark->id }}</td>
                    <td>{{ $mark->name }}</td>
                    <td>{{ $mark->maths }}</td>
                    <td>{{ $mark->science }}</td>
                    <td>{{ $mark->history }}</td>
                    <td>{{ $mark->term }}</td>
                    <td>{{ $mark->total_marks }}</td>
                    <td>{{ date('j F, Y, g:i a', strtotime($mark->created_at)) }}</td>
                    <td>

                    <a href='/marks/edit/{{$mark->id}}' class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                       
                    
                    </td>
                    <td><form  action="/marks/delete/{{$mark->id}}" method="post">
                            @csrf
                            @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete" >
                    </form></td>
                  </tr>
                   @endforeach
@else
 <tr>

                    <td colspan="10"><div class="alert alert-danger" role="alert">
  There are no data.
</div></td>
                </tr>
            @endif
                  </tbody>
            </table>
         </div>
         {!! $marks->links() !!}
         <!-- /.card-body -->
      </div>
   </div>
</section>


@endsection
