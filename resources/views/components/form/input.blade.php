@props([
    'type',
    'name',
    'value',
    'label'
])

@if ($label ?? '')
    <label for="">{{ $label }}</label>
@endif

<input 
    type={{ $type }} name={{ $name }} 
    class="form-control @error($name) is-invalid @enderror" 
    value="{{ old($name, $value ?? "") }}" 
    style="width: 450px"
    {{ $attributes}}
>
@error ($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
@enderror