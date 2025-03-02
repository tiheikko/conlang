<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

/**
 * Сервис для работы с файлами.
 *
 * Предоставляет методы для загрузки и удаления файла.
 */
class FileService
{
    /**
     * Загрузка файла.
     *
     * @param string $folder_path_name Путь к папке, в которую нужно загрузить файл
     * @param UploadedFile $file Файл для загрузки.
     *
     * @return string Путь к загруженному файлу.
     */
    public function uploadFile(string $folder_path_name, UploadedFile $file): string
    {
        $folder_path = public_path($folder_path_name);
        if (!file_exists($folder_path)) {
            mkdir($folder_path, 0777, true);
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($folder_path, $filename);

        return $folder_path_name . '/' . $filename;
    }

    /**
     * Загрузка файла.
     *
     * @param string $file_path_to_delete Полный путь к файлу для удаления.
     *
     * @return void
     */
    public function deleteFile(string $file_path_to_delete): void {
        if (File::exists($file_path_to_delete)) {
            File::delete($file_path_to_delete);
        }
    }
}
