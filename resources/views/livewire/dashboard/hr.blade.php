<div>
    <div>
        <h2 class="text-2xl font-semibold leading-tight">Users</h2>
    </div>
    <div class="my-2 flex sm:flex-row flex-col z-40">
        <div class="flex flex-row mb-1 sm:mb-0">
            <div class="flex-none form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Pagination</span>
                </label>
                <select wire:model="usersPerPage" class="select select-bordered">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>

            <div class="flex-none dropdown z-0 relative">
                <label tabindex="0" class="btn m-1">Langages <x-bxs-down-arrow class="w-3 h-3" /></label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                    @foreach ($languagesDatas as $option)
                    <div class="flex gap-x-4 mb-2 items-center">
                        <input wire:model="languages" name="languages" value="{{$option}}" type="checkbox" class="checkbox" />
                        <li>{{ $option }}</li>
                    </div>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th>Name</th>
              <th>Job</th>
              <th>Favorite Color</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
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
                    Zemlak, Daniel and Leannon
                    <br/>
                    @if($user->languagesRanks->count() == 0)
                        <span class="badge badge-ghost badge-sm">None</span>
                    @else
                        @foreach ($user->languagesRanks as $lang)
                            <span class="badge badge-ghost badge-sm">{{$lang->language_name}}</span>
                        @endforeach
                    @endif
                </td>
                <td>Purple</td>
                <th>
                    <button class="btn btn-ghost btn-xs">details</button>
                </th>
                </tr>
            @endforeach
          </tbody>
        </table>

            {{ $users->links() }}
      </div>

</div>
