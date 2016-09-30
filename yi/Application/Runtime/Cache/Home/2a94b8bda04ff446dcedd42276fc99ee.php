<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{wc:if isset($title)}{wc:$title}{wc:else}{wc:fun:_cfg("web_name")}{wc:if:end}</title>
    <meta name="keywords" content="{wc:if isset($keywords)}{wc:$keywords}{wc:else}{wc:fun:_cfg("web_key")}{wc:if:end}" />
    <meta name="description" content="{wc:if isset($description)}{wc:$description}{wc:else}{wc:fun:_cfg("web_des")}{wc:if:end}" />
    <meta http-equiv = "X-UA-Compatible" content = "IE = edge" />
    <link rel="stylesheet" type="text/css" href="/Public/home/css/Comm.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/register.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/css/Home.css"/>
    <script type="text/javascript" src="/Public/home/js/global/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/Public/home/js/jquery.cookie.js"></script>
</head>
<body >

<div class="header">
    <div class="d"><div>

        <div class="site_top">
            <div class="head_top">
                <p class="collect"><a href="javascript:;" id="addSiteFavorite" style="cursor: default;text-decoration: none;">欢迎来到云购</a></p>
                <p class="collect"><a href="{G_WEB_PATH}/?/mobile/mobile">手机版</a></p>
                <ul class="login_info" style="display: block;">
                   <?php if($_SESSION['user']!= ''): ?><li class="h_wel" id="logininfo">
                        <a href="{WEB_PATH}/member/home" class="gray01" >
                            <img src="{G_UPLOAD_PATH}/{wc:fun:get_user_img('3030')}" width="30" height="30"/>
                            {wc:fun:get_user_name(get_user_arr(),'username')}
                        </a>&nbsp;&nbsp;
                        <a href="{WEB_PATH}/member/user/cook_end" class="gray01">[退出]</a>
                    </li>
                    <?php else: ?>
                    <li id="logininfo" class="h_login">
                        <a style="color:#3399FF" class="gray01" href="{:U('User/login')}" >请登录</a>
                        <a class="gray01" href="{:U('User/register')}" >免费注册</a>
                    </li><?php endif; ?>
                    <li class="h_1yyg">
                        <a  href="{WEB_PATH}/home/member">我的云购<b></b></a>
                        <div class="h_1yyg_eject" style="display:none;">
                            <dl>
                                <dt><a  href="{WEB_PATH}/member/home">我的云购<i></i></a></dt>
                                <dd><a  href="{WEB_PATH}/member/home/userbuylist">云购记录</a></dd>
                                <dd><a  href="{WEB_PATH}/member/home">获得的商品</a></dd>
                                <dd><a  href="{WEB_PATH}/member/home/userrecharge">帐户充值</a></dd>
                                <dd><a  href="{WEB_PATH}/member/home/modify">个人设置</a></dd>
                            </dl>
                        </div>
                    </li>
                    <li class="h_inv"><a target="_blank" href="{G_WEB_PATH}/?/go/index/qualification#rz1"><img border="0" src="images/pa" style="display:none;">诚信验证</a></li>
                    <li class="h_inv"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={wc:fun:_cfg("qq")}&site=qq&menu=yes"><img border="0" src="images/pa" style="display:none;">在线客服</a></li>
                </ul>
            </div>
        </div>





        <div class="head_mid">
            <div class="head_mid_bg">
                <h1 class="logo_1yyg">
                    <a class="logo_1yyg_img" href="<?php echo U('Index/index');?>" title="">
                        <img src="/Public/home/images/logo.png"/>
                    </a>
                </h1>
                <div class="head_number">
                    已
                    <a href="{WEB_PATH}/buyrecord" target="_blank">
                        <span id="spBuyCount" style="color:#22AAFF; background:#F5F5F5; opacity:1;">2</span>
                    </a>
                    人次参与云购

                </div>

                <div class="head_search">
                    <div class="search_all">
                        <input type="text" id="txtSearch" class="init" value='请输入要搜索的商品'/>
                        <a class="search_submit" id="butSearch"  >
                            <i class="ico_search"></i>
                        </a>
                    </div>
                    <div class="keySearch">
                        <a href="{WEB_PATH}/s_tag/苹果" target="_blank">苹果</a>
                        <a href="{WEB_PATH}/s_tag/iPhone" target="_blank">iPhone</a>
                        <a href="{WEB_PATH}/s_tag/智能手机" target="_blank">智能手机</a>
                        <a href="{WEB_PATH}/s_tag/G手机" target="_blank">3G手机</a>
                        <a href="{WEB_PATH}/s_tag/宝马" target="_blank">宝马</a>
                        <a href="{WEB_PATH}/s_tag/单反" target="_blank">单反</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--header end-->
        <div class="head_nav">
            <div class="nav_center">
                <div class="m_catlog">
                    <div class="m_catlog_hd" >
                        <a href="{WEB_PATH}/goods_list">奖品分类</a>
                    </div>
                    <div class="m_catlog_wrap"  style="{wc:if isset($isindex) && $isindex=='Y'}display:block;{wc:else}display:none;{wc:if:end}">
                        <div class="m_catlog_bd">
                            <ul class="m_catlog_list">
                               <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Goods/good_list',array('cateid'=>$vo['cateid']));?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="m_menu">
                    <ul class="m_menu_list">
                        <?php echo Getheaderb();?>
                    </ul>
                </div>
                <div class="w_miniCart"  id="sCart">
                    <a class="w_miniCart_btn" rel="nofollow"  id="sCartNavi"  href="{WEB_PATH}/member/cart/cartlist" data-pro="btn"><i class="ico ico_miniCart"></i>购物车
                        <span type="hidden"  class="w-miniCart-count" id="sCartTotal">0</span></a>
                    <b id="btnMyCartccc"></b>
                    <div class="mycart_list" id="sCartlist" style="z-index: 99999; display: none;">
                        <div class="goods_loding" id="sCartLoading" style="display: none;"><img border="0" alt="" src="{G_TEMPLATES_STYLE}/images/goods_loading.gif">正在加载......</div>
                        <p id="p1">共计 <span id="sCartTotal2"> 2</span> 件商品 金额总计：<span id="sCartTotalM" class="rmbred">5.00</span></p>
                        <h3><input type="button" id="sGotoCart" value="去购物车并结算"></h3>
                    </div>
                </div>

            </div>
        </div>

        <script>
            $(function(){
                $("#sCart").hover(
                        function(){
                            $("#sCartlist,#sCartLoading").show();
                            $("#sCartlist p,#sCartlist h3").hide();
                            $("#sCart .mycartcur").remove();
                            $("#sCartTotal2").html("");
                            $("#sCartTotalM").html("");
                            $.getJSON("{WEB_PATH}/member/cart/cartheader/="+ new Date().getTime(),function(data){
                                $("#sCart .mycartcur").remove();
                                $("#sCartLoading").before(data.li);
                                //浏览器兼容20150116ghm
                                $("#sCartTotal2").html(data.num);
                                if(data.sum=='0.00'){
                                    if(data.num=='1'){
                                        $("#sCartTotal2").html(data.num-1);
                                    }else{
                                        $("#sCartTotal2").html(data.num);
                                    }
                                }else{
                                    $("#sCartTotal2").html(data.num);
                                }
                                //浏览器兼容20150116ghm
                                $("#sCartTotalM").html(data.sum);
                                $("#sCartLoading").hide();
                                $("#sCartlist p,#sCartlist h3").show();
                            });
                        },
                        function(){
                            $("#sCartlist").hide();
                        }
                );
                $("#sGotoCart").click(function(){
                    window.location.href="{WEB_PATH}/member/cart/cartlist";
                });
            })
            function delheader(id){
                var Cartlist = $.cookie('Cartlist');
                var info = $.evalJSON(Cartlist);
                var num=$("#sCartTotal2").html()-1;
                var sum=$("#sCartTotalM").html();
                info['MoenyCount'] = sum-info[id]['money']*info[id]['num'];

                delete info[id];
                //$.cookie('Cartlist','',{path:'/'});
                $.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
                $("#sCartTotalM").html(info['MoenyCount']);
                $('#sCartTotal2').html(num);
                $('#sCartTotal').text(num);
                $('#btnMyCart em').text(num);
                $("#mycartcur"+id).remove();
            }
            $(function(){
                $(".h_1yyg").mouseover(function(){
                    $(".h_1yyg_eject").show();
                });
                $(".h_1yyg").mouseout(function(){
                    $(".h_1yyg_eject").hide();
                });
                $(".h_news").mouseover(function(){
                    $(".h_news_down").show();
                });
                $(".h_news").mouseout(function(){
                    $(".h_news_down").hide();
                });
            });
            $(function(){
                $("#txtSearch").focus(function(){
                    $("#txtSearch").css({background:"#FFFFCC"});
                    var va1=$("#txtSearch").val();
                    if(va1=='输入"红米手机"试一试'){
                        $("#txtSearch").val("");
                    }
                });
                $("#txtSearch").blur(function(){
                    $("#txtSearch").css({background:"#FFF"});
                    var va2=$("#txtSearch").val();
                    if(va2==""){
                        $("#txtSearch").val('输入"红米手机"试一试');
                    }
                });
                $("#butSearch").click(function(){
                    window.location.href="{WEB_PATH}/s_tag/"+$("#txtSearch").val();
                });
            });


            {wc:if !isset($isindex) || $isindex!='Y'}
                $(".m_catlog_hd").mouseover(function(){
                    $(".m_catlog_wrap").show();
                })
                $(".m_catlog_hd").mouseout(function(){
                    $(".m_catlog_wrap").hide();
                })
                $(".m_catlog_wrap").mouseover(function(){
                    $(".m_catlog_wrap").show();
                })
                $(".m_catlog_wrap").mouseout(function(){
                    $(".m_catlog_wrap").hide();
                })
                {wc:if:end}

        </script>

