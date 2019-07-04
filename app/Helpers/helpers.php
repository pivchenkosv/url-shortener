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

/**
 * Transforms URL identifier to short URL
 *
 * @param integer $id Original URL identifier from database
 *
 * @return string
 */
function getShortUrlById($id)
{
    $map = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    $shorturl = '';

    while ($id) {
        $shorturl = $shorturl . $map[$id % 62];
        $id = floor($id / 62);
    }

    $shorturl = strrev($shorturl);

    return $shorturl;
}
