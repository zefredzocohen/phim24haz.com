<!-- Phim lẻ mới cập nhật -->
<div class="movie-list-index">
    <h2 class="header-list-index"><span class="title-list-index">Phim lẻ mới cập nhật</span><a class="more-list-index" href="<?php echo base_url()?>phim-le.html" title="Phim lẻ mới cập nhật">Xem tất cả</a></h2>
    <div class="list_carousel">
        <ul class="last-film-box" data-categoryid="theater" id="movie-carousel-theater" >
            <!-- BEGIN film_menu --><!-- #BEGIN phim_le.row -->
            <li><a class="movie-item m-block" title="{film.CUT_NAME}" href="{film.URL}"><div class="block-wrapper"><div class="movie-thumbnail"><div class="public-film-item-thumb" style="background-image:url('{film.IMG}')"></div></div><div class="movie-meta"><div class="movie-title-1">{film.CUT_NAME}</div><span class="movie-title-2">{film.CUT_NAME}</span><span class="movie-title-chap">{film.TAPPHIM} </span><span class="ribbon">{film.VIEWED} viewed</span></div></div></a></li>
            <!-- #END phim_le.row --><!-- END film_menu -->
        </ul><div class="clear"></div>
        <a id="prevtheater" class="prev" rel="nofollow" style="display: block;"><span class="arrow-icon left"></span></a>
        <a id="nexttheater" class="next" rel="nofollow" style="display: block;"><span class="arrow-icon right"></span></a>
    </div></div><!-- /Phim lẻ mới cập nhật -->