@extends('admin.layout.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('products.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title" onkeyup="Slug()">
                                            @error('title')
                                                <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- <p class="error"></p> --}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                                                placeholder="Slug" readonly>
                                            @error('slug')
                                                <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- <p class="error"></p> --}}

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Short Description</label>
                                            <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote"
                                                ></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Shipping And Returns</label>
                                            <textarea name="shipping_returns" id="description" cols="30" rows="10" class="summernote"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="product-gallery">
                            
                            </div>

                        </div> --}}

                        <div class="card mb-3">
                            <div class="card-body">
                                <label for="product_images">Product Images</label>
                                <input type="file" name="product_images[]" class="form-control" multiple>
                            </div>

                            <div class="row" id="product-gallery">
                            
                            </div>

                        </div>


                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Price">
                                            @error('price')
                                                <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <p class="error"></p>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price"
                                                class="form-control" placeholder="Compare Price">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product' s original price into Compare at
                                                price. Enter a lower value into Price.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror"
                                                placeholder="sku">
                                            @error('sku')
                                                <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <p class="error"></p>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control"
                                                placeholder="Barcode">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                {{-- ////// --}}
                                                <input type="hidden" name="track_qty"value="No">
                                                {{-- /////// --}}
                                                <input class="custom-control-input @error('track_qty') is-invalid @enderror" type="checkbox" id="track_qty"
                                                    name="track_qty" value="Yes" checked>
                                                <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                            @error('track_qty')
                                                <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                                <p class="error"></p>

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty"
                                                class="form-control @error('qty') is-invalid @enderror" placeholder="Qty">
                                            @error('qty')
                                                <span  class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <p class="error"></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Related products</h2>
                                <div class="mb-3">
                                      <select multiple name="related_products[]" id="related_products" class="related-product w-100">
                                        
                                      </select>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="h4  mb-3">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Select Category</option>

                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('category')
                                        <span  class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <p class="error"></p>

                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product brand</h2>
                                <div class="mb-3">
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select Brand</option>

                                        @if ($brands->isNotEmpty())
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control @error('is_featured') is-invalid @enderror">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    @error('is_featured')
                                        <span  class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <p class="error"></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary" id="create">Create</button>
                    <button type="button" id="loadButton" class="btn-dark btn d-none"><i class="fa fa-spinner fa-spin"></i> Loading</button>

                    <a href="{{route('products.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection




{{-- js  --}}

@section('customJs')
    <script>

        $('#create').click(function() {
                    $("#create").addClass('d-none');
                    $("#loadButton").removeClass('d-none');
                });

        // related product 


            $('.related-product').select2({
                        ajax: {
                            url: '{{ route("products.getProducts") }}',
                            dataType: 'json',
                            tags: true,
                            multiple: true,
                            minimumInputLength: 3,
                            processResults: function (data) {
                                return {
                                    results: data.tags
                                };
                            }
                        }
                    });
        //  slug geneation

        function Slug() {
            var name = $('#title').val();
            var slug = name.toLowerCase();
            var slug = slug.replace(/ /g, "-");
            $("#slug").val(slug);
        }


        $("#category").change(function() {
            var category_id = $(this).val();
            $.ajax({
                url: '{{ route('product-subcategories.index') }}',
                type: 'get',
                data: {
                    category_id: category_id
                },
                dataType: 'json',
                success: function(response) {
                    $("#sub_category").find("option").not(":first").remove();
                    $.each(response["subCategory"], function(key, item) {
                        $("#sub_category").append(
                            `<option value='${item.id}'>${item.name}</option>`);
                    });
                },
                error: function() {
                    consol.log("Something went wrong");
                }
            });
        });

    </script>
@endsection
