<html class="desktop portrait">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{web.TITLE}</title>
<meta property="fb:admins" content="100001722655379"/>
	<meta property="fb:app_id" content="547998618678011"/>
    <meta property="og:url" content="{web.URLLOAD}" />
	<meta property="og:title" content="{web.TITLE}" />
	<meta property="og:description" content="Xem Phim, Xem Phim HD Online, xem phim online, phim võ thuật, hành động, tâm lý tình cảm, phim kinh dị, phim 18+ , phim bộ, phim hoạt hình, phimst" />
	<meta property="og:image" content="{web.LINK}/logo.png" />
	<meta property="og:site_name" content="{web.TITLE}" />
	<meta property="og:updated_time" content="{NOW}" />
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="{web.LINK}" />
<link href="{web.LINK}/{skin.LINK}/css/sweet-alert.css" rel="stylesheet" media="screen">
<link href="{web.LINK}/{skin.LINK}/css/download.css" type="text/css" rel="stylesheet">
<style>.none{display:none!important;}</style>
<script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="{web.LINK}/{skin.LINK}/js/sweet-alert.js"></script>
<script>
	function LoadURLDOWN(ID,TITLE) {
    $.post("{web.LINK}/index.php",{LoadURLDOWN:1,ID:ID,TITLE:TITLE},function(data){
			 if (data == 0){ swal('Oops...!','Đã xảy ra lỗi trong quá trình lấy link download','error');
		}else{
		$("#btnX").addClass('none');
		$("#download-list").html(data);
		}
		});
    return false
}
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=547998618678011&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<!-- BEGIN main --><!-- END main -->
</body></html>