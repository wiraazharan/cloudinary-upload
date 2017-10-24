<?php

namespace Wiraazharan\Cloudinaryupload;

use Image;

class Upload
{
    public function upload($uploaded_picture,$photo_degree,$folder_name,$name_prefix)
    {
    	try {
        	 $imgFile = Image::make($uploaded_picture);
		} catch ( \Intervention\Image\Exception\NotReadableException  $e) {
		    return $e->getMessage();
		}

        if(is_numeric($photo_degree)){
	    	$imgFile->rotate($photo_degree);
        }

	    $image_generated_filename = $name_prefix;
	    $image_generated_filename = preg_replace('/[^a-zA-Z0-9_.]/', '', $image_generated_filename);

	    // convert the string to all lowercase
	    $image_generated_filename = strtolower($image_generated_filename);
	    $imagename = time()."_".$image_generated_filename.'.png';

	    \Cloudinary::config(array(
	        'cloud_name' => config('cloud_inary.cloud_name'),
	        'api_key' => config('cloud_inary.api_key'),
	        'api_secret' => config('cloud_inary.api_secret')
	    ));

	    //temporary path for saving file
	    $destinationPath = storage_path('app/public/');
	    $imgFile->save($destinationPath.$imagename);
	    $cloud = \Cloudinary\Uploader::upload($destinationPath.$imagename, array("use_filename" => TRUE , "folder" => $folder_name , "unique_filename" => FALSE));

	    $imagename = $cloud['original_filename'].".".$cloud['format'];
	    unlink($destinationPath.$imagename);
	    $picture_url = config('cloud_inary.base_secure_url').config('cloud_inary.cloud_name').'/image/upload/'.$folder_name.'/'.$imagename;

	    return $picture_url;
    }
}