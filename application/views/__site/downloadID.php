   <script type="text/javascript">
        var settimmer = 0;
		var fileName = '{TITLE}';
		var fileID = '{ep.ID}';
        $(function(){
                window.setInterval(function() {
                    var timeCounter = $("#countdown-time").html();
                    var updateTime = eval(timeCounter)- eval(1);
                    $("#countdown-time").html(updateTime);

                    if(updateTime == 0){
					  $(".timedown").addClass('none');
					   $("#loading").fadeIn('fast');
					 
                        LoadURLDOWN(fileID,fileName);
                    }
                }, 1000);

        });
    </script>
<div class="container clearfix">
<div class="ad-left"><img src="images/ads.jpg"></div>
<div class="ad-right"><img src="images/ads.jpg"></div>
<span class="filename" id="fileinfo-filename" title="">{film.nameVN} - {film.nameEN} [{film.YEAR}] [Tập {ep.NAME}]</span>
<div id="btnX" class="btn btn-blue">
<span class="text1" id="countdown-info">File đang được xác định, vui lòng chờ</span>
<span class="timedown"><i id="countdown-time">5</i>s</span>
<div id="loading" class="loading">
<div id="fadingBarsG">
<div id="fadingBarsG_1" class="fadingBarsG"></div>
<div id="fadingBarsG_2" class="fadingBarsG"></div>
<div id="fadingBarsG_3" class="fadingBarsG"></div>
<div id="fadingBarsG_4" class="fadingBarsG"></div>
</div></div></div>
<div class="download-list" id="download-list"></div>
<div style="clear:both"></div>
<div class="ad-bottom" style="margin: 10px auto 0 auto;width:728px;"><!-- ad bottom: 728 x 90 --></div>
</div>
<div class="fb-comments" data-href="{film.URL}" data-width="1000" data-numposts="5" data-colorscheme="light" style="max-height: 30px;max-width:1000px;display: block;margin: 0 auto;"></div>
