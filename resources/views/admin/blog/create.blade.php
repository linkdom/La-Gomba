<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <span style="padding-left: 25vw"><strong>Create Post</strong></span> <br>
            <span style="padding-left: 25vw">Here you can create your blog posts!</span>
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list mt-0 fade-in">
                <form class="p-6" action="{{route('admin.blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        </div>
                        <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Subtitle</span>
                        </div>
                        <input type="text" name="subtitle" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea name="description" class="form-control" aria-label="With textarea" rows="10"></textarea>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
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