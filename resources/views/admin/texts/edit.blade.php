<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <span style="padding-left: 25vw"><strong>Edit Header Text</strong></span> <br>
            <span style="padding-left: 25vw">Here you can edit your header text!</span>
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
                <form class="p-6" action="{{route('admin.texts.update', ['id' => $text->id])}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        </div>
                        <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$text->title}}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Subtitle</span>
                        </div>
                        <textarea name="subtitle" class="form-control" aria-label="With textarea" rows="10">{{$text->subtitle}}</textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Status</span>
                        </div>
                        <div class="border">
                            <label style="margin-top: 10px; margin-left: 20px;" class="switch">
                                <input id="status" name="status" type="checkbox" @if(!empty($text->status)) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>

                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>