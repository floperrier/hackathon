<x-layouts.wizard :steps="$steps">
    <div>
        <div class="overflow-x-auto">
            <table class="table">
              <thead>
                <tr>
                  <th>Langage</th>
                  <th>Niveau</th>
                  <th>Score</th>
                  <th>Expérience</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($user->languagesRanks as $languageRank)
                    <tr>
                        <td>
                            <div class="flex items-center space-x-3">
                            <div>

                                <div class="font-bold">{{ $languageRank->language_name }}</div>
                            </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-ghost">{{ $languageRank->rank_name }}</span>
                        </td>
                        <td>{{ $languageRank->score }}</td>
                        <th>
                            <select wire:model="languageRankModel.{{$languageRank->id}}.years_of_experience" class="select select-bordered w-full max-w-xs">
                                @foreach (\App\Enums\YearsExperienceEnum::values() as $value)
                                    @if ($languageRank->years_of_experience === $value)
                                        <option selected="selected" value="{{$value}}">{{ __("wizard.years_experience.$value") }}</option>

                                    @else
                                        <option value="{{$value}}">{{ __("wizard.years_experience.$value") }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </th>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Langage</th>
                  <th>Niveau</th>
                  <th>Score</th>
                  <th>Expérience</th>
                </tr>
              </tfoot>
            </table>
          </div>
        <div class="flex justify-end">
            <button wire:click="finishSetup" wire:loading.attr="disabled" class="btn">Suivant</button>
        </div>
    </div>
</x-layouts.wizard>
