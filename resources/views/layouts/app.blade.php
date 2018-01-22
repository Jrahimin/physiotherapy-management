<!DOCTYPE html>


<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <title>@yield('title')</title>

    <!-- Styles -->
	<link rel="icon" href="{{asset('myicon.ico')}}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
	<style>
		@font-face {
			font-family: bangla;
			src: url({{asset('bangla.ttf')}});
		}
		*{margin:0;padding:0;font-family:bangla;word-wrap: break-word;}
		select, option{text-align:center;}
		li a, .navbar-header a{font-family:bangla;font-size:1.5em;}
		.navbar-header{font-family:bangla;font-weight:bold;color:white;font-size:2em;padding-top:2px;}
		.navbar-header a{font-size:1.5em;font-weight:bold;}
		.banner{width:100%;height:auto;background:url({{asset('mybanner.jpg')}}) no-repeat;background-size:cover;background-position:right top;
		background-color:black;position:relative;}
		.bannerwrapper{width:100%; height:auto;}
		.mymenu{display:block;}
		body{width:100%;background:white;}
		tr, td{word-wrap: break-word;}
  #app{background:url({{asset('medibackground.jpg')}}) no-repeat;background-size:cover;background-position:fixed;bmargin-top:-10px;min-height:1200px;height:auto;
  position:relative;top:-20px;}
  .container{width:90%;min-height:500px;height:auto;background:rgba(35,103,158,0.4);border-radius:8px;padding:40px 0;position:relative;}
  .welcome{margin:0 auto;width:90%;border-radius:8px;background:rgba(255,255,255,0.7);min-height:350px;}
  .formheading{font-weight:bold;font-size:1.5em;} nav{background:black;}
  .app-navbar-collapse ul li{background:black;} .fullwrapper{width:100%;} option{padding-left:5px;}
  button[type="submit"], input[type="submit"]{font-weight:bold;}
  label, input, select{font-size:1.4em;} 
  .bannerheading{font-size:2em;font-weight:bold;color:black;text-align:left;margin-top:-12px;margin-left:8px;text-shadow:2px 2px 2px white;}
  .bannerspan{margin-left:8px;color:black;font-size:1.3em;margin-top:-4px;text-shadow:2px 2px 1px white;}
  .bannerblue{color:rgb(29,73,122);font-weight:bold;font-size:1.4em;} .bannerred{color:rgb(176,24,2);}
  .myfooter{padding:0px 20px;background:rgba(14,46,96,0.8);position:fixed;bottom:0;right:0;border-radius:20px 0 0 0;float:right;
  .printbutton, #printbutton{width:80px;color:white;background:rgb(34,103,179);
  border-radius:5px;font-size:1.2em;padding:8px;cursor:pointer;}
  box-shadow:-1px -1px 6px 1px rgba(14,46,96,0.8);}
  .footertext{font-size:1em;color:white;text-align:right;}
  
  table { page-break-inside:auto; }
    tr    { page-break-inside:avoid; page-break-after:always;}
    thead { display:table-header-group; }
    tfoot { display:table-footer-group; }
  
  @yield('style')
  @media(max-width:750px){
	  .container{width:80%;}
	  .bannerheading{font-size:1.9em;}
	  .bannerspan{font-size:1.3em;}
	  .bannerblue{font-size:1.3em;}
	  }
	@media(max-width:650px){
	  .bannerwrapper{background-color:rgba(255,255,255,0.4);}		
	}
	@media print {
  a[href]:after {
    content: none !important;
  }
}
	</style>
	
</head>
<body>

<div class="fullwrapper">		
		
<div class="banner">
	<div class="bannerwrapper">

		<br/>
		<p class="bannerpara">
			<h1 class="bannerheading">মোহাম্মদ শফিকুল ইসলাম</h1>
			<span class="bannerspan">বি পি টি, এম এস পি টি (ডি. ইউ), ডি অর্থো মেডিসিন (বেলজিয়াম)</span><br/>
			<span class="bannerspan">এমডিটি স্পাইন (ম্যাকেঞ্জি ইনস্টিটিউট, নিউজিল্যান্ড,), নিউরো মোবিলাইজেশন (অস্ট্রেলিয়া)</span><br/>
			<span class="bannerspan">স্ট্রোক ও প্যারালাইসিস রিহ্যাব, বোবাথ কনসেপ্ট (বিবিটিএ, ইউ কে), সি এম টি (দিল্লী)</span><br/>
			<span class="bannerspan bannerblue">
				ইন্টারন্যাশনাল ম্যানুয়াল থেরাপিস্ট 
			</span><span class="bannerspan bannerblue" style="font-family:verdana;">(ETGOM)</span><br/>
			<span class="bannerspan bannerblue bannerred">
				ফিজিওথেরাপি বিশেষজ্ঞ ও চিফ ফিজিওথেরাপিস্ট
			</span><br/>
			<span class="bannerspan bannerblue bannerred">
				চট্টগ্রাম মেডিকেল কলেজ হাসপাতাল
			</span>
		</p>		

	</div>
