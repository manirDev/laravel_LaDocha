
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" style="background-color: #262e48">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Faq Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                    <div class="box">

                        <form id="editForm" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" >
                            <div class="box-body">

                                <div class="form-group">
                                    <h5>Question</h5>
                                    <div class="controls">
                                        <input type="text" name="question" id="question" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Answers</h5>
                                    <div class="controls">
                                        <textarea name="answer" id="answer"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Position </h5>
                                    <div class="controls">
                                        <input type="number" name="position" id="position" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Status</h5>
                                    <div class="controls">
                                        <select name="status" id="select" required class="form-control">
                                            <option selected>False</option>
                                            <option>True</option>
                                        </select>
                                    </div>
                                </div>
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
