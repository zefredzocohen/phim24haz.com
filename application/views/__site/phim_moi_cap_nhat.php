<script>
    $(function () {
        $("#tab_home").tabs();
    });
</script>
<!-- Phim bộ mới cập nhật --><div class="movie-list-index"><h2 class="header-list-index" id="tab_home"><span class="title-list-index">PHIM MỚI CẬP NHẬT</span>
        <a class="more-list-index" href="#tabs-all" title="Phim hành động mới cập nhật">Tất cả</a>
        <a class="more-list-index" href="#tabs-le" title="Phim hành động mới cập nhật">Phim lẻ</a>
        <a class="more-list-index" href="#tabs-bo" title="Phim hành động mới cập nhật">Phim bộ</a>
        <a class="more-list-index" href="#tabs-18" title="Phim hành động mới cập nhật">Phim 18+</a>
    </h2>
    <div class="list_carousel">
        <ul class="last-film-box"  id="movie-carousel-1" >
            <!-- BEGIN film_menu --><!-- #BEGIN phim_hanh_dong.row -->
            <li><a class="movie-item m-block" title="{film.CUT_NAME}" href="{film.URL}"><div class="block-wrapper"><div class="movie-thumbnail"><div class="public-film-item-thumb" style="background-image:url('{film.IMG}')"></div></div><div class="movie-meta"><div class="movie-title-1">{film.CUT_NAME}</div><span class="movie-title-2">{film.NAMEEN}</span><span class="movie-title-chap">Lượt xem: {film.VIEWED} </span><span class="ribbon">{film.CHATLUONG} | {film.TIME}</span></div></div></a></li>
            <!-- #END phim_hanh_dong.row --><!-- END film_menu -->
        </ul>
        <div class="clear"></div>
        <!--	<a id="prev1" class="prev" rel="nofollow" style="display: block;"><span class="arrow-icon left"></span></a>
                <a id="next1" class="next" rel="nofollow" style="display: block;"><span class="arrow-icon right"></span></a>  -->
    </div></div><!-- /Phim bộ mới cập nhật -->