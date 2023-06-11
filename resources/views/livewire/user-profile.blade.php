<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="flex flex-row md:flex-wrap  max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                                src="{{ $datas->profile_photo_url }}"
                                alt="profil photo">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $datas->name }}</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $datas->job_title }} &#x2022; Chez <span class="badge badge-accent">{{ $clientDatas ? $clientDatas->name : "Pas entreprise" }}</span></h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt
                        </p>
                        <div class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <div class="flex justify-between py-3">
                                <span
                                    @class([
                                        'kbd',
                                        'bg-green-500' => ($userStatus == 'available'),
                                        'bg-orange-500' => ($userStatus == 'assigned'),
                                        'bg-red-500' => ($userStatus == 'notAvailable'),
                                    ])
                                >Status</span>
                                <select wire:model.lazy="userStatus" class="select select-ghost max-w-sm">
                                    <option disabled selected>Change Status</option>
                                    @foreach (\App\Enums\AvailableEnum::values() as $status)
                                        <option value="{{$status}}">{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center py-3">
                                <span>Date d'arrivée</span>
                                <span class="ml-auto">Nov 07, 2016</span>
                            </div>
                        </div>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    <div class="bg-white p-3 hover:shadow">
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-green-500">
                                <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            <span>Profiles Similaire</span>
                        </div>
                        <div class="flex flex-col justify-between items-start">
                            @forelse($similarProfils as $similarUser)
                                <div class="flex items-center text-center my-2">
                                    <div class="mr-3">
                                        <img class="h-16 w-16 rounded-full mx-auto"
                                        src="{{ $similarUser->profile_photo_url }}"
                                        alt="">
                                    </div>
                                    <div class="flex flex-col items-start">
                                        <a href="{{ route('userProfile', $similarUser->id) }}" class="font-bold">{{ $similarUser->name }}</a>
                                        <span class="badge badge-neutral">{{ $similarUser->job_title }}</span>
                                    </div>
                                </div>
                            @empty
                                <div><p>Aucun profile trouvé</p></div>
                            @endforelse
                        </div>
                    </div>
                    <!-- End of friends card -->
                </div>
                <!-- End of Left Side -->
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Details Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Détails</span>
                        </div>
                        <div class="divide-y">
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Nom & Prénom</div>
                                        <div class="px-4 py-2">{{ $datas->name }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Genre</div>
                                        <div class="px-4 py-2">Female</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Contact N°</div>
                                        <div class="px-4 py-2">+11 998001001</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Adresse</div>
                                        <div class="px-4 py-2">Beech Creek, PA, Pennsylvania</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Email.</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800" href="mailto:{{ $datas->email }}">{{ $datas->email }}</a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Date de naissance</div>
                                        <div class="px-4 py-2">Feb 06, 1998</div>
                                    </div>
                                </div>
                            </div>
                            <div class="gap-2 m-2">
                                <h1 class="font-bold">Compétences/Languages</h1>
                                <ul>
                                    @forelse($datas->languagesRanks as $key => $language)
                                        <li class="badge {{ $key%2 == 0 ? "badge-accent" : "badge-neutral" }} text-white">{{ $language->language_name}}</li>
                                    @empty
                                        <li class="badge badge-accent">Aucun languages</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End of details section -->
                    <div class="my-4"></div>
                    <!-- Historique des missions -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="grid grid-cols-1">
                            <div>
                                <div class="flex items-center space-x-2 font-bold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Missions hierachy</span>
                                </div>
                                {{-- <div class="grid gap-2 grid-flow-col auto-cols-max md:auto-cols-min"> --}}
                                <div class="carousel carousel-end max-w-full space-x-4 rounded-box">
                                    <div class="carousel-item card bg-gray-500 text-white rounded shadow-xl" >
                                        <div class="card-body items-start">
                                            <h2 class="card-title badge badge-accent">Ovalo</h2>
                                            <h4>Devops</h4>
                                            <p>Project Name</p>
                                            <p>From <span class="badge">12/02/2021</span> to <span class="badge badge-ghost">11/09/2022</span></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item card bg-gray-500 text-white rounded shadow-xl" >
                                        <div class="card-body items-start">
                                            <h2 class="card-title badge badge-accent">PMU</h2>
                                            <h4>Devops</h4>
                                            <p>Project Name</p>
                                            <p>Period : <span class="badge">12/02/2021</span> - <span class="badge badge-ghost">11/09/2022</span></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item card bg-gray-500 text-white rounded shadow-xl" >
                                        <div class="card-body items-start">
                                            <h2 class="card-title badge badge-accent">SG</h2>
                                            <h4>Devops</h4>
                                            <p>Project Name</p>
                                            <p>Period : <span class="badge">12/02/2021</span> - <span class="badge badge-ghost">11/09/2022</span></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item card bg-gray-500 text-white p-2 rounded shadow-xl" >
                                        <div class="card-body items-start">
                                            <h2 class="card-title badge badge-accent">PMU</h2>
                                            <h4>Devops</h4>
                                            <p>Project Name</p>
                                            <p>From <span class="badge">12/01/2022</span> to <span class="badge badge-ghost">11/04/2022</span></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item card bg-gray-500 text-white p-2 rounded shadow-xl" >
                                        <div class="card-body items-start">
                                            <h2 class="card-title badge badge-accent">Carbon</h2>
                                            <h4>Devops</h4>
                                            <p>Project Name</p>
                                            <p>From <span class="badge">12/02/2021</span> to <span class="badge badge-ghost">11/09/2022</span></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item card bg-gray-500 text-white p-2 rounded shadow-xl" >
                                        <div class="card-body items-start">
                                            <h2 class="card-title badge badge-accent">BNP PARIBAS</h2>
                                            <h4>Devops</h4>
                                            <p>Project Name</p>
                                            <p>From <span class="badge">12/02/2021</span> to <span class="badge badge-ghost">11/09/2022</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Missions  -->
                    </div>
                    <!-- End of Historique des missions session -->
                    <div class="my-4"></div>
                    <!-- Experience and education -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Experience</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Education</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">Masters Degree in Oxford</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <!-- End of Experience and education grid -->
                    </div>
                </div>
                <!-- End of Right Side -->
            </div>
        </div>
    </div>
</x-app-layout>
