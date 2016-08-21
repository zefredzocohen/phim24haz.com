var MAIN_URL = "http://phimmoi.net.dev/";
var AjaxURL = MAIN_URL + '/index.php';
var pautonext = true;
var enableOver = true;
var playerw = 650; //960
var playerh = 400; // 480
function autonextOverlayDisplay(message) {
    $('#autonext-overlay #autonext-message').html(message);
    $('#autonext-overlay').fadeIn('fast');
}

$(document).ready(function () {
    $('.RateScore').jRating({
        step: true, //cho phep nua ngoi sao
        length: 10, // so ngoi sao hien thi
        decimalLength: 0, // so thap phan
        //việc cấu hình này bạn có thêm xem thêm trong demo
    });
    $('#btn-autonext-cancel').click(function () {
        pautonext = false;
        $('#autonext-overlay').fadeOut('fast');
    });
    $('#btn-autonext-close').click(function () {
        $('#autonext-overlay').fadeOut('fast');
        enableOver = false;
    });
});

function search_auto(a) {
    3 > a.length ? $("#show-search-auto").fadeOut() : $.get("/search.php", {query: a}, function (a) {
        $("#show-search-auto").html(a).fadeIn()
    })
}
function _Search() {
    $(".search-place").slideToggle(500);
}
function EnterKey(a) {
    13 == (window.event ? window.event.keyCode : a.which) && do_search()
}

function do_search(a) {
    if (searchid = $(".tgt-autocomplete-activeItem a").attr("href"))
        return window.location.href = searchid, !1;
    1 == a && (query = $("input[name='q']").val(), window.location.href = "http://xemphimon.com/tim-kiem/" + query + "/trang-1.html");
    return !1
}

function do_tag() {
    (kw = document.getElementById("keyword").value) ? (kw = encodeURIComponent(kw), window.location.href = "http://xemphimon.com/tag/" + kw + "/trang-1.html") : alert("B\u1ea1n ch\u01b0a nh\u1eadp t\u1eeb kh\u00f3a");
    return !1
}

var plight = !1;
function _light() {
    plight ? ($("div#light-overlay").remove(), $("span#light-statuss").html("T\u1eaft \u0111\u00e8n"), plight = !1) : ($("body").append('<div id="light-overlay" style="position: fixed; z-index: 999; opacity: 0.98; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0);"></div>'), $("#watch-block").css({
        "z-index": "2000"
    }), $("#media-player-box").css({
        "z-index": "2000"
    }), $("span#light-statuss").html("B\u1eadt \u0111\u00e8n"), plight = !0);
    $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 1000);
    return !1
}
var resizeCheck = 'small';
var orgBoxWidth = 0;
var orgPlayerSize = {'width': 0, 'height': 0};
var docHeight = 17;

function zoom_css() {
    if (resizeCheck == 'small') {
        //--Tính toán kích thước trước khi phóng
        orgBoxWidth = jQuery('#block-player').outerWidth();
        orgPlayerSize.width = jQuery('#media-player-box_wrapper').width();
        orgPlayerSize.height = jQuery('#media-player-box_wrapper').height();
        //--Tính toán kích thước sau khi phóng
        var newWidth = 960;
        var largeSize = {'width': newWidth, 'height': Math.ceil(newWidth / 16 * 9 + docHeight)};
        var sidebarTopMargin = jQuery('.block-comments').offset().top;
        jQuery('#sidebar').animate({marginTop: sidebarTopMargin});
        jQuery('#block-player').animate({width: '980px'});
        jQuery('#btn-resize-player #resize-status').text('Thu nhỏ');
        jQuery('#block-player #media-player-box_wrapper').animate({width: largeSize.width, height: largeSize.height},
        function () {
            $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 1000);
        });
        resizeCheck = 'large';
    }
    else {
        jQuery('#block-player').animate({width: orgBoxWidth});
        jQuery('#sidebar').animate({marginTop: "0px"});
        jQuery('#block-player #media-player-box_wrapper').animate({width: orgPlayerSize.width, height: orgPlayerSize.height},
        function () {
            $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 1000);
        });
        jQuery('#btn-resize-player #resize-status').text('Phóng to');
        resizeCheck = 'small';
    }

}

