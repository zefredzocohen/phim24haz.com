function trim(axxx) {
	return axxx.replace(/^s*(S*(s+S+)*)s*$/, "$1");
}
function do_search() {
(function($) {
	var kw = trim($("#search_t").val());
	if(!kw||kw=='Tìm kiếm...'){
		alert('Vui lòng nhập từ khóa tìm kiếm!');
		$("#search_t").focus();
		return false;
	}
	kw = kw.toLowerCase().replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a")
        .replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e")
        .replace(/ì|í|ị|ỉ|ĩ/g,"i")
        .replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o")
        .replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u")
        .replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y")
        .replace(/đ/g,"d")
        //.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-")
        .replace(/â/g,"a").replace(/[éèêë]/g,"e").replace(/[îï]/g,"i")
        .replace(/[ô]/g,"o").replace(/[ùû]/g,"u").replace(/[ñ]/g,"n")
        .replace(/[äæ]/g,"ae").replace(/[öø]/g,"oe").replace(/[ü]/g,"ue")
        .replace(/[ß]/g,"ss").replace(/[å]/g,"aa")
        .replace(/[^-a-z0-9~\s\.:;+=_]/g, '').replace(/[\s\.:;=+]+/g, '+')
		.replace(/-+-/g,"-").replace(/^\-+|\-+$/g,"");
	var type = trim($("#search_type").val());
	var typex = 'tim-kiem';
	if (type == 'casting') {
		typex = 'dien-vien';
	}
	if (type == 'title') {
		typex = 'dao-dien';
	} 
	window.location.href = ''+typex+'/'+kw+'.html';
})(jQuery);
}

function login(type) {
(function($) {
if(type==undefined) type='';
	var txtUserName = $("#l_user"+type).val();
	if(!txtUserName){
		$("#l_user"+type).focus();
		$("#l_user"+type).addClass("frmerror");
		return false;
	}
	else{
		$("#l_user"+type).removeClass("frmerror");
	}
	var txtPassword = $("#l_pass"+type).val();
	if(!txtPassword){
		$("#l_pass"+type).focus();
		$("#l_pass"+type).addClass("frmerror");
		return false;
	}
	else{
		$("#l_pass"+type).removeClass("frmerror");
	}
	var remember = $("#lp_rmb"+type).attr("checked");
		//$("login_loading"+type).css("visibility","inherit");
		$("#btnLogin"+type).attr("disabled",true);
		var data= 'txtUserName='+txtUserName+'&txtPassword='+txtPassword+'&remember='+remember;
		$.ajax({
			url: '/user/login.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
			//$("login_loading"+type).css("visibility","hidden");
				if(html==1){
					$('#user').html('<p>Đăng nhập thành công. Hãy đợi.. <img src="/css/images-1/loading.gif"></p>');
					if(type=='_r') {
						if (redirect != '') {
							window.location = redirect;
						}
						else {
							window.location.reload();
						}
					}else {
						window.setTimeout("window.location.reload()",1000);
					}
					//window.setTimeout("$('#user').load('http://phimhd.vn/user/start.cache1')",1000);
					
				}else if(html.indexOf('kichhoat') != -1){
					var xxx = html.replace('kichhoat','');
					popup(xxx);
					window.setTimeout("$('#user').load('/user/start.cache1')",1000);
					
				}else if(html.indexOf('hethan') != -1){
					var xxx = html.replace('hethan','');
					popup(xxx);
					window.setTimeout("$('#user').load('/user/start.cache1')",1000);
					
				}else if (html)
				{
					popup(html);
					//$("#btnLogin"+type).attr("disabled",false);
					//$('#user').html('<p>Đăng nhập thành công. Hãy đợi.. <img src="/css/images-1/loading.gif"></p>');
					if(type=='_r') {
						if (redirect != '') {
							window.location = redirect;
						}
						else {
							window.location.reload();
						}
					}
					window.setTimeout("$('#user').load('/user/start.cache1')",0);
				}else {
					alert('Sorry, unexpected error. Please try again later.');
					$("#btnLogin"+type).attr("disabled",false);
				}
			}
		});
	return false;
})(jQuery);
}
function logout()
{
	$('#user').load('/user/logout.cache1');
	//window.setTimeout("window.location.reload()",1000);
}

