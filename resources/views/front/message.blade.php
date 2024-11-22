
{{-- //---------ERROR----MSG--------// --}}

@if (Session::has('error'))
{{-- <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Error!</h4>{{ Session::get('error') }}
</div> --}}
<div class="alert alert-success" role="alert">
    <h4><i class="icon fa fa-info"></i> Success!</h4>{{ Session::get('success') }}
</div>
@endif


{{-- //---------SUCCESS----MSG--------// --}}
@if (Session::has('success'))
    {{-- <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>{{ Session::get('success') }}
    </div> --}}
    <div class="alert alert-success" role="alert">
        <h4><i class="icon fa fa-check"></i> Success!</h4>{{ Session::get('success') }}
    </div>
@endif
