@extends('admin.admin_master')
@section('admin')
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Setting</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Dashboard Page</li>
                                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">

                    <div class="col-12">
                        <div class="box">
                            <div class="box-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills rounded nav-justified">
                                    <li class="nav-item"> <a href="#general" class="nav-link active" data-toggle="tab" aria-expanded="false">General</a> </li>
                                    <li class="nav-item"> <a href="#smtp-email" class="nav-link" data-toggle="tab" aria-expanded="false">Smtp Email</a> </li>
                                    <li class="nav-item"> <a href="#social-media" class="nav-link" data-toggle="tab" aria-expanded="true">Social Media</a> </li>
                                    <li class="nav-item"> <a href="#about-us" class="nav-link" data-toggle="tab" aria-expanded="true">About Us</a> </li>
                                    <li class="nav-item"> <a href="#contact" class="nav-link" data-toggle="tab" aria-expanded="true">Contact</a> </li>
                                    <li class="nav-item"> <a href="#references" class="nav-link" data-toggle="tab" aria-expanded="true">References</a> </li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <div class="box">
                            <div class="box-body">
                                <!-- Tab panes -->
                                <form action="{{route('admin.setting.update')}}" role="form" id="quickForm" method="Post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content">
                                        <div id="general" class="tab-pane active">
                                            <!-- Categroy 1 -->
                                            <div class=" tab-pane animation-fade active" id="category-1" role="tabpanel">
                                                <div class="panel-group panel-group-simple panel-group-continuous" id="accordion2"
                                                     aria-multiselectable="true" role="tablist">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">ID</label>
                                                        <input type="text" name="id" value="{{$data->id}}" class="form-control" >
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Title</h5>
                                                            <div class="controls">
                                                                <input type="text" name="title" value="{{$data->title}}" id="title" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Keywords</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="keywords" value="{{$data->keywords}}" id="keywords" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Description</h5>
                                                            <div class="controls">
                                                                <input type="text" name="description" value="{{$data->description}}" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Email</h5>
                                                                <div class="controls">
                                                                    <input type="email" name="email" value="{{$data->email}}" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-15">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Company</h5>
                                                            <div class="controls">
                                                                <input type="text" name="company" value="{{$data->company}}" id="company" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Address</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address" value="{{$data->address}}" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Phone</h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone" value="{{$data->phone}}" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Fax</h5>
                                                                <div class="controls">
                                                                    <input type="number" name="fax" value="{{$data->fax}}" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Status</h5>
                                                        <div class="controls">
                                                            <select name="status" class="form-control">
                                                                <option selected="selected">{{$data->status}}</option>
                                                                <option>False</option>
                                                                <option>True</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Categroy 1 -->
                                        </div>
                                        <div id="smtp-email" class="tab-pane">
                                            <!-- Categroy 2 -->
                                            <div class="tab-pane animation-fade" id="category-2" role="tabpanel">
                                                <div class="panel-group panel-group-simple panel-group-continuous" id="accordion"
                                                     aria-multiselectable="true" role="tablist">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Smtp Server</h5>
                                                            <div class="controls">
                                                                <input type="text" name="smtpserver" value="{{$data->smtpserver}}"  class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Smtp Email</h5>
                                                                <div class="controls">
                                                                    <input type="email" name="smtpemail" value="{{$data->smtpemail}}" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-15">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Smtp Password</h5>
                                                            <div class="controls">
                                                                <input type="password" name="smtppassword" value="{{$data->smtppassword}}" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Smtp Port</h5>
                                                                <div class="controls">
                                                                    <input type="number" name="smtpport" value="{{$data->smtpport}}" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End Categroy 2 -->
                                        </div>
                                        <div id="social-media" class="tab-pane">
                                            <!-- Categroy 3 -->
                                            <div class="tab-pane animation-fade" id="category-3" role="tabpanel">
                                                <div class="panel-group panel-group-simple panel-group-continuous" id="accordion1"
                                                     aria-multiselectable="true" role="tablist">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Facebook</h5>
                                                            <div class="controls">
                                                                <input type="text" name="facebook" value="{{$data->facebook}}" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Instagram</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="instagram" value="{{$data->instagram}}" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-15">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5>Twitter</h5>
                                                            <div class="controls">
                                                                <input type="text" name="twitter" value="{{$data->twitter}}" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <h5>Youtube</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="youtube" value="{{$data->youtube}}" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Categroy 3 -->
                                        </div>
                                        <div id="about-us" class="tab-pane">
                                            <!-- Categroy 4 -->
                                            <div class="tab-pane animation-fade" id="category-4" role="tabpanel">
                                                <div class="panel-group panel-group-simple panel-group-continuous" id="accordion3"
                                                     aria-multiselectable="true" role="tablist">

                                                    <div class="form-group">
                                                        <h5>About Us</h5>
                                                        <div class="controls">
                                                           <textarea id="editor1"  name="aboutus" rows="10" cols="60">
                                                               {{$data->aboutus}}
						                                    </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Categroy 4 -->
                                        </div>
                                        <div id="contact" class="tab-pane">
                                            <!-- Categroy 4 -->
                                            <div class="tab-pane animation-fade" id="category-4" role="tabpanel">
                                                <div class="panel-group panel-group-simple panel-group-continuous" id="accordion3"
                                                     aria-multiselectable="true" role="tablist">
                                                    <div class="form-group">
                                                        <h5>Contact</h5>
                                                        <div class="controls">
                                                           <textarea  class="textarea" name="contact" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                               {{$data->contact}}
						                                    </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Categroy 4 -->
                                        </div>
                                        <div id="references" class="tab-pane">
                                            <!-- Categroy 4 -->
                                            <div class="tab-pane animation-fade" id="category-4" role="tabpanel">
                                                <div class="panel-group panel-group-simple panel-group-continuous" id="accordion3"
                                                     aria-multiselectable="true" role="tablist">
                                                    <div class="form-group">
                                                        <h5>References</h5>
                                                        <div class="controls">
                                                           <textarea class="textarea"  name="references" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                               {{$data->references}}
						                                    </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Categroy 4 -->
                                        </div>
                                    </div>

                                    <div class="box-footer">
                                        <a href="{{route('admin.product')}}">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" data-dismiss="modal">
                                                <i class="ti-trash"></i> Cancel
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                            <i class="ti-save-alt"></i> Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
@endsection

@section('js')

@endsection
