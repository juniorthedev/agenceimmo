@php
    $label ??= null;
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp


<div @class(['form-check form-switch', $class])>
    <input type="hidden" name="{{ $name }}" value="0">
    <input type="checkbox" @checked(old($name, $value ?? false)) name="{{ $name }}" value="1" class="form-check-input @error($name) is-invalid @enderror" role="switch" id="{{ $name }}">

    <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
