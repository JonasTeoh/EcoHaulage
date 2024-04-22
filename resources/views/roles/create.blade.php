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
          <h1 class="m-0">Roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-10">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Create role
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
                </span>
            </div>
           
 
            <div class="card-body">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>

                    <strong>Permission:</strong>
                    

                    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        User
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      @foreach($permission1 as $value)
     
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))}}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Role
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      @foreach($permission2 as $value)
      
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Permission
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      @foreach($permission3 as $value)
     
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))}}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        Course
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      @foreach($permission4 as $value)
      
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
        Student
      </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      @foreach($permission5 as $value)
      
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
      </div>
    </div>
  </div>
                    <div class="form-group">
 
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection