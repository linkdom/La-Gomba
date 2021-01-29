<x-app-layout>

    <ul class="list-group">
        <li class="list-group-item">
            <span style="padding-left: 25vw"><strong>Header Texts</strong></span> <br>
            <span style="padding-left: 25vw">Here you can manage your header texts!</span>
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
                            <strong>Header Texts:</strong>
                        </li>
                    @foreach($texts as $text)
                        <a href="/admin/texts/edit/{{$text->id}}" class="list-group-item list-group-item-action">
                            <p style="width: 100ch; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; display: inline-block">{{$text->id}} {{$text->slug}} <strong>{{$text->title}}</strong> {{date('d.m.Y', strtotime($text->created_at))}}</p>
                        </a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>