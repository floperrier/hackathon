<x-layouts.wizard :steps="$steps">
    <div x-data class="flex flex-col">
        <div class="flex flex-1 items-end gap-2 mb-8" >
            <div class="form-control w-full max-w-xs">
                <label class="label">
                  <span class="label-text">Quel est votre pseudo Codewars?</span>
                </label>
                <div class="flex items-start gap-2">
                    <div class="flex flex-col flex-1">
                        <input @keyup.enter="$wire.getRanks()" wire:model="codewars_username" type="text" placeholder="Pseudo Codewars" @class(['input input-bordered w-full max-w-xs', 'input-error' => $errors->get('codewars_username')]) wire:loading.attr="disabled" wire:target="getRanks" />
                        @error('codewars_username')
                            <label class="label">
                                <span class="label-text-alt text-red-500">
                                    {{ $message }}
                                </span>
                            </label>
                        @enderror
                    </div>
                    <div class="flex min-w-[40px]">
                        <span wire:loading wire:target="getRanks" class="loading loading-bars loading-lg mx-auto"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button wire:click="getRanks" wire:loading.attr="disabled" class="btn">Suivant</button>
        </div>
    </div>
</x-layouts.wizard>
