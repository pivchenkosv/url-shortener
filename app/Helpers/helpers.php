<?php
/**
 * Helper functions
 *
 * PHP version 7.3
 *
 * @category PHP
 * @author   Stanislau Piuchanka <pivchenko.stas.1999@gmail.com>
 * @link     https://github.com/pivchenkosv/url-shortener
 */

const MAP = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

/**
 * Transforms URL identifier to short URL
 *
 * @param integer $id Original URL identifier from database
 *
 * @return string
 */
function getShortUrlById($id)
{
    $shorturl = '';

    while ($id) {
        $shorturl = $shorturl . MAP[$id % 62];
        $id = floor($id / 62);
    }

    $shorturl = strrev($shorturl);

    return $shorturl;
}
