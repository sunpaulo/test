<label for="price">Set rate</label>
<div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
    <input type="text" id="price" class="form-control" name="value" placeholder="{{ $myRate->value }}"
           value="{{ $offer->price or "" }}" required>
    @if ($errors->has('value'))
        <span class="help-block">
            <strong>{{ $errors->first('value') }}</strong>
        </span>
    @endif
</div>

<hr>
<input type="hidden" name="auction_id" value="{{ $auction->getId() }}" required>
<input type="submit" value="Save" class="btn btn-primary">