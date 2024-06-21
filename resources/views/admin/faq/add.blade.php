<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add Faq</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <form method="post" action="{{route('admin.faq.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h5>Question <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="question" class="form-control" >
                        @error('question')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <h5>Answers <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea class="textarea" name="answer"></textarea>
                        @error('answer')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <h5>Position <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="number" name="position" class="form-control" >
                        @error('position')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-rounded btn-info">Add</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
