@extends('vendor.layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Sub Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('seller-sub-categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" name="subCategoryForm" id="subCategoryForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value=""> Select Category</option>
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $item)
                                                <option {{$subcategory->category_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{$subcategory->name}}" onkeyup="Slug()" class="form-control" placeholder="Name">
                                    <p></p>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{$subcategory->slug}}" class="form-control" placeholder="Slug">
                                    <p></p>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{$subcategory->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$subcategory->status == 0 ? 'selected' : ''}} value="0">Block</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="showHome">Show On Home</label>
                                    <select name="showHome" class="form-control" id="showHome">
                                        <option {{$subcategory->showHome == 'Yes' ? 'selected' : ''}} value="Yes">Yes</option>
                                        <option {{$subcategory->showHome == 'No' ? 'selected' : ''}} value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('seller-sub-categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>

@endsection



@section('customJs')
    <script>
        $("#subCategoryForm").submit(function(event) {
            event.preventDefault();
            var element = $("#subCategoryForm");
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('seller-sub-categories.update',$subcategory->id) }}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);


                    if (response["status"] == true) {
                        window.location.href = "{{ route('seller-sub-categories.index') }}";

                        $('#name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $('#slug').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $('#category').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                    } else {

                        if(response['notFound'] == true) {
                        window.location.href = "{{ route('seller-sub-categories.index') }}";
                        return false;
                        }
                        var errors = response['errors'];
                        if (errors['name']) {
                            $('#name').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['name']);
                        } else {
                            $('#name').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }



                        if (errors['slug']) {
                            $('#slug').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['slug']);
                        } else {
                            $('#slug').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                        if (errors['category']) {
                            $('#category').addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['category']);
                        } else {
                            $('#category').removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }
                    }



                },
                error: function(jqXHR, exception) {
                    console.log("Something went wrong");
                }
            })
        });

//  slug geneation

        function Slug() {
            var name = $('#name').val();
            var slug = name.toLowerCase();
            var slug = slug.replace(/ /g, "-");
            $("#slug").val(slug);
        }
    </script>
@endsection
