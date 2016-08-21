{BREADCRUMBS}
<div class="movie-list-index">
    <h1 class="header-list-index">
        <span class="title-list-index">DANH SÁCH DIỄN VIÊN</span>
    </h1>
    <ul class="list-movie">
        <!-- BEGIN actor_list --><!-- #BEGIN row -->
        <li class="movie-item">
            <a class="block-wrapper" title="{actor_name}" href="{actor_url}">
                <div class="movie-thumbnail" style="background:#008000; background-size: cover;"></div>
                <div class="movie-meta">
                    <span class="movie-title-1">{actor_name}</span>
                    <span class="movie-title-2">{actor_name1}</span>
                    <span class="movie-title-chap">{actor_location}</span>
                    <span class="ribbon">{actor_birthday}</span>
                </div>
            </a>
        </li>
        <!-- #END row --><!-- END actor_list -->
    </ul>
</div>
<div class="clear"></div>
<ul class="pagination pagination-lg" id="show-actor-click">
    <li>
        {pages_number}
    </li>
</ul>