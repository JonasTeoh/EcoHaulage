@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>


<!-- Main Sidebar Container -->
@include('layouts.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 100px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Driver</h1>
        </div><!-- /.col -->
        <div class="col-sm-10">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container" style= "margin: left 50;">
<div class="card">
  
  <div class="card-header">Driver Edit Page
  <span class="float-right">
                    <a class="btn btn-primary" href="{{ url('/driver') }}">Back</a>
                </span>
  </div>
  <div class="card-body">
  
  {!! Form::model($course, ['route' => ['driver.update', $course->id], 'method' => 'PATCH']) !!}
 
    <div class="form-group">
        <strong>Name:</strong>
        {!! Form::text('Name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>Email:</strong>
        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>Contact No:</strong>
        {!! Form::text('contact', null, ['placeholder' => 'Contact', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <strong>Vehicle No:</strong>
        {!! Form::text('vechicle_no', null, ['placeholder' => 'Vehicle No', 'class' => 'form-control']) !!}
    </div>    
<button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}
  </div>
</div></div>
@stop