function ZoomPlayer() {
    if (resizeCheck == 'small') {
        //--Tính toán kích thước trước khi phóng
        orgPlayerSize.width = jQuery('#media-player-box_wrapper').width();
        orgPlayerSize.height = jQuery('#media-player-box_wrapper').height();
        //--Tính toán kích thước sau khi phóng
        var newWidth = 960;
        var largeSize = {'width': newWidth, 'height': Math.ceil(newWidth / 16 * 9 - docHeight)};
        jQuery('.wrap-sidebar').animate({marginTop: '20px'});
        jQuery('#watch-block').animate({'width': '100%', 'padding': '0px'});
        jQuery('#watch-block').css('background-color', '#1a1a1a');
        jQuery('#resize-status').text('Thu nhỏ');
        jQuery('#watch-block #media-player-box_wrapper').css('margin', '0 auto');
        jQuery('#watch-block #media-player-box_wrapper').animate({width: largeSize.width, height: largeSize.height},
        function () {
            $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 1000);
        });
        resizeCheck = 'large';
    }
    else {
        jQuery('.wrap-sidebar').animate({marginTop: "-525px"});
        jQuery('#watch-block').animate({'width': '1190px', 'padding': '20px 0 0 0'});
        jQuery('#watch-block').css('background', 'transparent');
        jQuery('#watch-block #media-player-box_wrapper').animate({width: orgPlayerSize.width, height: orgPlayerSize.height, margin: '0'},
        function () {
            $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 1000);
        });
        jQuery('#resize-status').text('Phóng to');
        resizeCheck = 'small';
    }

}
var pzoom = !1;
function _zoom() {
    if (!pzoom) {
        zoom_css();
        $("a._zoom").html("Thu nh\u1ecf");
        $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 500);
        pzoom = true
    } else {
        $("#watch-block,.breadcrumbs").removeAttr("style");
        $("#media-player-box").animate({
            "height": "400"
        }, 300);
        $("div.m-right").css({
            "padding-top": "0"
        });
        $("a._zoom").html("Ph\u00f3ng to");
        $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 500);
        pzoom = false
    }
    return false
}

function _autonext() {
    if ($.cookie("autonext_xpo")) {
        $("a._autonext span").html("On");
        $.cookie("autonext_xpo", "")
    } else {
        $("a._autonext span").html("Off");
        $.cookie("autonext_xpo", 1)
    }
    return false
}
function _Login() {
    var a = '<style>.modal-dialog{max-width: 54%;}</style><div id="register"><form id="_frmLogin" onsubmit="return DoLogin();">' +
            '<div class="registerLeft">' +
            '<h2>Đăng nhập bằng Facebook</h2>' +
            '<p class="items-form"><a class="fb-btn" href="login/facebook/"></a></p>' +
            '<ul class="login-fb-list"> <li><span>Xem phim online miễn phí không quảng cáo</span></li> <li><span>Chia sẻ phim hay đến bạn bè gần xa</span></li> <li><span>Cập nhật phim hay mọi lúc mọi nơi</span></li> </ul>' +
            "</div>" +
            '<div class="icon-or" alt="or"></div>' +
            '<div class="registerRight">' +
            '<h2>Đăng nhập với phim24haz</h2>' +
            '<p class="items-form"><input placeholder="Email" name="username" class="form-control input-md" type="text"></p>' +
            '<p class="items-form"><input placeholder="M\u1eadt kh\u1ea9u" name="password" class="form-control input-md" type="password"></p>' +
            '<p class="items-form"><a class="forgotbtn" href="javascript:_ForGot();">Quên mật khẩu?</a></p>' +
            '<p class="items-form"><input class="loginbnts mrbtnlogin" type="submit" value="\u0110\u0103ng nh\u1eadp"></p>' +
            "</div>" + '<div class="clr"></div></form><div class="bottom_modal">Bạn chưa có tài khoản? <a href="javascript:_Register();">Đăng ký ngay</a></div></div>';
    modal('Chào mừng bạn đến với phim24haz', a);
}
function DoLogin() {
    var a = $("input[name='username']").val();
    var b = $("input[name='password']").val();
    var c = $("input[name='remember']").val();
    $.post(MAIN_URL + "/index.php", {K_login: 1, username: a, password: b, remember: c}, function (data) {
        if (data == 0)
            LoadMess('Oops...!', 'Bạn chưa nhập tên tài khoản hoặc mật khẩu!', 'error');
        else if (data == 1)
            LoadMess('Oops...!', 'Tài khoản của bạn không tồn tại trên hệ thống!', 'error');
        else if (data == 2)
            LoadMess('Oops...!', 'Mật khẩu đăng nhập không chính xác!', 'error');
        else {
            $("#widget_user_header").html(data);
            $(".bootbox.modal.fade.in").fadeOut();
            $(".modal-dialog").fadeOut();
            $(".modal-backdrop.fade.in").fadeOut();
            showmess("Chúc mừng bạn đã đăng nhập thành công!", "success");
        }
    });
    return false
}
function KDownload() {
    var captcha = $("input[name='DownVerify']").val();
    var filmid = $("input[name='FilmID']").val();
    $.post(MAIN_URL + "/index.php", {KDownload: 1, captcha: captcha, filmid: filmid}, function (data) {
        if (data == 0)
            LoadMess('Oops...!', 'Mã bảo vệ không chính xác!', 'error');
        else if (data == 1) {
            LoadMess('Oops...!', 'Phim bạn chọn không tồn tại trên hệ thống!', 'error');
        } else {
            $("#download-link-list").html(data);
        }
    });
    return false
}

