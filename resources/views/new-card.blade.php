<!DOCTYPE html>
<html lang="en" dir="rtl">
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
  .clients-form{
    border: 1px solid #333;
width: 30%;
border-radius: 30px;
position: relative;
top: 5%;
right: 40%;
padding: 20px;
background: #a4c0df;
    
  }
  .clients .card{
    background-color: rgba(166, 166, 243, 0.664);

  }
  .btn-content{
    margin-top: 20px;

  }

  .btn-content a{
    color: aliceblue;
    text-decoration: none;
  }
</style>
  </head>
<body>
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">الشركة التعاونيه للتأمين</a>
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

      @if (session()->has('message'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="row">
        
          <div class="row">
            <div class="clients-form">
            <form action="{{ route('store-card') }}" method="POST" enctype="multipart/form-data">
              @csrf
              {{ method_field('post') }}
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>الإسم رباعي</label>
                          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                          @error('name')
                            <div class="alert-danger bg-maroon" style="font-size: 13px;
                            font-weight: normal; color:#f03">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                        <label>العنوان</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        @error('address')
                        <div class="alert-danger bg-maroon" style="font-size: 13px;
                        font-weight: normal; color:#f03">{{ $message }}</div>
                      @enderror
                    </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <label>تاريخ الميلاد</label>
                      <input type="date" name="berth_date" class="form-control" value="{{ old('berth_date') }}">
                      @error('berth_date')
                      <div class="alert-danger bg-maroon" style="font-size: 13px;
                      font-weight: normal; color:#f03">{{ $message }}</div>
                    @enderror
                  </div>
              </div>

            <div class="col-md-12">
              <label>نوع التأمين</label>
                <select class="form-select"  name="type_scur">
                  <option selected disabled>نوع التأمين</option>
                  <option value="تأمين صحي">تأمين طبي</option>
                  <option value="تأمين سيارات">تأمين سيارات</option>
                </select>
          </div>


            <div class="col-md-12">
              <div class="form-group">
                  <label>جهة العمل</label>
                  <input type="text" name="dir_work" class="form-control" value="{{ old('dir_work') }}">
                  @error('dir_work')
                  <div class="alert-danger bg-maroon" style="font-size: 13px;
                  font-weight: normal; color:#f03">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
                <label>رقم الهاتف</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone')
                <div class="alert-danger bg-maroon" style="font-size: 13px;
                font-weight: normal; color:#f03">{{ $message }}</div>
              @enderror
            </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
          <label for="formFileDisabled" class="form-label">الصوره الشخصيه</label>
          <input class="form-control" type="file" id="formFile" name="imag">
        </div>
        </div>

        

              </div>

              <div class="row">
                <div class="form-group btn-content">
                  <button type="submit" class="btn btn-info">إرسال</button>
                  <button class="btn btn-primary"><a href="{{ route('welcome') }}">رجوع</a></button>
              </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>