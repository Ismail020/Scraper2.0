<div class="pt-3">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ ucfirst($name) }}</label>
    <div class="mt-1">
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm"
            placeholder="{{ $placeholder }}" />
    </div>
</div>