{{-- Komponen input teks: @include('components.input', ['name' => 'nama', 'label' => 'Nama', 'value' => ..., 'type' => 'text', 'required' => true]) --}}
<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1">
        {{ $label }}@if(!empty($required)) <span class="text-red-600">*</span>@endif
    </label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        @if(!empty($required)) required @endif
        @if(isset($min)) min="{{ $min }}" @endif
        @if(isset($max)) max="{{ $max }}" @endif
        @if(isset($step)) step="{{ $step }}" @endif
        placeholder="{{ $placeholder ?? '' }}"
        class="w-full border border-slate-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 @error($name) border-red-500 @enderror">
    @error($name)
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