<link rel="stylesheet" type="text/css" href="/Public/home/css/Home.css"/>
<script type="text/javascript" src="/Public/home/js/layer/layer.min.js"></script>



<style type="text/css">
    .demo{ width:740px; height:333px; position:relative; overflow:hidden; padding:0px;}
    .num{ position:absolute;right:20px; top:300px; z-index:10;}
    .num a{background:#fff; color:#db3752; border:1px solid #ccc; width:16px; height:16px; display:inline-block; text-align:center; line-height:16px; margin:0 3px; cursor:pointer;}
    .num a.cur{ background:#db3752;color:#fff;text-decoration:none;}
    .demo ul{ position:relative; z-index:5;}
    .demo ul li{ position:absolute; display:none;}
</style>

<!--banner and Recommend 开始-->
<div class="banner_recommend">
    <div class="banner-box">


        <div style="margin-left:239px;" class="demo">
            <ul>
                <?php if(is_array($slide_list)): $k = 0; $__LIST__ = $slide_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k == 1): ?><li style="display:list-item;"><a href="<?php echo ($vo["url"]); ?>" target="_blank"><img src="/Public/home/uploads/<?php echo ($vo["img"]); ?>"></a></li>
                <?php else: ?>
                    <li style="display:none;"><a href="<?php echo ($vo["url"]); ?>" target="_blank"><img src="/Public/home/uploads/<?php echo ($vo["img"]); ?>"></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="num">
                <?php if(is_array($slide_list)): $k = 0; $__LIST__ = $slide_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a class=""><?php echo ($k); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
        <div class="new_notice">
            <div class="new_notice_center">
                <h4>最新公告</h4>
                <ul>
                    <li>
                        <span class="n_number">1</span>
                        “iPhone5s 降价了大家快来抢啊！ ”
                        <a href="">查看晒单</a>
                    </li>
                    <li>
                        <span class="n_number">2</span>
                        “限时{wc:fun:_cfg('web_name_two')}活动。”
                    </li>
                    <li>祝您愉快~！</li>
                </ul>
            </div>
        </div>
        <div class="new_publish">
            <a href="javascript:;"><div class="arrows arrows2" arae="left"></div></a>
            <div class="prin_pp" id="prin_pp">
                {wc:php:start}
                $shopqishub=$this->db->GetList("select qishu,id,sid,thumb,title,q_uid,q_user,q_user_code,zongrenshu  from `@#_shoplist` where `q_end_time` is not null and `q_showtime` = 'N' ORDER BY `q_end_time` DESC LIMIT 6");
                {wc:php:end}
                {wc:loop $shopqishub $qishu}
                {wc:php:start}
                $qishu['q_user'] = unserialize($qishu['q_user']);
                $user_shop_number = $this->db->GetOne("select sum(gonumber) as gonumber from `@#_member_go_record` where `uid`= '$qishu[q_uid]' and `shopid` = '$qishu[id]' and `shopqishu` = '$qishu[qishu]'");
                $user_shop_number = $user_shop_number['gonumber'];
                {wc:php:end}
                <div class='print'>
                    <div class="new_publish1" style="border-right:solid 1px #ebebeb">
                        <i class="ico_label_newReveal" title="最新揭晓"></i>
                        <p class="w_goods_title"><a href="{WEB_PATH}/dataserver/{wc:$qishu['id']}" title="{wc:$qishu['title']}">(第{wc:$qishu['qishu']}期){wc:$qishu['title']}</a></p>
                        <div class="w_goods_pic"><a title="{wc:$qishu['title']}" href="{WEB_PATH}/dataserver/{wc:$qishu['id']}"><img src="{G_UPLOAD_PATH}/{wc:$qishu['thumb']}"/></a></div>
                        <p class="w_goods_price">总需：{wc:$qishu['zongrenshu']}人次</p>
                        <div class="w_goods_record">
                            <P>获奖者：<a href="{WEB_PATH}/uname/{wc:fun:idjia($qishu['q_uid'])}">{wc:fun:get_user_name($qishu['q_user'])}</a></P>
                            <p>本期参与：{wc:$user_shop_number}人次</p>
                            <p>本期幸运号码：{wc:$qishu['q_user_code']}</p>
                        </div>
                    </div>
                </div>
                {wc:loop:end}
                <!------>
                <script type="text/javascript" src="{G_TEMPLATES_JS}/GLotteryFun.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){gg_show_time_init("prin_pp",'{WEB_PATH}',0);});
                </script>
                <!------>
            </div>
            <a href="javascript:;"><div class="arrows arrows1" arae="right"></div></a>
            <div class="controller-nav">
                <a class="cur" id="cur_k1" qarae="lee" href="javascript:;"></a>
                <a class="" id="cur_k2" qarae="lel" href="javascript:;"></a>
                <a class="" id="cur_k3" qarae="lcc" href="javascript:;"></a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            var sw = 0;
            $(".demo .num a").mouseover(function(){
                sw = $(".num a").index(this);
                myShow(sw);
            });
            function myShow(i){
                $(".demo .num a").eq(i).addClass("cur").siblings("a").removeClass("cur");
                $(".demo ul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
            }
            //滑入停止动画，滑出开始动画
            $(".demo").hover(function(){
                if(myTime){
                    clearInterval(myTime);
                }
            },function(){
                myTime = setInterval(function(){
                    myShow(sw)
                    sw++;
                    if(sw=={wc:fun:count($slides)}){sw=0;}
            } , 3000);
        });
        //自动开始
        var myTime = setInterval(function(){
            myShow(sw)
            sw++;
            if(sw=={wc:fun:count($slides)}){sw=0;}
        } , 3000);
        })
    </script>
    <!-- 首页右边推荐商品一个 start-->
    {wc:if $new_shop}
    <div class="recommend">
        <ul class="Pro">
            <li>
                <div class="pic">
                    <a href="{WEB_PATH}/goods/{wc:$new_shop['id']}" target="_blank" title="{wc:$new_shop['title']}">
                        <i class="goods_tj"></i>
                        <img alt="{wc:$new_shop['title']}" src="{G_UPLOAD_PATH}/{wc:$new_shop['thumb']}">
                    </a>
                    <p name="buyCount" style="display:none;"></p>
                </div>
                <p class="name">
                    <strong><a href="{WEB_PATH}/goods/{wc:$new_shop['id']}" target="_blank" title="{wc:$new_shop['title']} ">
                        {wc:$new_shop['title']}</strong></a>
                </p>
                <p class="money">价值：<span class="rmb">{wc:$new_shop['money']}</span></p>
                <div class="Progress-bar" style="">
                    <p title="已完成{wc:fun:percent($new_shop['canyurenshu'],$new_shop['zongrenshu'])}"><span style="width:{wc:fun:width($new_shop['canyurenshu'],$new_shop['zongrenshu'],205)}px;"></span></p>
                    <ul class="Pro-bar-li">
                        <li class="P-bar01"><em>{wc:$new_shop['canyurenshu']}</em>已参与人次</li>
                        <li class="P-bar02"><em>{wc:$new_shop['zongrenshu']}</em>总需人次</li>
                        <li class="P-bar03"><em>{wc:$new_shop['zongrenshu']-$new_shop['canyurenshu']}</em>剩余人次</li>
                    </ul>
                </div>
                <p>
                    <a href="{WEB_PATH}/goods/{wc:$new_shop['id']}" target="_blank" class="go_buy"></a>
                </p>
            </li>
        </ul>
    </div>
    {wc:if:end}
    <!-- 首页右边推荐商品多个 start-->
    <div class="recommend rect_rem" style="height:225px;">
        <a href="javascript:;"><div class="arr_row arrows_arr" arae1="left1"></div></a>
        <ul class="Pro" id="prpr_po" style="border:solid 1px #ebebeb;height:206px;position:absolute;left:0px;">
            {wc:php:start}
            $new_shopmun=$this->db->GetList("select * from `@#_shoplist` where `pos` = '1' and `q_uid` is null ORDER BY `id` DESC LIMIT 3");
            $num=1;
            {wc:php:end}
            {wc:loop $new_shopmun  $new_shop_mun}
            {wc:php:start}
            $num++;
            {wc:php:end}
            <li id="pre_0{wc:$num}">
                <div class="pic">
                    <a href="{WEB_PATH}/goods/{wc:$new_shop_mun['id']}" target="_blank" title="{wc:$new_shop_mun['title']}">
                        <img alt="{wc:$new_shop_mun['title']}" src="{G_UPLOAD_PATH}/{wc:$new_shop_mun['thumb']}">
                    </a>
                    <p name="buyCount" style="display:none;"></p>
                </div>
                <p class="name">
                    <strong><a href="{WEB_PATH}/goods/{wc:$new_shop_mun['id']}" target="_blank" title="{wc:$new_shop_mun['title']} ">
                        {wc:$new_shop_mun['title']}</strong></a>
                </p>
            </li>
            {wc:loop:end}
        </ul>
        <a href="javascript:;"><div class="arr_row arrows_are" arae1="right1"></div></a>
    </div>
