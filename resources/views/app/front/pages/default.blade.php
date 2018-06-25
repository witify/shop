@extends ('app.front.layout')

@section('body')

    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">{{ $page->title }}</h1>
            </div>
        </div>
    </section>

    @foreach ($page->present()->allSections as $section)
    <section class="section">
        <div class="container">
            <p>{!! $section->content !!}</p>
        </div>
    </section>
    @endforeach

@endsection

