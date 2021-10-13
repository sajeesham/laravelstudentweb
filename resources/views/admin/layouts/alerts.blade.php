<div class="page animsition" style="min-height: auto;">
@if (count($errors) > 0)
    <div class="page-content">
        <div class="alert alert-danger" style="margin-bottom: 0;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('flash_error'))
    <div class="page-content">
        <div class="alert alert-danger" style="margin-bottom: 0;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('flash_error') }}
        </div>
    </div>
@endif

@if(Session::has('flash_failure'))
    <div class="page-content">
        <div class="alert alert-danger" style="margin-bottom: 0;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('flash_failure') }}
        </div>
    </div>
@endif


@if(Session::has('flash_success'))
    <div class="page-content">
        <div class="alert alert-success" style="margin-bottom: 0;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('flash_success') }}
        </div>
    </div>
@endif
</div>
