<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/posts/create"><span style="float: right" class="btn btn-success mt-1">Create Post</span></a>
            <span style="padding-left: 25vw"><strong>Blog</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your blog posts!</span>
        </li>

    </ul>

    <div class="py-12 fade-in">
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
                            <p style="width: 100ch; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; display: inline-block">{{$post->id}} <strong>{{$post->title}}</strong> {{date('d.m.Y', strtotime($post->created_at))}}</p>
                            <form style="display: inline-block; float: right;" action="{{route('admin.blog.delete', ['id' => $post->id])}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button style="padding-top: 0px; padding-bottom: 0px;" class="btn btn-danger">x</button>
                            </form>
                        </a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>