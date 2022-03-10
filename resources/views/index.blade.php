<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ANCAPs</title>
  
   
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
 

</head>

<body>
    <div class="loginbox">
        <img src="{{asset('img/logo.png')}}" alt="" class="avatar">
        <h1>Login Here</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <p>Email:</p>
            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <p>Password:</p>
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a  href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            
        </form>
    </div>

</body>
</html>