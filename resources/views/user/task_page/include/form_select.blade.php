@foreach ($options as $index => $option)
    {
    <option value="{{ $index + 1 }}">{{ $option }}</option>
    }
@endforeach
