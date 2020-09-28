<?php

namespace App\Services;

use App\Components\Filesystem;
use App\Helpers\Thumbnail;

/**
 * Class UploadService
 *
 * @package App\Services\Upload
 */
class UploadService
{
    /**
     * @var Filesystem
     */
    private $fileUpload;

    /**
     * UploadService constructor.
     *
     * @param Filesystem $fileUpload
     */
    public function __construct(Filesystem $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }

    /**
     * @param $path , $file
     *
     * @return array $images
     */
    public function uploadImage($path, $file)
    {

        $thumb_path = $path . 'thumb/';
        if (!is_dir($path)) {
            @mkdir($path, 0777, true);
//            @copy(public_path() . '/uploads/index.html', $path . '/index.html');
//            @copy(public_path() . '/uploads/.ignore', $path . ' /.gitignore');
        }
        if (!is_dir($thumb_path)) {
            @mkdir($thumb_path, 0777, true);
//            @copy(public_path() . '/uploads/index.html', $thumb_path . '/index.html');
//            @copy(public_path() . '/uploads/.ignore', $thumb_path . ' /.gitignore');
        }
        $images = $this->fileUpload->uploadImage($path, $file);

        $source = public_path() . $path . $images;
        $source_thumb = public_path() . $thumb_path . $images;
        Thumbnail::generate_image_thumbnail($source, $source_thumb);

//        $path_file = public_path() . $path . $file;
//        $command = 'cp ' . $path_file . ' ' . $path_file_new;
//        exec($command);
//        // to finally create image instances
//        $size = '300x160';
//        $new_name = $path_file_new;
//        // @codingStandardsIgnoreLine
//        $cmd = "convert $new_name -resize $size\> -auto-orient -size $size xc:white +swap -gravity center -composite $new_name";
//        exec($cmd, $output_laravel);

        return $images;
    }

    /**
     * @param $path , $file
     *
     * @return array $file
     */
    public function uploadFiles($path, $file)
    {
        if (!is_dir($path)) {
            @mkdir($path, 0777, true);
        }
        $files = $this->fileUpload->uploadFile($path, $file);
        return $files;
    }

    /**
     * @param $path
     *
     * @return bool
     */
    public function removeImage($path)
    {
        $remove = $this->fileUpload->remove($path);

        return $remove;
    }

    /**
     * @param \Illuminate\Http\UploadedFile $files
     *
     * @return array
     */
    public function uploadImageTemp($files)
    {
        $images = $this->fileUpload->uploadTemp($files);
        return $images;
    }

    /**
     * @param string $path
     * @param string $url
     *
     * @return array
     */
    public function moveImage($path, $url)
    {
        $images = $this->fileUpload->moveTempUpload($path, $url);
        return $images;
    }

    /**
     * @param \Illuminate\Http\UploadedFile[] $files
     *
     * @return array
     */
    public function image($files)
    {
        $images = $this->fileUpload->uploadTemp($files);
        $images = is_array($images) ? $images : [];

        return array_map(function ($img) {
            return url($img);
        }, $images);
    }
}
