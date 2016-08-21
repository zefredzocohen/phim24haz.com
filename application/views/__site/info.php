<div class="col-lg-8">
    <div class="block-wrapper page-single" style="margin-top: -18px;">
        <div class="movie-info"> 
            <div class="block-movie-info movie-info-box"> 
                <div class="row"> 
                    <div class="col-6 movie-detail"> 
                        <h1 class="movie-title"> 
                            <span class="title-1">{film.NAME}</span> 
                            <span class="title-2">{film.NAMEREAL}</span> 
                            <span class="title-year"> ({film.YEAR})</span> 
                        </h1> 
                        <div class="movie-meta-info" style="overflow: hidden; width: auto; height: 270px;">
                            <dl class="movie-dl"> 
                                <dt class="movie-dt">Trạng thái:</dt><dd class="movie-dd status">{film.STT}</dd><br>
                                <dt class="movie-dt">Điểm IMDb:</dt><dd class="movie-dd imdb">{film.IMDb}</dd><br>
                                <dt class="movie-dt">Đạo diễn:</dt><dd class="movie-dd dd-director">{film.DIRECTOR} </dd><br>
                                <dt class="movie-dt">Quốc gia:</dt><dd class="movie-dd dd-country">{film.COUNTRY}</dd><br>
                                <dt class="movie-dt">Năm:</dt><dd class="movie-dd"><a href="{web.LINK}/phim-{film.YEAR}/">{film.YEAR}</a></dd><br>
                                <dt class="movie-dt">Công ty SX:</dt><dd class="movie-dd">Marvel Enterprises</dd><br>
                                <dt class="movie-dt">Thời lượng:</dt><dd class="movie-dd">{film.TIME}</dd><br>
                                <dt class="movie-dt">Chất lượng:</dt><dd class="movie-dd">Bản đẹp</dd><br>
                                <dt class="movie-dt">Độ phân giải:</dt><dd class="movie-dd">HD 720p</dd><br>
                                <dt class="movie-dt">Ngôn ngữ:</dt><dd class="movie-dd">{film.LANG}</dd><br>
                                <dt class="movie-dt">Thể loại:</dt><dd class="movie-dd dd-cat">{film.CAT}</dd><br>
                                <dt class="movie-dt">Lượt xem:</dt><dd class="movie-dd">{film.VIEWED}</dd>
                            </dl>
                            <div class="clear"></div>
                        </div> 
                        
                        <div class="box-rating" itemscope="" itemtype="http://data-vocabulary.org/Review-aggregate">
                            <p>Đánh giá phim <span class="num-rating">({film.RATE} lượt)</span></p>
                            <div class="RateScore jratinscore" data="{film.RATETOTAL}_{film.ID}"></div>
                            <div class="fb-like like-at-rating" data-href="{film.URL}" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
                        </div>
                        
                        
                    </div>
                    <div class="col-6 movie-image">
                        <div class="movie-l-img">
                            <img alt="{film.NAME} - {film.NAMEREAL}" src="http://2.bp.blogspot.com/-1BuF4_lnXhs/VMy7FmFbUOI/AAAAAAAAsPo/H_NUPUPlSQg/s1600/1.jpg" width="315" height="419">
                            <h2 class="hidden">Xem phim</h2>
                            <ul class="btn-block">
                                <li class="item"><a id="btn-film-download" class="btn btn-green btn" title="Download phim {film.NAME}" href="{film.URL}download.html">Download</a></li>
                                <li class="item">
                                    <a id="btn-film-trailer" class="btn btn-primary btn-film-trailer" title="Trailer phim {film.NAME}" href="javascript:void(0)" data-film="{film.URL}" data-href="{film.TRAILER_URL}" onclick="ViewTrailer();" data-videourl="{film.TRAILER}">Trailer</a></li>
                                <li class="item"><a id="btn-film-watch" class="btn btn-red" title="Xem phim " href="{film.WATCH}">Xem phim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="block-actors list_carousel"><h2 class="movie-detail-h2">Diễn viên</h2>
                <ul class="row" id="list_actor_carousel">
                    {film.ACTOR}
                </ul><div class="clear"></div>
                <a id="prevActor" class="prev" rel="nofollow" style="display: block;"><span class="arrow-icon left"></span></a>
                <a id="nextActor" class="next" rel="nofollow" style="display: block;"><span class="arrow-icon right"></span></a>
            </div>  
            <article class="block-movie-content"><h2 class="movie-detail-h2">Nội dung phim</h2>
                <div class="fb-like like-at-content" data-href="{film.URL}" data-width="140" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                <div class="content">
                    {film.INFO}
                </div>
            </article>
            {film.TAG}
            <div class="block-tags"><h3 class="movie-detail-h3">Từ khóa:</h3><ul class="tag-list"><a href="http://phimmoi.net.dev/tag/trum-bai/" rel="follow, index" title="Xem Phim Trum Bai">Trum Bai</a>, 
                    <a href="http://phimmoi.net.dev/tag/wild-card/" rel="follow, index" title="Xem Phim Wild Card">Wild Card</a>
                </ul>
            </div>
        </div>
    </div>
    <div class="block-wrapper page-single block-comments"><h4>Bình luận về phim</h4>
        <div class="fb-comments" data-href="{film.URL}" data-width="650" data-numposts="5" data-colorscheme="dark"></div>
    </div>
    <div class="clear"></div>         
</div>
<!-- MAIN film('relate',6,1,'{cat.ID}') -->