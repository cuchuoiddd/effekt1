<?php

namespace App\Components;

use App\Constants\Directory;
use App\Constants\DirectoryConstant;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class Filesystem
{
    /**
     * @param string $path
     * @param string $url
     *
     * @return string|null
     */
    public function moveTempUpload($path, $url)
    {
        $absolutePath = str_replace(url('/'), '', $url);
        $relativePath = $this->uploadPath($absolutePath);
        if (!is_dir('../public/' . $path)) {
            mkdir('../public/' . $path, 0777, true);
        }
        if (File::exists($relativePath)) {
            $newFile = $path . $this->createFileName($path, File::extension($relativePath));

            File::move($relativePath, $this->uploadPath($newFile));

            return $newFile;
        }

        return null;
    }

    /**
     * @param \Illuminate\Http\UploadedFile|array $input
     *
     * @return array|string
     */
    public function uploadTemp($input)
    {
        $absolutePath = DirectoryConstant::TMP_IMAGE;
        if (!is_dir('../public/' . $absolutePath)) {
            mkdir('../public/' . $absolutePath, 0777, true);
        }
        if (is_array($input)) {
            $data = [];
            foreach ($input as $val) {
                $newFile = $this->uploadTemp($val);

                if (!empty($newFile)) {
                    array_push($data, $newFile);
                }
            }

            return $data;
        }

        if (!$input instanceof UploadedFile) {
            return null;
        }

        $relativePath = $this->uploadPath($absolutePath);

        $prefix = date('Y-m-d_');
        $fileName = $this->createFileName($relativePath, $input->getClientOriginalExtension(), $prefix);
        $type = $input->getClientMimeType();
        $miniType = [
            'video/x-flv',
            'application/x-mpegURL',
            'video/MP2T',
            'video/mp4',
            'video/quicktime',
            'video/x-msvideo',
            'video/x-ms-wmv',
        ];
        if (in_array($type, $miniType)) {
            $fileName = str_replace(".mov", ".mp4", $fileName);
            $fileName = str_replace(".MOV", ".mp4", $fileName);
            $fileName = str_replace(".flv", ".mp4", $fileName);
            $fileName = str_replace(".FLV", ".mp4", $fileName);
            $fileName = str_replace(".m3u8", ".mp4", $fileName);
            $fileName = str_replace(".M3U8", ".mp4", $fileName);
            $fileName = str_replace(".ts", ".mp4", $fileName);
            $fileName = str_replace(".TS", ".mp4", $fileName);
            $fileName = str_replace(".wmv", ".mp4", $fileName);
            $fileName = str_replace(".WMV", ".mp4", $fileName);
            $fileName = str_replace(".avi", ".mp4", $fileName);
            $fileName = str_replace(".AVI", ".mp4", $fileName);
        }
        $input->move($relativePath, $fileName);
        if (in_array($type, $miniType)) {
            $time = time();
            $video = $absolutePath . $fileName;
            $command = "ffmpeg -i " . base_path() . '/public' . $video . " -vf fps=1/60 " . base_path() . '/public' . $absolutePath . "thumbnail-" . $time . ".png";
            system($command);
            $thumbnail = $absolutePath . "thumbnail-" . $time . ".png";

            $file = $absolutePath . $fileName;
            return [$thumbnail, $file];
        }

        return $absolutePath . $fileName;
    }

    /**
     * @param \Illuminate\Http\UploadedFile|array $input
     * @param                                     $directory
     *
     * @return array|string
     */
    public function uploadImage($directory, $input)
    {
        if (is_array($input)) {
            $data = [];
            foreach ($input as $val) {
                $newFile = $this->uploadImage($directory, $val);

                if (!empty($newFile)) {
                    array_push($data, $newFile);
                }
            }

            return $data;
        }

        if (!$input instanceof UploadedFile) {
            return null;
        }

        $relativePath = $this->uploadPath($directory);

        $prefix = date('Y-m-d_');
        $fileName = $this->createFileName($relativePath, $input->getClientOriginalExtension(), $prefix);

        $input->move($relativePath, $fileName);

        return $fileName;
    }

    /**
     * @param \Illuminate\Http\UploadedFile|array $input
     * @param                                     $directory
     *
     * @return array|string
     */
    public
    function uploadFile(
        $directory,
        $input
    )
    {
        if (is_array($input)) {
            $data = [];
            foreach ($input as $val) {
                $newFile = $this->uploadFile($directory, $val);

                if (!empty($newFile)) {
                    array_push($data, $newFile);
                }
            }

            return $data;
        }

        if (!$input instanceof UploadedFile) {
            return null;
        }
        $relativePath = $this->uploadPath($directory);
        $file_name = date('Y-m-d') . '-' . time() . '-';
        $prefix = $file_name;
        $fileName = $this->createFileName($relativePath, $input->getClientOriginalExtension(), $prefix);

        $input->move($relativePath, $fileName);

        return $directory . $fileName;
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    public
    function remove(
        $path
    )
    {
        $newPath = $this->uploadPath($path);

        if (File::exists($newPath)) {
            return File::delete($newPath);
        }

        return false;
    }

    /**
     * @param string $path
     * @param string $extension
     * @param string $prefix
     *
     * @return string
     */
    private
    function createFileName(
        $path,
        $extension,
        $prefix = ''
    )
    {
        do {
            $fileName = uniqid($prefix) . '.' . $extension;
        } while ($this->fileExists($path . $fileName));

        return $fileName;
    }

    /**
     * @param string|null $path
     *
     * @return string
     */
    private
    function uploadPath(
        $path = null
    )
    {
        return base_path(DirectoryConstant::UPLOAD_PATH . $path);
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    private
    function fileExists(
        $path
    )
    {
        return File::exists($this->uploadPath($path));
    }
}
