
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block alert-dismissible flash-message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block alert-dismissible flash-message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block alert-dismissible flash-message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>	
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block alert-dismissible flash-message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Alert!</h4>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger alert-dismissible flash-message">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        Please check the form for errors
    </div>
@endif

@push('plugin-scripts')
    <script defer>
        $(function() {
            'use strict'
            setTimeout(function() {
                $('.alert').hide();
            }, 3000);
        });
    </script>
@endpush