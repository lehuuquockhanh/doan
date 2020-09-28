<?php


namespace App\Utils;


class FileUtils
{
    public const CATEGORY_PATH = 'category';
    public const SACH_PATH = 'sach';
    public const BLOG_PATH = 'blog';

    public static function uploadImage($image, $path)
    {
        $imageName = now()->timestamp . rand(1, 100000000) . '.' . $image->extension();

        $image->move(public_path('images/' . $path), $imageName);
        return 'images/' . $path . '/' . $imageName;
    }
}
