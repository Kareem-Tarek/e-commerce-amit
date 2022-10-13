@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">{{__('admin/home.errors')}}</h4>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>

@endif

