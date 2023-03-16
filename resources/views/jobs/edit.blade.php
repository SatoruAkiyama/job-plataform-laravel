<x-layout>
    @unless($job == null)

    <a href="/job/{{$job->id}}" class="inline-block ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-auto max-w-7xl px-6 lg:px-64">
        <h1 class="my-8 text-xl font-bold">Edit a job/project to find a developer.</h1>
        @if (count($errors) > 0)
        <p class="my-4 text-red-500">Incorrect data entered. Please see below for the details.</p>
        @endif
        <div class="mt-5 md:col-span-2 md:mt-0">
        <form action="/job/{{$job->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$job->id}}">
            <input type="hidden" name="user_id" value="{{$job->user_id}}">
            <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label for="company" class="block text-sm font-medium leading-6 text-gray-900">Company Name</label>
                        <input maxlength="30" type="text" name="company" id="company" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        value="{{old('company', $job->company)}}">

                        @error('company')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="companyDescription" class="block text-sm font-medium leading-6 text-gray-900">Company Description</label>
                        <div class="mt-2">
                            <textarea maxlength="255" id="companyDescription" name="companyDescription" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="">{{old('companyDescription', $job->companyDescription)}}</textarea>
                        </div>
                        @error('companyDescription')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="logo" class="block text-sm font-medium leading-6 text-sm">Cover photo (Company Logo, etc)</label>
                        <input type="file" name="logo" id="logo" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        value="{{old('logo', $job->logo)}}">

                        <p class="mt-4 text-sm text-gray-400">Current cover photo</p>
                        @if ($job->logo)
                            <img src="data:image/png;base64,<?= $job->logo ?>" alt="no-image" class="h-10 w-10 rounded-full bg-gray-50">
                        @else
                            <img src={{asset('/images/no-image.png')}} alt="no-image" class="h-10 w-10 rounded-full bg-gray-50">
                        @endif

                        @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="website" class="block text-sm font-medium leading-6 text-gray-900">Comapny Website/Application URL</label>
                        <input maxlength="100" type="text" name="website" id="website" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="http://example.com"
                        value="{{old('website', $job->website)}}">
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
                        <input maxlength="30" type="text" name="title" id="title" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: Senior Laravel Developer"
                        value="{{old('title', $job->title)}}">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Job Locations</label>
                        <input maxlength="20" type="text" name="location" id="location" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: Remote, Boston MA, etc"
                        value="{{old('location', $job->location)}}">
                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="tags" class="block text-sm font-medium leading-6 text-gray-900">Job tags (Comma Separated)</label>
                        <input maxlength="50" type="text" name="tags" id="tags" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: Laravel, Backend, Postgres, etc"
                        value="{{old('tags', $job->tags)}}">
                        @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tasks" class="block text-sm font-medium leading-6 text-gray-900">Tasks</label>
                        <div class="mt-2">
                            <textarea maxlength="500" id="tasks" name="tasks" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="Example: You will develop a web application with the technology stacks such as Java, Spring/Spring Boot, MongoDB, React etc.)">{{old('tasks', $job->tasks)}}</textarea>
                        </div>
                        @error('tasks')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="requirements" class="block text-sm font-medium leading-6 text-gray-900">Requirements</label>
                        <div class="mt-2">
                            <textarea maxlength="500" id="requirements" name="requirements" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="Example: Spring Boot knowledge, React.js experience and Good English skills.">{{old('requirements', $job->requirements)}}</textarea>
                        </div>
                        @error('requirements')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="benefits" class="block text-sm font-medium leading-6 text-gray-900">Benefits</label>
                        <div class="mt-2">
                            <textarea maxlength="500" id="benefits" name="benefits" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="Example: Flexible working hours, 30 days paid vacation.">{{old('benefits', $job->benefits)}}</textarea>
                        </div>
                        @error('benefits')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <input maxlength="50" type="text" name="salary" id="salary" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: 3000-5000$/month"
                        value="{{old('salary', $job->salary)}}">
                        @error('salary')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Contact Email</label>
                        <input maxlength="100" type="text" name="email" id="email" autocomplete="email" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="you@example.com"
                        value="{{old('email', $job->email)}}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-8 text-center sm:px-6">
                    <button type="button" onclick="submit();" class="inline-flex justify-center rounded-md bg-teal-600 py-2 px-8 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    @else
        <p>There is not a job.</p>

    @endunless

</x-layout>
