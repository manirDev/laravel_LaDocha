@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Product Gallery</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)
                                        <tr>
                                            <td>
                                                @if($item->image)
                                                    <img src="{{asset($item->image)}}" alt="" style="width: 60px; height: 60px; border-radius:5px;">
                                                @endif
                                            </td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                <a href="" class="btn btn-danger delete-btn" data-id="{{ $item->id }}">Delete</a>
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

            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->

    </div>
@endsection
@section('js')

@endsection

