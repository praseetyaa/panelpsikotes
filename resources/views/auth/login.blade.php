<!DOCTYPE HTML>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Rekruitmen | Promosi | Penjajakan Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://tes.spandiv.xyz/assets/css/style.css">
</head>
	
<body id="spandiv" class="bg-light">
	<header>
		<nav class="navbar navbar-expand-lg navbar-light py-2 fixed-top bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand mb-0" href="https://connectedness.id"><img src="https://tes.spandiv.xyz/assets/images/logo/connectedness-1.png" alt="logo connectedness"></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<div class="header-right ms-auto">
						<ul class="navbar-nav align-items-lg-center n-log">
							<li class="nav-item"><a class="nav-link" href="https://connectedness.id">Beranda</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<div style="height: 4.2em;"></div>
  <div id="content">
    <div id="navbar-main"></div>
    <div class="main-wrapper my-lg-2 my-3">
      <div class="container">
        <div class="row login-wrapper align-items-center justify-content-center">
          <div class="col-lg-5">
            <div class="wrapper d-flex align-items-center">
              <div class="card border-0 shadow-sm rounded-2">
                <div class="card-header text-center pt-4 bg-transparent mx-4">
                    <img width="200" class="mb-3" src="https://tes.spandiv.xyz/assets/images/logo/connectedness-1.png" alt="logo connectedness">
                    <h2>Selamat Datang HRD</h2>
                    <p class="m-0">Untuk tetap terhubung dengan kami, silakan login dengan informasi pribadi Anda melalui Username dan Password</p>
                </div>
                <div class="card-body">
                  <form class="login-form" action="{{ route('auth.login') }}" method="post">
                      {{ csrf_field() }}
                      @if($errors->has('message'))
                      <div class="alert alert-danger" role="alert">{{ $errors->first('message') }}</div>
                      @endif
                      <div class="form-group  mb-4">
                          <label class="control-label">Username / Email</label>
                          <div class="input-group">
                              <span class="input-group-text {{ $errors->has('username') ? 'border-danger' : '' }}"><i class="bi bi-person-fill"></i></span>
                              <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" type="text" placeholder="Username atau Email" autofocus>
                          </div>  
                          @if($errors->has('username'))
                          <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('username')) }}</div>
                          @endif
                      </div>
                      <div class="form-group mb-4">
                          <label class="control-label">Password</label>
                          <div class="input-group">
                              <span class="input-group-text {{ $errors->has('password') ? 'border-danger' : '' }}"><i class="bi bi-key-fill"></i></span>
                              <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" placeholder="Password">
                              <a href="#" class="input-group-text btn btn-light btn-toggle-password border {{ $errors->has('password') ? 'border-danger' : '' }}"><i class="bi bi-eye-fill"></i></a>
                          </div>
                          @if($errors->has('password'))
                          <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('password')) }}</div>
                          @endif
                      </div>
                      <div class="d-grid gap-2">
                          <button type="submit" class="btn btn-primary rounded px-4 btn-block">Masuk</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="footer-main"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  	<script>
// Button toggle password
$(document).on("click", ".btn-toggle-password", function(e){
    e.preventDefault();
    if(!$(this).hasClass("show")){
        $(this).parents(".input-group").find("input").attr("type","text");
        $(this).find(".bi").removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
        $(this).addClass("show");
    }
    else{
        $(this).parents(".input-group").find("input").attr("type","password");
        $(this).find(".bi").removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
        $(this).removeClass("show");
    }
});
	</script>
</body>

</html>
