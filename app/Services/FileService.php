<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FileService
{
    public function uploadFile(string $folder_path_name, UploadedFile $file): string {
        $folder_path = public_path($folder_path_name);
        if (!file_exists($folder_path)) {
            mkdir($folder_path, 0777, true);
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($folder_path, $filename);

        return $folder_path_name . '/' . $filename;
    }

    public function deleteFile(string $file_path_to_delete): void {
        if ($file_path_to_delete) {
            if (File::exists($file_path_to_delete)) {
                File::delete($file_path_to_delete);
            }
        }
    }
}