function Logout() {
    var d = {Logout: 1};
    $.post(AjaxURL, d, function (data) {
        if (data == 1) {
            LoadMess("Đã xảy ra lỗi", "Bạn vui lòng đăng nhập mới sử dụng được chức năng này!", "error");
        } else {
            $("#widget_user_header").html(data);
            showmess("Thoát thành công!", "success");
        }
    });
    return false
}
function modal(tit, mess) {
    bootbox.dialog({title: tit, message: mess, });
}
function LoadMessage(tit, mess, labels) {
    bootbox.dialog({title: tit, message: mess,
        buttons: {
            success: {
                label: labels,
                className: "btn-primary",
                callback: function () {
                }
            }
        }
    });
}
function _Register() {
    var a = '<div class="row" id="registerz">  ' +
            '<div class="col-md-12"> ' +
            '<form class="form-horizontal" method="post"> ' +
            '<div class="form-group"> ' +
            '<div class="col-md-4"> ' +
            '<label class="col-md-4 control-label" for="name">Tài khoản</label> ' +
            '<input id="name" name="username" type="text" placeholder="Tên tài khoản" class="form-control input-md"> </div> ' +
            '</div> ' +
            '<div class="form-group"> ' +
            '<div class="col-md-4">' +
            '<label class="col-md-4 control-label" for="name">Mật khẩu</label> ' +
            '<input id="name" name="password" type="password" placeholder="Mật khẩu" class="form-control input-md"></div>  ' +
            '</div> ' +
            '<div class="form-group">' +
            '<div class="col-md-4">' +
            '<label class="col-md-4 control-label" for="name">Xác nhận mật khẩu</label> ' +
            '<input id="name" name="repassword" type="password" placeholder="Xác nhận mật khẩu" class="form-control input-md"></div>  ' +
            '</div> ' +
            '<div class="form-group">' +
            '<div class="col-md-4"> ' +
            '<label class="col-md-4 control-label" for="name">Email</label> ' +
            '<input id="name" name="email" type="text" placeholder="email@domain.com" class="form-control input-md"></div>  ' +
            '</div> ' +
            '<div class="form-group" style="margin-bottom: 0;">' +
            '<div class="col-md-4"> ' +
            '<label class="col-md-4 control-label" for="name">Mã bảo vệ</label> ' +
            '<img id="captchaimg" src="' + MAIN_URL + "/framework/captcha.php?rand=" + Math.random() + '"> <a class="refresh" href="javascript: refreshCaptcha();"></a></div>  ' +
            '</div> ' +
            '<div class="form-group">' +
            '<div class="col-md-4"> ' +
            '<label class="col-md-4 control-label" for="name">Nhập mã bảo vệ</label> ' +
            '<input id="name" name="captcha" type="text" class="form-control input-md"></div>  ' +
            '</div> ' +
            '<div class="form-group" style="margin-left: 155px;">' +
            '<div class="col-md-4"> ' +
            '<input class="btn btn-primary" type="submit" onclick="return dangKy();" value="Xác nhận"> ' +
            '</div> ' +
            '</form> </div>  </div>';
    modal('Đăng ký tài khoản', a);
}
function dangKy() {
    var a = $("input[name='username']").val();
    g = $("input[name='password']").val();
    b = $("input[name='repassword']").val();
    f = $("input[name='email']").val();
    l = $("input[name='captcha']").val();

    if (g != b)
        LoadMess("Đã xảy ra lỗi", "M\u1eadt kh\u1ea9u v\u00e0 m\u1eadt kh\u1ea9u x\u00e1c nh\u1eadn kh\u00f4ng gi\u1ed1ng nhau!", "error");
    var d = {Kregister: 1, username: a, password: g, repassword: b, email: f, captcha: l};
    $.post(AjaxURL, d, function (data) {
        if (data == 1) {
            $(".bootbox.modal.fade.in").fadeOut();
            $(".modal-dialog").fadeOut();
            $(".modal-backdrop.fade.in").fadeOut();
            swal({
                title: "Đăng ký thành công",
                text: "Hãy đăng nhập ngay để xem những bộ phim bom tấn cực hay cùng chúng tôi!",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Đăng nhập",
                closeOnConfirm: true}, function () {
                _Login();
            });
            showmess("Ch\u00fac m\u1eebng b\u1ea1n b\u1ea1n \u0111\u00e3 \u0111\u0103ng k\u00fd th\u00e0nh c\u00f4ng!", "success");
        } else {
            LoadMess("Đã xảy ra lỗi", data, "error");
        }
    });
    return false
}
function refreshCaptcha() {
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
}
function _autonext() {
    if (pautonext) {
        $("#autonext-status").html("Tắt");
        pautonext = false
    } else {
        $("#autonext-status").html("Bật");
        pautonext = true
    }
    return false
}
function setCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toUTCString());
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) != -1) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function rememberPosition(ID) {
    if (jwplayer().getState() == "IDLE") {
        setCookie("Episode_" + ID, 0, -1);
    } else {
        setCookie("Episode_" + ID, Math.round(jwplayer().getPosition()), 7);
        setTimeout("rememberPosition()", 5000);
    }
}
function FilterFilm(type, sort) {
    if (type == 1) {
        $("#filter_sapxep li i").removeClass("selected");
        $("#filter_sapxep li").removeClass("active");
        $("#filter_sapxep li#" + sort + " i").addClass("selected");
        $("#filter_sapxep li#" + sort).addClass("active");
    } else if (type == 2) {
        $("#filter_hinhthuc li i").removeClass("selected");
        $("#filter_hinhthuc li").removeClass("active");
        $("#filter_hinhthuc li#" + sort + " i").addClass("selected");
        $("#filter_hinhthuc li#" + sort).addClass("active");
    } else if (type == 3) {
        $("#filter_theloai li i").removeClass("selected");
        $("#filter_theloai li").removeClass("active");
        $("#filter_theloai li#" + sort + " i").addClass("selected");
        $("#filter_theloai li#" + sort).addClass("active");
    }
    else if (type == 4) {
        $("#filter_quocgia li i").removeClass("selected");
        $("#filter_quocgia li").removeClass("active");
        $("#filter_quocgia li#" + sort + " i").addClass("selected");
        $("#filter_quocgia li#" + sort).addClass("active");
    } else if (type == 5) {
        $("#filter_phathanh li i").removeClass("selected");
        $("#filter_phathanh li").removeClass("active");
        $("#filter_phathanh li#" + sort + " i").addClass("selected");
        $("#filter_phathanh li#" + sort).addClass("active");
    }
}
jQuery(document).ready(function () {
//Thanh cuộn top phim tuần+tháng
    jQuery(function () {
        jQuery('#list-info-film').slimScroll({height: '267px', railVisible: true, alwaysVisible: true});
    });
    jQuery('#btn_search').click(function () {
        try {
            var eptype = jQuery('#filter_hinhthuc .active').attr('data-type');
            var category = jQuery('#filter_theloai .active').attr('data-category');
            var country = jQuery('#filter_quocgia .active').attr('data-country');
            var year = jQuery('#filter_phathanh .active').attr('data-year');
            var submitPath = '';
            if (eptype != '') {
                switch (eptype) {
                    case 'phim-chieu-rap':
                        submitPath += 'phim-chieu-rap/';
                        break;
                    case 'phim-le':
                        submitPath += 'phim-le/';
                        break;
                    case 'phim-bo':
                        submitPath += 'phim-bo/';
                        break;
                }
            }
            if (category != '') {
                if (submitPath == '')
                    submitPath = 'the-loai/';
                submitPath += jQuery('#filter_theloai .active').attr('data-category') + '/';
            }
            if (country != '')
            {
                if (submitPath == '') {
                    submitPath = 'quoc-gia/' + country + '/';
                } else {
                    submitPath += country + '/';
                }
            }
            if (year != '' && year.length == 4) {
                if (submitPath == '')
                    submitPath += 'phim-' + year + '/';
                else
                    submitPath += year + '/';
            }
            var linkdirect = MAIN_URL + '/' + submitPath;
            window.location.replace(linkdirect);
            return false;
        }
        catch (err) {
            alert(err.description);
            return true;
        }
    });
});
function phim24haz(EpisodeID, Server, TYPe) {
    var EpID = getCookie("Episode_" + EpisodeID);
    var playerInstance = jwplayer("media-player-box");
    $('html, body').animate({scrollTop: $("#watch-block").offset().top}, 500);
    var filmID = parseInt($("input[name='film_ID']").val());
    var epiNAME = $("input[name='Epi_NAME']").val();
    var filmName = $('.movie-l-img img').attr('alt');
    $("li.episode a").removeClass("active");
    $("#btn-episode-" + EpisodeID).addClass("active");
    $.post(AjaxURL, {EpisodeURL: 1, EpisodeID: EpisodeID, TYPe: TYPe}, function (EpisodeURL) {
        $( "#media-player-box" ).html( EpisodeURL );
    });
}

