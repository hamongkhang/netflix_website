<link rel="icon" href="{{asset('user/images/logo.png')}}" type="image/icon type">
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="MinhTalent" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('user/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('user/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('user/css/faqstyle.css')}}" type="text/css" media="all" />
<link href="{{asset('user/css/single.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('user/css/medile.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('user/css/right.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('user/fontawesome-free/css/all.min.css')}}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css')}}" />
<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<link rel="stylesheet" href="{{asset('admin/css/jConfirm.css')}}">

<script>
      document.addEventListener('DOMContentLoaded', () => {
          const player = Plyr.setup('.js-player');
      });
</script>
<!-- banner-slider -->
<link href="{{asset('user/css/jquery.slidey.min.css')}}" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="{{asset('user/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<!-- //font-awesome icons -->
<!-- js -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="{{asset('user/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{asset('user/js/owl.carousel.js')}}"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
		});
	});
</script>
<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('user/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
	</script>
<!-- //here ends scrolling icon -->
<!-- Tooltip -->
	<script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();
	});
	</script>
<!-- Tooltip -->
<script src="{{asset('admin/js/jConfirm.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/jquery.allofthelights-min.js')}}"></script>