function register() {
(function($) {
	var name = $("#username").val();
	var password = $("#password").val();
	var email = $("#email").val();
	var fullname = $("#fullname").val();
	var dob = $("#dob").val();
	var gender = $("#gender").val();
	var yahoo = $("#yahoo").val();
	var facebook = $("#facebook").val();
	var city = $("#city").val();
	var phone = $("#phone").val();
	var data = 'btnRegister=1&name='+name+'&password='+password+'&email='+email+'&fullname='+fullname+'&dob='+dob+'&gender='+gender+'&yahoo='+yahoo+'&facebook='+facebook+'&city='+city+'&phone='+phone;
	$("#signupsubmit").attr("disabled",true);
		$.ajax({
			url: '/user/register.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
				$("#reg_loading").hide();
				$("#signupsubmit").attr("disabled",false);
				if (html=='1') {
					alert("Đăng kí tài khoản thành công.\r\n Hãy kích hoạt tài khoản để xem đầy đủ tất cả các phim trên hệ thống PhimHD.vn! Xin cảm ơn!");
					window.location = '/kich-hoat.html';
				}else if(html) {
					alert(html);
					//$('#sec_num').focus();
					window.location.reload();
				} else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}		
		});
return false;
})(jQuery);
}

function do_edit() {
(function($) {
	var name = $("#username").val();
	var password = $("#password").val();
	var email = $("#email").val();
	var fullname = $("#fullname").val();
	var dob = $("#dob").val();
	var gender = $("#gender").val();
	var yahoo = $("#yahoo").val();
	var facebook = $("#facebook").val();
	var city = $("#city").val();
	var phone = $("#phone").val();
	var avatar = $("#avatar").val();
	var data = 'name='+name+'&password='+password+'&email='+email+'&fullname='+fullname+'&dob='+dob+'&gender='+gender+'&yahoo='+yahoo+'&facebook='+facebook+'&city='+city+'&phone='+phone+'&avatar='+avatar;
	$("#editsubmit").attr("disabled",true);
		$.ajax({
			url: '/user/edit.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
				$("#editsubmit").attr("disabled",false);
				if (html=='1') {
					alert("Chỉnh sửa thông tin thành công!");
					window.location.href = '/user/info.html';
				} else if(html) {
					alert(html);
					$("#editsubmit").attr("disabled",false);
					//$('#sec_num').focus();
				} else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}		
		});
return false;
})(jQuery);
}
function do_changepass() {
(function($) {
	var password = $("#password2").val();
	var password_new = $("#password_new").val();
	var email = $("#email").val();
	var name = $("#username2").val();
	var data = 'name='+name+'&password='+password+'&email='+email+'&password_new='+password_new;
	$("#changepasssubmit").attr("disabled",true);
		$.ajax({
			url: '/user/changepass.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
				$("#changepasssubmit").attr("disabled",false);
				if (html=='1') {
					alert("Đổi mật khẩu thành công!");
					window.location.href = '/user/info.html';
				} else if(html) {
					alert(html);
					$("#changepasssubmit").attr("disabled",false);
					//$('#sec_num').focus();
				} else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}		
		});
return false;
})(jQuery);
}

function forgot() {
(function($) {
	var name = $("#username").val();
	var email = $("#email").val();
	var data = 'u='+name+'&m='+email;
	$("#forgotsubmit").attr("disabled",true);
		$.ajax({
			url: '/user/forgot.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
				$("#forgotsubmit").attr("disabled",false);
				if (html=='1') {
					alert("Một email đã được gửi đến "+email+". Hãy kiểm tra mail để tiếp tục!");
					window.location.href = 'http://phimhd.vn';
				} else if(html) {
					alert(html);
					//$('#sec_num').focus();
				} else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}		
		});
return false;
})(jQuery);
}

