<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Final Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>

  .nav{
    margin-bottom: 10px;
  }
  .clients{
    margin: 0px 10px 0px;
    background-color: rgb(166, 166, 243);
    padding: 20px;
    
    
  }
  .clients .card{
    background-color: rgba(166, 166, 243, 0.664);

  }
</style>
  </head>
<body>
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar w/ text</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <span class="">

              @if (Route::has('login'))
              <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                  @auth
                      <a href="{{ url('/home') }}" class="btn btn-info" type="button">الرئيسيه</a>
                  @else
                      <a href="{{ route('login') }}" class="btn btn-info" type="button">دخول</a>
                  @endauth
              </div>
          @endif
            </span>
          </div>
        </div>
      </nav>

      <div class="row">
        <div class="clients">
          <div class="card" style="width: 18rem; float: right;">
            <div class="card-body">
              <div class="row" style="margin-bottom: 10px">
                <a type="button" href="{{ route('new-card')}}" class="btn btn-secondary">إضغط هنا لطلب بطاقة تأمين</a>
              </div>
              <div class="row">
                <a type="button" href="{{ route('update-card')}}"  class="btn btn-secondary">إضغط هنا لتجديد البطاقه</a>
              </div>

            </div>
          </div>

          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <div class="row" style="margin-bottom: 10px">
                <a type="button" href="{{ route('expire-card-view')}}" class="btn btn-secondary">إنتهاء صلاحية البطاقه</a>
              </div>
              <div class="row">
                <a type="button" href="{{ route('lose-card-view')}}"  class="btn btn-secondary">فقدان البطاقه</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>