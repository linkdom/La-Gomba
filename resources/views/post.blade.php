@extends('layouts.standard')

@section('content')

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-white py-16 sm:py-24 sm:mt-20">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
            <div class="hidden" id="ultimateHackPlsDontJudge">

                <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
                    <!-- Content area -->
                    <div class="pt-12 sm:pt-16 lg:pt-20">
                        <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                            {{$post->title}}
                        </h2>
                        <div class="mt-6 text-gray-500 space-y-6">
                            <p class="text-lg">
                                {{ $post->paragraph }}
                            </p>

                        </div>
                    </div>
                </div>

            </div>
            <div class="relative sm:py-16 lg:py-0">
                <div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
                    <div class="absolute inset-y-0 right-1/2 w-full bg-gray-100 rounded-r-3xl lg:right-72"></div>
                    <svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" width="404" height="392" fill="none" viewBox="0 0 404 392">
                        <defs>
                            <pattern id="02f20b47-fd69-4224-a62a-4c9de5c763f7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="392" fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)" />
                    </svg>
                </div>
                <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
                    <!-- Testimonial card-->
                     @if(!empty($post->embeds))
                        @foreach($post->embeds as $embed)
                            <div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
                                <iframe class="absolute inset-0 h-full w-full object-cover rounded-md" src="{{$embed->url}}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                </iframe>
                            </div>
                            <br>
                        @endforeach
                    @endif

                    @if(!empty($post->images))
                        @foreach($post->images as $image)
                            <div class="relative">
                                <div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
                                    <img class="absolute inset-0 h-full w-full object-cover rounded-md" src="{{$image->url}}" alt="">
                                </div>
                                <div style="right: -15vw" class="sm:relative lg:absolute lg:top-0 lg:w-40">
                                    <div class="mt-6 text-gray-500 space-y-6">
                                        <p class="text-lg lg:w-96">
                                            {{$image->text}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <br>
                        @endforeach
                    @endif
                    <br>

                </div>
            </div>

            <div id="please" class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
                <!-- Content area -->
                <div class="pt-12 sm:pt-16 lg:pt-20">
                    <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                        {{$post->title}}
                    </h2>
                    <div class="mt-6 text-gray-500 space-y-6">
                        <p class="text-lg">
                            {{ $post->paragraph }}
                        </p>

                    </div>
                </div>
            </div>


        </div>
    </div>

@include('inc.footer')

    <script>
        if(screen.width < 600) {
            document.getElementById('ultimateHackPlsDontJudge').classList.remove('hidden');
            document.getElementById('please').classList.add('hidden');
        }

    </script>

@endsection
