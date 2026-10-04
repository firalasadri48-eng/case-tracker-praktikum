{{-- Komponen select: @include('components.select', ['name' => 'x', 'label' => 'X', 'options' => ['a' => 'A'], 'value' => ...]) --}}
<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1">
        {{ $label }}@if(!empty($required)) <span class="text-red-600">*</span>@endif
    </label>
    <select name="{{ $name }}" id="{{ $name }}"
        @if(!empty($required)) required @endif
        class="w-full border border-slate-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 @error($name) border-red-500 @enderror">
        @if(empty($required))<option value="">— Pilih —</option>@endif
        @foreach($options as $val => $text)
            <option value="{{ $val }}" {{ old($name, $value ?? '') == $val ? 'selected' : '' }}>{{ $text }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