function dienvien(a) {
    $.post(MAIN_URL + "/index.php", {dienvien: 1, page: a}, function (a) {
        html = a.split("{***}");
        $(".list-movie").append(html[0]);
        html[1] ? $("#show-actor-click").html(html[1]) : $("#show-actor-click").remove()
    })
}

function filmdienvien(a, b) {
    $.post(MAIN_URL + "/index.php", {filmdienvien: 1, key: a, page: b
    }, function (a) {
        $("#show-film-click").remove();
        $("#dien-vien-show-film").append(a)
    });
    return !1
}

//info - js
$(document).ready(function () {
    $("#mobile").click(function () {
        jAlert('Vui Lòng Xem Phim Bằng Điện Thoại', 'Thông Báo');
    });
    $("#update").click(function () {
        jAlert('Đang Cập Nhật', 'Thông Báo');
    });
    $("#bookmark").click(function () {
        jAlert('Chức Năng Này Đang Cập Nhật', 'Thông Báo');
    });
    $("#bookmark2").click(function () {
        jAlert('Chức Năng Này Đang Cập Nhật', 'Thông Báo');
    });
    $("#bookmark3").click(function () {
        jAlert('Chức Năng Này Đang Cập Nhật', 'Thông Báo');
    });
});
/* $("#phim18").click( function() {
 jConfirm('Phim Có Nội Dung 18+, Bạn Đã Trên 18 Tuổi Hay Chưa.', 'Thông Báo', function(r) {
 jAlert('Confirmed: ' + r, 'Confirmation Results');
 });
 });
 *///tab info
