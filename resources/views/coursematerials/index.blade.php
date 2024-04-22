@extends('layouts.app')
@section('content')



@include('layouts.sidebar')
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
  <script src="https://kit.fontawesome.com/bc8e231302.js" crossorigin="anonymous"></script>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="height: 100px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lessons</h1>
          </div><!-- /.col -->
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="container" >
  
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <br>
        <div class="card">
            <div class="card-header">Lesson
                <span class="float-right">
                    
                    <a class="btn btn-primary" href="{{ route('coursematerials.create') }}">New Lesson</a>
                    <a class="btn btn-primary" href="{{ URL::to('/coursematerials/pdf') }}">Export to PDF</a>
                </span>
            </div>
            <div  class="card-body">
                <table id="ListUser" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th  width="50px">#</th>
                           
                            <th>Lesson</th>
                           <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $material)
                            <tr>
                                <td>{{ $material->id }}</td>
                                <td>{{ $material->lesson }}</td>
                                
                            <td>
                                    <a class="btn btn-success" href="{{ route('coursematerials.show',$material->id) }}">Show</a>
                                    @can('user-edit')
                     
                                    <a class="btn btn-primary" href="{{ route('coursematerials.edit',$material->id) }}">Edit</a>
                                    
                                    @endcan
                                    @can('user-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['coursematerials.destroy', $material->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->render() }}
            </div>
        </div>
    </div>
    
   
</div>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script>

$(document).ready(function() {
    $('#ListUser').DataTable();
} );
</script>
@endsection
