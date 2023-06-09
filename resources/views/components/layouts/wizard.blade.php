<div class="flex gap-x-24">
    <nav aria-label="Progress">
        <ol role="list" class="overflow-hidden">
            @foreach($steps as $step)
                @if ($step->isPrevious())
                    <li class="relative pb-10">
                        <div class="absolute left-4 top-4 -ml-px mt-0.5 h-full w-0.5 bg-red-500" aria-hidden="true"></div>
                        <!-- Complete Step -->
                        <a href="#" class="group relative flex items-start">
                        <span class="flex h-9 items-center">
                            <span class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full bg-red-500 group-hover:bg-red-500">
                            <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                            </svg>
                            </span>
                        </span>
                        <span class="ml-4 flex min-w-0 flex-col">
                            <span class="text-sm font-medium">{{ $step->label }}</span>
                            <span class="text-sm text-gray-500">{{ $step->description }}</span>
                        </span>
                        </a>
                    </li>
                @elseif ($step->isCurrent())
                    <li class="relative pb-10">
                        <div class="absolute left-4 top-4 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" aria-hidden="true"></div>
                        <!-- Current Step -->
                        <a href="#" class="group relative flex items-start" aria-current="step">
                        <span class="flex h-9 items-center" aria-hidden="true">
                            <span class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full border-2 border-red-500 bg-white">
                            <span class="h-2.5 w-2.5 rounded-full bg-red-500"></span>
                            </span>
                        </span>
                        <span class="ml-4 flex min-w-0 flex-col">
                            <span class="text-sm font-medium text-red-500">{{ $step->label }}</span>
                            <span class="text-sm text-gray-500">{{ $step->description }}</span>
                        </span>
                        </a>
                    </li>
                @else
                    <li class="relative pb-10">
                        <div class="absolute left-4 top-4 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" aria-hidden="true"></div>
                        <!-- Upcoming Step -->
                        <a href="#" class="group relative flex items-start">
                        <span class="flex h-9 items-center" aria-hidden="true">
                            <span class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white group-hover:border-gray-400">
                            <span class="h-2.5 w-2.5 rounded-full bg-transparent group-hover:bg-gray-300"></span>
                            </span>
                        </span>
                        <span class="ml-4 flex min-w-0 flex-col">
                            <span class="text-sm font-medium text-gray-500">{{ $step->label }}</span>
                            <span class="text-sm text-gray-500">{{ $step->description }}</span>
                        </span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
    <div>
        @foreach ($steps as $step)
            @if ($step->isCurrent())
                <div class="border-b border-gray-200 pb-5 mb-8">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $step->label }}</h3>
                    <p class="mt-2 max-w-4xl text-sm text-gray-500">
                        {{ $step->long_description }}
                    </p>
                </div>
            @endif
        @endforeach
        {{-- <h1 class="text-2xl">{{ $step->title ?? $step->label }}</h1>
        <p>{{ $step->long_description }}</p> --}}
        {{ $slot }}
    </div>
</div>
