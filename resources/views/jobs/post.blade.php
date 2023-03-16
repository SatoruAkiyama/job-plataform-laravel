<x-layout>
<div class="mx-auto max-w-7xl px-6 lg:px-64">
    <h1 class="my-8 text-xl font-bold">Post a job/project to find a developer.</h1>
    @if (count($errors) > 0)
    <p class="my-4 text-red-500">Incorrect data entered. Please see below for the details.</p>
    @endif

    <div class="mt-5 md:col-span-2 md:mt-0">
        <form action="/job/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="shadow-lg sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label for="company" class="block text-sm font-medium leading-6 text-gray-900">Company Name</label>
                        <input maxlength="30" type="text" name="company" id="company" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        value="{{old('company')}}">

                        @error('company')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="companyDescription" class="block text-sm font-medium leading-6 text-gray-900">Company Description</label>
                        <div class="mt-2">
                            <textarea maxlength="255" id="companyDescription" name="companyDescription" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="">{{old('companyDescription')}}</textarea>
                        </div>
                        @error('companyDescription')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="logo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo (Company Logo, etc)</label>
                        <input type="file" name="logo" id="logo" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        value="{{old('logo')}}">
                        @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="website" class="block text-sm font-medium leading-6 text-gray-900">Comapny Website/Application URL</label>
                        <input maxlength="100" type="text" name="website" id="website" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="http://example.com"
                        value="{{old('website')}}">
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
                        <input maxlength="30" type="text" name="title" id="title" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: Senior Laravel Developer"
                        value="{{old('title')}}">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Job Locations</label>
                        <input maxlength="20" type="text" name="location" id="location" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: Remote, Boston MA, etc"
                        value="{{old('location')}}">
                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="tags" class="block text-sm font-medium leading-6 text-gray-900">Job tags (Comma Separated)</label>
                        <input maxlength="50" type="text" name="tags" id="tags" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: Laravel, Backend, Postgres, etc"
                        value="{{old('tags')}}">
                        @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tasks" class="block text-sm font-medium leading-6 text-gray-900">Tasks</label>
                        <div class="mt-2">
                            <textarea maxlength="500" id="tasks" name="tasks" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="Example: You will develop a web application with the technology stacks such as Java, Spring/Spring Boot, MongoDB, React etc.)">{{old('tasks')}}</textarea>
                        </div>
                        @error('tasks')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="requirements" class="block text-sm font-medium leading-6 text-gray-900">Requirements</label>
                        <div class="mt-2">
                            <textarea maxlength="500" id="requirements" name="requirements" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="Example: Spring Boot knowledge, React.js experience and Good English skills.">{{old('requirements')}}</textarea>
                        </div>
                        @error('requirements')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="benefits" class="block text-sm font-medium leading-6 text-gray-900">Benefits</label>
                        <div class="mt-2">
                            <textarea maxlength="500" id="benefits" name="benefits" rows="5" class="pt-1 px-2 mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:py-1.5 sm:text-sm sm:leading-6"
                            placeholder="Example: Flexible working hours, 30 days paid vacation.">{{old('benefits')}}</textarea>
                        </div>
                        @error('benefits')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <input maxlength="50" type="text" name="salary" id="salary" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="Example: 3000-5000$/month"
                        value="{{old('salary')}}">
                        @error('salary')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Contact Email</label>
                        <input maxlength="100" type="text" name="email" id="email" autocomplete="email" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                        placeholder="you@example.com"
                        value="{{old('email')}}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-8 text-center sm:px-6">
                    <button type="button" onclick="submit();" class="inline-flex justify-center rounded-md bg-teal-600 py-2 px-8 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
</x-layout>
