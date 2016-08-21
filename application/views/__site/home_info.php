<div class="row ad-container banner-top">
    <div class="col-lg-12"><div class="ad-center-980"></div></div>
</div><!-- /Fullbanner -->        <!-- Main content -->        ﻿
<div id="navbar" style="margin-top: -20px;margin-bottom: 28px;">{BREADCRUMBS}</div>
<div class="row"><!-- slider -->
    <div class="col-lg-8">
        <?php if(isset($film_info)):?>
        <div class="block-wrapper page-single" style="margin-top: -18px;">
            <div class="movie-info"> 
                <div class="block-movie-info movie-info-box"> 
                    <div class="row"> 
                        <div class="col-6 movie-detail">
                            <h1 class="movie-title"> 
                                <span class="title-1"><?php echo $film_info->film_name?></span> 
                                <span class="title-2"><?php echo $film_info->film_name_real?></span> 
                                <span class="title-year"> (<?php echo $film_info->film_year?>)</span> 
                            </h1> 
                            <div class="movie-meta-info" style="overflow: hidden; width: auto; height: 270px;">
                                <dl class="movie-dl"> 
                                    <dt class="movie-dt">Trạng thái:</dt><dd class="movie-dd status"><?php echo $film_info->film_trangthai?></dd><br>
                                    <dt class="movie-dt">Điểm IMDb:</dt><dd class="movie-dd imdb"><?php echo $film_info->film_imdb?></dd><br>
                                    <dt class="movie-dt">Đạo diễn:</dt><dd class="movie-dd dd-director"><?php echo $film_info->film_director?></dd><br>
                                    <dt class="movie-dt">Quốc gia:</dt><dd class="movie-dd dd-country">{film.COUNTRY}</dd><br>
                                    <dt class="movie-dt">Năm:</dt><dd class="movie-dd"><a href="<?php echo base_url().'phim-'.$film_info->film_year?>{web.LINK}/phim-{film.YEAR}/"><?php echo $film_info->film_year?></a></dd><br>
                                    <dt class="movie-dt">Công ty SX:</dt><dd class="movie-dd">Marvel Enterprises</dd><br>
                                    <dt class="movie-dt">Thời lượng:</dt><dd class="movie-dd"><?php echo $film_info->film_time?></dd><br>
                                    <dt class="movie-dt">Chất lượng:</dt><dd class="movie-dd">Bản đẹp</dd><br>
                                    <dt class="movie-dt">Độ phân giải:</dt><dd class="movie-dd">HD 720p</dd><br>
                                    <dt class="movie-dt">Ngôn ngữ:</dt><dd class="movie-dd"><?php echo filmLang($film_info->film_lang)?></dd><br>
                                    <dt class="movie-dt">Thể loại:</dt><dd class="movie-dd dd-cat">{film.CAT}</dd><br>
                                    <dt class="movie-dt">Lượt xem:</dt><dd class="movie-dd"><?php echo $film_info->film_viewed?></dd>
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
                                <img alt="<?php echo $film_info->film_name.' - '.$film_info->film_name_real?> - {film.NAMEREAL}" src="http://2.bp.blogspot.com/-1BuF4_lnXhs/VMy7FmFbUOI/AAAAAAAAsPo/H_NUPUPlSQg/s1600/1.jpg" width="315" height="419">
                                <h2 class="hidden">Xem phim</h2>
                                <ul class="btn-block">
                                    <li class="item"><a id="btn-film-download" class="btn btn-green btn" title="Download phim <?php echo $film_info->film_name?>" href="{film.URL}download.html">Download</a></li>
                                    <li class="item">
                                        <a id="btn-film-trailer" class="btn btn-primary btn-film-trailer" title="Trailer phim <?php echo $film_info->film_name?>" href="javascript:void(0)" data-film="{film.URL}" data-href="{film.TRAILER_URL}" onclick="ViewTrailer();" data-videourl="{film.TRAILER}">Trailer</a></li>
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
                    <div class="content"><?php echo $film_info->film_info?></div>
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
        <?php endif;?>
        <div class="clear"></div>         
    </div>
    
    <!-- MAIN film('relate',6,1,'{cat.ID}') -->


    <!-- Sidebar -->    
    <div class="col-lg-4 sidebar" id="sidebar">        <!-- Ad: Sidebanner -->        
        <div class="ad-container ad-top-300-250"></div>      
        <div class="facebook-top">            
            <div class="fb-like-box" data-href="https://www.facebook.com/Linkmaxspeed-999043700154617" data-colorscheme="light" data-show-faces="true" data-width="300" data-height="180" data-header="false" data-stream="false" data-show-border="false"></div>        </div><!-- /Box: Facebook like -->        <!-- Box: Top phim  -->
        <?php if (isset($trailer_top)) echo $trailer_top ?>
        <div class="clear"></div>
        <!-- /Box: Top phim -->        <!-- Ad: Sidebanner -->        
        <div class="ad-container ad-top-300-250">
        </div>        <!-- /Ad: Sidebanner -->        <!-- Box: Top phim  -->
        <?php if (isset($bxh_week_serial)) echo $bxh_week_serial ?>
        <div class="clear"></div>
        <!-- Ad: Sidebanner -->        
        <div class="ad-container ad-top-300-250"></div>
        <?php if (isset($tag_box)) echo $tag_box; ?>        
        <div class="clear"></div>
        <!-- /Box: Top Tag --><!-- Box: Actor profile -->
        <div class="right-box">    
            <ul class="right-box-content star-profile">MAIN actor_star(2)</ul>
        </div>
        <div class="clear"></div>
        <!-- /Box: Actor profile --><!-- Ad: Sidebanner --><div class="ad-container right-box ad-300"></div>
        <div class="clear"></div><!-- /Ad: Sidebanner --></div><div class="clear"></div><!-- /Sidebar --></div>