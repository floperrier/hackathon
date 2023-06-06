@props([
    'name' => $attributes->wire('model')->value(),
    'label' => null,
    'labelStyle' => 'w-1/3',
    'labelBefore' => true,
    'model' => null,
    'disabled' => false,
    'leftText' => null,
    'rightText' => null,
])
<fieldset {{ $attributes->only('class')->class(['flex']) }}>
    @if ($labelBefore)
        <label @class(['mr-6', $labelStyle])>{{ $label }}</label>
    @endif
    @if ($leftText)
        <span class="capitalize">{{ $leftText }}</span>
    @endif
    <button type="button" role="switch" aria-checked="false" dusk="{{ $name }}" @class([
        'flex-shrink-0 group relative rounded-full inline-flex items-center justify-center h-5 w-10 cursor-pointer focus:outline-none mr-4',
        'ml-4' => $leftText,
    ])
    @if ($attributes->wire('model')->value()) x-data="{ active: @entangle($attributes->wire('model')) }" @else
        x-data="{ active: 0 }" @endif @if (!$disabled)
            @click="active = !active" @endif>
        <input name="{{ $name }}" type="hidden" x-modelable="active" {{ $attributes->except('class') }}
            {{ $attributes->wire('model') }}>
        <span class="sr-only">{{ $label }}</span>
        <span class="pointer-events-none absolute h-full w-full rounded-md" aria-hidden="true"></span>
        <span
            class="pointer-events-none absolute mx-auto h-4 w-9 rounded-full transition-colors duration-200 ease-in-out"
            aria-hidden="true" :class="{ 'bg-gray-200': !active, 'bg-secondary-2 bg-opacity-10': active }"></span>
        <span
            class="pointer-events-none absolute left-0 inline-block h-5 w-5 transform rounded-full shadow ring-0 transition-transform duration-200 ease-in-out"
            aria-hidden="true"
            :class="{ 'translate-x-0 bg-white': !active, 'translate-x-5 bg-secondary-2': active }"></span>
    </button>
    @if ($rightText)
        <span class="capitalize">{{ $rightText }}</span>
    @endif
    @if (!$labelBefore)
        <label class="mr-6">{{ $label }}</label>
    @endif
</fieldset>
