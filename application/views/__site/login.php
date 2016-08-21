<script type="text/javascript">
 $( document ).ready(function(){ $("li.active").append('{title}');});</script>
<div class="block-wrapper page-single">
<!-- form login -->
        <div class="form-register">
            <form class="form-horizontal form-login" method="POST" action="" role="form">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tài khoản</label>
                    <div class="col-lg-5">
                            <input  type="text" class="form-control" id="login-username" name="username" placeholder="Nhập tài khoản hoặc email" value=""/>
                    </div>
                    <div class="col-lg-2"><a class="button-login-with-fb" href="#"></a></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Mật khẩu</label>
                    <div class="col-lg-5">
                        <input type="password" id="login-password" name="password" class="form-control" placeholder="Nhập mật khẩu truy cập"/>
                    </div>
                    <div class="col-lg-2">
                        <div class="checkbox">
                            <label for="login-remeber">
                                <input type="checkbox" id="login-remeber" name="remember" checked /> Ghi nhớ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-offset-2 col-lg-10">
                        <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
                        <button type="button" class="btn btn-default" onclick="window.location.href='/forget/'">Quên mật khẩu</button>
                    </div>
                </div>
            </form>
        </div>
</div>				