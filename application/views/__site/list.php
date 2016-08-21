<div id="navbar">{BREADCRUMBS}</div>
<script type="text/javascript" src="{web.LINK}/{skin.LINK}/js/filter.js?"></script>
<div class="list-movie-filter" style="margin-bottom: 10px;">
    <div class="list-movie-filter-main">
        <form id="form-filter" class="form-inline" method="GET" action="filter/">
            <div class="list-movie-filter-item">
                <label for="filter-sort">Sắp xếp</label>
                <select class="form-control" id="filter-sort" name="sort">
                    <!-- MAIN filter_sx('{value_sx}') -->	
                </select>
            </div>
            <div class="list-movie-filter-item">
                <label for="filter-eptype">Hình thức</label>
                <select class="form-control" id="filter-eptype" name="eptype">
                    <option value="">Tất cả</option>
                    <!-- MAIN filter_type('{value_type}') -->	
                </select>
            </div>

                <div class="list-movie-filter-item">
                        <label for="filter-category">Thể loại</label>
                        <select id="filter-category" name="category" class="form-control">
                                <option value="">Tất cả</option>
                                <!-- MAIN filter_cat('{value_cat}') -->	
                        </select>
                </div>
                <div class="list-movie-filter-item">
                        <label for="filter-country">Quốc gia</label>
                        <select class="form-control" id="filter-country" name="country">
                                <option value="">Tất cả</option>
                                <!-- MAIN filter_country('{value_country}') -->	
                        </select>
                </div>
                <div class="list-movie-filter-item">
                        <label for="filter-year">Năm phát hành</label>
                        <select id="filter-year" name="year" class="form-control">
                                <option value="">Tất cả</option>
                                <!-- MAIN filter_year('{value_year}') -->	
                        </select>
                </div>
                <button type="submit" id="btn-movie-filter" class="btn btn-red btn-filter-movie"><span>Duyệt phim</span></button>
                <div class="clear"></div>
        </form>
    </div>
</div>
<div class="row">
    <!-- slider -->
    <div class="col-lg-8">
<script type="text/javascript">
 $( document ).ready(function(){   {hidden};});</script>

<div class="movie-list-index">
        <h1 class="header-list-index"><span class="title-list-index">{title.NAME}</span></h1>
        <ul class="list-movie">
            <!-- BEGIN film_list --><!-- #BEGIN row -->
            <li class="movie-item">
                <a class="block-wrapper" title="{film.CUT_NAME}" href="{film.URL}">
                    <div class="movie-thumbnail" style="background:url('{film.IMG}'); background-size: cover;"></div>
                    <div class="movie-meta">
                        <span class="movie-title-1">{film.CUT_NAME}</span>
                        <span class="movie-title-2">{film.NAMEEN}</span>
                        <span class="movie-title-chap">{film.TIME}</span>
                        <span class="ribbon">{film.YEAR}</span>
                    </div>
                </a>
            </li>
        <!-- #END row --><!-- END film_list -->		
        </ul>
</div>
<div class="clear"></div>
<ul class="pagination pagination-lg"><li>{VIEW_PAGES}</li></ul>