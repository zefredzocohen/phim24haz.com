        	<div class="movie-box">
            	<h3>Bạn đã xem phim chưa?</h3>
                <ul class="cf">
                    <!-- BEGIN film_menu --><!-- #BEGIN rand_film.row -->
                    <li>
                        <a class="th tooltip" rel="{film.ID}" href="{film.URL}" title="{film.CUT_NAME2}"><img src="{film.IMG}" alt="{film.CUT_NAME2}" title="Xem phim {film.CUT_NAME2}" /></a>
                        <p class="sub cf">{film.TAPPHIM}</p>
                        <h4><a href="{film.URL}" title="{film.CUT_NAME}">{film.CUT_NAME}</a></h4>
                        <p>Lượt xem: <span>{film.VIEWED}</span></p>
                    </li>
                    <!-- #END rand_film.row --><!-- END film_menu -->
                </ul>
            </div>