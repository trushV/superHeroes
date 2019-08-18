<?php


namespace App\Services\FileServices;


use App\Services\FileServices\Contract\FileServicesInterface;
use http\Exception;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;

class FileServices implements FileServicesInterface
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function save(UploadedFile $file):string
    {
        try{
            $file->move(public_path() . '/images');
            $path = 'images/'.$file->getFilename();
            return $path;
        }catch (Exception $e){
            return $e;
        }
    }
    /**
     * @param $path
     */
    public function deleteFile($path):void
    {

        if(file_exists(public_path($path)))
        {
            unlink(public_path($path));
        }

    }
    /**
     * @return Filesystem
     */
    private function getFileSystem():Filesystem
    {
        return app(Filesystem::class);
    }
}