</div>

 <nav class="navbar navbar-default navbar-static-top" style="width:98.85%;padding-top:-8px;background:black;">
            <div style="background:black;">
				<div class="navbar-header" style="background:black;">
					&nbsp;&nbsp;ফিজিওথেরাপি

                    <button type="button" style="background:rgb(35,103,158);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">মেনু</span>
                        <span class="icon-bar" style="background:black;"></span>
                        <span class="icon-bar" style="background:black;"></span>
                        <span class="icon-bar" style="background:black;"></span>
                    </button>

                </div>
				
				<div class="collapse navbar-collapse" id="app-navbar-collapse" style="background:black;">
                    
                    <ul class="nav navbar-nav navbar-right" style="background:black;">
												
						@if (Auth::guest())      
							<li><a style="color:white;" href="{{ route('login')}}">লগইন</a></li>
						@else
								<li><a style="color:white;" href="{{url('/home')}}">মূল পাতা</a></li>
								<li class="dropdown">					
									
									<a style="color:white;background:black;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										ইউজার<span class="caret"></span>									
								
									</a>									
									<ul class="dropdown-menu" role="menu" style="background:rgb(30,87,134);">
																						
											<li style="padding:0;">
												<a  style="color:white;background:rgb(30,87,134);" href="{{url('/register')}}">
															ইউজার রেজিস্ট্রেশন
												</a>
											</li>
											
											<li style="padding:0;">
												<a  style="color:white;background:rgb(30,87,134);" href="{{url('user/search')}}">
															ইউজার নিয়ন্ত্রণ
												</a>
											</li>
									</ul>	
								</li>								
								<li><a style="color:white;" href="{{url('/doctor/create')}}">ডাক্তার রেজিস্ট্রেশন</a></li>
								<li class="dropdown">					
									
									<a style="color:white;background:black;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										রোগী<span class="caret"></span>									
								
									</a>									
									<ul class="dropdown-menu" role="menu" style="background:rgb(30,87,134);">
																						
											<li style="padding:0;">
												<a  style="color:white;background:rgb(30,87,134);" href="{{url('patient/create')}}">
															রোগী রেজিস্ট্রেশন
												</a>
											</li>
											
											<li style="padding:0;">
												<a  style="color:white;background:rgb(30,87,134);" href="{{url('patient/assignTherapy')}}">
															রোগীকে প্রদেয় থেরাপি
												</a>
											</li>
											
									</ul>	
								</li>
								<li><a style="color:white;" href="{{url('therapy/create')}}">রোগ/থেরাপি রেজিস্ট্রেশন</a></li>
								<li><a style="color:white;" href="{{url('search')}}">খোঁজ</a></li>
								<li><a style="color:white;" href="{{url('prescription/create')}}">প্রেসক্রিপশন</a></li>
								<li class="dropdown">
										<a style="color:white;background:black;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
													{{ Auth::user()->name }} <span class="caret"></span>
										</a>

										<ul class="dropdown-menu" role="menu" style="background:rgb(30,87,134);">
											<li style="padding:0;">
												<a  style="color:white;background:rgb(30,87,134);text-align:right" href="{{ route('logout') }}"
													  onclick="event.preventDefault();
																	 document.getElementById('logout-form').submit();">
															লগআউট
												</a>

												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
												</form>
													</li>
											</ul>
								</li>
						@endif
                    </ul>
                </div>
				
			</div>
</nav>

    <div id="app">
       <br/><br/>
			@yield('content')
    </div>

	
	</div>
	
	<a href="http://banglasofttech.com">
		<div class="myfooter">
			<p class="footertext">
				Developed by <b>BanglaSoft Tech</b>
			</p>
		</div>	
	</a>
	
	
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jq.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
	<script>
		$('.printbutton').click(function(){
			$(this).hide();
			window.print();
		});
	</script>

@yield('script')
</body>
</html>