function do_like(i,j) {
	if (j==''){
		alert('Bạn cần đăng nhập để có thể thực hiện chức năng này');
		return false;
	}
	var ur= '/user/'+j+'-like-'+i+'.cache1';
		$.ajax({
			url: ur,	
			type: "POST",	
			cache: false,
			success: function (html) {
				if(html){
					$('#count-like').html(html);
					show_like();
					$('#like-btn').hide();
				}else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}
		});
}
function show_like()
{
	$('#like').addClass('show');
}
function report_broken(ten)
{
		$.ajax({
			url: '/bao-loi/'+ten+'.cache3',	
			type: "GET",
			cache: false,
			success: function (html) {
				if(html==1){
					popup('Cảm ơn bạn đã thông báo cho chúng tôi lỗi của bộ phim này.!');
				}else {
					popup('Có lỗi, hãy thử lại sau.!');
				}
			}
		});
}
function do_XPcode()
{
	var code = $("#txtXPcode").val();
	var data = 'maxemphim='+code;
		$.ajax({
			url: '/user/maxemphim.cache1',
			type: "POST",
			data: data,
			cache: false,
			success: function (html) {
				if(html==1){
					alert('Nhập mã thành công. Xin hãy đợi hệ thống kiểm tra!');
					window.location.reload();
				}else {
					popup('Có lỗi, hãy thử lại sau.!');
				}
			}
		});
}
function do_requestfilm()
{
	var tenphim = $("#txttenphim").val();
	var linkhd = $("#txtlinkhd").val();
	var data = 'tenphim='+tenphim+'&linkhd='+linkhd;
		$.ajax({
			url: '/user/yeucauphim.cache1',
			type: "POST",
			data: data,
			cache: false,
			success: function (html) {
				if(html==1){
					alert('Cảm ơn bạn đã gửi yêu cầu phim.'+"\r\n"+'Chúng tôi sẽ cố gắng để phim bạn yêu cầu được lên sóng sớm nhất có thể!');
					window.location.reload();
				}else if(html){
					alert(html);
				}
				else {
					popup('Có lỗi, hãy thử lại sau.!');
				}
			}
		});
}

