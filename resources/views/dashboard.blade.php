@if(auth()->user()->currentTeam->name == 'Admin')
    <x-app-layout>

        <ul class="list-group">
            <li class="list-group-item">
                <span style="padding-left: 25vw"><strong>Dashboard</strong></span> <br>
                <span style="padding-left: 25vw">Here you can manage your orders!</span>
            </li>

        </ul>

        <div class="py-12 fade-in">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(!empty($message))
                    <div class="alert alert-success"> {{ $message }}</div>
                @endif
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Orders:
                            <span class="badge badge-primary badge-pill">{{count($orders)}}</span>
                        </li>

                    @foreach($orders as $order)
                    <div id="accordion">
                        <div id="heading{{$loop->index}}">
                            <button style="outline: none" class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" data-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                <span>{{date( "d.m.Y H:i", strtotime( $order->created_at ) )}}</span>
                                <span>{{$order->order_id}}</span>
                                <span style="float: right">Total: {{$order->total}}€</span>
                            </button>
                        </div>
                        <div id="collapse{{$loop->index}}" class="collapse hide" aria-labelledby="heading{{$loop->index}}" data-parent="#accordion">
                            <div class="card-body">

                                <div style="display: inline-block">
                                    <span>Order Nr.:</span>
                                    <br>
                                    <span>Order Date:</span>
                                    <br>
                                </div>

                                <div style="display: inline-block; padding-left: 20px">
                                    <span><a href="https://www.sandbox.paypal.com/activity/payment/{{$order->order_id}}">{{$order->order_id}}</a></span>
                                    <br>
                                    <span>{{date( "d.m.Y H:i:s", strtotime( $order->created_at ) )}}</span>
                                    <br>
                                </div>


                                <div style="float: right; display: inline-block">
                                    @foreach(unserialize($order->items) as $item)
                                        <span>{{$item['qty']}}kg</span>
                                        <br>
                                        <span>{{$item['item']['title']}} {{$item['item']['subtitle']}}</span>
                                        <br>
                                        <span>{{ $item['price'] / $item['qty'] }}€</span>
                                        <br>
                                        <br>
                                    @endforeach
                                    <span><strong>{{$order->total}}€</strong></span>
                                    <br>
                                </div>

                                <div style="float: right; padding-right: 20px; display: inline-block;padding-bottom: 20px">
                                    @foreach(unserialize($order->items) as $item)
                                    <span>Amount:</span>
                                    <br>
                                    <span>Item:</span>
                                    <br>
                                    <span>Item Price:</span>
                                    <br>
                                    <br>
                                    @endforeach
                                    <span><strong>Total Price:</strong></span>
                                    <br>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach


                    </ul>
                </div>
            </div>
        </div>

    </x-app-layout>
@else
    <x-app-layout>
        <ul class="list-group">
            <li class="list-group-item">
                <span style="padding-left: 25vw"><strong>Dashboard</strong></span> <br>
                <span style="padding-left: 25vw">Here you can see your orders!</span>
            </li>

        </ul>

    <div class="py-12 fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!empty($message))
                <div class="alert alert-success"> {{ $message }}</div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Your Orders:
                        <span class="badge badge-primary badge-pill">{{count($userOrders)}}</span>
                    </li>
                    @foreach($userOrders as $order)
                    <div id="accordion">
                        <div id="heading{{$loop->index}}">
                            <button style="outline: none" class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" data-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                <span>{{date( "d.m.Y H:i", strtotime( $order->created_at ) )}}</span>
                                <span>{{$order->order_id}}</span>
                                <span style="float: right">Total: {{$order->total}}€</span>
                            </button>
                        </div>
                        <div id="collapse{{$loop->index}}" class="collapse hide" aria-labelledby="heading{{$loop->index}}" data-parent="#accordion">
                            <div class="card-body">

                                    <div style="display: inline-block">
                                        <span>Order Nr.:</span>
                                        <br>
                                        <span>Order Date:</span>
                                        <br>
                                    </div>

                                    <div style="display: inline-block; padding-left: 20px">
                                        <span>{{$order->order_id}}</span>
                                        <br>
                                        <span>{{$order->created_at}}</span>
                                        <br>
                                    </div>

                                    <div style="float: right; display: inline-block">
                                    @foreach(unserialize($order->items) as $item)
                                        <span>{{$item['qty']}}kg</span>
                                        <br>
                                        <span>{{$item['item']['title']}} {{$item['item']['subtitle']}}</span>
                                        <br>
                                        <span>{{ $item['price'] / $item['qty'] }}€</span>
                                        <br>
                                        <br>
                                    @endforeach
                                        <span><strong>{{$order->total}}€</strong></span>
                                        <br>
                                    </div>

                                    <div style="float: right; padding-right: 20px; display: inline-block;padding-bottom: 20px">
                                        @foreach(unserialize($order->items) as $item)
                                        <span>Amount:</span>
                                        <br>
                                        <span>Item:</span>
                                        <br>
                                        <span>Item Price:</span>
                                        <br>
                                        <br>
                                        @endforeach
                                        <span><strong>Total Price:</strong></span>
                                        <br>
                                    </div>

                            </div>
                        </div>
                    </div>
                        @endforeach



                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
@endif
