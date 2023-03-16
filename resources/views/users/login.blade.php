<x-layout>
    <div class="flex min-h-full items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900">Login</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                Log into your account to post jobs/project.
                </p>
                <div class="mt-8 text-center text-sm">
                    <p class="font-medium">
                    You don't have an account? <a class="text-teal-600 hover:text-teal-500" href="/register">Register</a>
                    </p>
                </div>
            </div>

            <form action="/user/authenticate" method="POST">
                @csrf
                <div class="shadow-lg sm:overflow-hidden sm:rounded-md">
                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <input maxlength="100" type="text" name="email" id="email" autocomplete="email" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                            placeholder="you@example.com"
                            value="{{old('email')}}">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <input maxlength="50" type="password" name="password" id="password" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 sm:text-sm sm:leading-6"
                            placeholder="Minimum: 6 characters"
                            value="{{old('password')}}">

                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-8 sm:px-6 text-center">
                        <button type="button" onclick="submit();" class="inline-flex justify-center rounded-md bg-teal-600 py-2 px-8 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
