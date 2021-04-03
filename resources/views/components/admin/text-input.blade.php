<div {{ $attributes->class(['form-group']) }}>
    <label for="{{ $id }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    @if(!$textarea)
        <input type="{{ $type }}"
               name="{{ $name }}"
               value="{{ $value ?? '' }}"
               class="form-control {{ $input_class }}"
               id="{{ $id }}"
               {{ $required ? 'required' : '' }}
               placeholder="{{ $placeholder }}">
    @else
        <textarea name="{{ $name }}"
                  id="{{ $id }}"
                  cols="{{ $cols }}"
                  rows="{{ $rows }}"
                  {{ $required ? 'required' : '' }}
                  class="form-control {{ $input_class }}"
                  placeholder="{{ $placeholder }}">{{ $value ?? '' }}</textarea>
    @endif

    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