function request_login(next)
{
	redirect=next;
	var data = '<div class="login"><h2>Đăng nhập để xem phim</h2><p>Chưa có tài khoản? Hãy <a href="dang-ky.html">đăng kí</a> một tài khoản.</p><div class="form"> 	<form name="login_form" method="post" action="./members/login.html"><p><label for="l_user_r">Username</label> <span><input name="name" type="text" value="Tài khoản" id="login_username" class="login default" /></span></p><p><label for="l_pass_r">Password</label> <span><input name="pwd" type="password" value="password" id="login_password" class="login default"  /></span></p><p class="submit"><span><input type="checkbox" id="lp_rmb_r" value="1"><label for="lp_rmb_r">Ghi nhớ</label></span> <span class="button"><button name="login" type="submit" value="Log In" id="login"  id="btnLogin_r">Đăng nhập</button>&nbsp; <button onClick="hide_popup()">Hủy</button></span> <span><a href="forgot.html">Quên mật khẩu</a></span></p></form></div><script>$(\'#l_pass_r\').keypress(function(event){if (event.which == 13) {login(\'_r\');}});</script></div>';

	popup(data);
}
function request_register()
{
	
	var data = '<script id="demo" type="text/javascript">\r\n$().ready(function() {\r\n// validate signup form on keyup and submit\r\nvar validator = $("#signupform").validate({\r\nrules: {\r\nusername: {\r\nrequired: true,\r\nminlength: 2,\r\nremote: {\r\nurl: "http://phimhd.vn/user/valid.cache1",\r\ntype: "POST",\r\ncache: false\r\n}\r\n},\r\npassword: {\r\nrequired: true,\r\nminlength: 5\r\n},\r\npassword_confirm: {\r\nrequired: true,\r\nminlength: 5,\r\nequalTo: "#password"\r\n},\r\nemail: {\r\nrequired: true,\r\nemail: true,\r\nremote: {\r\nurl: "http://phimhd.vn/user/valid.cache1",\r\ntype: "POST",\r\ncache: false\r\n}\r\n},\r\nfullname: "required",\r\ndob: "required",\r\ngender: "required",\r\ncity: "required",\r\nphone: "required",\r\n},\r\nmessages: {\r\nusername: {\r\nrequired: "Vui lòng nhập username",\r\nminlength: jQuery.format("Username cần ít nhất {0} kí tự"),\r\n//remote: jQuery.format("{0} đã có người sử dụng, vui lòng chọn tên khác")\r\n},\r\npassword: {\r\nrequired: "Vui lòng nhập mật khẩu",\r\nrangelength: jQuery.format("Mật khẩu cần ít nhất {0} kí tự")\r\n},\r\npassword_confirm: {\r\nrequired: "Vui lòng nhập lại mật khẩu",\r\nminlength: jQuery.format("Mật khẩu cần ít nhất {0} kí tự"),\r\nequalTo: "Mật khẩu không chính xác"\r\n},\r\nemail: {\r\nrequired: "Vui lòng nhập email",\r\nminlength: "Vui lòng nhập email chính xác",\r\n//remote: jQuery.format("{0} đã có người sử dụng, vui lòng dùng email khác")\r\n}},\r\n// the errorPlacement has to take the table layout into account\r\nerrorPlacement: function(error, element) {\r\nerror.appendTo( element.parent().next() );\r\n},\r\n// specifying a submitHandler prevents the default submit, good for the demo\r\nsubmitHandler: function() {\r\nreturn register();\r\n},\r\n// set this class to error-labels to indicate valid fields\r\nsuccess: function(label) {\r\n// set &nbsp; as text for IE\r\nlabel.html("");\r\n}\r\n});\r\n});\r\n</script>\r\n\r\n<h1 class="title font-1">Đăng ký thành viên</h1>\r\n           <form method="post" onsubmit="return false;" id="signupform">\r\n<div class="form">\r\n<p>\r\n<label for="username">Tên đăng nhập</label>\r\n<span><input type="text" class="text" id="username" maxlength="50" size="30" name="username"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="password">Mật khẩu</label>\r\n<span><input class="text" id="password" maxlength="50" size="30" name="password" type="password"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="password_confirm">Xác nhận mật khẩu</label>\r\n<span><input class="text" id="password_confirm" maxlength="50" size="30" name="password_confirm" type="password"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="email">Email</label>\r\n<span><input type="text" class="text" id="email" maxlength="50" size="30" name="email"></span>\r\n<span class="status"></span>\r\n</p>\r\n\r\n<div class="warning entry">\r\n                           <p><strong>Quy định khi đăng kí :</strong></p>\r\n                           \r\n\r\n                         <ul>\r\n                           <li>Không chửi bới, kích động, lôi kéo, bôi nhọ các thành viên khác.</li>\r\n                           <li>Không nói tục chửi bậy khi bình luận.</li>\r\n                           <li>Những thành viên cố tình vi phạm hoặc vi phạm nhiều lần quy định sẽ bị loại ra khỏi club.</li>\r\n                           <li>Không chấp nhận bất cứ thông tin nào đi ngược lại với thuần phong mỹ tục và truyền thống văn hoá của nước Việt Nam.</li>\r\n                           <li>Mọi bài viết có nội dung hoặc chứa liên kết đến các trang web có nội dung vi phạm những điều trên đều sẽ được xóa mà không cần thông báo trước.</li>\r\n                           \r\n                         </ul>\r\n                       </div>\r\n\r\n<div class="submit">\r\n<p><button type="submit" id="signupsubmit">Đăng ký</button></p> \r\n</div>\r\n  \r\n</div>\r\n</form>';
		
	popup(data);
	
}
function fgt_pass()
{
	var data = '<form method="post" onsubmit="return false;" id="forgotform"><div class="form"><p><label for="username">Tên đăng nhập</label><span><input type="text" class="text" id="username" maxlength="50" size="30" name="username"></span><span class="status"></span></p><p><label for="email">Email</label><span><input type="text" class="text" id="email" maxlength="50" size="30" name="email"></span><span class="status"></span></p><div class="submit"><p><button type="submit" id="forgotsubmit" onclick="forgot()">Reset mật khẩu</button></p> </div></div></form>'
	popup(data);
}
function yeu_cau_phim()
{
	var data = '<form method="post" onsubmit="return false;" id="requestform"><div class="form"><p><label for="txttenphim">Tên phim</label><span><input type="text" class="text" id="txttenphim" maxlength="50" size="30" name="txttenphim"></span></p><p><label for="txtlinkhd">Link tải phim (bản HD)</label><span><input type="text" class="text" id="txtlinkhd" maxlength="50" size="30" name="txtlinkhd"></span></p><div class="submit"><p><button type="submit" id="forgotsubmit" onclick="do_requestfilm()">Yêu cầu phim</button></p> </div></div></form>';
	popup(data);
}