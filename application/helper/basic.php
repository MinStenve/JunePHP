<?php
/**
 * Enterprise Resource Planning System
 *
 * @author Wen Peng
 * @link http://www.pengblog.com
 * @link wen@pengblog.com
 */

if (!defined('ACCESS')) die('No direct script access allowed');

/**
 * 注册Core自动加载
 */
function autoLoad($class_name) {
    $class_name = strtolower($class_name);
    if (file_exists( CORE_PATH . $class_name . '.php')) {
        require CORE_PATH . $class_name . '.php';
    }else{
        die('The file ' . $class_name . '.php is missing in the core folder.');
    }
}

/**
 *  控制器 重定向
 */
function redirect($url, $time = 0) {
    if (!headers_sent()) {
        if ($time === 0) header("Location: ".$url);
        header("refresh:" . $time . ";url=" .$url. "");
        exit();
    } else {
        exit("<meta http-equiv='Refresh' content='" . $time . ";URL=" .$url. "'>");
    }
}

/**
 * 404
 */
function return404($message = '404 Not Found') {
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    exit($message);
}


function getIP() {
    $realip = 'unknown';
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}
