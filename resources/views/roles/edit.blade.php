@extends('layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    {{--@php dd($role); @endphp--}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Role Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Role</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Role / edit</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" action="{{ route('roles.update', $role->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
                    @include('roles.form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <script>
        $(document).ready(function () {
            $( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                var data = $( this ).serialize();
                console.log( data );
                console.log( $(this).attr('action') );
                $.ajax({
                    method: "POST",
                    url: $(this).attr('action'),
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response.success == true) window.location.href = "/roles";
                    }
                })
            });
        })
    </script>
@endsection
