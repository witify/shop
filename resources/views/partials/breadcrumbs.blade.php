@if (count($breadcrumbs))

    <nav class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li>
                    <a href="{{ $breadcrumb->url }}" class="breadcrumb__link">{{ $breadcrumb->title }}</a>
                </li>
            @else
                <li class="is-active">
                    <a href="#">{{ $breadcrumb->title }}</a>
                </li>
            @endif

        @endforeach
    </nav>

@endif