function tab(a, b) {
    var c = $("#tab_" + a + "_" + b);
    var d = $("#tab_ct_" + a + "_" + b);
    $("#" + a + " .tabs li, #" + a + " .tab_ct").removeClass("c");
    c.addClass('c');
    d.addClass('c');
}
function filmBox(film_id) {
    $.post(MAIN_URL + "/index.php", {filmBox: 1, film_id: film_id}, function (c) {
        if (c == 1) {
            LoadMess('Opps...', 'Bạn vui lòng đăng nhập để sử dụng chức năng này!', 'warning');
        } else if (c == 2) {
            showmess('Phim này đã được xóa ra khỏi tủ phim của bạn!!', 'success');
            document.getElementById("btn-text_add").innerHTML = 'Thêm vào tủ phim';
        } else if (c == 3) {
            showmess('Phim này đã được thêm vào tủ phim của bạn!', 'success');
            document.getElementById("btn-text_add").innerHTML = 'Xóa khỏi tủ phim';
        }
    });

    return false;
}
function ip_error(film_id, episode_id) {
    $.post(MAIN_URL + "/index.php", {error: 1, film_id: film_id, episode_id: episode_id}, function (c) {
        if (c == 1) {
            showmess('Thông báo của bạn đã được gửi đi, BQT sẽ khắc phục trong thời gian sớm nhất. Thank!', 'success');
        } else if (c == 0) {
            LoadMess("Đã xảy ra lỗi", "Bạn vui lòng đăng nhập mới sử dụng được chức năng này!", "error");
        }
    });

    return false;
}
function parallax(top) {
    var scrollPos = $(window).scrollTop();
    if (scrollPos > top) {
        $("#phim24h_leftid").css({"position": "fixed", "top": "0px"});
        $("#phim24h_rightid").css({"position": "fixed", "top": "0px"});
    } else {
        $("#phim24h_leftid").css({"position": "absolute", "top": "122px"});
        $("#phim24h_rightid").css({"position": "absolute", "top": "122px"});
    }
}
function LoadMess(title, mess, type) {
    swal(title, mess, type);// type error,success,warning
    return false;
}
function showmess(a, type) {
    showNotification({type: type, /* gá»“m: information,warning,error,success */
        message: a,
        autoClose: true,
        duration: 2 /* Ä‘Ă³ng sau 2s */
    });
}


