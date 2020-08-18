<div class="card shadow bg-white rounded">
    <div class="card-body text-secondary">
        <h5 class="text-secondary text-center">标签</h5>
        <hr>
        <div>
            @foreach ($labels as $label)
                @if ($label->topics->count() > 0)
                <a type="button" href="{{ route('labels.show', $label->id) }}" class="badge badge-light shadow-sm shadow bg-white rounded text-secondary" style="font-size: 0.9em">
                  {{ $label->name }} <span class="text-secondary">{{ $label->topics->count() }}</span>
                  {{-- <span class="sr-only">unread messages</span> --}}
                </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
