

   {{-- //---------ERROR----MSG--------// --}}

   @if (Session::has('error'))
   <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       <h4><i class="icon fa fa-info"></i> Error!</h4>{{ Session::get('error') }}
   </div>
   @endif


   {{-- //---------SUCCESS----MSG--------// --}}
   @if (Session::has('success'))
       <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           <h4><i class="icon fa fa-check"></i> Success!</h4>{{ Session::get('success') }}

           
       </div>
   @endif