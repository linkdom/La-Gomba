<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/harvesting-periods/create"><span style="float: right" class="btn btn-success mt-1">Create Harvesting Period</span></a>
            <span style="padding-left: 25vw"><strong>Harvesting Periods</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your harvesting periods!</span>
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
                            <strong>Harvesting Periods:</strong>
                        </li>
                    @foreach($harvestingPeriods as $harvestingPeriod)
                        <a href="/admin/harvesting-period/edit/{{$harvestingPeriod->id}}" class="list-group-item list-group-item-action">
                            <span>{{$harvestingPeriod->product->title}} {{$harvestingPeriod->from}} - {{$harvestingPeriod->to}}</span>
                        </a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>