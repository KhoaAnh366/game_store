<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('layout.layout')
@section('title', 'product - create new')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update {{ $p->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('product/postUpdate/'.$p->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-id">Product Id</label>
                                <input type="text" class="form-control" id="txt-id" name="id" placeholder="Input product ID">
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Product Name</label>
                                <input type="text" class="form-control" id="txt-name" name="name" placeholder="Input product name">
                            </div>
                            <div class="form-group">
                                <label for="txt-brand">Brand</label>
                                <input type="text" class="form-control" id="txt-brand" name="brand" placeholder="Input product game">
                            </div>
                            <div class="form-group">
                                <label for="txt-genre">Genre</label>
                                <input type="text" class="form-control" id="txt-genre" name="genre" placeholder="Input genre">
                            </div>
                            <div class="form-group">
                                <label for="txt-price">Product Price</label>
                                <input type="text" class="form-control" id="txt-price" name="price" placeholder="Input product price">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <img class="img-fluid" src="{{ url('images/'.$p->image) }}" />
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-section')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection
