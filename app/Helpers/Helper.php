<?php

namespace App\Helpers;

use File;
use Intervention\Image\ImageManagerStatic as Image;

class Helper {

    public static function uploadImage($file,$newFileName,$width,$height,$dir,$dir_thumb = '')
    {
        // upload original size image
        self::uploadOriginalImageSize($file,$dir);
        // create instance
        $image = Image::make(public_path().$dir.$newFileName);
        if (isset($width) and !empty($width) and isset($width) and !empty($height)) {
            // resize image to fixed size
            $image->resize($width, $height);
        }elseif (isset($width) and !empty($width) || !isset($height) and empty($height)) {
            // resize only the width of the image
            $image->resize($width, null);
        }elseif (!isset($width) and empty($width) || isset($height) and !empty($height)) {
            // resize only the height of the image
            $image->resize(null, $height);
        }

        $dirs = public_path().$dir_thumb.$newFileName;

        if (!file_exists(public_path().$dir_thumb)) {
            File::makeDirectory(public_path().$dir_thumb,0777);
        }

        // save image
        $image->save($dirs);

        return $dir_thumb.$newFileName;
    }

    public static function uploadOriginalImageSize($file,$dir)
    {
        $fileName = $file->getClientOriginalName();

        $file->move(public_path().$dir,$fileName);
    }

    public static function uploadImageProduct($file,$dir)
    {
        $fileName = $file->getClientOriginalName();

        $file->move(public_path().$dir,$fileName);

        return $dir.$fileName;
    }

    public static function convertToGregorian($year,$month,$day)
    {
        $date = \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);

        return $date;
    }

    public static function convertNumbers($srting,$toPersian=true)
    {
        $en_num = array('0','1','2','3','4','5','6','7','8','9');
        $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
        if( $toPersian ) return str_replace($en_num, $fa_num, $srting);
        else return str_replace($fa_num, $en_num, $srting);
    }


}