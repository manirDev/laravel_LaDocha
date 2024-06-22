@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h3 class="box-title">Product List</h3>
                            <a href="{{route('admin.product.add')}}">
                                <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                    <i class="ti-save-alt"></i> Add Product
                                </button>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th class="col-gallery">Gallery</th>
                                        <th class="col-actions">Actions</th>
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
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a href="{{route('admin.image.add', ['product_id'=>$item->id])}}" >
                                                    <i class="ti-gallery" style="color: #17a2b8; font-size: 24px; margin-left: 25px;"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="edit-btn" data-id="{{ $item->id }}">
                                                    <i class="ti-pencil-alt" style="color: #17a2b8; font-size: 24px; margin: 5px"></i>
                                                </a>
                                                <a href="" class="delete-btn" data-id="{{ $item->id }}">
                                                    <i class="ti-trash" style="color: #EF3737; font-size: 24px; margin: 5px"></i>
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

            </div>
            <!-- Modal -->
            <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                @include('admin.product.edit')
            </div>
            <!-- /.modal -->
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

            // Use event delegation for the edit button click event
            $('#example1 tbody').on('click', '.edit-btn', function() {
                var id = $(this).data('id');

                // Fetch the record data via AJAX
                $.ajax({
                    url: '/admin/product/edit/' + id,
                    method: 'GET',
                    success: function(data) {
                        // Update the form action and populate form fields
                        $('#editForm').attr('action', '/admin/product/update/' + id);
                        $('#title').val(data.title);
                        $('#category_id').val(data.category_id);
                        $('#keywords').val(data.keywords);
                        $('#description').val(data.description);

                        $('#price').val(data.price);
                        $('#quantity').val(data.quantity);
                        $('#minquantity').val(data.minquantity);
                        $('#tax').val(data.tax);
                        $('#status').val(data.status);
                        $('#id').val(data.id);
                        $('#oldImg').val(data.image);

                        // Directly set the value in the textarea and trigger change event
                        $('#detail').val(data.detail).trigger('change');

                        // Initialize wysihtml5 editor if not already initialized
                        if (!$('#detail').data("wysihtml5")) {
                            $('.product-edit').wysihtml5({
                                "font-styles":  true, //Font styling, e.g. h1, h2, etc
                                "color":        true, //Button to change color of font
                                "emphasis":     true, //Italics, bold, etc
                                "textAlign":    true, //Text align (left, right, center, justify)
                                "lists":        true, //(Un)ordered lists, e.g. Bullets, Numbers
                                "blockquote":   true, //Button to insert quote
                                "link":         true, //Button to insert a link
                                "table":        false, //Button to insert a table
                                "image":        false, //Button to insert an image
                                "video":        false, //Button to insert YouTube video
                                "html":         false //Button which allows you to edit the generated HTML
                            });
                        }

                        // Show the category image if available
                        if (data.image) {
                            $('#productImage').attr('src', "{{ asset('') }}" + data.image).css('display', 'inline-block');
                        } else {
                            $('#productImage').hide();
                        }

                        // Set the modal title and category name
                        $('#productTitle').text(data.title);
                        $('#productName').text(data.title);

                        // Show the modal
                        $('#editModal').modal('show');
                    },

                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
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
                                url: '/admin/product/delete/' + id,
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if(response.success) {
                                        Swal.fire(
                                            'Deleted!',
                                            'Product has been deleted.',
                                            'success'
                                        );
                                        // Remove the deleted row from the table
                                        $('#example1').DataTable().row(row).remove().draw();
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was an error deleting the product.',
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
