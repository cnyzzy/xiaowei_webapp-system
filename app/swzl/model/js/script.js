; (function($) {

    var config = {};
    $(window).bind('load',
    function() {
        reset();
    });
    $(window).bind('resize',
    function() {
        reset();
        $('.works').each(function() {
            $(this).find('img').attr('width', '').attr('height', '');
        });
    });
    function reset() {
        config.w = $(window).width();
        config.h = $(window).height();
        $('#menu').height(config.h);
        config.ww = $('.website').width();
        $('.website li,.website').width(config.ww);
        config.wl = $('.website li').length;
        $('.website ul').width(config.wl * config.ww);
        $('.ct').height(config.h - 60);
        if ($('.title_d').width() - $('.title').width() > 0) {
            $('.title_d').addClass('round');
        } else {
            $('.title_d').removeClass('round');
        };
        if (document.getElementById('newwrap_t')) {
            $('#newwrap_t,#newwrap').width(config.w);
        }
        $('#myfavorites li').width(($('#myfavorites ul').width() - 10) / 2);
        $('#myfavorites li span').width(($('#myfavorites li').width() - 20) / 3);
    }
    var touchEnd;
    var dd = 0;
    function tcst() {
        $('#list li').bind('touchstart touchmove touchend',
        function(e) {
            if (e.type == 'touchstart') {
                $(this).addClass('touch');
            } else if (e.type == 'touchend') {
                $(this).removeClass('touch');
            } else {
                var _this = $(this);
                clearTimeout(touchEnd);
                touchEnd = setTimeout(function() {
                    _this.removeClass('touch');
                },
                100);
            }
        });
    }
    tcst();
    $('.post_comment').bind('touchstart touchend',
    function(e) {
        if (e.type == 'touchstart') {
            $(this).find('a').addClass('ton');
        } else {
            $(this).find('a').removeClass('ton');
        }
    });
    $('#header i').bind('touchstart touchmove touchend',
    function(e) {
        if (e.type == 'touchstart') {
            $(this).addClass('ton');
        } else if (e.type == 'touchmove') {
            $(this).removeClass('ton');
        } else {
            $(this).removeClass('ton');
        }
    });
    var reply_lock = false;
    $('#content').bind('touchstart touchmove touchend',
    function(e) {
        if ($('#container').hasClass('push') == false && $('#container').hasClass('pull') == false) {
            var t = event.touches[0];
            if (e.type == 'touchstart') {
                config.touchY = t.pageY;
            } else if (e.type == 'touchmove') {
                config.touchEY = t.pageY - config.touchY;
                if (config.touchEY > 0) {
                    $('#header,#us_panel,#us_panel2').removeClass('hide');
                    $('.post_comment_content textarea').blur();
                    $('.post_comment_content,#send_msg').removeClass('show');
                    $('#us_panel').css({
                        'position': 'fixed',
                        'bottom': '0'
                    });
                    reply_lock = false;
                } else if (config.touchEY < 0) {
                    $('#header,#us_panel,#us_panel2').addClass('hide');
                    $('.post_comment_content textarea').blur();
                    $('#us_panel').css({
                        'position': 'fixed',
                        'bottom': '0'
                    });
                    $('.post_comment_content,#send_msg').removeClass('show');
                    reply_lock = false;
                }
            } else {}
        }
    });
    $('.menu_open').bind('click',
    function(e) {
        if ($('#container').hasClass('pull') == false) {
            if (dd == 0) {
                $('#container,#menu,#header,#us_panel').addClass('push');
                dd = 1;
                $(window).bind('touchmove',
                function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                });
                $('#us_panel').addClass('hide');
            } else {
                $('#container,#menu,#header,#us_panel').removeClass('push');
                dd = 0;
                $(window).unbind('touchmove');
            };
        }
        return false;
    });
    $('.search_open').bind('click',
    function(e) {
        if ($('#container').hasClass('push') == false) {
            if (dd == 0) {
                $('#container,#user,#header,#us_panel').addClass('pull');
                dd = 1;
                $(window).bind('touchmove',
                function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                });
                $('#us_panel').addClass('hide');
            } else {
                $('#container,#user,#header,#us_panel').removeClass('pull');
                dd = 0;
                $(window).unbind('touchmove');
            }
        }
        return false;
    });
    $('.push_msk').bind('touchmove',
    function(e) {
        if ($('#container').hasClass('pull')) {
            $('.search_open').trigger('click');
        } else if ($('#container').hasClass('push')) {
            $('.menu_open').trigger('click');
        }
        return false;
    });
    $('.hd .fr,.ct_submit,.user_logout,.comment_reply_submit,.more_comment,.visit_site a,.sort_b,.cancel_share a,.message_system li,.delete_check_sure,.delete_check_cancel,#choose_album li a').bind('touchstart touchend',
    function(e) {
        if (e.type == 'touchstart') {
            $(this).addClass('ton');
        } else {
            $(this).removeClass('ton');
        }
    });
    $('.search_input').bind('input',
    function() {
        if ($('.search_input').val().length > 0) {
            $('.reset_input').show();
        } else {
            $('.reset_input').hide();
        }
    });
    $('.reset_input').bind('touchstart touchend',
    function(e) {
        if (e.type == 'touchstart') {
            $('.search_input').val('');
            $('.reset_input').addClass('ton');
        } else if (e.type == 'touchend') {
            $('.reset_input').removeClass('ton').hide();
        }
    });
    $('#reg_now').bind('click',
    function() {
        $('#reg_index').addClass('show');
        $(window).unbind('touchmove');
    });
    $('.reg_bar_close').bind('touchstart touchend click',
    function(e) {
        if (e.type == 'touchstart') {
            $(this).addClass('ton');
        } else if (e.type == 'touchend') {
            $(this).removeClass('ton');
        } else {
            if (document.getElementById('us_panel')) {
                $('#reg_index').removeClass('show');
                $(window).bind('touchmove',
                function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                });
            } else {
                $('#reg_index').removeClass('show');
            }
        }
    });
    $('.login').bind('click',
    function() {
        $('#login_index').addClass('show');
        $(window).unbind('touchmove');
    });
    $('.login_bar_close').bind('touchstart touchend click',
    function(e) {
        if (e.type == 'touchstart') {
            $(this).addClass('ton');
        } else if (e.type == 'touchend') {
            $(this).removeClass('ton');
        } else {
            $('#login_index').removeClass('show');
            $(window).bind('touchmove',
            function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
            });
        }
    });
    $('.login_user input,.login_password input').bind('input',
    function() {
        if ($(this).val().length > 0) {
            $(this).parent().find('i').show();
            loginIpt();
        } else {
            $(this).parent().find('i').hide();
        }
    });
    function loginIpt() {
        $('.login_user i').bind('touchstart touchend',
        function(e) {
            if (e.type == 'touchstart') {
                $(this).addClass('ton');
            } else {
                $(this).parent().find('input').val('');
                $(this).hide();
                $(this).removeClass('ton');
            }
        });
        $('.login_password i').bind('touchstart touchend',
        function(e) {
            if (e.type == 'touchstart') {
                $(this).addClass('ton');
            } else {
                $(this).parent().find('input').val('');
                $(this).hide();
                $(this).removeClass('ton');
            }
        });
    };

    var wbI = 0;
    config.stx,
    config.edx,
    config.ttx = 0;
    $('.website').bind('touchstart touchmove touchend',
    function(e) {
        if (e.type == 'touchstart') {
            var t = e.touches[0];
            config.stx = t.pageX,
            config.sty = t.pageY;
        } else if (e.type == 'touchmove') {
            var t = e.touches[0];
            config.edx = t.pageX,
            config.edy = t.pageY;
            document.querySelector('.website ul').style.webkitTransform = 'translateX(' + ((config.edx - config.stx) + config.ttx) + 'px)';
            document.querySelector('.website ul').style.oTransform = 'translateX(' + ((config.edx - config.stx) + config.ttx) + 'px)';
            document.querySelector('.website ul').style.mozTransform = 'translateX(' + ((config.edx - config.stx) + config.ttx) + 'px)';
            document.querySelector('.website ul').style.transform = 'translateX(' + ((config.edx - config.stx) + config.ttx) + 'px)';
            if (config.edx - config.stx < 0) {
                e.preventDefault();
            }
            if (config.edx - config.stx > 0) {
                e.preventDefault();
            }
        } else {
            if (config.edx - config.stx <= 60 && config.edx - config.stx >= -60) {
                $('.website ul').animate({
                    translate3d: '-' + (config.ww * wbI) + 'px,0,0'
                },
                300, 'cubic-bezier(0.175, 0.885, 0.32, 1.275)');
                e.preventDefault();
            }
            if (config.edx - config.stx > 60) { (wbI > 0) ? wbI--:wbI = 0;
                $('.website ul').animate({
                    translate3d: '-' + (config.ww * wbI) + 'px,0,0'
                },
                300, 'ease-in-out');
                e.preventDefault();
            }
            if (config.edx - config.stx < -60) { (wbI < config.wl - 1) ? wbI++:wbI = config.wl - 1;
                $('.website ul').animate({
                    translate3d: '-' + (config.ww * wbI) + 'px,0,0'
                },
                300, 'ease-in-out');
                e.preventDefault();
            }
            config.edx = 0,
            config.stx = 0,
            config.ttx = -config.ww * wbI;
        }
    });
    $('.designer_more').each(function() {
        $(this).find('a').each(function() {
            if ($(this).html() == '') {
                $(this).click(function() {
                    return false;
                });
            }
        });
    });

    $('#sort td').bind('click',
    function() {
        $('#sort_content').addClass('show');
        $('.asort').eq($(this).index()).addClass('show');
    });
    $('.asort .hd .fr').bind('click',
    function() {
        $('#sort_content').removeClass('show');
        var _this = $(this);
        setTimeout(function() {
            _this.parent().parent().parent().removeClass('show');
        },
        300);
    });
    var dt = ['', '', '', ''],
    scLock;
    $('.ct li').click(function() {
		 {
            var v = $(this).find('span').html();
            var i = $(this).parent().parent().parent().parent().index();
            if ($(this).hasClass('a_selected') && $(this).find('.s').attr('class') == undefined) {
                var _this = $(this);
   
             
            } else {
				
                $(this).parent().parent().find('li').removeClass('a_selected');
                $(this).addClass('a_selected');
                if ($(this).attr('c_data')) {
                    if ($(this).attr('c_data') != '') {
                        dt[0] = $(this).attr('c_data');
                    } else {
                        dt[0] = '';
                    }
                } else if ($(this).attr('t_data')) {
                      if ($(this).attr('t_data') != '') {
                        dt[1] = $(this).attr('t_data');
                    } else {
                        dt[1] = '';
                    }
                } else if ($(this).attr('s_data')){
                    if ($(this).attr('s_data') != '') {
                        dt[2] = $(this).attr('s_data');
                    } else {
                        dt[2] = '';
                    }
                }
                var dd = $(this).parent().parent().parent().parent().find('.fr');
	
      
                $('#sort td').eq(i).find('.sort_b_inner span').html(v);
                if ($(this).find('.s').attr('class')) {
					
					if ((dt[0] !== null && dt[0] !== undefined && dt[0] !== '')||(dt[1] !== null && dt[1] !== undefined && dt[1] !== '')||(dt[2] !== null && dt[2] !== undefined && dt[2] !== '')) { 
if(dt[0] !== null && dt[0] !== undefined && dt[0] !== ''){
	a = dt[0];
}
if(dt[1] !== null && dt[1] !== undefined && dt[1] !== ''){
	b = dt[1];
}
if(dt[2] !== null && dt[2] !== undefined && dt[2] !== ''){
	c = dt[2];
}
  $('html').addClass('loading');
            setTimeout(function() {
                window.location.href = zurl+"/swzl/index/"+a+"/"+b+"/"+c;
            },
            200);
					}
					
                   
                }
            }
  
        }
    });
    var postReplyId, cmofsT = 0;
    if (document.getElementById('more_about')) {
        cmofsT = $('#more_about').offset().top;
    }
    $('#post_comment_btn').click(function() {
        if ($('.post_comment_content').hasClass('show')) {
            if (reply_lock == false) {
                if ($('#post_comment_content').val() != '') {
                    $.post("http://www.uehtml.com/service/postnewComment", {
                        timestamp: YYToken.timestamp,
                        token: YYToken.token,
                        postid: commentId2,
                        content: $('#post_comment_content').val()
                    },
                    function(data) {
                        $('#comment ul').prepend('<li postdata="' + data.id + '" usdata="' + comment_id + '"><div class="pd5"><a class="avt fl" target="_blank" href="' + comment_at_url + '"><img src="' + comment_avatar + '"></a><div class="comment_content"><h5><div class="fl"><a class="comment_name" href="' + comment_at_url + '">' + comment_author + '</a><span>' + data.postdate + '</span></div><div class="fr reply_this">[回复]</div><div class="clear"></div></h5><div class="comment_p">' + data.content + '</div></div><div class="clear"></div><div class="comment_reply"></div></div></li>');
                        document.getElementById('container').scrollTop = cmofsT;
                        reply_lock = false;
                    },
                    'json');
                } else {
                    return false;
                }
            } else {
                if ($('#post_comment_content').val() != '') {
                    $.post("http://www.uehtml.com/service/postnewComment", {
                        timestamp: YYToken.timestamp,
                        token: YYToken.token,
                        postid: commentId2,
                        postcid: _cid,
                        postuid: comment_id,
                        content: $('#post_comment_content').val()
                    },
                    function(data) {
                        var ddd = '<div class="quote"><div class="pd10">' + _ct + '</div></div>';
                        $('#comment ul').prepend('<li postdata="' + data.id + '" usdata="' + comment_id + '"><div class="pd5"><a class="avt fl" target="_blank" href="' + comment_at_url + '"><img src="' + comment_avatar + '"></a><div class="comment_content"><h5><div class="fl"><a class="comment_name" href="' + comment_at_url + '">' + comment_author + '</a><span>' + data.postdate + '</span></div><div class="fr reply_this">[回复]</div><div class="clear"></div></h5><div class="comment_p">' + data.content + ddd + '</div></div><div class="clear"></div><div class="comment_reply"></div></div></li>');
                        document.getElementById('container').scrollTop = cmofsT;
                        reply_lock = false;
                    },
                    'json');
                } else {
                    return false;
                }
            }
        } else {
            if ($(this).hasClass('atc')) {
                $('.post_comment_content').addClass('show');
                $('#post_comment_content').val('').attr('placeholder', '发表评论');
                document.getElementById('post_comment_content').focus();
                $('#us_panel').css({
                    'position': 'absolute',
                    'bottom': '0px'
                });
            } else {
                $('#login_index').addClass('show');
            }
        }
    });
    $('.menu_share').click(function() {
        $('#share').addClass('show');
        $(window).bind('touchmove',
        function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
        });
    });
    $('.cancel_share,.share_msk').click(function() {
        $('#share').removeClass('show');
        $(window).unbind('touchmove');
    });
 
    var choose_cate = ['_cate_all', '_cate_creat', '_cate_site', '_cate_inspire', '_cate_article', '_cate_app'],
    choose_sort = ['sort_re', 'sort_recom', 'sort_fa', 'sort_vi', 'sort_com'];
    $('.choose_cate li').each(function(i) {});
    $('.choose_sort li').each(function(i) {
        $(this).find('.s').addClass(choose_sort[i]);
    });

    $('.works').each(function() {
        var v = $(this).find('a img').attr('vsrc');
        $(this).find('a img').attr('vsrc', v.replace(/1140x0.jpg/, '800x0.jpg'));
    });
  
    $(window).bind('DOMContentLoaded',
    function() {
        setTimeout(function() {
            if (!document.getElementById('newwrap')) {
                img_loader();
            }
            $('html').removeClass('loading');
        },
        400);
    });
    $('a').click(function() {
        var _this = $(this);
        if (_this.parent().hasClass('menu_back')) {
            if (window.parent.document.getElementById('newwrap')) {
                var d = $(window.parent.document).find('#newwrap').attr('dataurl'),
                dt = $(window.parent.document).find('#newwrap').attr('datatitle');
                $(window.parent.document).find('#newwrap_t').removeClass('show');
                $(window.parent.document).find('#header,#container').removeClass('newframe');
                setTimeout(function() {
                    $(window.parent.document).find('#newwrap').attr('src', '');
                },
                400);
                window.parent.history.replaceState(null, dt, d);
                window.parent.document.title = dt;
                _this.attr('href', '');
                $('.alist').openNewFrame();
            } else {
                $('html').addClass('loading2');
                $('html').addClass('loading');
                setTimeout(function() {
                    window.location.href = _this.attr('href');
                },
                200);
            }
            return false;
        } else if (_this.parent().hasClass('menu_back2')) {
            $('html').addClass('loading2');
            $('html').addClass('loading');
            setTimeout(function() {
                window.location.href = _this.attr('href');
            },
            200);
        } else if (_this.parent().hasClass('sort_b') || _this.parent().hasClass('home_profile_c') || _this.parent().hasClass('cancel_share') || _this.parent().hasClass('relationship') || _this.attr('id') == 'reg_now' || _this.attr('class') == 'login_submit' || _this.attr('class') == 'more_comment' || _this.attr('class') == 'delete_check_sure' || _this.attr('class') == 'delete_check_cancel' || _this.attr('href') == '' || _this.attr('href') == '#' || _this.attr('href') == 'javascript:void(0);' || $(this).attr('target') == "_blank") {} else {
            $('html').addClass('loading');
            setTimeout(function() {
                window.location.href = _this.attr('href');
            },
            400);
            return false;
        }
    });
    $('.login_submit').click(function() {
        $.post("http://www.uehtml.com/service/loginUser", {
            timestamp: YYToken.timestamp,
            token: YYToken.token,
            email: $('.login_user input').val(),
            password: $('.login_password input').val()
        },
        function() {
            window.location.href = "/";
        });
    });
    var img_loader = function() {
        var imgReady = (function() {
            var list = [],
            intervalId = null,
            tick = function() {
                var i = 0;
                for (; i < list.length; i++) {
                    list[i].end ? list.splice(i--, 1) : list[i]();
                }; ! list.length && stop();
            },
            stop = function() {
                clearInterval(intervalId);
                intervalId = null;
            };
            return function(url, ready, load, error) {
                var onready, width, height, newWidth, newHeight, img = new Image();
                img.src = url;
                if (img.complete) {
                    ready.call(img);
                    load && load.call(img);
                    return;
                };
                width = img.width;
                height = img.height;
                img.onerror = function() {
                    error && error.call(img);
                    onready.end = true;
                    img = img.onload = img.onerror = null;
                };
                onready = function() {
                    newWidth = img.width;
                    newHeight = img.height;
                    if (newWidth !== width || newHeight !== height || newWidth * newHeight > 1024) {
                        ready.call(img);
                        onready.end = true;
                    };
                };
                onready();
                img.onload = function() { ! onready.end && onready();
                    load && load.call(img);
                    img = img.onload = img.onerror = null;
                };
                if (!onready.end) {
                    list.push(onready);
                    if (intervalId === null) intervalId = setInterval(tick, 40);
                };
            };
        })();
        $('.works').each(function() {
            var e = $(this).find('img'),
            v = e.attr('vsrc');
            imgReady(v,
            function() {
                e.attr('width', this.width);
                e.attr('height', (($(window).width() - 10) / this.width) * this.height);
                e.attr('src', v);
            });
        });
    }
    $('.article_ct img').css('height', 'auto').attr('height', '').attr('width', '');
    var _thist_ = document.title,
    thistd = window.location.href;
    $.fn.openNewFrame = function() {
        $(this).click(function() {
            var _thisv = $(this).attr('vhref'),
            _thist = $(this).find('.list_info h4').html();
            if (document.getElementById('newwrap')) {
                $('#newwrap').attr('src', _thisv).attr('dataurl', thistd).attr('datatitle', _thist_);
                $('#newwrap_t').addClass('show');
                history.replaceState(null, _thist, _thisv);
                document.title = _thist;
                $('#header,#container').addClass('newframe');
            }
        });
    };
    $('.works_info iframe').css({
        'margin': '0 auto',
        'display': 'inlineBlock',
        'maxWidth': '100%',
        'height': 'auto',
        'position': 'relative'
    });
    $('.works_info iframe').each(function() {
        if ($(this).parent().parent().hasClass('pd10')) {
            $(this).parent().parent().css({
                'position': 'relative',
                'paddingLeft': '0',
                'paddingRight': '0'
            });
        }
    });
    $('.alist').openNewFrame();
    location.href.indexOf('fid=') < 0 && $('.a_selected').trigger('click');
    $('.us_panel_menu').click(function() {
        if ($('#us_panel_menu').hasClass('show')) {
            $('#us_panel_menu').removeClass('show');
            $('.arrow_top').removeClass('open');
            $(window).unbind('touchmove');
        } else {
            $('#us_panel_menu').addClass('show');
            $('.arrow_top').addClass('open');
            $(window).bind('touchmove',
            function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
            });
        }
    });
    $('.us_panel_msk').click(function() {
        $('.us_panel_menu').trigger('click');
    });
    $('.add_newpost_cancel').click(function() {
        $('#add_newpost').removeClass('show');
        $('.newpost_w_t textarea').blur();
    });
    $('.us_panel_menu_t td a').click(function() {
        var v = $(this).attr('href');
        window.parent.location.href = v;
        return false;
    });
    var _sid,_id, _ct, isReply, _nickname;
    function replyThis() {

        $('.reply_this').click(function() {
            if (logined == 1) {
                isReply = true;
                reply_lock = true;
                _id = $(this).parent().parent().parent().parent().attr('id');
                _ct = $(this).parent().parent().parent().parent().find('.comment_p .comment_pct').html();
                _nickname = $(this).parent().parent().parent().parent().find('h5 .fl a').html();
                $('#add_newpost').addClass('show');
                $('.newpost_w_t textarea').val('').attr('placeholder', '回复' + _nickname + '');
            } else {
                $('#reg_index').addClass('show');
            }
        });
        $('.us_panel_post').click(function() {
            if (logined == 1) {
                $('#add_newpost').addClass('show');
				
                if ($('.newpost_w_t textarea').val() == '') {
                    $('.newpost_w_t textarea').val('').attr('placeholder', '发表评论');
                };
                reply_lock = true;
                isReply = false;
                reply_lock = true;
            } else {
                $('#reg_index').addClass('show');
            }
        });
        $('.add_newpost_post').click(function() {
            if (reply_lock == true && isReply == true && $('.newpost_w_t textarea').val() != '') {
                reply_lock = false;
					$.ajax({
		type:"POST",
		url:zurl+"/swzl/do/reply",
		data:"&content="+$('.newpost_w_t textarea').val()+"&id="+ _id,
		dataType:"json",
		beforeSend:function(){},
		success:function(data){
			$("#"+_id).remove();
                   var ddd = '<div class="quote"><div class="pd10">' + data.reply + '</div></div>';
                    $('#comment ul').prepend('<li id="' + _id + '" sid="' + _id + '"><div class="pd5"><a class="avt fl" target="_blank" href="'+zurl +"/swzl/self/"+ idnumber + '"><img src="' + idimg + '"></a><div class="comment_content"><h5><div class="fl"><a class="comment_name" href="' +zurl +"/swzl/self/"+ idnumber + '">' + idname + '</a><span>' + data.time + '</span></div><div class="clear"></div></h5><div class="comment_p"><div class="comment_pct">' +   _ct + '</div>' + ddd + '</div></div><div class="clear"></div><div class="comment_reply"></div></div></li>');
                    document.getElementById('container').scrollTop = cmofsT;
                    $('#add_newpost').removeClass('show');
                    replyThis();
		}
	})
             
				
            }
            if (reply_lock == true && isReply == false && $('.newpost_w_t textarea').val() != '') {
                reply_lock = false;
                $.post(zurl+"/swzl/do/addreply", {
            		sid: idid,
                    content: $('.newpost_w_t textarea').val()
                },
                function(data) {
                    $('#comment ul').prepend('<li id="' + data.id + '" sid="' + data.id + '"><div class="pd5"><a class="avt fl" target="_blank" href="'+zurl +"/swzl/self/"+ idnumber + '"><img src="' + idimg + '"></a><div class="comment_content"><h5><div class="fl"><a class="comment_name" href="' +zurl +"/swzl/self/"+ idnumber + '">' + idname + '</a><span>1秒前</span></div><div class="clear"></div></h5><div class="comment_p"><div class="comment_pct">' + data.content + '</div></div></div><div class="clear"></div><div class="comment_reply"></div></div></li>');
                    document.getElementById('container').scrollTop = cmofsT;
                    $('#add_newpost').removeClass('show');
                    $('.us_panel_post').find('span em').html(parseInt($('.us_panel_post').find('span em').html()) + 1);
                    replyThis();
                },
                'json');
				
            }
        });
    };
    replyThis();
    $('.t_slide').click(function() {
        if ($('#choose_album').hasClass('show')) {
            $('#choose_album,.menu_slide').removeClass('show');
        } else {
            $('#choose_album,.menu_slide').addClass('show');
        }
    });
    $('.menu_slide').click(function() {
        $('.t_slide').trigger('click');
    });
    $('.edit_this').click(function() {});
    $('.edit_album_msk').click(function() {
        $('#edit_album').removeClass('show');
    });

    $('.us_panel_like').click(function() {
        if (logined == 1) {
            var _this = $(this);
            if ($(this).hasClass('liked')) {
                $.post(zurl+"/swzl/do/relike", {
                    id: idid
                },
                function() {
                    _this.removeClass('liked');
                    _this.find('span em').html(parseInt(_this.find('span em').html()) - 1);
					
                });
            } else {
                 $.post(zurl+"/swzl/do/like", {
                    id: idid
                },
                function() {
                    _this.addClass('liked');
                    _this.find('span em').html(parseInt(_this.find('span em').html()) + 1);
			
                });
            }
        } else {
            $('#reg_index').addClass('show');
        }
    });
    $('#add_favorite .hd .fr').click(function() {
        $('#add_favorite').removeClass('show');
    });

})(Zepto)