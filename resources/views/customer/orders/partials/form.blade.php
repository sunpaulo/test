<h4>Product name</h4>
<p>{{ $auction->product->getName() }}</p>

<h4>Select a seller</h4>
<div class="{{ $errors->has('seller') ? ' has-error' : '' }}">
    @foreach($auction->rates as $rate)
        <p>
            <input type="radio" name="seller" id="choice{{$rate->id}}" value="{{ $rate->seller_id }}">
            <label for="choice{{$rate->id}}">
                {{ $rate->seller->getName(). ' : ' . $rate->getValue() . '$' }}
            </label>
        </p>
    @endforeach

    @if ($errors->has('seller'))
        <span class="help-block">
            <strong>{{ $errors->first('seller') }}</strong>
        </span>
    @endif
</div>

<hr>

<input type="hidden" name="auction" value="{{ $auction->getId() }}">
<input type="submit" value="Save" class="btn btn-primary">