<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/stocks/create"><span style="float: right" class="btn btn-success mt-1">Add Stock</span></a>
            <span style="padding-left: 25vw"><strong>Stock</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your stock!</span>
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
                            <strong>Stocks:</strong>
                        </li>
                    @foreach($products as $product)
                        @if(!empty($product->stockAmount))
                            <a href="/admin/stocks/edit/{{$product->stockAmount->id}}" class="list-group-item list-group-item-action">
                                <span>{{$product->id}}</span>
                                <span><strong>{{$product->title}} </strong></span>
                                <span>{{$product->subtitle}}</span>
                                <span style="padding-left: 50px;"><strong>{{$product->stockAmount->amount}} kg</strong></span>

                                <form style="display: inline-block; float: right;" action="{{route('admin.stocks.delete', ['id' => $product->stockAmount->id])}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button style="padding-top: 0px; padding-bottom: 0px;" class="btn btn-danger">x</button>
                                </form>

                            </a>
                        @else
                            <a href="/admin/stocks/create" class="list-group-item list-group-item-action">
                                <span>{{$product->id}}</span>
                                <span><strong>{{$product->title}} </strong></span>
                                <span>{{$product->subtitle}}</span>
                                <span style="padding-left: 110px;"><strong>No Stock Entry!</strong></span>
                            </a>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>