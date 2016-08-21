<script type="text/javascript">
 $( document ).ready(function(){ $("#navbar").html('{BREADCRUMBS}');});</script>
<!-- Template: movie_public_film_download -->
<div class="block-wrapper page-single">
<!-- Thông tin phim --> 
<div class="movie-info">
<div class="block-movie-info trailer-info-box">
<div class="block-movie-info"><div class="row">
<div class="col-9 movie-detail">
<h1 class="movie-title"><span class="title-1">{film.NAME}</span><span class="title-2">{film.NAMEREAL1}</span></h1>
<div class="film-description-box">
<p class="film-description-short">{film.INFO}</p>
<div class="clear"></div></div></div>
<div class="col-3 movie-image">
<div class="movie-l-img">
<img alt="{film_name}" src="{film.IMG}" height="197">
<div class="movie-watch-link-box">
<a class="movie-watch-link" title="Phim {film_name}" href="{film.URL}" >Xem Phim</a>
</div>
<div class="hidden"><a class="movie-watch-link" href="#" title="Download phim {film_name}">Download</a></div></div></div></div></div></div>

<article class="block-movie-content">
<h2 class="movie-detail-h2">Download Link</h2><hr />
<div class="content" id="download-link-list">
<noscript><div style="border:1px solid yellow;font-size:16px; padding: 8px 15px;background-color: rgba(0,0,0,07);color: #FFF">Chức năng này yêu cầu trình duyệt bật javascript để hoạt động, bạn bật Javascript lên để tải nhé.</div></noscript>
<span class="download-note" style="display:block;font-style: italic;margin-bottom:10px;">Để <b>tải phim {film.NAME}</b> về máy, bạn hãy nhập mã xác nhận rồi bấm nút "Lấy link download". Link tải phim sẽ hiện ra cho bạn <b>download phim {film.NAME} ({film.NAMEREAL1})</b> miễn phí. Hãy chọn server phù hợp mà bạn muốn download để tải phim với tốc độ tốt nhất.</span>
<form class="form-inline" id="form-film-download" onsubmit="return KDownload();">
<input value="{film.ID}" name="FilmID" type="hidden">
<div class="container"><div class="row"><div class="form-group"><label for="subscribe-verify">Mã bảo vệ</label>
<div class="row"><div class="col-lg-6"><input type="text" name="DownVerify" class="form-control" id="download-verify" /></div>
<div class="col-lg-3" style="top: 3px;"><img src="/framework/captcha.php?rand={RandNUm}" id="captchaimg" align="middle" /><a class="refresh"  style="top: -22px;left: 115px;" href="javascript:void(0)" onclick="refreshCaptcha();"></a></div>
<div class="col-lg-3"><button type="submit" class="btn btn-primary btn-submit-download">Lấy link download</button></div>
</div></div></div></div></form> 
 </div>
 <div class="fb-like like-at-trailer" data-href="{film.URL}" data-width="140" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
 </article>
 
{film.TAG}

</div>
 <!-- / Thông tin phim --> 
 
 <div class="clear"></div>
 </div>
 <div class="block-wrapper page-single block-comments"><h4>Bình luận về phim</h4>
 <div class="fb-comments fb_iframe_widget" data-href="{film.URL}" data-width="650" data-numposts="5" data-colorscheme="dark"></div>
 </div>
 <div class="clear"></div>
 
 <!-- MAIN film('relate',6,1,'{film_cat}') -->  