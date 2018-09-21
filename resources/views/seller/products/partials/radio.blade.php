<a class="btn {{ Request::get('type') ? ' btn-default' : ' btn-success' }}"
   href="{{route('seller.product.index')}}">
    All
</a>
<a class="btn {{ Request::get('type') == 'offered' ? ' btn-success' : ' btn-default' }}"
   href="{{route('seller.product.index')}}?type=offered">
    Offered
</a>