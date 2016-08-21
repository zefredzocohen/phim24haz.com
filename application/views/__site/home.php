
<!-- Fullbanner -->
<div class="row ad-container banner-top">
    <div class="col-lg-12">
        <div class="ad-center-980"></div>
    </div>
</div>
<!-- /Fullbanner --><!-- Main content -->
<?php if (isset($phim_de_cu)) echo $phim_de_cu; ?>
<div class="row">
    <!-- slider -->
    <div class="col-lg-8">
        <!-- New update film box -->
        <div class="row movie-update">
            <div class="col-left">
                <div class="ad-300"><!-- MAIN box_ads('ads_homebelowdecu','homebelowdecu') --></div>
            </div>
        </div>
        <!-- /New update film box -->
        <div class="ad-container ad-top-670-90">
            <!-- MAIN box_ads('ads_center1','center') -->
        </div>
        <?php if (isset($phim_dang_chieu_rap)) echo $phim_dang_chieu_rap ?>
        <?php if (isset($phim_hanh_dong)) echo $phim_hanh_dong ?>
        <?php if (isset($phim_kinh_di)) echo $phim_kinh_di ?>
        <?php if (isset($phim_vien_tuong)) echo $phim_vien_tuong ?>
        <?php if (isset($phim_vo_thuat)) echo $phim_vo_thuat ?>
        <?php if (isset($phim_hoat_hinh)) echo $phim_hoat_hinh ?>
        <?php if (isset($phim_co_trang)) echo $phim_co_trang ?>
        <?php if (isset($phim_tam_ly)) echo $phim_tam_ly ?>
        <?php if (isset($phim_hai_huoc)) echo $phim_hai_huoc ?>
        <div class="clear"></div>
    </div>
    <!-- Sidebar -->
    <div class="col-lg-4 sidebar" id="sidebar">
        <!-- Ad: Sidebanner -->
        <div class="ad-container ad-top-300-250"></div>
        <!-- /Ad: Sidebanner -->
        <!-- Box: Facebook like -->
        <div class="facebook-top">
            <div class="fb-like-box" data-href="https://www.facebook.com/Linkmaxspeed-999043700154617" data-colorscheme="light" data-show-faces="true" data-width="300" data-height="180" data-header="false" data-stream="false" data-show-border="false"></div>
        </div><!-- /Box: Facebook like -->

        <?php if (isset($trailer_top)) echo $trailer_top ?>
        <!-- Ad: Sidebanner -->
        <div class="ad-container ad-top-300-250">
            <!-- MAIN box_ads('ads_right1','right1') -->
        </div>
        <!-- /Ad: Sidebanner -->
        <?php // $this->load->view('__site/bxh_week))echo ?>
        <?php // $this->load->view('__site/bxh_month))echo ?>
        <!-- Ad: Sidebanner -->
        <div class="ad-container ad-top-300-250">
            <!-- MAIN box_ads('ads_right2','right2') -->
        </div>
        <!-- /Ad: Sidebanner -->
        <?php if (isset($bxh_week_single)) echo $bxh_week_single ?>	
        <!-- Box: Top Tag -->
        <?php if (isset($tag_box)) echo $tag_box; ?>
        <!--    <div class="clear"></div> /Box: Top Tag  Box: Actor profile <div class="right-box">
                <h2 class="right-box-header cel-icon"><span>Hồ sơ diễn viên</span></h2>
                <ul class="right-box-content star-profile"> MAIN actor_star(2) </ul>
            </div>-->
        <div class="clear"></div>
        <!-- /Box: Actor profile --><!-- Ad: Sidebanner -->
        <div class="ad-container right-box ad-300"></div>
        <div class="clear">
        </div><!-- /Ad: Sidebanner -->
    </div>
    <div class="clear">
    </div><!-- /Sidebar --><!-- Footer banner -->
    <div class="container ad-container banner-footer" id="footer-banner">
        <div class="row">
            <div class="col-lg-12">
                <!-- ad center 2-->
                <div class="ad-center-980"></div>
            </div>
        </div>
    </div>
</div>
