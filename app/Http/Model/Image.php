<?php

namespace App\Http\Model;

use Matriphe\Imageupload\ImageuploadModel;

/**
 * App\Http\Model\Image
 *
 * @property array $exif
 * @mixin \Eloquent
 */
class Image extends ImageuploadModel
{
    protected $table = 'images';
}