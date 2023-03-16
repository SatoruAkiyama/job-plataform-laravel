@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
    @foreach($tags as $tag)
        <li class="mr-1">
            <object><a href="/?tag={{$tag}}" class="relative z-10 rounded-full bg-teal-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-teal-100">
                {{$tag}}
            </a></object>
        </li>
    @endforeach
</ul>
