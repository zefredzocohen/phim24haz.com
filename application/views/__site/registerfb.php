<script type="text/javascript">
 $( document ).ready(function(){ $("li.active").append('{title}');});</script>
<!-- Register -->
<div class="block-wrapper page-single">
<!-- form register -->
<div class="form-register">
<div style="padding:10px;font-weight:bold;text-align:center;">Xác nhận tài khoản đăng ký bằng Facebook</div>
<form id="form-register" class="form-horizontal" method="post">

<div class="form-group">

<label class="col-lg-3 control-label">Tài khoản</label>
<div class="col-lg-7"><input type="text" class="form-control" name="username" id="username" value="{user_name}"></div></div>

<div class="form-group"><label class="col-lg-3 control-label">Mật khẩu</label><div class="col-lg-7"><input type="password" class="form-control" name="password1" id="password1" value=""></div></div>

<div class="form-group"><label class="col-lg-3 control-label">Xác nhận mật khẩu</label><div class="col-lg-7"><input type="password" class="form-control" name="password2" id="password2" value=""></div></div>

<div class="form-group"><label class="col-lg-3 control-label">Email</label><div class="col-lg-7"><input type="email" class="form-control" name="email" id="email" value="{user_email}"></div></div>

<div class="form-group"><div class="col-offset-3 col-lg-10">

<button type="submit" name="submit" class="btn btn-primary">Đăng ký</button></div></div>
<input type="hidden" value="{facebook_id}">
</form></div>
<div class="clear"></div> 
</div> <!-- /Register -->