<?php

namespace App\Traits;

trait FilePondTrait
{
    public function filePondProcess($file)
    {
        $tmpFolder = 'tmp';

        $fileName = $file->store($tmpFolder);

        // save to session

        return $fileName;
    }

    public function load()
    {
        //
    }

    public function filePondRevert(string $file)
    {
        unlink(public_path('storage/'.$file));
    }

    public function filePondRemove(string $file)
    {
        unlink(public_path('storage/'.$file));
    }
}
