<div>

<div class="z-10">
    <div class="flex justify-end items-center">
        <div>
            <th class="table-cell">
                <select wire:model="languageFilter" class="select select-bordered w-full max-w-xs">
                    <option value="" disabled selected>Langage</option>
                    @foreach (\App\Enums\DevLangagesEnum::values() as $option)
                        <option>{{ __("languages.$option") }}</option>
                    @endforeach
                </select>
                </div>
            </th>
        </div>
    </div>
    <table class="table" x-data="{
        scoreSort: @entangle('scoreSort'),
        languageSort: @entangle('languageSort')
    }">
      <thead>
        <tr>
          <th>Name</th>
          <th>Job</th>
            @if ($languageFilter)
                <th class="table-cell" x-on:click="scoreSort = null; languageSort = languageSort == 'desc' ? 'asc' : 'desc'">
                    <span class="cursor-pointer">Niveau du langage</span>
                    <x-bxs-down-arrow x-show="languageSort == 'desc'" class="w-3 h-3 inline" />
                    <x-bxs-up-arrow x-show="languageSort == 'asc'" class="w-3 h-3 inline" />
                    <x-bxs-sort-alt x-show="languageSort == null" class="w-3 h-3 inline" />
                </th>
            @endif
            <th class="table-cell" x-on:click="languageSort = null; scoreSort = scoreSort == 'desc' ? 'asc' : 'desc'">
                <span class="cursor-pointer">CarbonScore</span>
                <x-bxs-down-arrow x-show="scoreSort == 'desc'" class="w-3 h-3 inline" />
                <x-bxs-up-arrow x-show="scoreSort == 'asc'" class="w-3 h-3 inline" />
                <x-bxs-sort-alt x-show="scoreSort == null" class="w-3 h-3 inline" />
            </th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <tr @class(['bg-base-200' => Auth::user()->id == $user->id])>
            <td>
                <div class="flex items-center space-x-3">
                <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                    <img src="{{ $user->profilePhotoUrl }}" alt="Avatar Tailwind CSS Component" />
                    </div>
                </div>
                <div>
                    <div class="font-bold">{{ $user->name }}</div>
                    <div class="text-sm opacity-50">United States</div>
                </div>
                </div>
            </td>
            <td>
                Zemlak, Daniel and Leannon
                <br/>
                <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
            </td>
            @if ($languageFilter)
                <td>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                            <div style="width:{{$this->getRankProgressBarClass($user->languagesRanks()->where('language_name', $languageFilter)->first()->rank)}}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                        </div>
                    </div>
                </td>
            @endif
            <td>{{ $user->getPoints(true) }}</td>
            <th>
                <button class="btn btn-ghost btn-xs text-green">details</button>
            </th>
            </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-6">
      {{ $users->links() }}
  </div>
</div>
</div>
