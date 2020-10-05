<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <span style="padding-left: 25vw"><strong>Edit Stock</strong></span> <br>
            <span style="padding-left: 25vw">Here you can edit a stock!</span>
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
                <form class="p-6" action="{{route('admin.stocks.update', ['id' => $stock->id])}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Product</span>
                        </div>
                        <select name="product" class="form-control" id="exampleFormControlSelect1" disabled>
                            <option value="{{$product->id}}" disabled selected>{{$product->title}} {{$product->subtitle}}</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
                        </div>
                        <input type="number" name="amount" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$stock->amount}}">
                    </div>

                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>