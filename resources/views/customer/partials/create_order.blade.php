<form action="{{ route('customer.order.store') }}" onsubmit="if(confirm
    ('Add?')) { return true }else{ return false }" method="post">
    {{ csrf_field() }}

    <input type="hidden" name="offer_id" value="{{ $offer->getId() }}">
    <input type="hidden" name="customer_id" value="{{ Auth::id() }}">
    <button type="submit" class="btn btn-default">Subscribe</button>
</form>