<!DOCTYPE html>
<html lang="en" dir="ltr">
<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(120deg, #2980b9, #8e44ad);
  }

  .wrapper {
    position: relative;
    max-width: 430px;
    width: 100%;
    background: #fff;
    padding: 34px;
    border-radius: 6px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }

  .wrapper h2 {
    position: relative;
    font-size: 22px;
    font-weight: 600;
    color: #333;
  }

  .wrapper h2::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 28px;
    border-radius: 12px;
    background: #4070f4;
  }

  .wrapper form {
    margin-top: 30px;
  }

  .wrapper form .input-box {
    height: 52px;
    margin: 18px 0;
  }

  form .input-box input {
    height: 100%;
    width: 100%;
    outline: none;
    padding: 0 15px;
    font-size: 17px;
    font-weight: 400;
    color: #333;
    border: 1.5px solid #C7BEBE;
    border-bottom-width: 2.5px;
    border-radius: 6px;
    transition: all 0.3s ease;
  }

  .input-box input:focus,
  .input-box input:valid {
    border-color: #4070f4;
  }

  form .policy {
    display: flex;
    align-items: center;
  }

  form h3 {
    color: #707070;
    font-size: 14px;
    font-weight: 500;
    margin-left: 10px;
  }

  .input-box.button input {
    color: #fff;
    letter-spacing: 1px;
    border: none;
    background: #4070f4;
    cursor: pointer;
  }

  .input-box.button input:hover {
    background: #0e4bf1;
  }

  form .text h3 {
    color: #333;
    width: 100%;
    text-align: center;
  }

  form .text h3 a {
    color: #4070f4;
    text-decoration: none;
  }

  form .text h3 a:hover {
    text-decoration: underline;
  }

  .spasi1 {
    margin-top: 25px;
    color: red;
  }

  .spasi2 {
    margin-top: 25px;
    color: red;
  }

  .spasi3 {
    margin-top: 25px;
    color: red;
  }
</style>

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf

      @if (session('error'))
      <div class="alert alert-danger" style="color:red;" role="alert">
        {{ session('error') }}
      </div>
      @endif
      <div class="spasi1">
      <div class="input-box">
        <input id="name" type="text" name="username" placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus autocomplete="name">
        @error('username')
        <div class="alert alert-danger my-3 col-sm-6" role="alert">
          {{ $message }}
        </div>
        @enderror
      </div>
      </div>
      <div class="spasi2">
      <div class="input-box">
        <input id="password" type="password" name="password" placeholder="Kata Sandi" name="password" autocomplete="new-password">
        @error('password')
        <div class="alert alert-danger my-3 col-sm-6" role="alert">
          {{ $message }}
        </div>
        @enderror
      </div>
      </div>
      <div class="spasi3">
      <div class="input-box button">
        <input type="submit" name="button" value="Kirim">
      </div>
      <div class="text">
        <!-- <h3>Daftarkan Akun Baru <a href="{{ route('register') }}">Siswa</a></h3> -->
        <h3>Masuk Sebagai Akun <a href="{{ route('guest') }}">Tamu</a></h3>
      </div>
      </div>
    </form>
  </div>
</body>
</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		$('form').submit(function(e) {
			e.preventDefault();
			var form = this;
			swal({
				title: "Berhasil Login",
				text: "Selamat Datang",
				icon: "success",
			}).then(function() {
				form.submit();
			});
		});
	});
</script>