@if($shop->has('categoryAncestry'))

<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        @foreach($shop['categoryAncestry'] as $category)
        <li><a href="{{ $category->url }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</nav>

@endif