
@extends('admin.layout.app')

@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customer Contacts</h1>
            </div>
            {{-- <div class="col-sm-6 text-right">
                <a href="create-category.html" class="btn btn-primary">New Category</a>
            </div> --}}
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('admin.message')

        <div class="card">

            <form action="" method="get">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='{{route("contact.index")}}'">Reset</button>
                    </div>
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search">
            
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div>
                              </div>
                        </div>
                    </div>
                </form>

            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Subjects</th>
                            <th width="500">Messages</th>
                            <th width="50">Call</th>
                            <th width="50">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if ($contacts->isNotEmpty())
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->mobile }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td class="text-warning">{{ $contact->message }}</td>
                            <td>
                                <a href="tel:+9730214356" class="text-primary w-4 h-4 mr-1">
                                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path	ath fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" clip-rule="evenodd"></path>
                                      </svg>
                                </a>
                            </td>
                            <td>
                                <a href="#" onclick="deleteCategory({{$contact->id}})" class="text-danger w-4 h-4 mr-1">
                                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                      </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                       
                        @else

                        <tr class="text-center">
                            <td colspan="7">Record Not Found..!</td>
                        </tr>
                            
                        @endif
                        
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                    {{ $contacts->links() }}
                </ul>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection



@section('customJs')

<script>
    function deleteCategory(id)
    {
        var url = '{{ route("contact.delete","ID") }}';
        var newUrl = url.replace("ID",id);
        
            if(confirm('Are you sure you want to delete this message'))
            {
                $.ajax({
                url: newUrl,
                type: 'delete',
                data: {},
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                success: function(response)
                {
                    if(response["status"])
                    {
                        window.location.href="{{route('contact.index')}}";
                    }
                }
            });
            }
        }
</script>

@endsection
