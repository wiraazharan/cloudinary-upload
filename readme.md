# CLOUDINARY-UPLOAD FOR LARAVEL 5.5 AND ABOVE

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

### Usage

In Controller : 

```sh
public function test_upload(Request $request){
        $uploaded_picture = $request->file('photo');
        $imageUrl = CustomCloudinaryUpload::upload($uploaded_picture,180,'looks','look');
        return $imageUrl;
    }
```