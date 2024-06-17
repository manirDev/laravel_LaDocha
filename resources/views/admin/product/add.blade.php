@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content ml-4 mr-4">
            <div class="row">
                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Product</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="addForm" method="post" action="{{route('admin.product.create')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Title <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title" id="title" class="form-control" >
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Keywords <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="keywords" id="keywords" class="form-control" >
                                                    @error('keywords')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
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
                                                    {{-- Image preview section --}}
                                                    <div class="mt-3">
                                                        <img id="imagePreview" src="#" alt="Selected Image" style="display: none; width: 100px; height: 70px; border-radius:5px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" id="category_id" required class="form-control">
                                                        @foreach($categories as $item)
                                                            <option value={{$item->id}}>{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" name="price" id="price" class="form-control" >
                                                @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Tax</h5>
                                                <div class="controls">
                                                    <input type="number" name="tax" id="tax" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Quantity</h5>
                                            <div class="controls">
                                                <input type="number" name="quantity" id="quantity" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Min-Quantity</h5>
                                                <div class="controls">
                                                    <input type="number" name="minquantity" id="minquantity" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Description</h5>
                                                <div class="controls">
                                                    <textarea name="description" id="description" class="form-control" placeholder="Product description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Detail</h5>
                                                <div class="controls">
                                                    <textarea name="detail" id="detail" class="form-control" placeholder="Product Details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Status</h5>
                                        <div class="controls">
                                            <select name="status" id="status" required class="form-control">
                                                <option selected>False</option>
                                                <option>True</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <a href="{{route('admin.product')}}">
                                        <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" data-dismiss="modal">
                                            <i class="ti-trash"></i> Cancel
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Add
                                    </button>
                                </div>
                            </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Function to handle image preview
            function handleImagePreview(inputId, outputId) {
                document.getElementById(inputId).addEventListener('change', function(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById(outputId);
                        output.src = reader.result;
                        output.style.display = 'block';
                        console.log("Image preview updated"); // Debugging line
                    };
                    reader.onerror = function() {
                        console.error("An error occurred while reading the file");
                    };
                    if (event.target.files[0]) {
                        reader.readAsDataURL(event.target.files[0]);
                        console.log("File selected: " + event.target.files[0].name); // Debugging line
                    } else {
                        console.log("No file selected"); // Debugging line
                    }
                });
            }

            // Apply the image preview functionality to the image element
            handleImagePreview('customFile', 'imagePreview');
        });
    </script>
@endsection
