<?php 
$I = new ApiTester($scenario);

$appId = '6ca450ec8b11445265fdf48d6e5eba73';
$secret = '8e288ba529fd85ea5d135e58caf2fddc';
$code = '';
$uid = 506113;

function enabled($method)
{/*{{{*/
	$enabledApiArray = [
		//'access_token'=> true,
		//'authorize'=> true,
		'get-token-info-for-test'=> true,
	];
	return (isset($enabledApiArray[$method]) && true == $enabledApiArray[$method]);
}/*}}}*/

if(($key = 'authorize') && enabled($key))
{/*{{{*/
	$I->wantTo($key);
	$data = [
		'appid' => $appId,
		'redirect_uri' => 'http://www.baidu.com',
		'response_type' => 'code',
		'scope' => 'snsapi_userinfo',
		'state' => '1234',
		'userToken' => '',
		'ppH5PageUrl' => 'http://www.baidu.com/index.html',
		'authorizePageAutoSubmit' => true,//自动提交表单
	];
	$I->sendGET('/connect/oauth2/'.$key, $data);
	var_dump($I->grabResponse());
	exit;
}/*}}}*/

if(($key = 'access_token') && enabled($key))
{/*{{{*/
	$I->wantTo($key);
	$data = [
		'appid' => $appId,
		'secret' => $secret,
		'code' => $code,
		'grant_type' => 'authorization_code',
	];
	$I->sendGET('/sns/oauth2/'.$key, $data);
	$I->seeResponseCodeIs(200);
	var_dump($I->grabResponse());
exit;
}/*}}}*/

if(($key = 'get-token-info-for-test') && enabled($key))
{/*{{{*/
	$I->wantTo($key);
	$data = [
		'type' => 'aaa',
		'appid' => $appId,
		'sourceId' => 2001,
		'uid' => $uid,
		'q34fgLeDdfaA' => 'a43edfcc933f2d931c2af0002f1cf99b',
		'type' => 'code',
	];
	$I->sendGET('/site/'.$key, $data);
	var_dump($I->grabResponse());
	exit;
}/*}}}*/
