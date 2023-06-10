<div x-data="{show: @entangle('trainingObtained')}">
    <div x-show="show" x-effect="setTimeout(() => show = false, 5000)" x-transition
    @click="show = false" class="toast toast-bottom toast-end cursor-pointer z-20">
        <div class="alert alert-success">
          <span>Demande de participation effectué </span>
        </div>
    </div>
    <div class="flex flex-col z-10">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Formations</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-4">
            @forelse ($trainings as $training)
                <div class="card w-64 bg-base-100 shadow-xl cursor-pointer" wire:click="showTraining({{ $training->id }})">
                    <div class="card-body">
                        @if ($training->created_at > now()->subDays(10))
                            <div class="badge badge-secondary">NOUVEAU</div>
                        @endif
                        <h2 class="card-title">
                            {{ $training->name }}
                        </h2>
                        <p class="text-sm">
                            {{ Illuminate\Support\Str::limit($training->description, 100) }}
                        </p>
                        <div class="card-actions justify-end">
                            @if ($training->users->contains(auth()->user()))
                                <div class="badge gap-2" style="background-color: rgb(96, 245, 96);">
                                    Participé
                                </div>
                            @endif
                            <div class="badge badge-outline"> {{ $training->profit_carbon_score }} points</div>
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
    <dialog class="modal" id="trainingModal">
        <form method="dialog" class="modal-box px-0 pt-0">
            <div class="p-4">
                <button for="trainingModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                <h3 class="font-bold text-lg" id="trainingName"></h3>
                <p class="py-4" id="trainingDescription"></p>
                <div class="flex flex-col gap-2">
                    <div class="badge badge-outline self-end gap-1">
                        <span id="trainingRequiredScore"></span><span> points</span>
                    </div>
                    <div class="justify-end">
                        <button class="btn btn-primary" id="trainingClaimButton" wire:click>Participer</button>
                    </div>
                </div>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <div class="mt-4">
        {{ $trainings->links() }}
    </div>

    <script>
        window.addEventListener('livewire:load', function() {
            Livewire.on("trainingClaimed", () => {
                const modal = document.getElementById('trainingModal');
                modal.close();
            });

            Livewire.on('showTrainingModal', training => {
                const modal = document.getElementById('trainingModal');
                const claimButton = document.getElementById('trainingClaimButton');
                const nameElement = document.getElementById('trainingName');
                const descriptionElement = document.getElementById('trainingDescription');
                const trainingRequiredScore = document.getElementById('trainingRequiredScore');

                claimButton.setAttribute('wire:click', `claimTraining(${training.id})`);
                nameElement.textContent = training.name;
                descriptionElement.textContent = training.description;
                trainingRequiredScore.textContent = training.profit_carbon_score;
                modal.showModal();
            });
        });
    </script>
</div>
