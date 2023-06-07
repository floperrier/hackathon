<div>
        <table class="table table-zebra" x-data="{
            levelSort: @entangle('levelSort'),
            languageSort: @entangle('languageSort'),
        }">
          <thead class="table-header-groups">
            <tr class="table-row">
              <th class="table-cell" x-on:click="levelSort = null; languageSort = languageSort == 'desc' ? 'asc' : 'desc'">
                <span>Langage</span>
                <x-bxs-down-arrow x-show="languageSort == 'desc'" class="w-3 h-3 inline" />
                <x-bxs-up-arrow x-show="languageSort == 'asc'" class="w-3 h-3 inline" />
                <x-bxs-sort-alt x-show="languageSort == null" class="w-3 h-3 inline" />
                </th>
              <th class="table-cell" x-on:click="languageSort = null; levelSort = levelSort == 'desc' ? 'asc' : 'desc'">
                <span>Niveau</span>
                <x-bxs-down-arrow x-show="levelSort == 'desc'" class="w-3 h-3 inline" />
                <x-bxs-up-arrow x-show="levelSort == 'asc'" class="w-3 h-3 inline" />
                <x-bxs-sort-alt x-show="levelSort == null" class="w-3 h-3 inline" />
            </th>
              <th class="table-cell">Score</th>
              <th class="table-cell">
                <div class="dropdown z-0 relative">
                    <label tabindex="0" class="btn m-1">Expérience <x-bxs-down-arrow class="w-3 h-3" /></label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        @foreach (\App\Enums\YearsExperienceEnum::values() as $option)
                        <div class="flex gap-x-4 mb-2 items-center">
                            <input wire:model="experiencesFilter" name="experiencesFilter" value="{{$option}}" type="checkbox" class="checkbox" />
                            <li>{{ __("wizard.years_experience.$option") }}</li>
                        </div>
                        @endforeach
                    </ul>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($languagesRanks as $languageRank)
                <tr>
                    <td>
                        <div class="">
                            <div class="font-bold">{{ $languageRank->language_name }}</div>
                        </div>
                    </td>
                    <td>
                        <div class="relative pt-1">
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                              <div style="width:{{$this->getRankProgressBarClass($languageRank->rank)}}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                            </div>
                          </div>
                    </td>
                    <td>{{ $languageRank->score }}</td>
                    <th>
                        {{ $languageRank->years_of_experience ? __("wizard.years_experience.$languageRank->years_of_experience") : null }}
                    </th>
                </tr>
            @empty
            <tr>
                <td class="">Aucune donnée correspondant à votre recherche</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="mt-6">
            {{ $languagesRanks->links() }}
        </div>
</div>
