<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <base href=" {{asset("")}} ">
    @include('user.user_layout.import')

</head>
<body>
	{{-- if (isset($_SESSION['state'])) {
		echo $_SESSION['state'];
		$_SESSION['state']='';
		unset($_SESSION['state']);
	}
	include 'php/header.php';
	include 'php/slide.php';
	include 'php/social.php';
	include 'php/body.php';
    include 'php/footer.php'; --}}
    @include('user.user_layout.header')
    {{-- Phần main --}}
    @yield('content')
    @include('user.user_layout.social')
    @include('user.user_layout.footer')
    <script type="text/javascript">
        //Tự tắt thông báo
        $("div.alert").delay(10000).slideUp();
    </script>
</body>
</html>
