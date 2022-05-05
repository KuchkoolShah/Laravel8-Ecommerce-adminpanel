<!DOCTYPE html>
<html lang="en">
   <head>
        @include('customer.layouts.head')
    </head>
    <body class="home-page home-01 ">
	@include('customer.layouts.header')

	<main>
		   @yield('content')
	</main>
    	@include('customer.layouts.footer')
  @include('customer.layouts.footer_scripts')
    	</body>
</html>