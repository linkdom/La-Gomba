@if(auth()->user()->currentTeam->name == 'Admin')
    <x-app-layout>

        <ul class="list-group">
            <li class="list-group-item">
                <span style="padding-left: 25vw"><strong>Dashboard</strong></span> <br>
                <span style="padding-left: 25vw">Here you can manage your orders!</span>
            </li>

        </ul>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Orders:
                        </li>
                    <div id="accordion">
                        <div id="headingOne">
                            <button style="outline: none" class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span>12 kg</span>
                                <span>Oyster Mushrooms</span>
                                <span>Quality B</span>
                                <span style="float: right">Total: 184€</span>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                <div style="display: inline-block">
                                    <span>Order Nr.:</span>
                                    <br>
                                    <span>Order Date:</span>
                                    <br>
                                </div>

                                <div style="display: inline-block; padding-left: 20px">
                                    <span> 3jkefiuh7dfjksfd</span>
                                    <br>
                                    <span>2020-10-30 15:32:19</span>
                                    <br>
                                </div>


                                <div style="float: right; display: inline-block">
                                    <span>12kg</span>
                                    <br>
                                    <span>Oyster Mushroom Quality B</span>
                                    <br>
                                    <span>16€</span>
                                    <br>
                                    <br>
                                    <span><strong>184€</strong></span>
                                    <br>
                                </div>

                                <div style="float: right; padding-right: 20px; display: inline-block;padding-bottom: 20px">
                                    <span>Amount:</span>
                                    <br>
                                    <span>Item:</span>
                                    <br>
                                    <span>Item Price:</span>
                                    <br>
                                    <br>
                                    <span><strong>Total Price:</strong></span>
                                    <br>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="accordion">
                        <div id="headingOne">
                            <button style="outline: none" class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span>1 kg</span>
                                <span>Oyster Mushrooms</span>
                                <span>Quality A</span>
                                <span style="float: right">Total: 19€</span>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                <div style="display: inline-block">
                                    <span>Order Nr.:</span>
                                    <br>
                                    <span>Order Date:</span>
                                    <br>
                                </div>

                                <div style="display: inline-block; padding-left: 20px">
                                    <span> 3jkefiuh7dfjksfd</span>
                                    <br>
                                    <span>2020-10-30 15:32:19</span>
                                    <br>
                                </div>


                                <div style="float: right; display: inline-block">
                                    <span>1kg</span>
                                    <br>
                                    <span>Oyster Mushroom Quality A</span>
                                    <br>
                                    <span>19€</span>
                                    <br>
                                    <br>
                                    <span><strong>19€</strong></span>
                                    <br>
                                </div>

                                <div style="float: right; padding-right: 20px; display: inline-block;padding-bottom: 20px">
                                    <span>Amount:</span>
                                    <br>
                                    <span>Item:</span>
                                    <br>
                                    <span>Item Price:</span>
                                    <br>
                                    <br>
                                    <span><strong>Total Price:</strong></span>
                                    <br>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div id="accordion">
                        <div id="headingOne">
                            <button style="outline: none" class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span>2 kg</span>
                                <span>Lion's Mane</span>
                                <span>Quality A</span>
                                <span style="float: right">Total: 52€</span>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                <div style="display: inline-block">
                                    <span>Order Nr.:</span>
                                    <br>
                                    <span>Order Date:</span>
                                    <br>
                                </div>

                                <div style="display: inline-block; padding-left: 20px">
                                    <span> 3jkefiuh7dfjksfd</span>
                                    <br>
                                    <span>2020-10-30 15:32:19</span>
                                    <br>
                                </div>


                                <div style="float: right; display: inline-block">
                                    <span>2kg</span>
                                    <br>
                                    <span>Lion's Mane</span>
                                    <br>
                                    <span>26€</span>
                                    <br>
                                    <br>
                                    <span><strong>52€</strong></span>
                                    <br>
                                </div>

                                <div style="float: right; padding-right: 20px; display: inline-block;padding-bottom: 20px">
                                    <span>Amount:</span>
                                    <br>
                                    <span>Item:</span>
                                    <br>
                                    <span>Item Price:</span>
                                    <br>
                                    <br>
                                    <span><strong>Total Price:</strong></span>
                                    <br>
                                </div>

                            </div>
                        </div>
                    </div>
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg orders-list">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Your Orders:
                        <span class="badge badge-primary badge-pill">1</span>
                    </li>
                    <div id="accordion">
                        <div id="headingOne">
                            <button style="outline: none" class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span>3 kg</span>
                                <span>Oyster Mushrooms</span>
                                <span>Quality A</span>
                                <span style="float: right">Total: 57€</span>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                    <div style="display: inline-block">
                                        <span>Order Nr.:</span>
                                        <br>
                                        <span>Order Date:</span>
                                        <br>
                                    </div>

                                    <div style="display: inline-block; padding-left: 20px">
                                        <span> 3jkefiuh7dfjksfd</span>
                                        <br>
                                        <span>2020-10-30 15:32:19</span>
                                        <br>
                                    </div>


                                    <div style="float: right; display: inline-block">
                                        <span>3kg</span>
                                        <br>
                                        <span>Oyster Mushroom Quality A</span>
                                        <br>
                                        <span>19€</span>
                                        <br>
                                        <br>
                                        <span><strong>57€</strong></span>
                                        <br>
                                    </div>

                                    <div style="float: right; padding-right: 20px; display: inline-block;padding-bottom: 20px">
                                        <span>Amount:</span>
                                        <br>
                                        <span>Item:</span>
                                        <br>
                                        <span>Item Price:</span>
                                        <br>
                                        <br>
                                        <span><strong>Total Price:</strong></span>
                                        <br>
                                    </div>

                            </div>
                        </div>
                    </div>



                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
@endif
