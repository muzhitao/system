<?php
/**
 * Created by PhpStorm.
 * User: 55HaiTao
 * Date: 2016/9/29
 * Time: 19:09
 */

/**
 * 获取类目导航
 * @return mixed
 */
function getCate()
{
    $cate = D("Category");
    $condition = array(
        'model' => 1,
        'parentid' => 0,
    );

    $list = $cate->where($condition)->order('orders DESC')->select();

    return $list;
}
function Getheaderb($type='index'){

    define('WEB_PATH', '');
    $navigation = D("Navigation");
    $condition = array(
        'status' => 'Y',
        'type' => $type
    );
    $navigation=$navigation->where($condition)->select();
    $url="";

    if($type=='foot'){
        foreach($navigation as $v){
            $url.='<a  href="'.WEB_PATH.$v['url'].'">'.$v['name'].'</a><b></b>';
        }
        return $url;
    }
    $urld = get_web_url();
    if($urld==WEB_PATH){
        $url.='<li class="selected"><a style="padding:15px;padding-right:15px;" href='.WEB_PATH.'>首页</a></li>';
    }
    else{
        $url.='<li class=""><a style="padding:15px;padding-right:15px;" href='.WEB_PATH.'>首页</a></li>';
    }
    foreach($navigation as $v){
        $urlr=WEB_PATH.$v['url'];
        if($urlr==$urld){
            $url.='<li class="sort-all selected"><span>|</span><a  href="'.WEB_PATH.$v['url'].'">'.$v['name'].'</a></li>';
        }else{
            $url.='<li class="sort-all"><span>|</span><a href="'.WEB_PATH.$v['url'].'">'.$v['name'].'</a></li>';
        }
    }
    return $url;
}

/*获取页面完整url*/
function get_web_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? safe_replace($_SERVER['PHP_SELF']) : safe_replace($_SERVER['SCRIPT_NAME']);
    $path_info = isset($_SERVER['PATH_INFO']) ? safe_replace($_SERVER['PATH_INFO']) : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? safe_replace($_SERVER['REQUEST_URI']) : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.safe_replace($_SERVER['QUERY_STRING']) : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}

/*获取网站当前地址*/
function get_home_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $path=explode('/',safe_replace($_SERVER['SCRIPT_NAME']));
    if(count($path)==3){
        return $sys_protocal.$_SERVER['HTTP_HOST'].'/'.$path[1];
    }
    if(count($path)==2){
        return $sys_protocal.$_SERVER['HTTP_HOST'];
    }
}

/*字符过滤url*/
function safe_replace($string) {
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('\\','',$string);
    return $string;
}