<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login/Sign-In</title>

    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  </head>

  <body>

    <div class="logmod">

  <div class="logmod__wrapper">
    <div class="logmod__container">
      <ul class="logmod__tabs reset_password">
        <li data-tabtar="lgm-1">Sign Up</li>
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
        <div class="logmod__form">
          <form accept-charset="utf-8" role="form" method="POST" action="{{ url('/register') }}" class="simform">
          {!! csrf_field() !!}
          <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="name">Name*</label>
                <input class="string optional" maxlength="255" value="{{ $user->getName() }}" id="name" name="name" placeholder="Name" type="text" size="50" />
              </div>
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="email">Email*</label>
                <input class="string optional" maxlength="255" value="{{ $user->getEmail() }}" id="email" name="email" placeholder="Email" type="email" size="50" />
              </div>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="sminputs">
              <div class="input string optional">
                <label class="string optional" for="password">Password *</label>
                <input class="string optional" maxlength="255" id="password" name="password" placeholder="Password" type="password" size="50" />
              </div>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
              <div class="input string optional">
                <label class="string optional" for="user-pw-repeat">Repeat password *</label>
                <input class="string optional" maxlength="255" id="user-pw-repeat" name="password_confirmation" placeholder="Repeat password" type="password" size="50" />
              </div>
              @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            </div>
            <div class="simform__actions">
              <button class="sumbit" type="sumbit">Create Account</button>
              <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
            </div>
          </form>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>

  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script src="{{ asset('js/index.js')}}"></script>




  </body>
</html>
