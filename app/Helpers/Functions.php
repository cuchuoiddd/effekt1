<?php

namespace App\Helpers;

use App\Setting;
use Exception;
use nusoap_client;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;

class Functions
{
    /**
     * Random voucher
     *
     * @param length
     *
     * @return random String
     */
    public static function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * check action trang thai khach hang in rules
     *
     * @param $config
     * @return array
     */
    public static function checkRuleStatusCustomer($config)
    {
        return array_filter($config, function ($k) {
            return $k->type == 'actor' && $k->value == 'staff_customer';
        });
    }

    /**
     * replace variable to data
     *
     * @param $input
     * @param $text
     * @return mixed
     */
    public static function replaceTextForUser($input, $text)
    {
        $text = str_replace('%full_name%', $input['full_name'], $text);
        $text = str_replace('%phone%', $input['phone'], $text);
        return $text;

    }


    /**
     * UploadImage
     *
     * @param UploadedFile $file
     * @param              $path
     * @param string $namevalidate
     *
     * @return null
     */
    public static function uploadImage(UploadedFile $file, $path, $namevalidate = 'img_file')
    {
        $destinationPath = public_path() . '/uploads/' . $path;
//        $thumbPath = public_path() . '/uploads/' . $path . '/thumb/';
        if (!is_dir($destinationPath)) {
            @mkdir($destinationPath, 0777, true);
            @copy(public_path() . '/uploads/index.html', $destinationPath . '/index.html');
            @copy(public_path() . '/uploads/.ignore', $destinationPath . ' /.gitignore');
        }
//        if (!is_dir($thumbPath)) {
//            @mkdir($thumbPath, 0777, true);
//            @copy(public_path() . '/uploads/index.html', $thumbPath . '/index.html');
//            @copy(public_path() . '/uploads/.ignore', $thumbPath . ' /.gitignore');
//        }
        $extension = $file->getClientOriginalExtension();
        if (in_array($extension, explode(',', 'jpg,jpeg,png,JPG,JPEG,PNG'))) {
            $filename = $file->getClientOriginalName();
            $picture = str_slug(substr($filename, 0, strrpos($filename, "."))) . '_' . time() . '.' . $extension;
            $image = $file->move($destinationPath, $picture);
            // if ($image) {
            //     $sourcePath = $image->getPath() . '/' . $image->getFilename();
            //     Thumbnail::generate_image_thumbnail($sourcePath, $thumbPath . $image->getFilename());
            //     return $image->getFileInfo()->getFilename();
            // }
            return $image->getFileInfo()->getFilename();
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                $namevalidate => [
                    trans('validation . mimes',
                        ['attribute' => $namevalidate, 'values' => 'jpg,jpeg,png,JPG,JPEG,PNG']),
                ],
            ]);
            throw $error;
        }
    }

    public static function getImageModels($model, $path, $field = 'images', $index = 0)
    {
        $val = @$model->$field ?: null;
        if (is_array($val)) {
            $val = $val[$index];
        }
        if (empty($val) || !file_exists(public_path("uploads/$path/$val"))) {
            return asset('default/no-image.png');
        }
        $val = asset("uploads/$path/$val");
        return $val;
    }

    public static function unlinkUpload($path, $name)
    {
        if (!empty($name)) {
            @unlink(public_path( $path . $name));
            @unlink(public_path( $path . 'thumb/' . $name));
        }
    }


    public static function dayMonthYear($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }

    public static function yearMonthDay($date)
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');

    }


    /**
     *
     * Get link language
     *
     */

    public static function linkLanguage($locale = 'en')
    {
        $url = \URL::full();
        if (substr_count($url, '?') > 0 && substr_count($url, '/?') <= 0) {
            $url = str_replace("?", "/?", $url);
        }

        $domain = request()->root();
        $lang = \Request::segment(1);
        $segment_2 = \Request::segment(2);
        if ($lang && $locale != $lang) {

            if ($lang != 'en') {
                if($locale){
                    $convert = 'en/';
                    $url = str_replace($domain . '/' . $lang, $domain . '/' . $convert . $lang, $url);
                }
            } else {
                $convert = '';
                if ($segment_2) {
                    $lang .= '/';
                }
                $url = str_replace($domain . '/' . $lang, $domain . '/' . $convert, $url);
            }
        } elseif ($lang == null) {
            $convert = '/en';
            $url .= $convert;
        }
//        dd($locale, $lang, $url, 222);
        return $url;
    }

    public static function getSetting(){
        $setting = Setting::first();
        return $setting;
    }

}
