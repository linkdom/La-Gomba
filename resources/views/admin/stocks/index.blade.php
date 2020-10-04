<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/stocks/create"><span style="float: right" class="btn btn-success mt-1">Add Stock</span></a>
            <span style="padding-left: 25vw"><strong>Stock</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your stock!</span>
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
                            <strong>Stocks:</strong>
                        </li>
                    @foreach($products as $product)
                        <a href="/admin/stocks/edit/{{$product->id}}" class="list-group-item list-group-item-action">
                            <span>{{$product->id}}</span>
                            <span>{{$product->title}}</span>
                            <span>{{$product->subtitle}}</span>
                            <span style="float: right">12kg</span>
                        </a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>