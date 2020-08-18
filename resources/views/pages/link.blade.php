<div class="card shadow bg-white rounded">
    <div class="card-body text-secondary">
        <h5 class="text-secondary text-center">友情链接</h5>
        <hr>
        <ul class="list-unstyled">
            {{-- {{ dd($links)}} --}}
            @foreach ($links as $link)
                <li class="mb-2 text-center">
                    <a href="{{ $link['url'] }}" style="color:#0366d6;" target="_bland">{{ $link['title'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
