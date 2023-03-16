<x-layout>

    @unless($job == null)

    <a href="/" class="inline-block ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> See all jobs/projects
    </a>

    <div class="mx-auto max-w-7xl px-6 lg:px-64">
        <div class="shadow-lg p-10 rounded">
            <div class="flex flex-col">

                <div class="relative mt-8 flex items-center gap-x-4">
                    {{-- way to use the filesystem to store image --}}
                    {{-- <img src="{{$job->logo ? asset('storage/' . $job->logo) : asset('/images/no-image.png')}}"
                    alt="no-image" class="h-10 w-10 rounded-full bg-gray-50">
                    <div class="text-sm leading-6">
                    <p class="font-semibold text-gray-900">
                        {{$job->company}}
                    </p>
                    </div> --}}

                    {{-- way to use the binary code for storing image as text --}}
                    @if ($job->logo)
                        <img src="data:image/png;base64,<?= $job->logo ?>" alt="no-image" class="h-10 w-10 rounded-full bg-gray-50">
                    @else
                        <img src={{asset('/images/no-image.png')}} alt="no-image" class="h-10 w-10 rounded-full bg-gray-50">
                    @endif

                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                        {{$job->company}}
                        </p>
                    </div>

                </div>

                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot mr-2"></i>Locations: {{$job->location}}
                </div>

                @if ($job->companyDescription)
                <p class="mt-4">
                    {{$job->companyDescription}}
                </p>
                @endif

                @if ($job->website)
                <div class="text-center">
                    <a href="{{$job->website}}" target="_blank" class="mt-4 px-4 max-w-fit block bg-teal-800 text-white py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i>
                        Visit the website
                    </a>
                </div>
                @endif

                <div class="border border-gray-200 w-full mb-6 mt-4"></div>

                <div>
                    <h1 class="text-4xl mb-4">{{$job->title}}</h1>

                    <h2 class="text-xl font-bold mb-2 mt-8">
                        Tags
                    </h2>

                    <div class="my-4">
                        <x-job-tags :tagsCsv="$job->tags"></x-job-tags>
                    </div>

                    <div class="text-lg space-y-6">
                        <h2 class="text-xl font-bold mb-2 mt-8">
                            Tasks
                        </h2>
                        <p>
                            {{$job->tasks}}
                        </p>

                        <h2 class="text-xl font-bold mb-2 mt-8">
                            Requirements
                        </h2>
                        <p>
                            {{$job->requirements}}
                        </p>

                        <h2 class="text-xl font-bold mb-2 mt-8">
                            Benefits
                        </h2>
                        <p>
                            {{$job->benefits}}
                        </p>

                        <h2 class="text-xl font-bold mb-2 mt-8">
                            Salary
                        </h2>
                        <p>
                            {{$job->salary}}
                        </p>

                        <div class="border border-gray-200 w-full mb-6 mt-32"></div>

                        <div class="text-center">
                            <a href="mailto:{{$job->email}}" class="mt-4 px-4 max-w-fit block bg-teal-800 text-white py-2 rounded-xl hover:opacity-80">
                                <i class="fa-solid fa-envelope"></i>
                                Contact
                            </a>
                        </div>

                        <div class="flex items-center gap-x-4 text-xs">
                            Updated at<time datetime="2020-03-16" class="text-gray-500">{{$job->updated_at}}</time>
                        </div>

                        @auth
                        @if ($job->user_id == auth()->user()->id)
                        <div class="mt-4 flex space-x-6">
                            <a href="/job/{{$job->id}}/edit">
                                <i class="fa-solid fa-pencil"></i> Edit
                            </a>
                        </div>

                        <div class="mt-4">
                            <button class="text-red-500 openDeleteModal" type="button">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </div>
                        @endif
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Dialog to delete the job --}}
    <div class="fixed z-50 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="deleteModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg @click="toggleModal" class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Delete the job/project.
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete the job/project? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form method="POST" action="/job/delete">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$job->id}}">
                        <input type="hidden" name="user_id" value="{{$job->user_id}}">
                        <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" type="button" onclick="submit();">
                        Delete
                        </button>
                    </form>
                    <button type="button" class="closeDeleteModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Dialog is until here --}}

    @else
        <p>There is not a job.</p>

    @endunless

    {{-- javascript --}}
    <script type="text/javascript">
        $(".openDeleteModal").on("click", function (e) {
            $("#deleteModal").removeClass("hidden");
        });
        $(".closeDeleteModal").on("click", function (e) {
            $("#deleteModal").addClass("hidden");
        });
    </script>

</x-layout>
