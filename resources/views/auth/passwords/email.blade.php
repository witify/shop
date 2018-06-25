@extends ('master')

@section('content')

<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container is-tiny">
            <h1 class="title">Reset password</h1>

            <div class="box">
                @if (session('status'))
                    <div class="notification is-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
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
                        <button type="submit" class="button is-primary is-fluid">Send Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
