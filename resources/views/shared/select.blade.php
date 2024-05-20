@php
    $label ??= Str::ucfirst($name);
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp
<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="form-control" name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach ($options as $key => $option)
            <option @selected($value->contains($key)) value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
