<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as ImageManager;

//CMS
use App\Models\Image;

class ImageService
{
    public function upload(UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/gallery/images/' . $model->file))) {
                File::delete(public_path('uploads/gallery/images/' . $model->file));
            }
            if (File::isFile(public_path('uploads/gallery/images/thumbs/' . $model->file))) {
                File::delete(public_path('uploads/gallery/images/thumbs/' . $model->file));
            }
        }
        $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $name = date('His').'_'.Str::slug($file_name).'.' . $file->getClientOriginalExtension();
        $file->storeAs('gallery/images/', $name, 'public_uploads');

        $filepath = public_path('uploads/gallery/images/' . $name);
        $thumb_filepath = public_path('uploads/gallery/images/thumbs/' . $name);

        ImageManager::make($filepath)
            ->resize(
                config('images.gallery_big.width'),
                config('images.gallery_big.height'),
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($filepath);

        ImageManager::make($filepath)
            ->fit(
                config('images.gallery_thumb.width'),
                config('images.gallery_thumb.height')
            )->save($thumb_filepath);

        $model->update(['file' => $name, 'name' => $file->getClientOriginalName()]);
    }
}
