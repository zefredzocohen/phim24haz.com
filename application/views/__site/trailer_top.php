<!-- Box: Top phim  -->
<div class="right-box top-film-week"><h2 class="right-box-header star-icon"><span>Trailer phim mới</span></h2>
    <div class="right-box-content"><ul class="list-top-movie" id="list-top-trailer">
        <?php if(isset($__trailer_top)&&  is_array($__trailer_top)):?>
            <?php foreach ($__trailer_top as $row):?>
        <li class="list-top-movie-item">
            <a class="list-top-movie-link" title="<?php echo get_words($row->film_name, 4)?>" href="<?php echo getLinkPhim($row->film_name, $row->film_id)?>">
                <div class="list-top-movie-item-thumb" style="background-image: url('<?php echo thumbimg($row->film_img)?>')"></div>
                <div class="list-top-movie-item-info">
                    <span class="list-top-movie-item-vn"><?php echo $row->film_name?></span>
                    <span class="list-top-movie-item-en"><?php echo $row->film_name_real?></span>
                    <span class="list-top-movie-item-view">Lượt xem: <?php echo $row->film_viewed?></span>
                    <span class="rate-vote rate-vote-10"></span>
                </div>
            </a>
        </li>
        <!-- #END trailer_top.row --><!-- END film_menu -->
            <?php endforeach;?>
        <?php endif;?>
    </ul></div></div>
<div class="clear"></div>
<!-- /Box: Top phim -->