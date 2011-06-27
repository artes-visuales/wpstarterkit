<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xmlns:fb="http://www.facebook.com/2008/fbml"
<?php language_attributes(); ?>>
<head> 
	<title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title> 
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="keywords" content="<?php bloginfo('name'); ?>" />
	<meta name="author" content="<?php bloginfo('name'); ?>" />  
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
    <link rel="Shortcut Icon" href="/wp-content/themes/News/images/favicon.ico" type="image/x-icon" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://feeds.feedburner.com/artesvisuales" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/dropdown.js">
	</script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/slider.js">
	</script>
	<script type="text/javascript">
		//SYNTAX: menuscript.definemenu("tab_menu_id", integer OR "auto")
		menuscript.definemenu("tab_menu", 0) //initialize Tab Menu with ID "menu" and select 1st tab by default
	</script>
<?php wp_head(); ?>

<!-- Efecto zoom -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/scripts/fancybox/jquery.fancybox-1.2.6.css" media="screen" />
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/fancybox/fancybox_custom.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/fancybox/jquery.fancybox-1.2.6.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("a.zoom").fancybox({
				'zoomSpeedIn'		:	500,
				'zoomSpeedOut'		:	500
			});
		});
	</script> 
	
<!-- Efecto accordion -->
<script type="text/javascript">
$(document).ready(function(){
	
	$(".accordion h3:first").addClass("active");
	$(".accordion p:not(:first)").hide();

	$(".accordion h3").click(function(){
		$(this).next("p").slideToggle("slow")
		.siblings("p:visible").slideUp("slow");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});

});
</script>
	
<!-- mail -->
<script language="javascript">
	function antispam(nm,dm) 
	{
	   mailurl = "mailto:" + nm + "@" + dm;
	   window.location = mailurl;
	}
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	window.open(theURL,winName,features);
	}
</script> 

<!--analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11642988-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>
<body>
	<div id="header"> <!-- Header with the logo -->
		<a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>" class="logo"></a>            
	</div> <!-- END -->
	<div class="clear"></div>
	<div id="menu"> 
	<div id="submenu"> <!-- The categories menu -->
		<ul id="sub_menu" class="container sub_menu">
			<li><a href="<?php echo get_option('home'); ?>"><b>Home:</b></a></li>
			<?php wp_list_categories('title_li=&hide_empty=0&exclude=1, 6, 36, 22, 25'); ?>
		</ul>
	</div> <!-- END -->
	<div class="clear"></div>