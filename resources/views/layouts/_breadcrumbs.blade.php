@if (count($breadcrumbs))

    <ol class="breadcrumb breadcrumb-alternate" aria-label="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>

@endif
