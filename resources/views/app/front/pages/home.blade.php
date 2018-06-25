@extends ('app.front.layout')

@section('body')

<div class="page-home">

  <section class="hero is-fullheight has-text-centered">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">{{ $page->present()->section('title') }}</h1>
        <h2 class="subtitle">Sprintify is a Laravel boilerplate to boost your development time.</h2>
      </div>
    </div>
  </section>

</div>

@endsection
