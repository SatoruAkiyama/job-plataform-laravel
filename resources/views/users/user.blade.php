<x-layout>
    <div class="bg-white py-8 sm:py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mt-4 flex space-x-6">
                <h1 class="text-2xl font-bold tracking-tight sm:text-4xl">Account Info</h1>
                <button class="text-teal-400 openUserEditModal hover:text-teal-500" type="button">
                    <i class="fa-solid fa-pencil"></i> Edit
                </button>
            </div>

            <div class="text-lg my-4">
                <p>Name: {{$userInfo->name}}</p>
                <p>Email: {{$userInfo->email}}</p>
                <p>Created at: {{$userInfo->created_at}}</p>
                <p>Updated at: {{$userInfo->updated_at}}</p>
            </div>

            <div class="mt-8">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="button" onclick="submit();" class="inline-flex justify-center rounded-md bg-teal-600 py-2 px-8 text-sm font-semibold text-white shadow-sm hover:bg-teal-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Logout</button>
                </form>
            </div>

            <div class="mt-8">
                <button class="text-red-400 openUserDeleteModal hover:text-red-500" type="button">
                    <i class="fa-solid fa-trash"></i> Delete the account
                </button>
            </div>

            @unless(count($posts) == 0)
                <div class="mt-10 font-semibold">
                    @if (count($posts) > 1)
                        <p>You have posted {{count($posts)}} jobs/projects for now.</p>
                    @else
                        <p>You have posted {{count($posts)}} job/project for now.</p>
                    @endif
                </div>

                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 mt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                    @foreach($posts as $job)

                        <x-job-card :job="$job" />

                    @endforeach
                </div>

            @else
                <div class="mt-10 font-semibold">
                    <p>You have not posted anything for now. <a href="/post" class="underline underline-offset-8 text-teal-500">Post a job/project.</a></p>
                </div>
            @endunless
        </div>
    </div>

    {{-- Dialog to update the account info --}}
    <div class="fixed z-50 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="userEditModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="/user/update" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$userInfo->id}}">
                    <div class="sm:overflow-hidden">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <p class="font-bold">
                                Edit user info
                            </p>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <input maxlength="50" type="text" name="name" id="name" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="{{$userInfo->name}}">

                                @error('name')
                                    <p class="errorMsg text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <input maxlength="100" type="text" name="email" id="email" autocomplete="email" class="px-2 max-w-lg mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="you@example.com"
                                value="{{$userInfo->email}}">
                                @error('email')
                                    <p class="errorMsg text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-600 text-base font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:ml-3 sm:w-auto sm:text-sm" type="button" onclick="submit();">
                        Update
                        </button>
                        <button type="button" class="closeUserEditModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Dialog is until here --}}

    {{-- Dialog to delete the account --}}
    <div class="fixed z-50 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="userDeleteModal">
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
                                Delete the account.
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete the account? What you have posted will also be deleted. This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form method="POST" action="/user/delete">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$userInfo->id}}">
                        <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" type="button" onclick="submit();">
                        Delete
                        </button>
                    </form>
                    <button type="button" class="closeUserDeleteModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Dialog is until here --}}

    {{-- javascript --}}
    <script type="text/javascript">

        // open account edit dialog
        $(".openUserEditModal").on("click", function (e) {
            $("#userEditModal").removeClass("hidden");
            $("#name").val("{{$userInfo->name}}");
            $("#email").val("{{$userInfo->email}}");
            $(".errorMsg").empty();
        });

        // close account edit dialog
        $(".closeUserEditModal").on("click", function (e) {
            $("#userEditModal").addClass("hidden");
        });

        // when there is an error after sending the request for updating account
        @if (count($errors) > 0)
            $("#userEditModal").removeClass("hidden");
            $("#name").val("{{old('name')}}");
            $("#email").val("{{old('email')}}");
        @endif

        // open account delete confirm dialog
        $(".openUserDeleteModal").on("click", function (e) {
            $("#userDeleteModal").removeClass("hidden");
        });

        // close account delete confirm dialog
        $(".closeUserDeleteModal").on("click", function (e) {
            $("#userDeleteModal").addClass("hidden");
        });
        openUserDeleteModal
    </script>
</x-layout>
