<!-- Box: Top phim  -->
<div class="right-box top-film-week"><h2 class="right-box-header star-icon"><span>Phim lẻ hot trong tuần</span></h2>
    <div class="right-box-content">
        <ul class="list-top-movie" id="list-top-film-week">
            <?php if (isset($__bxh_week_single) && is_array($__bxh_week_single)): ?>
                <?php foreach ($__bxh_week_single as $row): ?>
                    <li class="list-top-movie-item">
                        <a class="list-top-movie-link" title="<?php echo get_words($row->film_name, 4)?>" href="<?php echo getLinkPhim($row->film_name, $row->film_id);?>">
                            <div class="list-top-movie-item-thumb" ></div>
                            <div class="list-top-movie-item-info">
                                <span class="list-top-movie-item-vn"></span>
                                <span class="list-top-movie-item-en"></span>
                                <span class="list-top-movie-item-view">Lượt xem: <?php echo $row->film_viewed_w?></span>
                                <span class="rate-vote rate-vote-10"></span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="clear"></div>
<!-- /Box: Top phim -->