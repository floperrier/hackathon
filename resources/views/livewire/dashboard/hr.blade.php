<div>
    <div>
        <h2 class="text-2xl font-semibold leading-tight">Développeurs</h2>
    </div>
    <div class="my-2 flex sm:flex-row flex-col justify-end">
        <div class="flex flex-row mb-1 sm:mb-0">
            <div class="flex-none dropdown z-10 w-full relative">
                <label tabindex="0" class="btn m-1">Langages <x-bxs-down-arrow class="w-3 h-3" /></label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow block bg-base-100 rounded-box w-52" style="overflow:auto; max-height: 250px;">
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
              <th>Disponible</th>
              <th>Noms</th>
              <th>Travail</th>
              <th>Salaire</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
                <tr>
                <th>
                    <span class="badge badge-xs" @if($user->available == 'available') style="background-color:green;" @elseif ($user->available == "assigned") style="background-color:orange;" @else style="background-color:red;" @endif></span>
                </th>
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
                <td>{{ $user->salary }} € </td>
                <th>
                    <a class="btn btn-ghost btn-xs text-green-500" href="{{ route('userProfile',$user->id) }}">details</a>
                </th>
                </tr>
            @empty
                <tr>
                    <td class="">Aucune donnée correspondant à votre recherche</td>
                </tr>
            @endforelse
          </tbody>
        </table>
        {{ $users->links() }}
      </div>

</div>
