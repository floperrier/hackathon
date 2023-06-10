<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-10">
                <a class="btn" href="{{ route('training-list') }}">Retour</a>
                <div>
                    <h1 class="text-2xl font-semibold leading-tight text-center mb-2">{{ $training->name }}</h1>

                    <p class="text-lg text-center">{{ $training->description }}</p>

                    <div class="flex flex-col items-end">
                        <span>
                            Durée :
                            @if($training->duration / 60 / 60 / 24 >= 1)
                                {{ (int) ($training->duration / 60 / 60 / 24) }} j
                                {{ (int) ($training->duration / 60 / 60) % 24 }} h
                                {{ (int) $training->duration / 60 % 60 }} min
                            @elseif($training->duration / 60 / 60 >= 1)
                                {{ (int) ($training->duration / 60 / 60) }} h
                                {{ (int) $training->duration / 60 % 60 }} min
                            @else
                                {{ $training->duration / 60 }} min
                            @endif
                        </span>

                        <span class="block mt-2">
                            Carbon score : {{ $training->profit_carbon_score }}
                        </span>
                    </div>

                    <!-- Liste des participants -->
                    <h3 class="text-xl font-semibold leading-tight text-center mt-10 mb-2">Participants</h3>
                    <table class="table">
                        <!-- head -->
                        <thead>
                          <tr>
                            <th>Noms</th>
                            <th>Travail</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($training->users as $user)
                              <tr>
                              <td>
                                  <div class="flex items-center space-x-3">
                                  <div class="avatar">
                                      <div class="w-12 h-12">
                                      <img src="{{ $user->profile_photo_url }}" class=" rounded-full" alt="Avatar Tailwind CSS Component">
                                      </div>
                                  </div>
                                  <div>
                                      <div class="font-bold">{{ $user->name }}</div>
                                      <div class="text-sm opacity-50">
                                          @if ($user->client != null)
                                              {{ $user->client->name }}
                                          @endif
                                      </div>
                                  </div>
                                  </div>
                              </td>
                              <td>
                                 {{ $user->job_title }}
                                  <br/>
                                  @if($user->languagesRanks->count() == 0)
                                      <span class="badge badge-ghost badge-sm">Aucun langage</span>
                                  @else
                                      @foreach ($user->languagesRanks as $i => $lang)
                                          <span class="badge badge-ghost badge-sm" @if($i > 2) style="display:none;" @endif>{{$lang->language_name}}</span>
                                          @if($i == 2)
                                              <span class="badge badge-ghost badge-sm">...</span>
                                          @endif
                                      @endforeach
                                  @endif
                              </td>
                              </tr>
                          @empty
                              <tr>
                                  <td class="">Aucun participant</td>
                              </tr>
                          @endforelse
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
