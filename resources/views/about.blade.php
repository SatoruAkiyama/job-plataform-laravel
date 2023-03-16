<x-layout>
    <div class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <svg class="absolute top-0 left-[max(50%,25rem)] h-[64rem] w-[128rem] -translate-x-1/2 stroke-teal-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]" aria-hidden="true">
            <defs>
                <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                <path d="M100 200V.5M.5 .5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-teal-50">
                <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
            </svg>
        </div>
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <p class="text-base font-semibold leading-7 text-teal-600"><a href="/" class="underline underline-offset-8">See application</a></p>
                        <h1 class="mt-2 text-3xl font-bold tracking-tight text-teal-900 sm:text-4xl">About this application</h1>
                        <p class="mt-6 text-xl leading-8 text-teal-700">First of all, this application is not an official web application. I built this application for just learning PHP/Laravel since I need to learn that for my job.</p>
                    </div>
                </div>
            </div>
            <div class="-mt-12 -ml-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                <img class="w-[48rem] max-w-none rounded-xl bg-teal-900 shadow-xl ring-1 ring-teal-400/10 sm:w-[57rem]"
                src="{{asset('images/about.png')}}" alt="">
            </div>
            <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="max-w-xl text-base leading-7 text-teal-700 lg:max-w-lg">
                    <p>This is a job platform application for people who want to join a company or project, and are searching for new members for the company or project. I made this application by watching a Youtube video called
                    <a href="https://www.youtube.com/watch?v=MYyJ4PuL4pY" class="underline underline-offset-8" target="_blank" >"Laravel From Scratch 2022 | 4+ Hour Course"</a></p>
                    <p>
                        After watching the course, in order to try other things I added extra functions and pages. I might add more functions to try stuff like passwrod updating, other search functions... etc.
                    </p>
                    <ul role="list" class="mt-8 space-y-8 text-teal-600">
                        <li>
                            <span><strong class="font-semibold text-teal-900">The reason I made this application</strong></br>
                            <ul role="list">
                                <li><span>To learn PHP/Laravel.</span></li>
                            </ul>
                        </li>
                        <li class="mt-8">
                        <span><strong class="font-semibold text-teal-900">Used Technology</strong></br>
                            <ul role="list">
                                <li><span>PHP</span></li>
                                <li><span>Laravel</span></li>
                                <li><span>MySql</span></li>
                                <li><span>Blade templates</span></li>
                                <li><span>Tailwindcss</span></li>
                                <li><span>jQuery</span></li>
                            </ul>
                        </li>
                        <li class="mt-8">
                            <span><strong class="font-semibold text-teal-900">Available operations in this application</strong></br>
                            <ul role="list">
                                <li><span>See posted jobs/projects list</span></li>
                                <li><span>See details of the post</span></li>
                                <li><span>Seach post by search box or tag</span></li>
                                <li><span>Register an account</span></li>
                                <li><span>Update/Delete an account(only yourself)</span></li>
                                <li><span>Login/Logout</span></li>
                                <li><span>Post jobs/projects (only when you're logged in)</span></li>
                                <li><span>Update/Delete jobs/projects (only when you're the owner)</span></li>
                                <li><span>I might add more...</span></li>
                            </ul>
                        </li>
                    </ul>

                    <p class="mt-24 text-base font-semibold leading-7 text-teal-600"><a href="/" class="underline underline-offset-8">See application</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
