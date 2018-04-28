<?php

namespace Shureban;

/**
 * Class Fingerprint
 */
class Fingerprint
{
    /**
     * Return unique user value
     *
     * @param string $algo  Name of selected hashing algorithm (e.g. "md5", "sha256", "haval160,4", etc..)
     * @return string
     */
    public static function get(string $algo = 'sha256'): string
    {
        $accept      = $_SERVER['HTTP_ACCEPT'];
        $encoding    = $_SERVER['HTTP_ACCEPT_ENCODING'];
        $language    = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $userAgent   = $_SERVER['HTTP_USER_AGENT'];
        $ipAddress   = $_SERVER['REMOTE_ADDR'];
        $requestData = sprintf(
            'lang:%s,ua:%s,ip:%s:acept:%s,encoding:%s',
            $language, $userAgent, $ipAddress, $accept, $encoding
        );

        return hash($algo, $requestData);
    }
}