</div>
</div>
<!-- 首页右边推荐商品 end-->
</div>
<!--banner and Recommend 结束-->
<!--product 开始-->
<div class="goods_hot">
    <div class="goods_left">


        <div class="hot" style="">
            <h3><span>最热人气商品</span><a rel="nofollow" href="{WEB_PATH}/goods_list/0_0_2">更多商品，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">
                {wc:php:start}
                $shoplistrenqib=$this->db->GetList("select * from `@#_shoplist` where `renqi`='1' and `q_uid` is null ORDER BY id DESC LIMIT 8");
                {wc:php:end}
                {wc:loop $shoplistrenqib $renqi}
                <li class="list-block">
                    <div class="pic"><a href="{WEB_PATH}/goods/{wc:$renqi['id']}" target="_blank" title="{wc:$renqi['title']}">
                        <!--补丁3.1.5_b.0.1-->
                        {wc:php:start}$i_googd_bj = null;{wc:php:end}
                        {wc:if $renqi['renqi']=='1' && !isset($i_googd_bj)}
                        {wc:php:start}$i_googd_bj = '<i class="goods_rq"></i>';{wc:php:end}
                        {wc:if:end}
                        {wc:$i_googd_bj}
                        <img src="{G_UPLOAD_PATH}/{wc:$renqi['thumb']}" alt="{wc:$renqi['title']}"></a></div>
                    <p class="name"><a href="{WEB_PATH}/goods/{wc:$renqi['id']}" target="_blank" title="{wc:$renqi['title']}">{wc:$renqi['title']}</a></p>
                    <p class="money">价值：<span class="rmb">{wc:$renqi['money']}</span></p>
                    <div class="Progress-bar" style="">
                        <p title="已完成{wc:fun:percent($renqi['canyurenshu'],$renqi['zongrenshu'])}"><span style="width:{wc:fun:width($renqi['canyurenshu'],$renqi['zongrenshu'],221)}px;"></span></p>
                        <ul class="Pro-bar-li">
                            <li class="P-bar01"><em>{wc:$renqi['canyurenshu']}</em>已参与人次</li>
                            <li class="P-bar02"><em>{wc:$renqi['zongrenshu']}</em>总需人次</li>
                            <li class="P-bar03"><em>{wc:$renqi['zongrenshu']-$renqi['canyurenshu']}</em>剩余人次</li>
                        </ul>
                    </div>
                    <div class="shop_buttom"><a href="{WEB_PATH}/goods/{wc:$renqi['id']}" target="_blank" class="shop_but" title="立即购买"></a></div>
                </li>
                {wc:loop:end}
            </ul>
        </div>
    </div>
    <div class="goods_right">

        {wc:getlist:end}
        <div class="share">
            <h3>最新揭晓记录</h3>
            <div class="buyList">
                <ul id="buyList" style="margin-top: 0px;">
                    {wc:php:start}
                    $shopgxb=$this->db->GetList("select qishu,id,sid,thumb,title,q_uid,q_user,q_user_code,zongrenshu  from `@#_shoplist` where `q_end_time` is not null and `q_showtime` = 'N' ORDER BY `q_end_time` DESC LIMIT 8");
                    {wc:php:end}
                    {wc:loop $shopgxb $shopgx}
                    {wc:php:start}
                    $shopgx['q_user'] = unserialize($shopgx['q_user']);
                    {wc:php:end}
                    <li>
                        <a href="{WEB_PATH}/goods/{wc:$shopgx['id']}" class="pic" target="_blank">
                            <img src="{G_UPLOAD_PATH}/{wc:$shopgx['thumb']}" style="width:58px"/></a>
                        <span class="who"><p style="display: inline;"><a class="blue" href="{WEB_PATH}/uname/{wc:fun:idjia($shopgx['q_uid'])}">{wc:fun:get_user_name($shopgx['q_user'])}</a></p>刚刚获得了</span>
                        <span><a href="{WEB_PATH}/goods/{wc:$shopgx['id']}" class="name" target="_blank">{wc:$shopgx['title']}</a></span>

                    </li>
                    {wc:loop:end}
                </ul>
            </div>
        </div>
    </div>
