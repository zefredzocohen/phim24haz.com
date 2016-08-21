<div id="navbar">{BREADCRUMBS}</div>
<div class="row"><!-- slider --><div class="col-lg-8">
        <script type="text/javascript">
            var next_id = {episode.ID};
//            var keys = {episode.keys}
                    $(document).ready(function(){
            phim24haz(next_id, 0, 2);
            }); </script>
        <div class="block-wrapper page-single" id="block-player"><!-- Thông tin phim --> <div class="movie-info movie-info-watch watch-info-box">
                <div class="block-movie-info">
                    <div class="row">
                        <div class="col-9 movie-detail">
                            <h1 class="movie-title">
                                <span class="title-1">Trailer phim {film_name}</span>
                                <span class="title-2">{film_nameen}</span></h1>
                            <div class="film-description-box">
                                <p class="film-description-short">{film.INFO}</p>
                                <div class="clear"></div>
                            </div></div>
                        <div class="col-3 movie-image">
                            <div class="movie-l-img">
                                <img alt="{film_name}" src="{film.IMG}" height="197">
                                <div class="movie-watch-link-box">
                                    <a class="movie-watch-link" href="{film.URL}" title="Phim {film_name}">Xem phim</a>
                                </div><div class="hidden">
                                    <a class="movie-watch-link" href="#" title="Download phim {film_name}">Download</a>
                                </div></div></div>
                    </div>
                </div>
            </div><!-- /Thông tin phim --><!-- Thông báo phim chất lượng thấp --><!-- /Thông báo phim chất lượng thấp -->

            <!-- BEGIN PLAYER --> 
            <div id="watch-block">
                <div class="media-player uniad-player" id="media-player-box" style="position: static;">
                </div>

                <div class="user-action">
                    <div id="btn-light" class="btn-cs light-off"><i class="icon-light-sm"></i><span id="light-statuss" onclick="return _light()">Tắt đèn</span></div>
                    <a id="btn-add-favorite" class="btn-cs add-favorite" rel="nofollow" href="javascript:void(0)" onclick="filmBox({film_id});">
                        <i class="icon-add-sm"></i>
                        <span class="btn-text" id="btn-text_add">{film_IDBOX}</span></a>
                    <div id="btn-resize-player" class="btn-cs expand-player">
                        <i class="icon-expand-sm"></i>
                        <span id="resize-status" onclick="return zoom_css()">Phóng to</span></div>
                    <div id="btn-download" class="btn-cs download-player">
                        <i class="icon-download-sm"></i>
                        <a target="_blank" title="Download {film_name}" href="#">Download</a></div>
                    <div id="btn-remove-ad" class="btn-cs remove-ad"><i class="icon-removead-sm"></i>Tắt QC</div>
                    <div id="btn-remove-ad" class="btn-cs remove-ad" onclick="return ip_error({film_id}, {episode.ID})"><i class="icon-removead-sm"></i>Báo lỗi</div>
                    <div class="box-rating" itemscope="" itemtype="http://data-vocabulary.org/Review-aggregate">
                        <p>Đánh giá phim <span class="num-rating">({film.RATE} lượt)</span></p>

                        <div class="RateScore jratinscore" data="{film.RATETOTAL}_{film_id}"></div>

                    </div></div></div>
            <!-- END PLAYER -->

            <div class="fb-like" data-href="{link_web_url}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <div class="clear"></div><div class="ad-container watch-banner-2"></div><!-- List tập phim bộ --><!-- List tập phim lẻ/server backup -->
            <div class="list-server">
                {any_episodes}
            </div><!-- /List tập phim lẻ/server backup --><div class="clear"></div>

            {film.TAG}

        </div> 

        <div class="block-wrapper page-single block-comments"><h4>Bình luận về phim</h4>
            <div class="fb-comments" data-href="{link_web_url}" data-width="650" data-numposts="5" data-colorscheme="dark"></div>
        </div>
        <div class="clear"></div>

        <!-- MAIN film('relate',6,1,'{film_cat}') -->  


