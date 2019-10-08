@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <!-- title -->
    <div class="text-center px-6 py-12 mb-6 bg-gray-100 border-b">
        <h1 class=" text-xl md:text-4xl pb-4">{{ $module->name }}</h1>
        <p class="leading-loose text-gray-dark">
            @todo
        </p>
    </div>
    <!-- /title -->

    <div class="container max-w-4xl mx-auto md:flex items-start py-8 px-12 md:px-0">
        <div class="w-full md:pr-12 mb-12">
            <div class="flex">
                <div class="flex-1 w-auto p-4 border rounded mr-2">
                    <h3 class="font-bold text-lg border-b mb">
                        Skills
                    </h3>
                    <ul>
                        @forelse ($module->skills as $skill)
                        <li>
                            <input type="checkbox"{{ $completedSkills->contains($skill->id) ? ' checked="checked"' : '' }}>
                            {{ $skill->name }}
                        </li>
                        @empty
                        <li>No resources</li>
                        @endforelse
                        <br>@todo handle bonus skills BONUS:
                        <li>
                            <input type="checkbox" value="on">
                            Style with TailwindCSS
                        </li>
                    </ul>
                </div>
                <!--
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Quizzes
                    </h3>
                    <ul>
                        <li><input type="checkbox" checked="" value="on"> <a href="#">1: The basic rules of HTML</a></li>
                        <li><input type="checkbox" checked="" value="on"> <a href="#">2: Lists and tables</a></li>
                        <li><input type="checkbox" checked="" value="on"> <a href="#">3: Images, iframes, etc.</a></li>
                        <li><input type="checkbox" value="on"> <a href="#">4: Basic CSS syntax</a></li>
                        <li><input type="checkbox" value="on"> <a href="#">5: Styling global elements</a></li>
                        <li><input type="checkbox" value="on"> <a href="#">6: Simple CSS inheritance</a></li>
                        <li><input type="checkbox" value="on"> <a href="#">7: Media queries</a></li>
                        <li><input type="checkbox" value="on"> <a href="#">8: Etc.</a></li>
                        <br>BONUS:
                        <li><input type="checkbox" value="on"> <a href="#">B1: Tailwind positioning basics</a></li>
                    </ul>
                </div>
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Exercises
                    </h3>
                    <ul>
                        <li><input type="checkbox" value="on"> <a href="#">1. Build a basic HTML page with a table</a></li>
                        <li><input type="checkbox" value="on"> <a href="#">2. Style a sample page with CSS</a></li>
                        <br>BONUS:
                        <li><input type="checkbox" value="on"> <a href="#">B1. Style a sample page with TailwindCSS</a></li>
                    </ul>
                </div>
            -->
            </div>

            <h3 class="font-bold text-2xl mb-2 mt-6">
                Free resources
            </h3>

            @php
            $freeResources = $resources->where('is_free', true);
            $paidResources = $resources->where('is_free', false);
            @endphp

            <div class="flex">
                <div class="flex-1 w-auto p-4 border rounded mr-2">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Videos/courses
                    </h3>
                    <ul>
                        @forelse ($freeResources->whereIn('type', ['video', 'course'])->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse
                        <br>BONUS @todo:
                        <li>
                            <input type="checkbox" value="on">
                            <a href="#">Some great Tailwind intro</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Articles &amp; audio
                    </h3>
                    <ul>
                        @forelse ($freeResources->whereIn('type', ['article', 'audio'])->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse
                        <br>BONUS @todo:
                        <li><input type="checkbox" value="on"> <a href="#">Podcast episode about utility CSS</a></li>
                    </ul>
                </div>
            </div>

            <h3 class="font-bold text-2xl mb-2 mt-6">
                Paid resources
            </h3>

            <div class="flex">
                <div class="flex-1 w-auto p-4 border rounded mr-2">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Videos/courses
                    </h3>
                    <ul>
                        @forelse ($paidResources->whereIn('type', ['video', 'course'])->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse
                        <br>BONUS @todo:
                        <li>
                            <input type="checkbox" value="on">
                            <a href="#">Some great paid Tailwind intro</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1  w-auto  ml-2 rounded border p-4">
                    <h3 class="font-bold text-lg border-b mb-3">
                        Books
                    </h3>
                    <ul>
                        @forelse ($paidResources->whereIn('type', ['book'])->all() as $resource)
                            @include('partials.resource-on-module-page')
                        @empty
                            <li>No resources</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection