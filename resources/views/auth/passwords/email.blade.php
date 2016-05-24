<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login/Sign-In</title>

    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  </head>

  <body>

  @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="logmod">
  <div class="logmod__wrapper">
    <div class="logmod__container">
      <ul class="logmod__tabs reset_password">
        <li data-tabtar="lgm-1">Send Reset Link</li>
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
        <div class="logmod__form">
          <form accept-charset="utf-8" role="form" method="POST" action="{{ url('/password/email') }}" class="simform">
          {!! csrf_field() !!}
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="email">Email*</label>
                <input class="string optional" maxlength="255" id="email" name="email" placeholder="Email" type="email" size="50" />
              </div>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="simform__actions">
              <button class="sumbit" type="sumbit">Send Password Reset Link</button>
            </div>
          </form>
        </div>

      </div>
      </div>
    </div>
  </div>
</div>

  <script src="/js/jquery.js"></script>

  <script src="{{ asset('js/index.js') }}"></script>




  </body>
</html>
