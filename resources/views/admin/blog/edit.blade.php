<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <span style="padding-left: 25vw"><strong>Edit Post</strong></span> <br>
            <span style="padding-left: 25vw">Here you can edit your blog post!</span>
        </li>

    </ul>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list mt-0 fade-in">
                <div class="px-6 pt-12">
                    <label for="images">
                        Images
                    </label>
                    <form method="POST" action="/posts/dropzone/{{ $post->id }}" class="dropzone w-full pb-20 h-32 border-2 border-dashed px-6">
                        @csrf

                    </form>
                </div>
                <br>
                <div class="px-6">
                    <label for="images">
                        Uploaded Images
                    </label>
                    <div class="w-full pb-20 h-32 border-2 border-dashed px-6 grid grid-cols-12">

                        @foreach($post->images as $image)
                            <div class="relative col-span-2">
                                <img class="h-24 mt-3" src="{{$image->url}}" alt="">
                                <form method="POST" action="{{ action('\App\Http\Controllers\AdminBlogController@destroyImage') }}">
                                    @csrf
                                    <input name="image" type="hidden" value="{{ $image->id }}">
                                    <button type="submit" class="absolute right-0 top-4 text-red-700 hover:text-red-900 bg-gray-100 rounded-md rounded-r-none" >
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>

                            </div>
                        @endforeach
                    </div>
                </div>
                @if(!empty($post->images))
                    @foreach($post->images as $image)
                        <form class="px-6 pt-4" method="POST" action="{{ action('\App\Http\Controllers\AdminBlogController@addImageText') }}">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Image {{ $loop->iteration }} Description</span>
                                </div>
                                <input name="image" type="hidden" value="{{ $image->id }}">
                                <textarea name="text" class="form-control" aria-label="With textarea" rows="10">{{$image->text}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success my-4">Save Text</button>
                        </form>
                    @endforeach

                @endif
                @if(!empty($post->embeds))
                <form class="px-6 pt-6" method="POST" action="{{ action('\App\Http\Controllers\AdminBlogController@destroyEmbed') }}">
                    @csrf
                    @foreach($post->embeds as $embed)
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Embed</span>
                            </div>
                            <input name="url" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{ $embed->url }}">
                            <input name="embed" type="hidden" value="{{ $embed->id }}">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-danger">Delete Link</button>
                        </div>
                    @endforeach
                </form>
                @endif
                <form class="px-6 pt-10" method="POST" action="/posts/embed/{{ $post->id }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Embed</span>
                        </div>
                        <input name="url" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success">Add Link</button>
                    </div>
                </form>
                <form class="p-6" action="{{route('admin.blog.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        </div>
                        <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$post->title}}">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Subtitle</span>
                        </div>
                        <input type="text" name="subtitle" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$post->subtitle}}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea name="description" class="form-control" aria-label="With textarea" rows="10">{{$post->paragraph}}</textarea>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title Image</span>
                        </div>
                        <input name="image" type="file" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>