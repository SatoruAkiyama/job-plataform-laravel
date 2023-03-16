<x-layout>

    {{-- to use "Hero section" --}}
    @include('partials._hero')

    <div class="bg-white py-8 sm:py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

        {{-- to user "Search form" --}}
        @include('partials._search')

        @unless(count($jobs) == 0)

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 pt-10 sm:mt-8 sm:pt-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($jobs as $job)

                    <x-job-card :job="$job" />

                @endforeach
            </div>

            {{-- pagination --}}
            @if (count($jobs) > 12)
            <div class="mt-24 p-4">
                {{$jobs->links()}}
            </div>
            @endif

        @else

            <p class="my-8 text-xl font-bold ">No job found</p>

        @endunless

        </div>

    </div>

</x-layout>
