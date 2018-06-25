<!-- Title -->
<title>
    {{ config('app.name', 'Laravel') }} 
    @if(isset($seo) && array_key_exists('title', $seo))
     - {{ $seo['title'] }} 
    @endif
</title>

@if(isset($seo) && array_key_exists('title', $seo))
<meta name="twitter:title" content="{{ config('app.name', 'Laravel') }} - {{ $seo['title'] }}">
@endif

<!-- meta description -->
@if(isset($seo) && array_key_exists('description', $seo))
<meta name="description" content="{{ $seo['description'] }}" />
@endif

<!-- rel canonical -->
@if(isset($seo) && array_key_exists('rel_canonical', $seo))
<link rel="canonical" href="{{ $seo['rel_canonical'] }}" />
@endif

<!-- Twitter -->

<meta name="twitter:card" content="summary">

@if(isset($seo) && array_key_exists('twitter_site', $seo))
<meta name="twitter:site" content="@{{ $seo['twitter_account'] }}">
@endif

@if(isset($seo) && array_key_exists('twitter_creator', $seo))
<meta name="twitter:creator" content="@{{ $seo['twitter_account'] }}">
@endif

@if(isset($seo) && array_key_exists('description', $seo))
<meta name="twitter:description" content="{{ $seo['description'] }}">
@endif

<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:image" content="{{ url()->current() }}/img/logo.png">

<!-- End of Twitter -->

<!-- Open Graph -->

<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ url()->current() }}/img/logo.png">

@if(isset($seo) && array_key_exists('title', $seo))
<meta property="og:title" content="{{ $seo['title'] }}">
@endif

@if(isset($seo) && array_key_exists('description', $seo))
<meta property="og:description" content="{{ $seo['title'] }}">
@endif

<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:locale" content="{{ app()->getLocale() }}">

<!-- End of open graph -->
