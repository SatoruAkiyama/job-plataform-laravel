<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{asset('images/logo.png')}}" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {

                        },
                    },
                },
            };
        </script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <title>Job platform for developers | Find Jobs & Projects</title>
    </head>

    <body class="mb-48 text-teal-900">
        <nav class="flex justify-between items-center mb-4">
            <a href="/">
                <img class="w-16" src="{{asset('images/logo.png')}}" alt="" class="logo"/>
            </a>
            <ul class="flex space-x-6 mr-6 text-lg">
                {{-- logged in --}}
                @auth
                <li>
                    <a href="/user" class="hover:text-teal-600">
                        <i class="fa-solid fa-user"></i> Account
                    </a>
                </li>
                <li>
                    <a href="/post" class="hover:text-teal-600">
                        <i class="fa-solid fa-pencil"></i>
                        Post
                    </a>
                </li>
                {{-- guest --}}
                @else
                <li>
                    <a href="/register" class="hover:text-teal-600">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-teal-600">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login
                    </a>
                </li>
                @endauth
            </ul>
        </nav>

        <main>
            {{-- VIEW OUTPUT --}}
            {{$slot}}
        </main>

        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-teal-800 text-white py-8 mt-24 opacity-90 md:justify-center z-40">
            <p class="ml-2">Copyright &copy; Satoru Akiyama</p>

            @auth
            <a href="/post" class="absolute top-1/3 right-10 bg-teal-500 text-white py-2 px-5 hover:bg-teal-600">
                <i class="fa-solid fa-pencil mr-2"></i>Post
            </a>
            @endauth
        </footer>

        <x-flash-message></x-flash-message>

    </body>
</html>
