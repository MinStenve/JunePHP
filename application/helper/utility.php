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
 * 内存使用计算
 */
function memoryUsage(){
    return memory_get_usage()/1024/1024;
}

/**
 * 进程时间计算
 */
function queryTime(){
    return microTimeFloat() - microTimeFloat(START_TIME);
}

/**
 * 时间戳精度转换
 */
function microTimeFloat($micro_array = null){
    $micro_tmp = $micro_array ? $micro_array : microtime();
    $result = explode(' ', $micro_tmp);
    return $result[1] + $result[0];
}

function theUsage(){
    return "内存消耗：". memoryUsage() ." MB; 进程时间：". queryTime() ." 秒";
}
