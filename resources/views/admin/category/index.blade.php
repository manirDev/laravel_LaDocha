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
                                                <a href="" class="btn btn-info">Edit</a>
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

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('admin.category.create')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Parent Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="parent_id" id="select" required class="form-control">
                                                <option value="">Select Your City</option>
                                                <option value="1">India</option>
                                                <option value="2">USA</option>
                                                <option value="3">UK</option>
                                                <option value="4">Canada</option>
                                                <option value="5">Dubai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control" >
                                            @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Keywords <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="keywords" class="form-control" >
                                            @error('keywords')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Description</h5>
                                        <div class="controls">
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="Category description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Status</h5>
                                        <div class="controls">
                                            <select name="status" id="select" required class="form-control">
                                                <option value="">Select Your City</option>
                                                <option value="1">False</option>
                                                <option value="2">True</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Add</button>
                                    </div>
                                </form>
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
