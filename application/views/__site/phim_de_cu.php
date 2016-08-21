<div class="row top-movie">
    <div class="col-lg-12">
        <h2 class="header-list-index" style="margin-top: 0px;"><span class="title-list-index">Phim đề cử </span></h2>
        <div class="top-movie-list block-wrapper">
            <div class="list_carousel">
                <ul id="movie-carousel-top">
                    <?php if(isset($__phim_de_cu)&&  is_array($__phim_de_cu))
                        foreach ($__phim_de_cu as $line):?>
                    <li>
                        <a href="<?php echo getLinkPhim($line->film_name, $line->film_id)?>" title="<?php echo $line->film_name?>">
                            <div class="movie-carousel-top-item">
                                <img src="<?php echo $line->film_imgbn?>" width="225" height="299"/>
                                <div class="movie-carousel-top-item-meta"><h3 class="movie-name-1"><?php echo $line->film_name?></h3>
                                    <h4 class="movie-name-2"><?php echo $line->film_name_real?></h4>
                                    <span class="ribbon" style="top:-235px;"><?php echo $line->film_tapphim.' - '.filmLang($line->film_lang).' | '.$line->film_time?></span>
                                    <p class="hidden"></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach;?>                                                                                                                                                            </ul>
                <div class="clear"></div>
                <a id="prevTop" class="prev" rel="nofollow"><span class="arrow-icon left"></span></a>
                <a id="nextTop" class="next" rel="nofollow"><span class="arrow-icon right"></span></a>
            </div>
        </div>
    </div>
</div>