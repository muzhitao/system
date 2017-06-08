<?php
/**
 * Created by PhpStorm.
 * User: 55HaiTao
 * Date: 2016/9/29
 * Time: 19:09
 */

function Getheaderb( $type = 'index'){

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

function cfg($name = '') {
    if (empty($name)) {
        return '';
    }

    $config = new \Admin\Model\ConfigModel();
    $data = $config->getConfig();
    if (isset($data[$name])) {
        return $data[$name];
    }

    return '';
}

function get_user_name($uid = 0) {

    if (empty($uid)) {
        return '';
    }

    $model = D("User");
    $data = $model->field('username')->where('uid='.$uid)->find();
    if ($data) {
        return $data['username'];
    }

    return '';
}

/**
*   短时间显示, 几分钟前,几秒前...
**/
function _put_time($time = 0,$test=''){
    if(empty($time)){return $test;}
    $time = substr($time,0,10);
    $ttime = time() - $time;
    if($ttime <= 0 || $ttime < 60){
        return '几秒前';
    }   
    if($ttime > 60 && $ttime <120){
        return '1分钟前';
    }
    
    $i = floor($ttime / 60);                            //分
    $h = floor($ttime / 60 / 60);                       //时
    $d = floor($ttime / 86400);                         //天
    $m = floor($ttime / 2592000);                       //月
    $y = floor($ttime / 60 / 60 / 24 / 365);            //年
    if($i < 30){
        return $i.'分钟前';
    }
    if($i > 30 && $i < 60){
        return '一小时内';
    }
    if($h>=1 && $h < 24){
        return $h.'小时前';
    }
    if($d>=1 && $d < 30){
        return $d.'天前';
    }   
    if($m>=1 && $m < 12){       
        return $m.'个月前';
    }
    if($y){
        return $y.'年前';
    }   
    return "";
    
}

function percent($p,$t){
    if($p<=0){return 0;}
    return sprintf('%.2f%%',$p/$t*100);
}

function idjia($id){
    return $id+1000000000;
}

function width($p,$t,$w){
    return $p/$t*$w;
}


/*手机号码验证*/
function _checkmobile($mobilephone=''){
    if(strlen($mobilephone)!=11){   return false;   }
    if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|14[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/",$mobilephone)){   
        return true;
    }else{   
        return false;
    }
}
    
/*邮箱验证*/
function _checkemail($email=''){
        if(mb_strlen($email)<5){
            return false;
        }
        $res="/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/";
        if(preg_match($res,$email)){
            return true;
        }else{
            return false;
        }
}   

function microt($time,$x=null){
    $len=strlen($time);
    if($len<13){
        $time=$time."0";
    }
    $list=explode(".",$time);   
    if($x=="L"){        
        return date("His",$list[0]).substr($list[1],0,3);
    }else if($x=="Y"){
        return date("Y-m-d",$list[0]);
    }else if($x=="H"){
        return date("H:i:s",$list[0]).".".substr($list[1],0,3);
    }else if($x=="r"){
        return date("Y年m月d日 H:i",$list[0]);
    }else{
        return date("Y-m-d H:i:s",$list[0]).".".substr($list[1],0,3);
    }
}

/* 获取ip + 地址*/
function _get_ip_dizhi($ip=null){
        $opts = array(
            'http'=>array(
            'method'=>"GET",
            'timeout'=>5,)
        );      
        $context = stream_context_create($opts); 
        

        if($ip){
            $ipmac = $ip;
        }else{
            $ipmac=_get_ip();
            if(strpos($ipmac,"127.0.0.") === true)return '';        
        }
        
        $url_ip='http://ip.taobao.com/service/getIpInfo.php?ip='.$ipmac;
        $str = @file_get_contents($url_ip, false, $context);
        if(!$str) return "";
        $json=json_decode($str,true);
        if($json['code']==0){
            
            $json['data']['region'] = addslashes(_htmtocode($json['data']['region']));
            $json['data']['city'] = addslashes(_htmtocode($json['data']['city']));
            
            $ipcity= $json['data']['region'].$json['data']['city'];
            $ip= $ipcity.','.$ipmac;
        }else{
            $ip="";
        }
        return $ip;
}


/*
* 获取用户信息
*/
function get_user_key($uid='',$type='img',$size=''){
    if(is_array($uid)){
        if(isset($uid[$type])){     
            if($type=='img'){               
                $fk = explode('.',$uid[$type]);
                $h = array_pop($fk);
                if($size){
                    return $uid[$type].'_'.$size.'.'.$h;
                }else{
                    return $uid[$type];
                }
            }
            return $uid[$type];
        }
        return 'null';
    }else{
        
        $uid = intval($uid);
        $model = D("User");
        $info = $model->field($type)->where('uid='.$uid)->find();
        if($type=='img'){               
                $fk = explode('.',$info[$type]);
                $h = array_pop($fk);
                if($size){
                    return $info[$type].'_'.$size.'.'.$h;
                }else{
                    return $info[$type];
                }
        }
        if(isset($info[$type])){            
            return $info[$type];
        }
        return 'null';
    }
}