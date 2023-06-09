<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="flex flex-row md:flex-wrap max-h-full max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{-- Left side --}}
        <div class="flex-none m-1 h-36 w-1/3">
            <div class="flex flex-col max-w-full">
                <div class="card card-bordered border-green bg-base-100 p-6 my-2">
                    <div class="avatar items-center">
                        <div class="w-12 h-12">
                            <img class="mask mask-squircle w-12 h-12 rounded" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Avatar Tailwind CSS Component" />
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Jane Doe</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Owner at Her Company Inc.</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p>
                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex flex-row justify-between py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm bg-red-500"> Active</span></span>
                            </li>
                            <li class="flex justify-between">
                                <span>Member since</span>
                                <span class="ml-auto">Nov 07, 2016</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card card-side bg-base-100 shadow-xl p-6 my-2">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span class="text-green-500">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span>Similar Profiles</span>
                    </div>
                    <div class="card-body">
                        <div class="flex flex-col justify-between items-start">
                            <div class="flex items-center text-center my-2">
                                <div class="mr-3">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                    alt="">
                                </div>
                                <div class="flex flex-col items-start">
                                    <a href="#" class="font-bold">Julien P.</a>
                                    <span class="badge badge-neutral">Dev Sénior</span>
                                </div>
                            </div>
                            <div class="flex items-center text-center my-2">
                                <div class="mr-3">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                    alt="">
                                </div>
                                <div class="flex flex-col items-start">
                                    <a href="#" class="font-bold">Julien P.</a>
                                    <span class="badge badge-neutral">Dev Sénior</span>
                                </div>
                            </div>
                            <div class="flex items-center text-center my-2">
                                <div class="mr-3">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                    alt="">
                                </div>
                                <div class="flex flex-col items-start">
                                    <a href="#" class="font-bold">Julien P.</a>
                                    <span class="badge badge-neutral">Dev Sénior</span>
                                </div>
                            </div>
                            <div class="flex items-center text-center my-2">
                                <div class="mr-3">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                    alt="">
                                </div>
                                <div class="flex flex-col items-start">
                                    <a href="#" class="font-bold">Julien P.</a>
                                    <span class="badge badge-neutral">Dev Sénior</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Right side --}}
        <div class="grow m-1 h-36 w-2/3">
            <div class="flex-initial flex-col max-w-full">
                <div class="card card-side bg-base-100 shadow-xl p-6 my-2">
                    <div class="flex justify-stretch">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="font-bold">About</span>
                    </div>
                    {{-- About --}}
                    <div class="card-body grid md:grid-cols-2 gap-4" style="margin: 12px 0">
                        <div class="grid grid-cols-2" style="margin: 6px 0">
                            <div class="flex items-center"">
                                <label class="text-white p-2 mr-1 rounded" style="background-color: #000c">Account ID</label><p class="">ID-45453423</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2" style="margin: 6px 0">
                            <div class="flex items-center"">
                                <label class="text-white p-2 mr-1 rounded" style="background-color: #000c">Gender</label><p>Male</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2" style="margin: 6px 0">
                            <div class="flex items-center"">
                                <label class="text-white p-2 mr-1 rounded" style="background-color: #000c">Fullname</label><p>John Deo</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2" style="margin: 6px 0">
                            <div class="flex items-center"">
                                <label class="text-white p-2 mr-1 rounded" style="background-color: #000c">Email</label><p>john.deo@user.fr</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2" style="margin: 6px 0">
                            <div class="flex items-center"">
                                <label class="text-white p-2 mr-1 rounded" style="background-color: #000c">Contact No.</label><p>+11 998001001</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2" style="margin: 6px 0">
                            <div class="flex items-center"">
                                <label class="text-white p-2 mr-1 rounded" style="background-color: #000c">Address</label><p>4 rue du jardin,Paris,75016,France</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Missions history --}}
                <div class="card card-side bg-base-100 shadow-xl p-6">
                    <div class="flex justify-stretch">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="history"><path d="M30,16A13,13,0,0,1,6.54,23.72l1.61-1.19a11,11,0,1,0-1.67-9.71l1-.65,1.12,1.66-3,2A1,1,0,0,1,5,16a1,1,0,0,1-.83-.44l-2-3,1.66-1.12.68,1A13,13,0,0,1,30,16ZM16,9v7a1,1,0,0,0,.29.71l3,3,1.42-1.42L18,15.59V9Z" data-name="03  History, Recent"></path></svg> --}}
                        </span>
                        <span class="font-bold">Missions History</span>
                    </div>
                    <div class="card-body flex flex-row justify-around">
                        <div class="card w-96 bg-gray-500 text-white p-2 m-1 rounded shadow-xl" >
                            <div class="card-body items-end">
                                <h2 class="card-title badge badge-accent">Ovalo</h2>
                                <h4>Devops</h4>
                                <p>Project Name</p>
                                <p>Period</p>
                            </div>
                        </div>
                        <div class="card w-96 bg-gray-500 text-white p-2 m-1 rounded shadow-xl" >
                            <div class="card-body items-center">
                                <h2 class="card-title badge badge-accent">Ovalo</h2>
                                <h4>Devops</h4>
                                <p>Project Name</p>
                                <p>From <span class="badge">12/02/2021</span> to <span class="badge badge-ghost">11/09/2022</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Scholarship --}}
                <div class="card card-side bg-base-100 shadow-xl p-2" style="margin: 12px 0">
                    <div class="card-body flex flex-row justify-start gap-10">
                        {{-- <div class=""> --}}
                            <div>
                                <div class="flex justify-stretch">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="font-bold">Experience</span>
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
                                <div class="flex justify-stretch">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                    </span>
                                    <span class="font-bold">Education</span>
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
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
