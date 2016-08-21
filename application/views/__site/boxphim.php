<script type="text/javascript">
 $( document ).ready(function(){ $("li.active").append('{title}');});</script>
<div class="movie-list-index">
						<h1 class="header-list-index">
							<span class="title-list-index">Tủ phim của tôi</span>
						</h1>
						
						<ul class="list-movie">
							<!-- BEGIN film_list --><!-- #BEGIN row -->
							<li class="movie-item"  >
								<a class="block-wrapper" title="{film_name} - {film_name_real}" href="{film_url}">
									<div class="movie-thumbnail" style="background:url('{film_IMG}'); background-size: cover;"></div>
									<div class="movie-meta">
										<span class="movie-title-1">{film_name}</span>
										<span class="movie-title-2">{film_name_real}</span>
										<span class="movie-title-chap">{film_time}</span>
										<span class="ribbon">{film_tap_phim}</span>
									</div>
								</a>
								<a class="btn-remove" href="#" title="Xóa phim này khỏi tủ phim"></a>
							</li>
							
						<!-- #END row --><!-- END film_list -->
							
						</ul>
					</div>
					<div class="clear"></div>
<ul class="pagination pagination-lg">
						
						
						
						
						
					</ul>