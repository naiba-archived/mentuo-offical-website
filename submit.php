<?php
error_reporting(0);

// Function to get the client IP address
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}

//CURL post
function post($url, $post_data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function verifyGoogle($ip, $resp)
{
    $secret = '6LeNrmkUAAAAAN-91WusG1Qy9pS5QzoSHFUO0XbS';
    if (!$resp) {
        http_response_code(403);
        die('Naive');
    }
    $output = post('https://www.recaptcha.net/recaptcha/api/siteverify', [
        'secret'=>$secret,
        'response'=>$resp,
        'remoteip'=>$ip
        ]);
    $success = json_decode($output);
    if (!$success || !isset($success->success)||!$success->success) {
        http_response_code(403);
        die('请重新通过机器人验证');
    }
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$offer = $_POST['offer'];
$resp = $_POST['gresp'];
$ip = get_client_ip();

if (strlen($name) < 2||strlen($phone)!=11||strlen($desc)<10||$offer<10000||strlen($resp)<10) {
    http_response_code(403);
    die('请通过门拓科技官网进行提交');
}

verifyGoogle($ip,$resp);
$title = '门拓科技客户上门';
$data = <<<DATA
- 姓名：$name
- 手机：$phone
- 预算：**$offer**元
- 项目介绍：$desc
- IP地址：$ip
DATA;
$success = json_decode(post('https://sc.ftqq.com/SCU19467Tbc970b3ab1b729d4d21e6d057dd8c3ef5a4d9f75aa1ab.send', ['text'=>$title,
'desp'=>$data]));
if (!$success||!isset($success->errno)||$success->errno!=0||
!isset($success->errmsg)||$success->errmsg!='success') {
    http_response_code(500);
    die('服务器错误');
}

echo 'success';
