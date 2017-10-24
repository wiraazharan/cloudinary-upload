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

### Implementation for Laravel

In Controller : 

```sh
public function test_upload(Request $request){
        $uploaded_picture = $request->file('photo');
        $imageUrl = CustomCloudinaryUpload::upload($uploaded_picture,{photo_degree},'{folder_to_be_saved}','{image_name_prefix}');
        return $imageUrl;
    }
```