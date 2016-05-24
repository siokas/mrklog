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
        <li data-tabtar="lgm-1">Enter Pin to edit the post</li>
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
        <div class="logmod__form">
          <form accept-charset="utf-8" role="form" method="POST" action="/posts/{{ $id }}/edit" class="simform">
          {!! csrf_field() !!}
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="pin">Enter your pin*</label>
                <input class="string optional" maxlength="255" id="pin" name="pin" placeholder="pin" type="pin" size="50" />
              </div>
            </div>
            <div class="simform__actions">
              <button class="sumbit" type="sumbit">Submit</button>
            </div>
          </form>
        </div>

      </div>
      </div>
    </div>
  </div>
</div>

  @include('imports.js')

  <script src="{{ asset('js/index.js') }}"></script>




  </body>
</html>
