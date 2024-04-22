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
        <img  style ="width:300px; height:128px;" src="dist/img/sadmPic2.png" ></img>
        <br></br>
        <h3 style="color:blue">Professional Certificates</h3>
       <br>
<h1>Get job-ready for an in-demand career </h1>
<br>
<h5>
Break into a new field like information technology or data science. No prior experience necessary to get started.</h5>
        <br>
        </div><!-- /.col -->
        <div class="col-sm-10">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  

  <!-- /.content-header -->
  @foreach($courseview as $item)
  <div class="container" style= "margin:  50;">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<div class="colum">

  <div class="column">
  
        <div class="card">
      
        <h5 class="card-title">Course : {{ $item->coursename }}</h5>
        <p class="card-text">Duration : {{ $item->duration }}</p>
        <p class="card-text">Fee : {{ $item->fee }}</p>
        <p class="card-text">Description : {{ $item-> description}}</p>                         
        <a href="{{ url('/campus/' . $item->id) }}" title="View Course"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Learn More</button></a>

  </div>
      
    </hr>
  
  </div>
 
</div></div> @endforeach
@stop
