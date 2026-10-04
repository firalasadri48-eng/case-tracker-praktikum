{{-- Komponen textarea: @include('components.textarea', ['name' => 'x', 'label' => 'X', 'value' => ..., 'rows' => 4]) --}}
<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1">
        {{ $label }}@if(!empty($required)) <span class="text-red-600">*</span>@endif
    </label>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows ?? 4 }}"
        @if(!empty($required)) required @endif
        placeholder="{{ $placeholder ?? '' }}"
        class="w-full border border-slate-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 @error($name) border-red-500 @enderror">{{ old($name, $value ?? '') }}</textarea>
    @error($name)
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
