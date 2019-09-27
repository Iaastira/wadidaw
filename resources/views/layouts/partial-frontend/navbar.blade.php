<!-- header -->
<div id="header_wrapper" class="" style="background:#fc4903; border-bottom: 1px solid white;">
	<!-- menu -->
	<div id="header">
		<!-- logo -->
		<div id="logo"><a href="index.html"><img src="{{ asset('logoarkamaya-removebg-preview.png')}}" height="30px" hei alt="logo" /></a></div>
		<!-- logo end -->
		<!-- main menu -->
		<ul id="mainmenu" style="background:black;">
			<li><a href="/">Home</a></li>
			<li><a href="/about">About Us</a></li>
			<li><a href="/services">Services</a></li>
			<li><a href="/gallery">Gallery</a></li>
			<li><a href="/blog">Blog</a></li>
		<!-- main menu end -->
		<!-- search bar -->
		<div class="search_bar">
			<form action="{{ route('all.blog') }}">
				<input name="cari" value="Type &amp; Search Blog" type="text" />
				<button type="submit"><i class="search_button"></i></button>
			</form>
		</div>
		<!-- search bar end -->
	</div>
	<!-- menu end -->
</div>
<!-- header end -->