<?php
return array(
	'MODULE_ALLOW_LIST' => array('Home','Admin','Mobile','Common'),
	//'配置项'=>'配置值'
	//
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'item/:id' => 'Goods/detail',
    ),
);