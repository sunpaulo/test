<form action="{{ route('customer.auction.update', $auction) }}"
      onsubmit="if(confirm('Do you want to close an auction at a price of ' + {{
                              $auction->rates()->orderBy('value')->take(1)->value('value') }} + '$ ?')
              ) { return true } else {return false }" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <button type="submit" class="btn btn-danger">Finish</button>
</form>