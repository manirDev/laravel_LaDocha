@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product Image Gallery</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th class="col-actions">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($images as $item)
                                        <tr>
                                            <td>
                                                @if($item->image)
                                                    <img src="{{asset($item->image)}}" alt="" style="width: 60px; height: 60px; border-radius:5px;">
                                                @endif
                                            </td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                <a href="" class="delete-btn" data-id="{{ $item->id }}">
                                                    <i class="ti-trash" style="color: #EF3737; font-size: 24px; margin-left: 25px;"></i>
                                                </a>
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
                            <h3 class="box-title">Add Image</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{route('admin.image.store', ['product_id'=>$product->id])}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control" >
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
                                            {{-- Image preview section --}}
                                            <div class="mt-3">
                                                <img id="imagePreview" src="#" alt="Selected Image" style="display: none; width: 100px; height: 70px; border-radius:5px;">
                                            </div>
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
            handleImagePreview('customFile1', 'imagePreview1');
        });

        /*----------------Edit Script--------------*/
        $(document).ready(function() {
            // Initialize DataTables
            var table = $('#example1').DataTable();

            // Check if DataTable is already initialized
            if ( $.fn.DataTable.isDataTable('#example1') ) {
                table.destroy(); // Destroy the existing DataTable instance
            }

            // Reinitialize DataTables with 5 rows per page
            $('#example1').DataTable({
                "pageLength": 5
            });

            // Delete button handler
            $('#example1 tbody').on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var row = $(this).closest('tr');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/image/delete/' + id,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if(response.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Image has been deleted.',
                                        'success'
                                    );
                                    // Remove the deleted row from the table
                                    $('#example1').DataTable().row(row).remove().draw();
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'There was an error deleting the image.',
                                        'error'
                                    );
                                }
                            }
                        });
                    }
                    //end of delete handler

                });
            });
        });
    </script>
@endsection
