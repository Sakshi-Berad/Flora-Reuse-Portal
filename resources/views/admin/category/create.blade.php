@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('categories.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

            <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Name" onkeyup="Slug()">
                                        @error('name')
                                            <span  class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" readonly name="slug" id="slug" value="" class="form-control @error('slug') is-invalid @enderror"
                                        placeholder="Slug">
                                    @error('slug')
                                        <span  class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        <p></p>
                                </div>
                            </div>
                        {{-- <div class="col-md-6">
                            <div class="md-3">
                                <input type="hidden" name="image_id" id="image_id" value="">
                                <label for="image">Image</label>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">    
                                        <br>Drop files here or click to upload.<br><br>                                            
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="category_image">Image</label>
                                <input type="file"  name="category_image" id="category_image" class="form-control @error('category_image') is-invalid @enderror">
                                @error('category_image')
                                    <span  class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="showHome">Show On Home</label>
                                <select name="showHome" class="form-control" id="showHome">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{route('categories.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection


@section('customJs')
    <script>

//  slug geneation

    function Slug() {
        var name = $('#name').val();
        var slug = name.toLowerCase();
        var slug = slug.replace(/ /g, "-");
        $("#slug").val(slug);
    }

    </script>

@endsection
