<!-- Phim lẻ mới cập nhật -->
<div class="movie-list-index">
    <h2 class="header-list-index"><span class="title-list-index">Phim chiếu rạp</span><a class="more-list-index" href="<?php echo base_url()?>phim-chieu-rap/" title="Phim chiếu rạp mới cập nhật">Xem tất cả</a></h2>
    <div class="list_carousel"><ul class="last-film-box" data-categoryid="theater" id="movie-carousel-theater" >
            <?php if (isset($__chieu_rap) && is_array($__chieu_rap)): ?>
                <?php foreach ($__chieu_rap as $row): ?>
                    <li>
                        <a class="movie-item m-block" title="<?php echo get_words($row->film_name, 4)?>" href="<?php echo getLinkPhim($row->film_name, $row->film_id)?>">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail">
                                    <div class="public-film-item-thumb" style="background-image:url('<?php echo thumbimg($row->film_img);?>')"></div>  
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1"><?php echo get_words($row->film_name, 4)?></div>
                                    <span class="movie-title-2"><?php echo $row->film_name_real?></span>
                                    <span class="movie-title-chap">Lượt xem: <?php $row->film_viewed?> </span>
                                    <span class="ribbon"><?php echo strlen(trim($row->film_tapphim))>1? $row->film_tapphim:'SD'.' | '.$row->film_time;?> </span>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul><div class="clear"></div>
        <a id="prevtheater" class="prev" rel="nofollow" style="display: block;"><span class="arrow-icon left"></span></a>
        <a id="nexttheater" class="next" rel="nofollow" style="display: block;"><span class="arrow-icon right"></span></a>
    </div></div><!-- /Phim lẻ mới cập nhật -->