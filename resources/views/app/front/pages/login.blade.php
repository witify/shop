@extends ('app.front.layout')

@section('body')

<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container is-tiny">
            <h1 class="title is-3 has-text-centered">{{ $page->present()->section('title') }}</h1>
            <h1 class="subtitle is-5 has-text-centered">{{ $page->present()->section('subtitle') }}</h1>
            <div class="box">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="email" class="label">E-mail address</label>
                        <div class="control has-icons-left">
                            <input class="input" type="email" name="email" value="{{ old('email') }}" required>
                            <b-icon icon="email"></b-icon>
                        </div>
                        @if ($errors->has('email')) 
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" name="password" value="{{ old('password') }}" required>
                            <b-icon icon="lock"></b-icon>
                        </div>
                        @if ($errors->has('password')) 
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="checkbox">
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>

                    <div class="field has-text-centered">
                        <button type="submit" class="button is-primary is-fluid">Login</button>
                        <a class="has-text-grey" href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>

@endsection