<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/admin/harvesting-periods/create"><span style="float: right" class="btn btn-success mt-1">Create Harvesting Period</span></a>
            <span style="padding-left: 25vw"><strong>Harvesting Periods</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your harvesting periods!</span>
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
                            <strong>Harvesting Periods:</strong>
                        </li>
                    @foreach($harvestingPeriods as $harvestingPeriod)
                        <a href="/admin/harvesting-periods/edit/{{$harvestingPeriod->id}}" class="list-group-item list-group-item-action">
                            <span><strong>{{date('d.m.Y', strtotime($harvestingPeriod->from))}} - {{date('d.m.Y', strtotime($harvestingPeriod->to))}} </strong> {{$harvestingPeriod->product->title}} {{$harvestingPeriod->product->subtitle}}</span>
                        <form style="display: inline-block; float: right;" action="{{route('admin.harvestingPeriods.delete', ['id' => $harvestingPeriod->id])}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button style="padding-top: 0px; padding-bottom: 0px;" class="btn btn-danger">x</button>
                            </form>
                        </a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>