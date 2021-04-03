<div {{ $attributes->class(['form-group']) }}>
    <label for="{{ $id }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    <select
        id="{{ $id }}"
        class="form-control {{ $input_class }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $option=>$value)
            <option {{ $is_selected($option) }} value="{{ $option }}">{{ $value }}</option>
        @endforeach
    </select>
    <div>
        {{ $slot }}
    </div>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
