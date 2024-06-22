@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Faq List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Position</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faqs as $item)
                                        <tr>
                                            <td>{{$item->question}}</td>
                                            <td>{!! $item->answer !!}</td>
                                            <td>{{$item->position}}</td>
                                            <td>
                                                <a href="#" class="edit-btn" data-id="{{ $item->id }}">
                                                    <i class="ti-pencil-alt" style="color: #17a2b8; font-size: 24px;"></i>
                                                </a>
                                                <a href="" class="delete-btn" data-id="{{ $item->id }}">
                                                    <i class="ti-trash" style="color: #EF3737; font-size: 24px;"></i>
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
                    @include('admin.faq.add')
                </div>
                <!-- /.col -->

            </div>

            <!-- Modal -->
            <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                @include('admin.faq.edit')
            </div>
            <!-- /.modal -->
            <!-- /.row -->

        </section>
        <!-- /.content -->

    </div>
@endsection
@section('js')
    <script>
        $('.faq-add').wysihtml5({
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
                    url: '/admin/faq/edit/' + id,
                    method: 'GET',
                    success: function(data) {
                        // Update the form action and populate form fields
                        $('#editForm').attr('action', '/admin/faq/update/' + id);
                        $('#question').val(data.question);
                        $('#position').val(data.position);
                        $('#status').val(data.status);

                        // Directly set the value in the textarea and trigger change event
                        $('#answer').val(data.answer).trigger('change');

                        // Initialize wysihtml5 editor if not already initialized
                        if (!$('#answer').data("wysihtml5")) {
                            $('.faq-edit').wysihtml5({
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
                                url: '/admin/faq/delete/' + id,
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if(response.success) {
                                        Swal.fire(
                                            'Deleted!',
                                             'Faq has been deleted.',
                                            'success'
                                        );
                                        // Remove the deleted row from the table
                                        $('#example1').DataTable().row(row).remove().draw();
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'There was an error deleting the faq.',
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
