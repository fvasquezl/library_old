@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>
            &Eacute;xito!</h4>
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>
            Advertencia!</h4>
        <p>{{ session('info') }}</p>
    </div>
@endif

