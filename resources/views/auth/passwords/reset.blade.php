@extends ('master')

@section('content')

<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container is-tiny">
            <h1 class="title">Reset password</h1>

            <div class="box">            
                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

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
                        <label for="password_confirmation" class="label">Password confirmation</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                            <b-icon icon="lock"></b-icon>
                        </div>
                        @if ($errors->has('password_confirmation')) 
                            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <button type="submit" class="button is-primary is-fluid">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
