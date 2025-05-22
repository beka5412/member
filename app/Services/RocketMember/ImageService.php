<?php
namespace App\Services\RocketMember;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImageService{
    static function handleImageUpload($path, $width, $height, $destinationDirectory, $quality = 85) {
        $image = Image::make($path);
        $image_path = public_path('/storage/');
    
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        
        $dir = storage_path($destinationDirectory);
        if(!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    
        $extension = $path->getClientOriginalExtension();
        $newFileName = Str::uuid() . '_' . time() . '.' . $extension;
        $savePath = $image_path . $destinationDirectory . $newFileName;
    
        $image->save($savePath, $quality);

        return $newFileName;
    }
}