</div>
<!--product 结束-->
<div class="clear"></div>


<!--即将揭晓 开始-->
<div class="goods_hot">
    <div class="goods_left">


        <div class="hot" style="">
            <h3><span>即将揭晓</span><a rel="nofollow" href="{WEB_PATH}/goods_list/0_0_1">更多即将揭晓，点击查看&gt;&gt;</a></h3>
            <ul id="hostGoodsItems" class="hot-list">
                {wc:php:start}
                $shoplist=$this->db->GetList("select * from `@#_shoplist` where `q_uid` is null ORDER BY `shenyurenshu` ASC LIMIT 8");
                {wc:php:end}
                {wc:loop $shoplist $shop}
                <li class="list-block">
                    <div class="pic"><a href="{WEB_PATH}/goods/{wc:$shop['id']}" target="_blank" title="{wc:$shop['title']}"><img src="{G_UPLOAD_PATH}/{wc:$shop['thumb']}" alt="{wc:$shop['title']}"></a></div>
                    <p class="name"><a href="{WEB_PATH}/goods/{wc:$shop['id']}" target="_blank" title="{wc:$shop['title']}">{wc:$shop['title']}</a></p>
                    <p class="money">价值：<span class="rmb">{wc:$shop['money']}</span></p>
                    <div class="Progress-bar" style="">
                        <p title="已完成{wc:fun:percent($shop['canyurenshu'],$shop['zongrenshu'])}"><span style="width:{wc:fun:width($shop['canyurenshu'],$shop['zongrenshu'],221)}px;"></span></p>
                        <ul class="Pro-bar-li">
                            <li class="P-bar01"><em>{wc:$shop['canyurenshu']}</em>已参与人次</li>
                            <li class="P-bar02"><em>{wc:$shop['zongrenshu']}</em>总需人次</li>
                            <li class="P-bar03"><em>{wc:$shop['zongrenshu']-$shop['canyurenshu']}</em>剩余人次</li>
                        </ul>
                    </div>
                    <div class="shop_buttom"><a href="{WEB_PATH}/goods/{wc:$shop['id']}" target="_blank" class="shop_but" title="立即购买"></a></div>
                </li>
                {wc:loop:end}
            </ul>
        </div>
    </div>
    <div class="goods_right">

        {wc:getlist:end}
        <div class="share">
            <h3>最新参与记录</h3>
            <div class="buyList">
                <ul id="buyList" style="margin-top: 0px;">

                    {wc:php:start}
                    $go_recordb=$this->db->GetList("select `@#_member`.uid,`@#_member`.username,`@#_member`.email,`@#_member`.mobile,`@#_member`.img,`@#_member_go_record`.shopname,`@#_member_go_record`.shopid from `@#_member_go_record`,`@#_member` where `@#_member`.uid = `@#_member_go_record`.uid and `@#_member_go_record`.`status` LIKE '%已付款%'  ORDER BY `@#_member_go_record`.time DESC LIMIT 0,8");
                    {wc:php:end}
                    {wc:loop $go_recordb $gorecord}
                    <li>
                        <a href="{WEB_PATH}/goods/{wc:$gorecord['shopid']}" class="pic" target="_blank">
                            <img src="{G_UPLOAD_PATH}/{wc:fun:shopimg($gorecord['shopid'])}"></a>
                        <span class="who"><p style="display: inline;"><a class="blue" href="{WEB_PATH}/uname/{wc:fun:idjia($gorecord['uid'])}">{wc:fun:get_user_name($gorecord)}</a></p>刚刚{wc:fun:_cfg('web_name_two')}了</span>
                        <span><a href="{WEB_PATH}/goods/{wc:$gorecord['shopid']}" class="name" target="_blank">{wc:$gorecord['shopname']}</a></span>
                    </li>
                    {wc:loop:end}
                </ul>
            </div>
        </div>
    </div>
