
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" style="background-color: #262e48">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Category Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                    <div class="box">

                        <form id="editForm" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" >
                            <input type="hidden" name="oldImg" id="oldImg">
                            <div class="box-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img id="categoryImage" src="#" alt="Category Image" style=" display: none; width: 60px; height: 60px; border-radius:5px;">
                                    <h4 class="box-title ml-3" id="categoryName"></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Title</h5>
                                        <div class="controls">
                                            <input type="text" name="title" id="title" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Keywords</h5>
                                            <div class="controls">
                                                <input type="text" name="keywords" id="keywords" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Image</h5>
                                            <div class="controls">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="customFile1">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                {{-- Image preview section --}}
                                                <div class="mt-3">
                                                    <img id="imagePreview1" src="#" alt="Selected Image" style="display: none; width: 100px; height: 70px; border-radius:5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Parent Category</h5>
                                            <div class="controls">
                                                <select name="parent_id" id="parent_id" required class="form-control">
                                                    @foreach($categories as $item)
                                                        <option value={{$item->id}} >
                                                            @if(!is_null($item) && !is_null($item->title))
                                                                {{\App\Http\Controllers\admin\CategoryController::getParentTree($item, $item->title)}}
                                                            @else
                                                                No Parent
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('keywords')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-15">
                                <div class="form-group">
                                    <h5>Description</h5>
                                    <div class="controls">
                                        <textarea name="description" id="description" class="form-control" placeholder="Category description"></textarea>
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
