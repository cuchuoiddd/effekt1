<?php

namespace App\Helpers;

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
     * SMS VMG BRANDNAME
     *
     * @param $phone
     * @param $sms_text
     * @param string $send_after
     * @return int
     */
    public static function sendSmsV3($phone, $sms_text, $send_after = '')
    {
        $data = [
            'to' => $phone,
            'from' => "ROYAL SPA",
            'message' => $sms_text,
            'scheduled' => $send_after,//15-01-2019 16:05
            'requestId' => "",
            'useUnicode' => 0,//sử dụng có dấu hay k dấu
            'type' => 1 // CSKH hay QC
        ];
        $data = json_encode((object)$data);
        $base_url = 'http://api.brandsms.vn:8018/api/SMSBrandname/SendSMS';
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c24iOiJyb3lhbHNwYSIsInNpZCI6ImFmZTIxOWQ4LTdhM2UtNDA5MS05NjBmLThmZjViNGI4NzRhMiIsIm9idCI6IiIsIm9iaiI6IiIsIm5iZiI6MTU4OTM1NDE4MCwiZXhwIjoxNTg5MzU3NzgwLCJpYXQiOjE1ODkzNTQxODB9.Hx8r30IR1nqAkOClihx0n9upfvgOg1f-E3MwNEwWT-0';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $base_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "token: $token"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $error_code = json_decode($response)->errorCode;
        if ($error_code == '000') {
            return 1;
        }
    }

    /**
     * SMS VIETTEL
     *
     * @param $phone
     * @param $sms_text
     * @return int
     */
    public static function sendSmsBK($phone, $sms_text)
    {
        $client = new nusoap_client("http://203.190.170.43:9998/bulkapi?wsdl", 'wsdl', '', '', '', '');
        $client->soap_defencoding = 'UTF-8';
        $client->decode_utf8 = false;
        $err = $client->getError();
        if ($err) {
            echo '<h2>Test-Constructor error</h2><pre>' . $err . '</pre>';
        }
        $result = $client->call('wsCpMt',
            [
                'User' => 'smsbrand_royal_spa',
                'Password' => '123456a@',
                'CPCode' => 'ROYAL_SPA',
                'UserID' => $phone,
                'RequestID' => '1',
                'ReceiverID' => $phone,
                'ServiceID' => 'ROYAL-SPA',
                'CommandCode' => 'bulksms',
                'ContentType' => '0',
                'Content' => $sms_text,
            ], '', '', ''
        );

        $err = $client->getError();
        if (!$err) {
            return 1;
        }

    }

    /**
     * @param $token
     * @param $method
     * @param $uri
     * @param $field
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getDataFaceBook($token, $method, $uri, $field)
    {
        $params = [
            'query' => [
                'access_token' => $token,
                'fields' => $field,
            ]
        ];

        try {
            $client = new \GuzzleHttp\Client();
            $res = $client->request($method, $uri, $params);

            if ($res->getStatusCode() == 200) { // 200 OK
                $response_data = $res->getBody()->getContents();
                $datas = json_decode($response_data)->data;
                return $datas;
            }
        } catch (Exception $e) {
            report($e);
            return [];
        }


    }

    public static function getUserId()
    {
        $user_id = 1;
        return $user_id;
    }
}
