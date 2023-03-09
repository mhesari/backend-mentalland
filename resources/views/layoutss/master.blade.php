<!DOCTYPE html>
<html lang="en">
@include('layoutss.header')
<body class="app sidebar-mini">
<!-- Navbar-->
@include('layoutss.main-header')
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('layoutss.sidebar')

@yield('content')

@include('layoutss.footer')
</body>
</html>
