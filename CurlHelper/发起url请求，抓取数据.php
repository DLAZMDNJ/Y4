<?php

class A
{
	public function wseLogin(Request $req)
    {
        $url = 'https://app.wse.com.cn/hmm/apis/login';
		$post_data['appkey'] = 'hmmauth';
		$post_data['password'] = $req->password;
		$post_data['secret'] = 'b26be2350bd46d34';
		$post_data['timestamp'] = time();
		$post_data['username'] = $req->username;
		$header[] = 'Content-Type: application/x-www-form-urlencoded;charset=utf-8';
		$header[] = 'sign: '.md5(http_build_query($post_data));
		unset($post_data['secret']);
		return $this->curl_con($url, $header, true, $post_data);
    }

    private function curl_con($url, $header = array(), $is_post = false, $post_data = array())
    {
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
	    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	    curl_setopt($ch, CURLOPT_COOKIE, 'ig_pr=1; ig_vw=1364');
	    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, sdch');
	    if(strpos($url, 'https://') === 0){
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    }
	    if($header && is_array($header)){
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    }
	    if($is_post && is_array($post_data)){
	        $data = http_build_query($post_data);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    }
	    $con = curl_exec($ch);
	    curl_close($ch);
	    return $con;
	}
}