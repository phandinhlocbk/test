<div class="col-sm-10">
    @if ($name == 'task_description')
    <textarea id="elm1" class="form-control" name="task_description"> {{ $value }}
        </textarea>
    @else
    <input name="{{ $name }}" class="form-control" type="text" id="example-text-input" value="@if (old($name)) {{ old($name) }} 
            @else {{ $value }} @endif">
    @endif
    @if ($errors->has([$name]))
    <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
