<label for="">Product name</label>
<p>{{ $auction->product->getName() }}</p>

<label for="seller">Select a seller</label>
<div class="form-group{{ $errors->has('seller_id') ? ' has-error' : '' }}">
    <select class="form-control" name="seller" id="seller">
        @foreach($auction->rates as $rate)
            <option value="{{ $rate->getSellerId() }}">
                {{ $rate->seller->getName(). ' : ' . $rate->getValue() . '$' }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('seller_id'))
        <span class="help-block">
            <strong>{{ $errors->first('seller_id') }}</strong>
        </span>
    @endif
</div>

<hr>

<input type="hidden" name="auction" value="{{ $auction->getId() }}">
<input type="submit" value="Save" class="btn btn-primary">