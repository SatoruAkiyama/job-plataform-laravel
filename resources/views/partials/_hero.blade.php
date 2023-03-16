<section class="flex flex-col justify-center align-center text-center space-y-4 mt-24 mb-8">
    <div class="z-10">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-teal-900 sm:text-4xl">Job platform for developers</h2>
            <p class="mt-4 text-lg leading-8 text-teal-700">If you are a developer, find jobs and rojects</br>If you need developers, post jobs and rojects</p>
            <p class="mt-2 text-lg leading-8 text-teal-600 hover:text-teal-500"><a href="/about" class="underline underline-offset-8">About this application</a></p>
        </div>
        <div class="mt-4">
            {{-- logged in --}}
            @auth
            <a href="/post" class="inline-flex justify-center rounded-md bg-teal-600 py-2 px-8 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">
                Post
            </a>
            {{-- guest --}}
            @else
            <a href="/register" class="inline-flex justify-center rounded-md bg-teal-600 py-2 px-8 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">
                Register an account
            </a>
            @endauth

        </div>
    </div>
</section>
