<div class="movie-i" id="request_send_contents">
    <div class="breadcrumbs">Yêu cầu phim</div>
    <div class="content-r">
        <form onsubmit="return request_send();" method="post" style="line-height: 20px;font-size: 12px;">
        <b><font color="#d9534f" size="2"><font color="#FF0000">Chú ý:</font> Vui lòng đọc kỹ trước khi yêu cầu phim</font></b><br><br>
        <font color="#d9534f">- Tìm kiếm phim trước khi gửi yêu cầu. Bạn chỉ được phép yêu cầu phim chưa có trong web
        <br/>
        - Khi yêu cầu phim tên phim phải được viết bằng <b>Tiếng Việt CÓ DẤU</b> hoặc bằng <b>Tiếng Anh</b>.
        <br/>
        - Không yêu cầu các bộ phim đang chiếu ở rạp vì thường những phim này sẽ không có liền, ngay khi phim có thì website đã tự cập nhật.
        <br/>
		- Đối với các bộ phim bộ dài tập, các bạn không nên yêu cầu các tập tiếp theo vì các phim này thường vẫn còn đang chiếu trên tivi.
		<br/>
        - Trong một tuần bạn chỉ có thể yêu cầu post 1 bộ phim bộ, phim lẻ thì không giới hạn.
        <br/>
		- Nếu bạn vi phạm bất cứ điều gì bên trên thì yêu cầu phim của bạn sẽ bị xóa mà không cần báo trước.
        </font><br/><br/>
        <font style="background: #66CC33;padding: 3px;color: #000;"><b>Note:</b> Hãy ghi rõ đầy đủ tên phim, quốc gia, năm sản xuất</font><br /><br />
          <table border="0" cellpadding="0" cellspacing="3">
            <tr>
              <td><font color="#d9534f">Nội dung yêu cầu: </font></td>
              <td>
                <textarea name="request_content" id="request_content"  style="width:350px; height:100px;"></textarea>      </td>
            </tr>
            <tr>
              <td><font color="#d9534f">Mã bảo mật: </font></td>
              <td><input type="text" name="security"  id="security"/> &nbsp; <img src="/imgchange.php" align="absmiddle"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input id="send-comment" class="button" type="submit" value="Gửi Yêu Cầu" onclick="return request_send();"  name="submit"></td>
        
            </tr>
          </table>
        </form> </div>
</div>
   
<script type="text/javascript">
function request_send(){
	var	sec_num			=	encodeURIComponent($('#security').val());
	var	request_content	=	encodeURIComponent($('#request_content').val());
	if(!request_content){
		alert("Bạn chưa nhập nội dung yêu cầu");
	}
	else{
		if(!sec_num){
			alert("Bạn chưa nhập mã số bảo mật");
		}else{
			$.get("index.php",{ request: 1,sec_num:sec_num,request_content:request_content},function(data){
				if(data == 1) {
					$('#request_send_contents').html('<div class="breadcrumbs">Thông Báo</div><div class="content-r"><center>Yêu cầu của bạn đã được gửi đi! chúng tôi sẽ cập nhật bộ phim trong thời gian sớm nhất</center></div>');;
				}else {
					alert(data)
				}
			});
		}
	}
	return false
}
</script>