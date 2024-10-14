@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black-700']) }}>
    {{ $value ?? $slot }}
</label>
