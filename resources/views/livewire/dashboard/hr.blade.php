<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
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
                        <div class="text-sm opacity-50">United States</div>
                    </div>
                    </div>
                </td>
                <td>
                    Zemlak, Daniel and Leannon
                    <br/>
                    <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
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
