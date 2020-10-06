<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">{{__('home-master.Laravel')}}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">{{__('home-master.Home')}}
              <span class="sr-only">(current)</span>
            </a>
          </li>
          @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">{{__('home-master.Admin')}}</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login">{{__('home-master.Login')}}</a>
          </li>

          @endif
         
          <li class="nav-item">
            <a class="nav-link" href="#">{{__('home-master.About')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{__('home-master.Services')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{__('home-master.Contact')}}</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="showcase">
			<div class="video-container">
				<video src="{{asset('vendor/video/output1080.webm')}}" type="video/webm" autoplay muted loop></video>
			</div>
			<div class="content">
				<h1>Shoot For The Stars</h1>
				<h4>Don’t limit yourself. Many people limit themselves to what they think they can do. You can go as far as your mind lets you. What you believe, remember, you can achieve</h4>
			</div>
		</section>
	
  



   <!-- Footer
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Laravel</span>
          </div>
        </div>
      </footer> -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
