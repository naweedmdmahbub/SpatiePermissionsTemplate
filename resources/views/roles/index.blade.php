@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Roles</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Roles List</h3>
                            @can('roles.create')
                                <div style="text-align: right">
                                    <a class="btn btn-default" href="{{route('roles.create')}}">
                                        <i class="fa fa-plus"></i> Add Role
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        @if(auth('web'))
                                            <th>Options</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles  as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('roles.view')
                                                <a href="{{ route('roles.show',$role->id) }}" class="btn btn-warning">View</a>
                                            @endcan
                                            @can('roles.edit')
                                                <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-info">Edit</a>
                                            @endcan
                                            @can('roles.delete')
                                                <button class="btn btn-danger delete-confirm" data-id="{{ $role->id }}">Delete</button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->




    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

        $(".delete-confirm").click(function () {
            var id = $(this).data("id");
            console.log('Clicking Delete',id);

            $.ajax({
                method: 'GET',
                url: '/roles/check_users/'+id,
                success: function (response) {
                    if(response.success){
                        $.confirm({
                            title: 'Warning!',
                            icon: 'fa fa-warning',
                            content: 'Are you sure? You wont be able to revert this!',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                tryAgain: {
                                    text: 'Click Here',
                                    btnClass: 'btn-red',
                                    action: function(){
                                        $.ajax({
                                            method: 'POST',
                                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                                            url: '/roles/delete/' + id,
                                            success: function (response) {
                                                if(response.msg){
                                                    console.log(response.msg,"ajax success response.msg")
                                                    location.reload()
                                                }
                                            }
                                        })
                                    }
                                },
                                close: function () {
                                }
                            }
                        });
                    }else {
                        $.confirm({
                            title: 'Encountered some problem!',
                            content: response.msg,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                tryAgain: {
                                    text: 'Try again',
                                    btnClass: 'btn-red',
                                    action: function(){
                                    }
                                },
                                close: function () {
                                }
                            }
                        });
                    }
                }
            })
        });
    </script>


@endsection