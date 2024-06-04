@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $item)
                                        <tr>
                                            <td>
                                                <img src="{{asset($item->image)}}" alt="" style="width: 70px; height: 40px">
                                            </td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-center">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-4">
                    @include('admin.category.add')
                </div>
                <!-- /.col -->

            </div>

            <!-- Modal -->
            <div class="modal center-modal fade" id="modal-center" tabindex="-1">
                @include('admin.category.edit')
            </div>
            <!-- /.modal -->
            <!-- /.row -->

        </section>
        <!-- /.content -->

    </div>
@endsection
