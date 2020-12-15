<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title', 'Old Blog')</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="{{ asset('css/') }}/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/') }}/tabcontent.css" />
<script type="text/javascript" src="{{ asset('js/') }}/tabcontent.js"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

	<div id="templatemo_header_panel">
    	<div id="templatemo_title_section">
				<h1 style="font-size: 44px;"><a href="/" style="text-decoration: none;"><b>OLD BLOG</b></a></h1>
	  Archived documents all in one place</div>
    </div> <!-- end of templatemo header panel -->
    
    <div id="templatemo_menu_panel">
    	<div id="templatemo_menu_section">
            <ul>
                <li><a href="/"  class="{{ request()->is('/') ? 'current' : '' }}">Home</a></li>
                @foreach($pages as $page)
                  <li><a href="{{ route('page', $page->slug) }}" class="{{ request()->segment(1)==$page->slug ? 'current' : '' }}">{{ $page->title }}</a></li> 
                @endforeach
                <li><a href="{{ route('contact') }}" class="{{ request()->is('contact') ? 'current' : '' }}">Contact</a></li>                     
            </ul> 
		</div>
    </div> <!-- end of menu -->