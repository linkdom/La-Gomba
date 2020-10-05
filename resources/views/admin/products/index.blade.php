<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/products/create"><span style="float: right" class="btn btn-success mt-1">Create Product</span></a>
            <span style="padding-left: 25vw"><strong>Products</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your products!</span>
        </li>

    </ul>

    <div class="py-12 fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!empty($message))
                <div class="alert alert-success"> {{ $message }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list mt-0">
                <div class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Products:</strong>
                    </li>
                    @foreach($products as $product)
                        <a href="/admin/products/edit/{{$product->id}}" class="list-group-item list-group-item-action">
                            <span>{{$product->id}}</span>
                            <span>{{$product->title}}</span>
                            <span>{{$product->subtitle}}</span>
                            <span>{{$product->price}}€</span>
                            <form style="display: inline-block; float: right;" action="{{route('admin.products.delete', ['id' => $product->id])}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button style="padding-top: 0px; padding-bottom: 0px;" class="btn btn-danger">x</button>
                            </form>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</x-app-layout>