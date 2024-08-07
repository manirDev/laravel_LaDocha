<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add Category</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <form method="post" action="{{route('admin.category.create')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h5>Parent Category <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="parent_id" id="select" required class="form-control">
                            <option value="0" selected="selected">Main Category</option>
                            @foreach($categories as $item)
                                <option value={{$item->id}}>
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
                <div class="form-group">
                    <h5>Title <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="title" class="form-control" >
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <h5>Keywords <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="keywords" class="form-control" >
                        @error('keywords')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <h5>Description</h5>
                    <div class="controls">
                        <textarea name="description" id="textarea" class="form-control" placeholder="Category description"></textarea>
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
