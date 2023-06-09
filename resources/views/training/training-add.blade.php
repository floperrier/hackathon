<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajout Formation') }}
        </h2>
    </x-slot>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-10">

                <a class="btn" href="{{ route('training-list') }}">Retour</a>

                <form action="{{ route('training-store') }}" method="POST" class="flex flex-col items-center">
                    @csrf

                    <div class="form-control" style="width:50%">
                        <label class="label">
                        <span class="label-text">Nom</span>
                        </label>
                        <input type="text" id="training-name" name="training-name" placeholder="Nom de la formation" required class="input input-bordered " />
                    </div>

                    <div class="form-control" style="width:50%">
                        <label class="label">
                        <span class="label-text">Description</span>
                        </label>
                        <textarea id="training-description" name="training-description" class="textarea textarea-bordered h-24" required placeholder="Description"></textarea>
                    </div>

                    <div class="form-control" style="width:50%">
                        <label class="label">
                        <span class="label-text">Nombre de carbon score</span>
                        </label>
                        <input id="training-profit-carbon-score" name="training-profit-carbon-score" type="number" required placeholder="Nombre de carbon score" class="input input-bordered  " />
                    </div>

                    <div class="form-control" style="width:50%">
                        <label class="label">
                            <span class="label-text">Début de la formation</span>
                        </label>
                        <input id="training-start-at" name="training-start-at" required type="date" class="input input-bordered " placeholder="Select date">
                    </div>

                    <div class="form-control" style="width:50%">
                        <label class="label">
                            <span class="label-text">Fin de la formation</span>
                        </label>
                        <input id="training-end-at" name="training-end-at" required type="date" class="input input-bordered " placeholder="Select date">
                    </div>

                    <button class="btn mt-6" style="width:50%">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
