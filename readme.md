# CLOUDINARY-UPLOAD

### Setup
RUN : 
```sh
$ composer install
```


### Create File with titled "cloud_inary.php" and put inside config folder

File contains :
```sh
<?php
return [
    'cloud_name' => 'xxx',
    'api_key' => 'xxx',
    'api_secret' => 'xxx',
    'base_secure_url' => 'https://res.cloudinary.com/',
];
```


### Register Provider AND Facade

```sh
'providers' => [
        ...
        Intervention\Image\ImageServiceProvider::class,
        Wiraazharan\Cloudinaryupload\UploadServiceProvider::class,
    ],
```

```sh
'aliases' => [
        ...
        'Image' => Intervention\Image\Facades\Image::class,
        'CustomCloudinaryUpload' => Wiraazharan\Cloudinaryupload\UploadFacade::class,
    ],
```