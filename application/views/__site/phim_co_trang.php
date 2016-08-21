<!-- Phim bộ mới cập nhật -->
<div class="movie-list-index">
    <h2 class="header-list-index"><span class="title-list-index">Phim cổ trang</span><a class="more-list-index" href="<?php echo base_url()?>phim-bo.html" title="Phim bộ mới cập nhật">Xem tất cả</a></h2>
    <div class="list_carousel">
    <ul class="last-film-box" data-categoryid="12" id="movie-carousel-12" >
    <?php if (isset($__phim_co_trang) && is_array($__phim_co_trang)): ?>
                <?php foreach ($__phim_co_trang as $row): ?>
                    <li>
                        <a class="movie-item m-block" title="<?php echo get_words($row->film_name, 4)?>" href="<?php echo getLinkPhim($row->film_name, $row->film_id)?>">
                            <div class="block-wrapper">
                                <div class="movie-thumbnail">
                                    <div class="public-film-item-thumb" style="background-image:url('<?php echo thumbimg($row->film_img)?>')"></div>
                                </div>
                                <div class="movie-meta">
                                    <div class="movie-title-1"><?php echo get_words($row->film_name, 4)?></div>
                                    <span class="movie-title-2"><?php echo get_words($row->film_name_real, 20)?></span>
                                    <span class="movie-title-chap">Lượt xem: <?php echo $row->film_viewed?> </span>
                                    <span class="ribbon"><?php echo strlen(trim($row->film_tapphim))>1? $row->film_tapphim:'SD'.' | '.$row->film_time;?></span>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
    </ul>
    <div class="clear"></div>
    <a id="prev12" class="prev" rel="nofollow" style="display: block;"><span class="arrow-icon left"></span></a>
    <a id="next12" class="next" rel="nofollow" style="display: block;"><span class="arrow-icon right"></span></a>
</div></div><!-- /Phim bộ mới cập nhật -->