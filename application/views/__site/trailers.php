<div id="navbar">{BREADCRUMBS}</div>
<div class="row"><!-- slider --><div class="col-lg-8">
        <div class="movie-list-index">
            <h1 class="header-list-index">
                <span class="title-list-index">{title.NAME}</span>
            </h1>

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


        <ul class="pagination pagination-lg">
            <li>


                {VIEW_PAGES}
            </li>
        </ul>