</div>
<!--即将揭晓 结束-->

<div class="clear"></div>

<!--商品 开始-->
<div class="get_ready">
    <h3><span style="color:#000">最新上架</span><a rel="nofollow" href="{WEB_PATH}/goods_list">更多新品，点击查看&gt;&gt;</a></h3>
    <ul id="readyLotteryItems" class="hot-list">
        {wc:getlist sql="select * from `@#_shoplist` where `q_end_time` is  null and `q_showtime` = 'N' and `shenyurenshu`!='0'  and `sid`=`id`  LIMIT 0,10" return="shoplistnew"}
        {wc:loop $shoplistnew $shop}
        <li class="list-block">
            <div class="pic"><a href="{WEB_PATH}/goods/{wc:$shop['id']}" target="_blank" title="{wc:$shop['title']}">
                <!--补丁3.1.5_b.0.1-->
                {wc:php:start}$i_googd_bj = null;{wc:php:end}
                <!--补丁3.1.5_b.0.1-->
                {wc:if ($this_time - $shop['time']) < 86400}
                {wc:php:start}$i_googd_bj = '<i class="goods_xp"></i>';{wc:php:end}
                {wc:if:end}
                {wc:$i_googd_bj}
                <img src="{G_UPLOAD_PATH}/{wc:$shop['thumb']}" alt="{wc:$shop['title']}"></a></div>
            <p class="name"><a href="{WEB_PATH}/goods/{wc:$shop['id']}" target="_blank" title="{wc:$shop['title']}">{wc:$shop['title']}</a></p>
            <p class="money">价值：<span class="rmb">{wc:$shop['money']}</span></p>
            <div class="Progress-bar" style="">
                <p title="已完成{wc:fun:percent($shop['canyurenshu'],$shop['zongrenshu'])}"><span style="width:{wc:fun:width($shop['canyurenshu'],$shop['zongrenshu'],221)}px;"></span></p>
                <ul class="Pro-bar-li">
                    <li class="P-bar01"><em>{wc:$shop['canyurenshu']}</em>已参与人次</li>
                    <li class="P-bar02"><em>{wc:$shop['zongrenshu']}</em>总需人次</li>
                    <li class="P-bar03"><em>{wc:$shop['zongrenshu']-$shop['canyurenshu']}</em>剩余人次</li>
                </ul>
            </div>
            <div class="shop_buttom"><a href="{WEB_PATH}/goods/{wc:$shop['id']}" target="_blank" class="shop_but" title="立即购买"></a></div>
        </li>
        {wc:loop:end}
    </ul>
</div>

<!--商品 结束-->
<!--晒单分享-->
<div class="lottery_show">
    <div class="share_show">
        <h3><span style="color:#000">晒单分享</span><a href="{WEB_PATH}/go/shaidan/" target="_blank">更多分享，点击查看&gt;&gt;</a></h3>
        <div class="show">
            {wc:loop $shaidan $sd}
            <dl>
                <dt><a rel="nofollow" href="{WEB_PATH}/go/shaidan/detail/{wc:$sd['sd_id']}" target="_blank"><img alt="" src="{G_UPLOAD_PATH}/{wc:$sd['sd_thumbs']}"></a></dt>
                <dd class="bg">
                    <ul>
                        <li class="name"><span><a href="{WEB_PATH}/go/shaidan/detail/{wc:$sd['sd_id']}" target="_blank">{wc:$sd['sd_title']}</a></span> 获得者：<a rel="nofollow" class="blue" href="{WEB_PATH}/uname/{wc:$sd['sd_userid']}" target="_blank">{wc:fun:get_user_name($sd['sd_userid'])}</a></li>
                        <li class="content">{wc:fun:_strcut($sd['sd_content'],100)}</li>
                    </ul>
                </dd>
            </dl>
            {wc:loop:end}
            <div class="show_list">
                {wc:loop $shaidan_two $sd}
                <ul>
                    <li class="pic"><a rel="nofollow" href="{WEB_PATH}/go/shaidan/detail/{wc:$sd['sd_id']}"><img alt="" src="{G_UPLOAD_PATH}/{wc:$sd['sd_thumbs']}"></a></li>
                    <li class="show_tit"><a href="{WEB_PATH}/go/shaidan/detail/{wc:$sd['sd_id']}" target="_blank">{wc:$sd['sd_title']}</a></li>
                    <li>获得者：<a rel="nofollow" class="blue" href="{WEB_PATH}/uname/{wc:$sd['sd_userid']}" target="_blank">{wc:fun:get_user_name($sd['sd_userid'])}</a></li>
                    <li>揭晓时间：{wc:fun:date("Y-m-d",$sd['sd_time'])}</li>
                </ul>
                {wc:loop:end}
                <div class="arrow_left"></div>
                <div class="arrow_right"></div>
            </div>
        </div>
    </div>
