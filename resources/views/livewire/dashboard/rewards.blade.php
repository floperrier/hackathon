<div>
    <div class="flex flex-col z-10">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Trouvez votre prochaine récompense 🎁</h1>
            <div class="flex flex-row items-center">
                {{-- TODO: Add filters (required score, new, etc.) --}}
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-4">
            @if ($rewards->isEmpty())
                <div class="flex flex-col items-center justify-center col-span-full gap-4">
                    <img src="{{ asset('images/empty.png') }}" alt="empty" class="w-32">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Aucune récompense disponible</h2>
            @endif
            @foreach ($rewards as $reward)
                <div class="card w-64 bg-base-100 shadow-xl cursor-pointer" wire:click="showReward({{ $reward->id }})">
                    <figure>
                        <img src="{{ $reward->image }}" alt="{{ $reward->name }}"
                            class="rounded-t-lg w-full object-cover h-48">
                    </figure>
                    <div class="card-body">
                        @if ($reward->is_new)
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
            @endforeach
        </div>
    </div>
    <dialog class="modal" id="rewardModal">
        <form method="dialog" class="modal-box px-0 pt-0">
            <figure>
                <img class="rounded-t-lg w-full object-cover h-64" id="rewardImage" alt="reward">
            </figure>
            <div class="p-4">
                <div class="badge badge-secondary hidden" id="rewardNew">NOUVEAU</div>
                <button for="rewardModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                <h3 class="font-bold text-lg" id="rewardName"></h3>
                <p class="py-4" id="rewardDescription"></p>
                <div class="flex flex-col gap-2">
                    <div class="badge badge-outline self-end">
                        <span id="rewardRequiredScore"></span> points requis
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
            const newElement = document.getElementById('rewardNew');
            const requiredScoreElement = document.getElementById('rewardRequiredScore');

            claimButton.setAttribute('wire:click', `claimReward(${reward.id})`);
            nameElement.textContent = reward.name;
            descriptionElement.textContent = reward.description;
            imageElement.src = reward.image;
            requiredScoreElement.textContent = reward.required_score;
            if (reward.is_new) {
                newElement.classList.remove('hidden');
            } else {
                newElement.classList.add('hidden');
            }
            modal.showModal();
        });
    });
</script>
