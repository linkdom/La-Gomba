<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <span style="padding-left: 25vw"><strong>Add Stock</strong></span> <br>
            <span style="padding-left: 25vw">Here you can add a stock to your product!</span>
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list mt-0">
                <form class="p-6" action="{{route('admin.stocks.store')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Product</span>
                        </div>
                        <select name="product" class="form-control" id="exampleFormControlSelect1">

                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->title}} {{$product->subtitle}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
                        </div>
                        <input type="number" name="amount" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>