</div>
<!--晒单分享end-->

<!--新闻列表-->
<style>
    .lottery_news{ width:100%; border:1px solid #000;}
</style>
<!--/新闻列表-->

<script type="text/javascript">
    $(function(){
        var _BuyList=$("#buyList");
        var Trundle = function () {
            _BuyList.prepend(_BuyList.find("li:last")).css('marginTop', '-85px');
            _BuyList.animate({ 'marginTop': '0px' }, 800);
        }
        var setTrundle = setInterval(Trundle, 3000);
        _BuyList.hover(function () {
            clearInterval(setTrundle);
            setTrundle = null;
        },function () {
            setTrundle = setInterval(Trundle, 3000);
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="/Public/home/Comm.css"/>
<div class="footer_content">
    <div class="footer_line"></div>
    <div class="footservice">
        <div class="support">

            {wc:getlist sql="select * from `@#_category` where `parentid`='1'" return="category"}
            {wc:loop $category $help}
            <dl class="ft-newbie">
                <dt><span>{wc:$help['name']}</span></dt>
                {wc:getlist sql="select * from `@#_article` where `cateid`='$help[cateid]'" return="article"}
                {wc:php:start}
                foreach($article as $art){
                echo "<dd><b></b><a href='".WEB_PATH.'/help/'.$art['id']."' target='_blank'>".$art['title'].'</a></dd>';
                }
                {wc:php:end}
            </dl>
            {wc:loop:end}
            {wc:getlist:end}


            <dl class="ft-fwrx">
                <dt><span>服务热线</span></dt>
                <dd class="ft-fwrx-tel"><i style="display: none;">4006859800</i></dd>
                <dd class="ft-fwrx-time">周一至周五 9:30-18:00</dd>
                <dd class="ft-fwrx-service">
                    {wc:php:start}
                    if(isset($this->_cfg['qq_qun'])){
                    $qq_qun_list = $this->_cfg['qq_qun'];
                    $qq_qun_list = explode("|",$qq_qun_list);
                    foreach($qq_qun_list as $qq){
                    $qq = trim($qq);
                    {wc:php:end}
                    <span class="ft-qqicon"><a style="text-indent:0em; background:none;width:160px;" target="_blank" rel="nofollow" href="javascript:;">官方QQ群：<em class="orange Fb">{wc:$qq}</em></a></span>
                    {wc:php:start}
                    } }
                    {wc:php:end}
                </dd>
            </dl>
            <dl class="ft-weixin">
                <dt><span>微信扫一扫</span></dt>
                <dd class="ft-weixin-img"><s></s></dd>
                <dd class="gray02">关注此微信获取最新云购程序</dd>
            </dl>
        </div>
    </div>
    <div class="service-promise">
        <ul>
            <li class="sp-fair"><a href="{WEB_PATH}/help/4" target="_blank"><span>100%公平公正</span></a></li>
            <li class="sp-wares"><a href="{WEB_PATH}/help/5" target="_blank"><span>100%正品保障</span></a></li>
            <li class="sp-free-delivery"><a href="{WEB_PATH}/help/7" target="_blank"><span>全国免费配送</span></a></li>
            <li class="sp-business service-promise-border-r0"><a href="{WEB_PATH}/single/business" target="_blank"><span>商务合作023-67898642</span></a></li>
        </ul>
    </div>
    {wc:getone sql="select * from `@#_fund` limit 1" return="fund_data"}
    {wc:getone:end}
    {wc:if $fund_data['fund_off']}
    <div class="service_date">
        <div class="Service_Time">
            <p>服务器时间</p>
            <span id="sp_ServerTime"></span>
        </div>
        <div class="Service_Fund">
            <a href="{WEB_PATH}/single/fund" target="_blank">
                <p>{wc:fun:_cfg('web_name_two')}公益基金</p>
                <span id="spanFundTotal">0000000.00<i>元</i></span>
            </a>
        </div>
    </div>
    {wc:else}
    <div class="service_date" style="width:100px;">
        <div class="Service_Time">
            <p>服务器时间</p>
            <span id="sp_ServerTime"></span>
        </div>
    </div>
    {wc:if:end}
</div>


<script type="text/javascript">
    (function(){
        var week = '日一二三四五六';
        var innerHtml = '{0}:{1}:{2}';
        var dateHtml = "{0}月{1}日 &nbsp;周{2}";
        var timer = 0;
        var beijingTimeZone = 8;
        function format(str, json){
            return str.replace(/{(\d)}/g, function(a, key) {
                return json[key];
            });
        }
        function p(s) {
            return s < 10 ? '0' + s : s;
        }

        function showTime(time){
            var timeOffset = ((-1 * (new Date()).getTimezoneOffset()) - (beijingTimeZone * 60)) * 60000;
            var now = new Date(time - timeOffset);
            document.getElementById('sp_ServerTime').innerHTML = format(innerHtml, [p(now.getHours()), p(now.getMinutes()), p(now.getSeconds())]);
            //document.getElementById('date').innerHTML = format(dateHtml, [ p((now.getMonth()+1)), p(now.getDate()), week.charAt(now.getDay())]);
        }

        window.yungou_time = 	function(time){
            showTime(time);
            timer = setInterval(function(){
                time += 1000;
                showTime(time);
            }, 1000);
        }
        window.yungou_time({wc:fun:time()}*1000);

    })();



    $(document).ready(function(){
        try{
            if(typeof(eval(pleasereg_initx))=="function"){
                pleasereg_initx();
            }
        }catch(e){
            //alert("not function");
        }
    })
</script>
<!--footercontent end-->
<div class="footer" style="height:auto;">
    <div class="footer_links">
        {wc:fun:Getheader('foot')}
    </div>
    <div class="copyright">{wc:fun:_cfg('web_copyright')}</div>
    <div class="footer_icon" style="width:599px;">
        <ul>
            <li class="fi_ectrustchina"><a target="_blank" href=""><span>可信网站</span></a></li>
            <li class="fi_315online"><a target="_blank" href=""><span>{wc:fun:_cfg('web_name_two')}商业授权值得信赖</span></a></li>
            <li class="fi_cnnic"><a target="_blank" href="#"><span>中国电子商务诚信单位</span></a></li>
            <li class="fi_anxibao"><a target="_blank" href="#"><span>安信保</span></a></li>
            <li class="fi_pingan"><a target="_blank" href="#"><span>平安银行</span></a></li>
        </ul>
    </div>
</div>
<script>
    $(function(){
        $(".quick_cart").hover(
                function(){
                    $("#rCartlist,#rCartLoading").show();
                    $("#rCartlist p,#rCartlist h3").hide();
                    $("#rCartlist li").remove();
                    $("#rCartTotal2").html("");
                    $("#rCartTotalM").html("");
                    $.getJSON("{WEB_PATH}/member/cart/cartshop/"+ new Date().getTime(),function(data){
                        $("#rCartlist ul").append(data.li);
                        //浏览器兼容20150116ghm
                        $("#rCartTotal2").html(data.num);
                        if(data.sum=='0.00'){
                            if(data.num=='1'){
                                $("#rCartTotal2").html(data.num-1);
                            }else{
                                $("#rCartTotal2").html(data.num);
                            }
                        }else{
                            $("#rCartTotal2").html(data.num);
                        }
                        //浏览器兼容20150116ghm
                        $("#rCartTotalM").html(data.sum);
                        $("#rCartLoading").hide();
                        $("#rCartlist ul,#rCartlist p,#rCartlist h3").show();
                    });
                },
                function(){
                    $("#rCartlist,#rCartlist ul,#rCartlist p,#rCartlist h3").hide();
                }
        );
        $("#rGotoCart").click(function(){
            window.location.href="{WEB_PATH}/member/cart/cartlist";
        })
    });
    function delshop(id){
        var Cartlist = $.cookie('Cartlist');
        var info = $.evalJSON(Cartlist);
        var num=parseInt($("#rCartTotal2").html())-1;
        var sum=parseInt($("#rCartTotalM").html());
        info['MoenyCount'] = sum-info[id]['money']*info[id]['num'];

        delete info[id];
        //$.cookie('Cartlist','',{path:'/'});
        $.cookie('Cartlist',$.toJSON(info),{expires:30,path:'/'});
        $("#rCartTotalM").html(info['MoenyCount']);
        $('#rCartTotal2').html(num);
        $('#sCartTotal').text(num);
        $('a#btnMyCart em').text(num);
        $("#shopid"+id).remove();
    }

    $(document).ready(function(){
        $.get("{WEB_PATH}/member/cart/getnumber/"+ new Date().getTime(),function(data){
            $("#sCartTotal").text(data);
            $("a#btnMyCart em").text(data);
        });
    });

</script>
<style>
    .weix {
        background-color:#fff;
        position:fixed;
        border:1px solid #E3E3E3;
        bottom:300px;
        right:5px;
        width:118px;
        height:140px;
        z-index:11;
        text-align:-99999px;
    }

    .weixin-img {
        width:93px;
        padding:12px;
        height:93px;
        padding:auto;
        margin-bottom:2px;
    }
    .weixin-img s {
        background:url({G_TEMPLATES_IMAGE}/footerimg.png);
        width:93px;
        height:93px;
        display:inline-block;
        background-position:0 -168px;
    }
    * html .weix {
        _top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,100)||0)-40));
        _bottom:auto;
        _position:absolute;
    }
    .fixed_wx_close{
        background:url({G_TEMPLATES_IMAGE}/footerimg.png);
        background-position:-103px -193px;
        border-bottom:1px	solid #E1E1E1;
        border-left:1px solid #E1E1E1;
        color:#FFFFFF;
        float:right;
        font-family:Arial;
        font-size:16px;
        height:15px;
        text-align:right;
        width:15px;
    }
</style>
<script>
    $(function(){
        $(".fixed_wx_close").click(function(){
            $(".weix").hide();
        })
    })
</script>
<script>
    var wids=($(window).width()-980)/2-80;
    if(wids>0){
        $(".weix").css("right",wids);
    }else{
        $(".weix").css("right",10);
    }
</script>

<!--footer end-->

<div class="weix"  >
    <a href="javascript:void(0);" id="close" class="fixed_wx_close"></a>
    <dd class="weixin-img"><s></s></dd>
    <dd class="gray02" align="center">关注微信获取新版云购程序</dd>
</div>
<div id="divRighTool" class="quickBack">

    <dl class="quick_But">

        <dd class="quick_cart" style="">
            <a id="btnMyCart" href="{WEB_PATH}/member/cart/cartlist" target="_blank" class="quick_cartA">
                <b>购物车</b><s></s><em>0</em>
            </a>
            <div style="display: none;" id="rCartlist" class="Roll_mycart">
                <ul style="display: none;"></ul>
                <div class="quick_goods_loding" id="rCartLoading" style="display: none;"><img border="0" alt="" src="{G_TEMPLATES_STYLE}/images/goods_loading.gif">正在加载......</div>
                <p id="p1" style="display: none;">共计<span id="rCartTotal2">0</span> 件商品 金额总计：<span class="rmbgray" id="rCartTotalM">0</span></p>
                <h3 style="display: none;"><input type="button" value="去购物车结算" id="rGotoCart"></h3>
            </div>
        </dd>
        <dd class="quick_service"><a id="btnRigQQ" href="http://wpa.qq.com/msgrd?v=3&uin={wc:fun:_cfg("qq")}&site=qq&menu=yes" target="_blank" class="quick_serviceA"><b>在线客服</b><s></s></a></dd>
        <dd class="quick_Collection"><a id="btnFavorite" href="javascript:;" class="quick_CollectionA"><b>收藏本站</b><s></s></a></dd>
        <dd class="quick_Return"><a id="btnGotoTop" href="javascript:;" class="quick_ReturnA"><b>返回顶部</b><s></s></a></dd>
    </dl>


</div>

<script>

    $("#divRighTool").show();
    var wids=($(window).width()-1200)/2-70;
    if(wids>0){
        $("#divRighTool").css("right",wids);
    }else{
        $("#divRighTool").css("right",10);
    }
    $(function(){
        $("#btnGotoTop").click(function(){
            $("html,body").animate({scrollTop:0},1500);
        });
        $("#btnFavorite,#addSiteFavorite").click(function(){
            var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
            if(document.all){
                window.external.addFavorite('{G_WEB_PATH}','{wc:fun:_cfg("web_name")}');
            }
            else if(window.sidebar){
                window.sidebar.addPanel('{wc:fun:_cfg("web_name")}','{G_WEB_PATH}', "");
            }else{
                alert('您可以通过快捷键' + ctrl + ' + D 加入到收藏夹');
            }
        });
        $("#divRighTool a").hover(
                function(){
                    $(this).addClass("Current");
                },
                function(){
                    $(this).removeClass("Current");
                }
        )
    });
    //云购基金
    $.ajax({
        url:"{WEB_PATH}/api/fund/get",
        success:function(msg){
            $("#spanFundTotal").text(msg);
        }
    });

</script>
</body>
</html>

<script>
    $(".new_publish").mouseover(function(){
        $(".arrows").show();
    })
    $(".new_publish").mouseout(function(){
        $(".arrows").hide();
    })
    //右移动
    $(".arrows1").click(function(){
        var arae   = $(this).attr("arae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        var leftpx1 = $("#prin_pp").css("left");
        var time = 500;
        if(arae == 'left'){
            leftpx += 730;
            //$(".controller-nav a").attr("alt","");
            //$(this).parents(".new_publish").find(".controller-nav").find("a").attr("alt","cur")
            //$(this).parents(".new_publish").find(".controller-nav").find(".cur").css("background","#000");
        }else{
            leftpx -= 730;
        }
        if((leftpx < (-730 * 2))){
            leftpx = 0;
            time = 250;
        }

        if(leftpx > 0){
            leftpx = (-730*2);
            time = 250;
        }

        if(leftpx1 == "0px"){
            $("#cur_k2").css("background","#db3652");
            $("#cur_k1").css("background","#b7b7b7");
            $("#cur_k3").css("background","#b7b7b7");
        }
        if(leftpx1 == "-730px"){
            $("#cur_k3").css("background","#db3652");
            $("#cur_k1").css("background","#b7b7b7");
            $("#cur_k2").css("background","#b7b7b7");
        }
        if(leftpx1 == "-1460px"){
            $("#cur_k1").css("background","#db3652");
            $("#cur_k2").css("background","#b7b7b7");
            $("#cur_k3").css("background","#b7b7b7");
        }
        $("#prin_pp").animate({left:leftpx+"px"});
    });
    //左移动
    $(".arrows2").click(function(){
        var arae   = $(this).attr("arae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        var leftpx1 = $("#prin_pp").css("left");
        var time = 500;
        if(arae == 'left'){
            leftpx += 730;
        }else{
            leftpx -= 730;
        }
        if((leftpx < (-730 * 2))){
            leftpx = 0;
            time = 250;
        }

        if(leftpx > 0){
            leftpx = (-730*2);
            time = 250;
        }

        if(leftpx1 == "0px"){
            $("#cur_k3").css("background","#db3652");
            $("#cur_k1").css("background","#b7b7b7");
            $("#cur_k2").css("background","#b7b7b7");
        }
        if(leftpx1 == "-1460px"){
            $("#cur_k2").css("background","#db3652");
            $("#cur_k1").css("background","#b7b7b7");
            $("#cur_k3").css("background","#b7b7b7");
        }
        if(leftpx1 == "-730px"){
            $("#cur_k1").css("background","#db3652");
            $("#cur_k2").css("background","#b7b7b7");
            $("#cur_k3").css("background","#b7b7b7");
        }
        $("#prin_pp").animate({left:leftpx+"px"});
    });
</script>

<script>
    $(".rect_rem").mouseover(function(){
        $(".arr_row").show();
    })
    $(".rect_rem").mouseout(function(){
        $(".arr_row").hide();
    })
    //banner 右侧左右移动
    $(".arr_row").click(function(){
        var arae1   = $(this).attr("arae1");
        var leftpx1 = parseInt($("#prpr_po").css("left"));
        if(arae1 == 'left1'){
            leftpx1 += 230;
        }else{
            leftpx1 -= 230;
        }
        if((leftpx1 < (-230 * 2))){
            leftpx1 = 0;
        }

        if(leftpx1 > 0){
            leftpx1 = (-230*2);
        }
        $("#prpr_po").animate({left:leftpx1+"px"});

    });
</script>
<script>
    $("#cur_k1").click(function(){
        var qarae   = $(this).attr("qarae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        if(qarae == 'lee'){
            leftpx =0;
        }else{
            leftpx = leftpx-730;
        }
        $("#prin_pp").animate({left:leftpx+"px"});
        $(this).css("background","#db3652");
        $("#cur_k2").css("background","#b7b7b7");
        $("#cur_k3").css("background","#b7b7b7");
    });
    $("#cur_k2").click(function(){
        var warae   = $(this).attr("qarae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        if(warae == 'lel'){
            leftpx = -730;
        }else{
            leftpx =leftpx+730;
        }
        $("#prin_pp").animate({left:leftpx+"px"});
        $(this).css("background","#db3652");
        $("#cur_k1").css("background","#b7b7b7");
        $("#cur_k3").css("background","#b7b7b7");
    });
    $("#cur_k3").click(function(){
        var earae   = $(this).attr("qarae");
        var leftpx = parseInt($("#prin_pp").css("left"));
        if(earae == 'lcc'){
            leftpx = -1460;
        }else{
            leftpx =leftpx+730;
        }
        $("#prin_pp").animate({left:leftpx+"px"});
        $(this).css("background","#db3652");
        $("#cur_k1").css("background","#b7b7b7");
        $("#cur_k2").css("background","#b7b7b7");

    });
</script>