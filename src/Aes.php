<?php

namespace Nyg;

class Aes
{
    /**
     * 生成sign签名
     * @param array  $data 要签名的数据
     * @param string $key
     * @return string
     * @author 牛永光 nyg1991@aliyun.com
     * @date   2019/11/6 16:47
     */
    static public function sign_encrypt($data, $key)
    {
        unset($data['sign']);
        $data = array_filter($data);
        ksort($data);
        $secret = urldecode(http_build_query($data, '', '&'));
        $secret .= "&key={$key}";
        return strtoupper(md5($secret));
    }

    /**
     * 验证签名
     * @param array  $data 要验证的原始数组数据
     * @param string $sign 签名数据
     * @param string $key  key
     * @return bool
     * @author 牛永光 nyg1991@aliyun.com
     * @date   2019/11/6 16:47
     */
    static public function sign_decrypt($data, $sign, $key)
    {
        return $sign == self::sign_encrypt($data, $key);
    }
}