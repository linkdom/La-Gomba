<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/posts/create"><span style="float: right" class="btn btn-success mt-1">Create Post</span></a>
            <span style="padding-left: 25vw"><strong>Blog</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your blog posts!</span>
        </li>

    </ul>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!empty($message))
                <div class="alert alert-success"> {{ $message }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list mt-0">
                <div class="list-group">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Posts:</strong>
                        </li>
                    @foreach($posts as $post)
                        <a href="/admin/posts/edit/{{$post->id}}" class="list-group-item list-group-item-action">
                            <span>{{$post->id}}</span>
                            <span><strong>{{$post->title}}</strong></span>
                            <span>{{$post->subtitle}}</span>
                            <span style="float: right">{{$post->created_at}}</span>
                        </a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>