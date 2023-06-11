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
                            <span class="label-text">Durée</span>
                        </label>
                        <div class="flex">
                            <div class="form-control m-1">
                                <input id="training-duration-d" name="training-duration-d" type="number" placeholder="00" required min="0" max="99" class="input input-bordered" />
                            </div>
                            <span class="text-2xl m-1">j</span>
                            <div class="form-control m-1">
                                <input id="training-duration-h" name="training-duration-h" placeholder="00" type="number" required min="0" max="23" class="input input-bordered" />
                            </div>
                            <span class="text-2xl m-1">h</span>
                            <div class="form-control m-1">
                                <input id="training-duration-m" name="training-duration-m" placeholder="00" type="number" required min="0" max="59" class="input input-bordered" />
                            </div>
                        </div>

                    <button class="btn mt-6 bg-green-500 text-white">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
