<div x-data="{show: @entangle('rewardObtained')}">
    <div x-show="show" x-effect="setTimeout(() => show = false, 5000)" x-transition
    @click="show = false" class="toast toast-bottom toast-end cursor-pointer z-20">
        <div class="alert alert-success">
          <span>Récompense récupérée!</span>
        </div>
    </div>
    <div class="flex flex-col z-10">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Récompenses à choisir 🎁</h1>
            <div class="flex flex-row items-center">
                <div class="dropdown z-10 relative">
                    <label tabindex="0" class="btn m-1">CarbonScore requis <x-bxs-down-arrow class="w-3 h-3" /></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        @foreach (\App\Enums\RewardRequiredScoreEnum::values() as $option)
                        <div class="flex gap-x-4 mb-2 items-center">
                            <input id="{{$option}}" wire:model="requiredScoresFilter" name="requiredScoresFilter" value="{{$option}}" type="checkbox" class="checkbox" />
                            <label class="cursor-pointer" for="{{$option}}">{{ __("rewards.required_scores.$option") }}</label>
                        </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-4">
            @forelse ($rewards as $reward)
                <div class="card w-64 bg-base-100 shadow-xl cursor-pointer" wire:click="showReward({{ $reward->id }})">
                    <figure>
                        <img src="{{ $reward->image }}" alt="{{ $reward->name }}"
                            class="rounded-t-lg w-full object-cover h-48">
                    </figure>
                    <div class="card-body">
                        @if ($reward->created_at > now()->subDays(10))
                            <div class="badge badge-secondary">NOUVEAU</div>
                        @endif
                        <h2 class="card-title">
                            {{ $reward->name }}
                        </h2>
                        <p class="text-sm">
                            {{ Illuminate\Support\Str::limit($reward->description, 100) }}
                        </p>
                        <div class="card-actions justify-end">
                            <div class="badge badge-outline">{{ $reward->required_score }} points requis</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center col-span-full gap-4">
                <img src="{{ asset('images/empty.png') }}" alt="empty" class="w-32">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Aucune récompense disponible</h2>
            @endforelse
        </div>
    </div>
    <dialog class="modal" id="rewardModal">
        <form method="dialog" class="modal-box px-0 pt-0">
            <figure>
                <img class="rounded-t-lg w-full object-cover h-64" id="rewardImage" alt="reward">
            </figure>
            <div class="p-4">
                <button for="rewardModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                <h3 class="font-bold text-lg" id="rewardName"></h3>
                <p class="py-4" id="rewardDescription"></p>
                <div class="flex flex-col gap-2">
                    <div class="badge badge-outline self-end gap-1">
                        <span id="rewardRequiredScore"></span><span> points requis</span>
                    </div>
                    <div class="justify-end">
                        <button class="btn btn-primary" id="rewardClaimButton" wire:click>Obtenir</button>
                    </div>
                </div>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <div class="mt-4">
        {{ $rewards->links() }}
    </div>

    <script>
        window.addEventListener('livewire:load', function() {
            Livewire.on("rewardClaimed", () => {
                const modal = document.getElementById('rewardModal');
                modal.close();
            });

            Livewire.on('showRewardModal', reward => {
                const modal = document.getElementById('rewardModal');
                const claimButton = document.getElementById('rewardClaimButton');
                const nameElement = document.getElementById('rewardName');
                const descriptionElement = document.getElementById('rewardDescription');
                const imageElement = document.getElementById('rewardImage');
                const requiredScoreElement = document.getElementById('rewardRequiredScore');

                claimButton.setAttribute('wire:click', `claimReward(${reward.id})`);
                nameElement.textContent = reward.name;
                descriptionElement.textContent = reward.description;
                imageElement.src = reward.image;
                requiredScoreElement.textContent = reward.required_score;
                modal.showModal();
            });
        });
    </script>
</div>
