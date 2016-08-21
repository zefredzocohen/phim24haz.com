<!--<div class="top_chart_col">
    <div class="tc_title">
        <h2> <a href="/xem-nhieu-trong-tuan.html" class="tc_more">Xem tiếp...</a></h2>
    </div>
    <ul class="tc_other_number">
        
    </ul>
</div>-->
<!-- Box: Top phim  -->
<div class="right-box top-film-week"><h2 class="right-box-header star-icon"><span>BXH Phim Trong Tuần</span></h2>
    <div class="right-box-content"><ul class="list-top-movie" id="list-top-trailer">
        <?php if(isset($bxh_week)&&  is_array($bxh_week)):?>
            <?php foreach ($bxh_week as $row):?>
        <li class="clearfix">
            <span class="tc_number tc_n_2 tc_n_<?php // echo $row->z?>"><?php // echo $row->z?></span>
            <div class="tc_meta">
                <a class="movie-top tooltip" rel="<?php echo $row->film_id?>" href="<?php echo getLinkPhim($row->film_name, $row->film_id)?>"><?php echo get_words($row->film_name, 4).'('.$row->film_year.')';?></a>
                <p class="tc_cat"></p>
            </div>
        </li>
            <?php endforeach;?>
        <?php endif;?>
    </ul></div></div>
<div class="clear"></div>
<!-- /Box: Top phim -->