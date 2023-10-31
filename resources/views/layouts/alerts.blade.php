@if (session('removed'))
<div class="alert alert-danger" role="alert">
    {{ session('removed') }}
</div>
@elseif (session('cart_emptied'))
<div class="alert alert-danger" role="alert">
    {{ session('cart_emptied') }}
</div>
@elseif (session('already_removed'))
<div class="alert alert-danger" role="alert">
    {{ session('already_removed') }}
</div>
@elseif (session('added'))
<div class="alert alert-success d-flex justify-content-between" role="alert">
    {{ session('added') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@elseif (session('already_added'))
<div class="alert alert-danger d-flex justify-content-between" role="alert">
    {{ session('already_added') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@elseif (session('purchase_successful'))
<div class="alert alert-success d-flex justify-content-between" role="alert">
    {{ session('purchase_successful') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@elseif (session('purchase_failed'))
<div class="alert alert-danger d-flex justify-content-between" role="alert">
    {{ session('purchase_failed') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@elseif (session('add_some_toys'))
<div class="alert alert-danger d-flex justify-content-between" role="alert">
    {{ session('add_some_toys') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@elseif (session('created'))
<div class="alert alert-success" role="alert">
    {{ session('created') }}
</div>
@elseif (session('deleted'))
<div class="alert alert-danger" role="alert">
    {{ session('deleted') }}
</div>
@elseif (session('edited'))
<div class="alert alert-warning" role="alert">
    {{ session('edited') }}
</div>
@elseif (session('stock_changed'))
<div class="alert alert-danger" role="alert">
    {{ session('stock_changed') }}
</div>
@endif