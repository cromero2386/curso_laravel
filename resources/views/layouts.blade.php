@include('_partials.head')
@include('_partials.menu')
<!-- Page Content -->
    <div class="container">
    	@yield('content')
    </div>
@include('_partials.footer')
@yield('script')
</body>
</html>