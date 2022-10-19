@props([
    'type',
    'name',
    'value',
    'label'
])

@if ($label)
    <label for="">{{ $label }}</label>
@endif

<textarea
    class="form-control @error($name) is-invalid @enderror" 
    style="width: 450px"
    {{ $attributes}}
>{{ old($name, $value) }}</textarea>
@error ($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
@enderror