function google(ss) {
    (function ($) {
        var config = {
            siteURL: ss, // Change this to your site
            searchSite: true,
            type: 'web',
            append: false,
            perPage: 8, // A maximum of 8 is allowed by Google
            page: 0				// The start page
        }
        // The small arrow that marks the active search icon:
        var arrow = $('<span>', {className: 'arrow'}).appendTo('ul.icons');

        $('ul.icons li').click(function () {
            var el = $(this);

            if (el.hasClass('active')) {
                // The icon is already active, exit
                return false;
            }
            el.siblings().removeClass('active');
            el.addClass('active');
            // Move the arrow below this icon
            arrow.stop().animate({
                left: el.position().left,
                marginLeft: (el.width() / 2) - 4
            });

            // Set the search type
            config.type = el.attr('data-searchType');
            $('#more').fadeOut();
        });

        // Adding the site domain as a label for the first radio button:
        $('#siteNameLabel').append(' ' + config.siteURL);

        // Marking the Search tutorialzine.com radio as active:
        $('#searchSite').click();

        // Marking the web search icon as active:
        $('li.web').click();

        // Focusing the input text box:
        $('#s').focus();

        $('#searchForm').submit(function () {
            googleSearch();
            return false;
        });

        $('#searchSite,#searchWeb').change(function () {
            // Listening for a click on one of the radio buttons.
            // config.searchSite is either true or false.

            config.searchSite = this.id == 'searchSite';
        });


        function googleSearch(settings) {

            // If no parameters are supplied to the function,
            // it takes its defaults from the config object above:

            settings = $.extend({}, config, settings);
            settings.term = settings.term || $('#s').val();

            if (settings.searchSite) {
                // Using the Google site:example.com to limit the search to a
                // specific domain:
                settings.term = 'site:' + settings.siteURL + ' ' + settings.term;
            }

            // URL of Google's AJAX search API
            var apiURL = 'http://ajax.googleapis.com/ajax/services/search/' + settings.type + '?v=1.0&callback=?';
            var resultsDiv = $('#resultsDiv');

            $.getJSON(apiURL, {q: settings.term, rsz: settings.perPage, start: settings.page * settings.perPage}, function (r) {

                var results = r.responseData.results;
                $('#more').remove();

                if (results.length) {

                    // If results were returned, add them to a pageContainer div,
                    // after which append them to the #resultsDiv:

                    var pageContainer = $('<div>', {className: 'pageContainer'});

                    for (var i = 0; i < results.length; i++) {
                        // Creating a new result object and firing its toString method:
                        pageContainer.append(new result(results[i]) + '');
                    }

                    if (!settings.append) {
                        // This is executed when running a new search, 
                        // instead of clicking on the More button:
                        resultsDiv.empty();
                    }

                    pageContainer.append('<div class="clear"></div>')
                            .hide().appendTo(resultsDiv)
                            .fadeIn('slow');

                    var cursor = r.responseData.cursor;

                    // Checking if there are more pages with results, 
                    // and deciding whether to show the More button:

                    if (+cursor.estimatedResultCount > (settings.page + 1) * settings.perPage) {
                        $('<div>', {id: 'more'}).appendTo(resultsDiv).click(function () {
                            googleSearch({append: true, page: settings.page + 1});
                            $(this).fadeOut();
                        });
                    }
                }
                else {
                    // No results were found for this search.				
                    resultsDiv.empty();
                    $('<p>', {className: 'notFound', html: 'No Results Were Found!'}).hide().appendTo(resultsDiv).fadeIn();
                }
            });
        }

        function result(r) {
            // This is class definition. Object of this class are created for
            // each result. The markup is generated by the .toString() method.
            var arr = [];
            // GsearchResultClass is passed by the google API
            switch (r.GsearchResultClass) {
                case 'GwebSearch':
                    arr = [
                        '<div class="webResult">',
                        '<h2><a href="', r.unescapedUrl, '" target="_blank">', r.title, '</a></h2>',
                        '<p>', r.content, '</p>',
                        //'<a href="',r.unescapedUrl,'" target="_blank">',r.visibleUrl,'</a>',
                        '</div>'
                    ];
                    break;
                case 'GimageSearch':
                    arr = [
                        '<div class="imageResult">',
                        '<a target="_blank" href="', r.unescapedUrl, '" title="', r.titleNoFormatting, '" class="pic" style="width:', r.tbWidth, 'px;height:', r.tbHeight, 'px;">',
                        '<img src="', r.tbUrl, '" width="', r.tbWidth, '" height="', r.tbHeight, '" /></a>',
                        '<div class="clear"></div>', '<a href="', r.originalContextUrl, '" target="_blank">', r.visibleUrl, '</a>',
                        '</div>'
                    ];
                    break;
                case 'GvideoSearch':
                    arr = [
                        '<div class="imageResult">',
                        '<a target="_blank" href="', r.url, '" title="', r.titleNoFormatting, '" class="pic" style="width:150px;height:auto;">',
                        '<img src="', r.tbUrl, '" width="100%" /></a>',
                        '<div class="clear"></div>', '<a href="', r.originalContextUrl, '" target="_blank">', r.publisher, '</a>',
                        '</div>'
                    ];
                    break;
                case 'GnewsSearch':
                    arr = [
                        '<div class="webResult">',
                        '<h2><a href="', r.unescapedUrl, '" target="_blank">', r.title, '</a></h2>',
                        '<p>', r.content, '</p>',
                        '<a href="', r.unescapedUrl, '" target="_blank">', r.publisher, '</a>',
                        '</div>'
                    ];
                    break;
            }

            // The toString method.
            this.toString = function () {
                return arr.join('');
            }
        }
        $('#searchForm').submit();
    })(jQuery);
}

