<select
    name="{{ $name }}"
    {{ $attributes->class([
        'form-control',
        'form-select',
        'is-invalid' =>$errors->has($name)
    ]) }}
>
    @foreach ($options as $value => $text)
        <option value="{{ $value }}" @if($value == $selected) selected @endif> {{$text}} </option>
    @endforeach
</select>
