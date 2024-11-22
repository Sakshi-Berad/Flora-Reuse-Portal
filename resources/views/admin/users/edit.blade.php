@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

            <form action="" method="post" id="userFrom" name="userFrom">
                {{-- @csrf --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control"
                                        placeholder="Name" >
                                        <p></p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" value="{{$user->email}}" name="email" id="email" class="form-control"
                                        placeholder="Email" >
                                        <p></p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    <span class="text-info">To chnage password you have enter a value,otherwise leave blank.</span>
                                        <p></p>
                                </div>
                            </div>
                            


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" value="{{$user->phone}}" name="phone" id="phone" class="form-control"
                                        placeholder="Phone" >
                                        <p></p>
                                </div>
                            </div>
                            
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option {{ ($user->status == 1)? 'selected' : '' }} value="1">Active</option>
                                    <option {{ ($user->status == 0)? 'selected' : '' }} value="0">Block</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-control" id="role">
                                    <option {{ ($user->role == 1)? 'selected' : '' }} value="1">Customer</option>
                                    <option {{ ($user->role == 2)? 'selected' : '' }} value="2">Admin</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('users.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection


@section('customJs')
    <script>
        $("#userFrom").submit(function(event)
        {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{route("users.update",$user->id)}}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response)
                {
                    $("button[type=submit]").prop('disabled', false);


                    if(response["status"] == true)
                    {
                        window.location.href="{{route('users.index')}}";

                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#email').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#password').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#phone').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                    }
                    else
                    {
                    var errors = response['errors'];
                    if(errors['name'])
                    {
                        $('#name').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['name']);
                    }
                    else
                    {
                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }



                    if(errors['email'])
                    {
                        $('#email').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['email']);
                    }
                    else
                    {
                        $('#email').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }

                    if(errors['password'])
                    {
                        $('#password').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['password']);
                    }
                    else
                    {
                        $('#password').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }
 
                    if(errors['phone'])
                    {
                        $('#phone').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['phone']);
                    }
                    else
                    {
                        $('#phone').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }

                    }

                    

                },error: function(jqXHR, exception)
                {
                    console.log("Something went wrong");
                }
            })
        });



    </script>

@endsection
