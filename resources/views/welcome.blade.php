
<!DOCTYPE HTML>
<html>
<head>
<title>login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="login" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('dashboard/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('dashboard/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- jQuery -->
<script src="{{asset('dashboard/js/jquery.min.js')}}"></script>

<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="/"><img src="{{asset('dashboard/images/log01.png')}}" alt=""/></a>
  </div>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
      <form method="post" action="{{ url('/login') }}">
      {{csrf_field()}}
        <input type="text" class="text" name="email" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}">
        <input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
        <div class="submit"><input type="submit" onclick="myFunction()" value="Login"></div>
        
        
    </form>
  </div>
   <div class="copy_layout login">
      <p>Copyright &copy; 2018 Travel. Alls Rights Reserved | Design by <a href="www.netroxtech.com" target="_blank">Netrox Tech</a> </p>
   </div>
</body>
</html>

