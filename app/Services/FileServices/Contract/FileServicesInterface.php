<?php


namespace App\Services\FileServices\Contract;


use Illuminate\Http\UploadedFile;

/**
 * Interface FileServicesInterface
 * @package App\Services\FileServices\Contract
 */
interface FileServicesInterface
{
    /**
     * Method for saving files
     *
     * @param UploadedFile $file
     * @return string
     */
    public function save(UploadedFile $file):string;

    /**
     * Delete file method
     *
     * @param $path
     */
    public function deleteFile($path):void;
}
