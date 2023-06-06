@props([
    // Should looks like : [id => label, ...]
    'id' => uniqid(),
    'name' => null,
    'label' => null,
    'placeholder' => null,
    'data' => [],
    'event' => null,
    'labelBgColor' => 'white',
])
@php
    $name = $name ?: $attributes->wire('model')->value;
    $label = $label ?: $name;
    $placeholder = $placeholder ?: $label;
@endphp
<div wire:key="select-field-{{ $name }}-{{ $id }}"
    {{ $attributes->only('class')->class([
            'relative rounded-md',
            'pointer-events-none' => $attributes->get('disabled') || $attributes->get('readonly'),
            'opacity-30' => $attributes->get('disabled'),
        ]) }}>
    <div class="relative" wire:ignore x-data="{
        open: false,
        data: @js($data),
        value: @entangle($attributes->wire('model')),
    }" @if ($event) x-init="$watch('value', (v) => { $dispatch(@js($event), { v, index: @js($attributes->get('index')) }) })" @endif
        dusk="{{ $name }}">
        <fieldset
            class="border-outline focus-within:border-secondary-2 focus-within:ring-secondary-2 relative w-full rounded-md border p-3 focus-within:ring-1"
            @click="open = !open">
            <label @class([
                'mb-2 px-2 block float-left text-xs font-semibold focus-within:text-secondary-2 -ml-2 -mt-6 bg-white',
                '!bg-light' => $labelBgColor === 'light',
                'text-typography' => !$errors->has($name),
                'text-danger' => $errors->has($name),
            ])>{{ $label }}
                @if ($attributes->get('required'))
                    *
                @endif
            </label>
            <input name="{{ $name }}" type="hidden" :value="value ? value : null">
            <input type="text" readonly placeholder="{{ $placeholder }}"
                :value="value && data[value] ? data[value] : null" @class([
                    'border-none w-full py-0 px-0 pr-4 text-left bg-white text-typography cursor-pointer placeholder-outline focus:outline-none focus:ring-0 text-sm sm:text-xs',
                    '!bg-light' => $labelBgColor === 'light',
                    'border-danger' => $errors->has($name),
                ])
                @disabled($attributes->get('disabled'))>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <span class="material-icons transition" :class="{ 'rotate-180': open }">arrow_drop_down</span>
            </span>
        </fieldset>
        {{-- <x-input.errors :messages="$errors->get($name)" /> --}}
        <ul class="absolute z-10 mt-1 max-h-60 min-w-full overflow-auto rounded-md border border-[#eee] bg-white py-1 shadow-lg focus:outline-none sm:text-sm"
            x-show="open" x-transition @click.outside="open = false">
            <template x-for="(datum, id) in data">
                <li class="hover:bg-secondary-2 flex cursor-pointer select-none items-center justify-between py-2 px-3 hover:text-white"
                    role="option" x-data="{
                        select() {
                                value = this.selected ? null : id;
                                open = false
                            },
                            get selected() { return value === id },
                    }" :class="{ 'bg-secondary-2/75 text-white': selected }"
                    @click="select()">
                    <span class="block" :class="{ 'font-bold': selected }" x-text="datum"></span>
                    <span class="material-icons -mt-1 h-5 w-5" x-show="selected" x-transition>
                        check
                    </span>
                </li>
            </template>
        </ul>
    </div>
</div>
