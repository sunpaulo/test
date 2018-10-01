<form action="{{ route('customer.auction.store') }}" onsubmit="if(confirm
    ('Init auction?')) { return true }else{ return false }" method="post">
    {{ csrf_field() }}

    <input type="hidden" name="offer_id" value="{{ $offer->getId() }}">
    <button type="submit" class="btn btn-default">Init auction</button>
</form>