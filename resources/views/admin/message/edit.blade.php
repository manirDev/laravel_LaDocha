
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" style="background-color: #262e48">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Message Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                    <div class="box">

                        <form id="editForm" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">

                                <table class="table table-striped table-bordered">

                                    <tr>
                                        <th>Id</th><td id="id"></td>
                                    </tr>
                                    <tr>
                                        <th>Name</th><td id="name"></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th><td id="email"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th><td id="phone"></td>
                                    </tr>
                                    <tr>
                                        <th>Subject</th><td id="subject"></td>
                                    </tr>
                                    <tr>
                                        <th>Message</th><td id="message"></td>
                                    </tr>
                                    <tr>
                                        <th>Admin Note</th>
                                        <td>
                                            <textarea name="note" class="form-control" id="note" cols="20" rows="3"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" data-dismiss="modal">
                                    <i class="ti-trash"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                    <i class="ti-save-alt"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
