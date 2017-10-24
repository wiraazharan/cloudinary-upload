<?php

namespace Wiraazharan\Cloudinaryupload;

use Illuminate\Support\Facades\Facade;

class UploadFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'cloudinary-upload';
    }
}