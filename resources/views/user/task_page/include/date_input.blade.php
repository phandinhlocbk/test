<div class="col-sm-10">
    @if (old($name))
    <input name="{{ $name }}" class="form-control" type="date" value="{{ old($name) }}" id="example-date-input">
    @else <input name="{{ $name }}" class="form-control" type="date" value="{{$value}}" id="example-date-input">
    @endif

    @if ($errors->has([$name]))
    <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
