@extends('vendor.layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('seller-categories.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

            <form action="{{route('seller-categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text"  name="name" value="{{$category->name}}" id="name" class="form-control @error('name') is-invalid @enderror"
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
                                    <input type="text" readonly name="slug" value="{{$category->name}}" id="slug" value="" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Slug">
                                    @error('name')
                                        <span  class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        <p></p>
                                </div>
                            </div>
                       
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
                                @if(!empty($category->image))
                                <div class="mt-2">
                                    <img width="250px" src="{{ asset('uploads/category/'.$category->image)}}" alt="">
                                </div>
                                @endif
                            </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option {{$category->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$category->status == 0 ? 'selected' : ''}} value="0">Block</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">Show On Home</label>
                                <select name="showHome" class="form-control" id="showHome">
                                    <option {{$category->showHome == 'Yes' ? 'selected' : ''}} value="Yes">Yes</option>
                                    <option {{$category->showHome == 'No' ? 'selected' : ''}} value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('seller-categories.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection


@section('customJs')
    <script>
        // $("#categoryForm").submit(function(event)
        // {
        //     event.preventDefault();
        //     var element = $(this);
        //     $("button[type=submit]").prop('disabled', true);
        //     $.ajax({
        //         url: '{{route("categories.update",$category->id)}}',// start
        //         type: 'put',
        //         data: element.serializeArray(),
        //         dataType: 'json',
        //         success: function(response)
        //         {
        //             $("button[type=submit]").prop('disabled', false);


        //             if(response["status"] == true)
        //             {
        //                 window.location.href="{{route('categories.index')}}";

        //                 $('#name').removeClass('is-invalid')
        //                 .siblings('p')
        //                 .removeClass('invalid-feedback').html("");

        //                 $('#slug').removeClass('is-invalid')
        //                 .siblings('p')
        //                 .removeClass('invalid-feedback').html("");

        //             }
        //             else
        //             {

        //                 if(response['notFound'] == true)
        //                 {
        //                     window.location.href="{{route('categories.index')}}";
        //                 }


        //                 var errors = response['errors'];
        //             if(errors['name'])
        //             {
        //                 $('#name').addClass('is-invalid')
        //                 .siblings('p')
        //                 .addClass('invalid-feedback').html(errors['name']);
        //             }
        //             else
        //             {
        //                 $('#name').removeClass('is-invalid')
        //                 .siblings('p')
        //                 .removeClass('invalid-feedback').html("");
        //             }



        //             if(errors['slug'])
        //             {
        //                 $('#slug').addClass('is-invalid')
        //                 .siblings('p')
        //                 .addClass('invalid-feedback').html(errors['slug']);
        //             }
        //             else
        //             {
        //                 $('#slug').removeClass('is-invalid')
        //                 .siblings('p')
        //                 .removeClass('invalid-feedback').html("");
        //             }
        //             }

                    

        //         },error: function(jqXHR, exception)
        //         {
        //             console.log("Something went wrong");
        //         }
        //     })
        // });


//  slug geneation

    function Slug() {
        var name = $('#name').val();
        var slug = name.toLowerCase();
        var slug = slug.replace(/ /g, "-");
        $("#slug").val(slug);
    }
            

// dropZone 
// Dropzone.autoDiscover = false;    
// const dropzone = $("#image").dropzone({ 
//     init: function() {
//         this.on('addedfile', function(file) {
//             if (this.files.length > 1) {
//                 this.removeFile(this.files[0]);
//             }
//         });
//     },
//     url:  "{{ route('temp-images.create') }}",
//     maxFiles: 1,
//     paramName: 'image',
//     addRemoveLinks: true,
//     acceptedFiles: "image/jpeg,image/png,image/gif",
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }, success: function(file, response){
//         $("#image_id").val(response.image_id);
//         //console.log(response) 
//     }
// });

    </script>

@endsection
