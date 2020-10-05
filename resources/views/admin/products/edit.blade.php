<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <span style="padding-left: 25vw"><strong>Edit Product</strong></span> <br>
            <span style="padding-left: 25vw">Here you can edit your product!</span>
        </li>

    </ul>

    <div class="py-12 fade-in">
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
            <div style="margin-top: 0" class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list">
                <form class="p-6" action="{{route('admin.products.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        </div>
                        <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$product->title}}">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Subtitle</span>
                        </div>
                        <input type="text" name="subtitle" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$product->subtitle}}">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea name="description" class="form-control" aria-label="With textarea" rows="10" >{{$product->description}}</textarea>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                        </div>
                        <input type="number" name="price" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$product->price}}">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
                        </div>
                        <input name="image" type="file" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>