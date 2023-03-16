@props(['job'])

<article class="flex max-w-xl shadow-lg hover:shadow-2xl">
    <a href="/job/{{$job->id}}" class="w-full h-full">
        <div class="flex max-w-xl flex-col items-start justify-between px-4 py-4">
        <div class="flex items-center gap-x-4 text-xs">
            Updated at<time datetime="2020-03-16" class="text-teal-500">{{$job->updated_at}}</time>
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-teal-900 group-hover:text-teal-600">
                <span class="absolute inset-0"></span>
                {{$job->title}}
            </h3>
        </div>

        <div class="relative mt-4 items-center">
            <x-job-tags :tagsCsv="$job->tags"></x-job-tags>
        </div>

        <div class="relative mt-8 items-center gap-x-4">
            <p class="text-teal-600"><i class="fa-solid fa-location-dot"></i> {{$job->location}}</p>
        </div>

        <div class="relative mt-8 flex items-center gap-x-4">
            {{-- way to use the filesystem to store image --}}
            {{--
            <img src="{{$job->logo ? asset('storage/' . $job->logo) : asset('/images/no-image.png')}}"
            alt="no-image" class="h-10 w-10 rounded-full bg-teal-50">
            --}}

            {{-- way to use the binary code for storing image as text --}}
            @if ($job->logo)
                <img src="data:image/png;base64,<?= $job->logo ?>" alt="no-image" class="h-10 w-10 rounded-full bg-teal-50">
            @else
            <img src={{asset('/images/no-image.png')}} alt="no-image" class="h-10 w-10 rounded-full bg-teal-50">
            @endif

            <div class="text-sm leading-6">
              <p class="font-semibold text-teal-900">
                {{$job->company}}
              </p>
            </div>
        </div>

        </div>
    </a>
</article>

