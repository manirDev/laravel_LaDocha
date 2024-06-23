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
                                        <th>Prent</th>
                                        <th>Tile</th>
                                        <th>Status</th>
                                        <th class="col-actions">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $item)
                                        <tr>
                                            <td>
                                                @if($item->image)
                                                <img src="{{asset($item->image)}}" alt="" style="width: 60px; height: 60px; border-radius:5px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if(!is_null($item) && !is_null($item->title))
                                                    {{\App\Http\Controllers\admin\CategoryController::getParentTree($item, $item->title)}}
                                                @else
                                                    No Parent
                                                @endif
                                            </td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                <span class="badge {{ $item->status == 'True' ? 'badge-success-light' : 'badge-danger-light' }}">
                                                    {{ $item->status }}
                                                </span>
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

                <div class="col-4">
                    @include('admin.category.add')
                </div>
                <!-- /.col -->

            </div>

            <!-- Modal -->
            <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                @include('admin.category.edit')
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

            // Use event delegation for the edit button click event
            $('#example1 tbody').on('click', '.edit-btn', function() {
                var id = $(this).data('id');

                // Fetch the record data via AJAX
                $.ajax({
                    url: '/admin/category/edit/' + id,
                    method: 'GET',
                    success: function(data) {
                        // Update the form action and populate form fields
                        $('#editForm').attr('action', '/admin/category/update/' + id);
                        $('#title').val(data.title);
                        $('#keywords').val(data.keywords);
                        $('#description').val(data.description);
                        $('#parent_id').val(data.parent_id);
                        $('#status').val(data.status);
                        $('#id').val(data.id);
                        $('#oldImg').val(data.image);

                        // Show the category image if available
                        if (data.image) {
                            $('#categoryImage').attr('src', "{{ asset('') }}" + data.image).css('display', 'inline-block');
                        } else {
                            $('#categoryImage').hide();
                        }

                        // Set the modal title and category name
                        $('#categoryTitle').text(data.title);
                        $('#categoryName').text(data.title);

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
                                url: '/admin/category/delete/' + id,
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if(response.success) {
                                        Swal.fire(
                                            'Deleted!',
                                             'Category has been deleted.',
                                            'success'
                                        );
                                        // Remove the deleted row from the table
                                        $('#example1').DataTable().row(row).remove().draw();
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was an error deleting the category.',
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