function creatlink(link) {
    var a = document.getElementById('down-ep');
    a.href = link
}


function WatchTrailer(URL) {
    jwplayer('watch_trailer').setup({
        flashplayer: MAIN_URL + '/player/player.swf',
        plugins: "timeslidertooltipplugin-1,http://plugins.longtailvideo.com/5/captions/captions.swf," + MAIN_URL + "/player/plugins/proxy.swf",
        "file": URL,
        "proxy.file": MAIN_URL + '/player/player.php',
        skin: MAIN_URL + '/player/kleur/kleur.xml',
        width: 640,
        height: 360,
        logo: {
            file: MAIN_URL + '/player/logo-player.png',
            hide: 'false',
            position: 'top left',
            margin: '10'
        },
        autostart: "true",
        "controlbar.position": "bottom",
    });
}

function apprise(a, b, c, d) {
    var e = {
        confirm: false,
        verify: false,
        input: false,
        animate: false,
        textOk: "Ok",
        textCancel: "\u0110\u00f3ng",
        textYes: "C\u00f3",
        textNo: "Kh\u00f4ng"
    };
    if (c)
        for (var f in e)
            if (typeof c[f] == "undefined")
                c[f] = e[f];
    var g = $(document).height();
    var h = $(document).width();
    $(".appriseOverlay").remove();
    $(".appriseOuter").remove();
    $("body").append('<div class="appriseOverlay" id="aOverlay"></div>');
    $(".appriseOverlay").css("height", g).css("width", h).fadeIn(100);
    $("body").append('<div class="appriseOuter"></div>');
    $(".appriseOuter").append("<h2>" + a + '</h2><a class="close"></a>');
    $(".appriseOuter").append('<div class="appriseInner"></div>');
    $(".appriseInner").append(b);
    $(".appriseOuter").append('<div class="iposbottom"></div>');
    $(".appriseOuter").css("left", ($(window).width() - $(".appriseOuter").width()) / 2 + $(window).scrollLeft() + "px");
    if (c)
        if (c["animate"]) {
            var i = c["animate"];
            if (isNaN(i))
                i = 390;
            $(".appriseOuter").css("top", "-200px").show().animate({
                top: "100px"
            }, i)
        } else
            $(".appriseOuter").css("top", "100px").fadeIn(200);
    else
        $(".appriseOuter").css("top", "100px").fadeIn(200);
    if (c)
        if (c["input"]) {
            if (typeof c["input"] == "string")
                $(".iposbottom").append('<div class="aInput"><input type="text" class="aTextbox" t="aTextbox" value="' + c["input"] + '" /></div>');
            else
                $(".iposbottom").append('<div class="aInput"><input type="text" class="aTextbox" t="aTextbox" /></div>');
            $(".aTextbox").focus()
        }
    $(".iposbottom").append('<div class="aButtons"></div>');
    if (c)
        if (c["confirm"] || c["input"]) {
            $(".aButtons").append('<button value="ok">' + c["textOk"] + "</button>");
            $(".aButtons").append('<button value="cancel">' + c["textCancel"] + "</button>")
        } else if (c["verify"]) {
            $(".aButtons").append('<button value="ok">' + c["textYes"] + "</button>");
            $(".aButtons").append('<button value="cancel">' + c["textNo"] + "</button>")
        } else
            $("div.iposbottom").hide();
    else
        $(".aButtons").append('<button value="ok">Ok</button>');
    $(document).keydown(function (a) {
        if ($(".appriseOverlay").is(":visible")) {
            if (a.keyCode == 13)
                $('.aButtons > button[value="ok"]').click();
            if (a.keyCode == 27)
                $('.aButtons > button[value="cancel"]').click()
        }
    });
    var j = $(".aTextbox").val();
    if (!j)
        j = false;
    $(".aTextbox").keyup(function () {
        j = $(this).val()
    });
    $(".aButtons > button,a.close").click(function () {
        $(".appriseOverlay").fadeOut(300);
        $(".appriseOuter").fadeOut(300);
        if (d) {
            var a = $(this).attr("value");
            if (a == "ok")
                if (c)
                    if (c["input"])d(j);
                    else d(true);
                else d(true);
            else if (a == "cancel")d(false)
        }
    })
}
;
function UrlLoad(a) {
    window.location = a;
    return false;
}
function ViewTrailer(ID) {
//--Nếu kích thước màn hình nhỏ thì ko play ở popup
    var wWidth = jQuery(window).width();
    var wHeight = jQuery(window).height();
    if (wWidth < 1000 || wHeight < 600) {
        //--Lấy URL của trailer nếu màn hình nhỏ
        UrlLoad(jQuery('#btn-film-trailer').attr('data-href'));
        return true;
    }
    //--Lấy URL của trailer
    var videoUrl = jQuery('#btn-film-trailer').attr('data-videourl');
    if (typeof videoUrl != 'string')
        return true;
    //--Lấy URL của film
    var Filmhref = jQuery('#btn-film-trailer').attr('data-film');
    if (typeof Filmhref != 'string')
        return true;
    var filmName = jQuery('#btn-film-trailer').attr('title');
    var b = '<style>.modal-dialog{max-width: 75%;}</style><div id="popup_player" style="width:960px;">' +
            '<div style="width:660px;float:left;" id="watch_trailer">' + '</div>' +
            '<div id="show_cmfb" style="width: 312px;float:right;"><fb:comments href="' + Filmhref + '" numposts="10" width="300" colorscheme="light"></fb:comments></div>' +
            '</div>';
    modal(filmName, b);
    if (typeof FB != "undefined" && typeof FB.XFBML.parse == "function")
        FB.XFBML.parse(document.getElementById("show_cmfb"));
    WatchTrailer(videoUrl);
}
