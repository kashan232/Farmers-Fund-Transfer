<?php

use Intervention\Image\Facades\Image;


// Example : resize_image_and_save($request->file('userimg'), 'images');

if (!function_exists('resize_image_and_save')) {
 function resize_image_and_save($file, $path ){
    $image = $file;
    $image_name = time().'_'.$image->getClientOriginalName();
    $final_destination =  public_path($path) .'/'. $image_name;
    Image::make($image->getRealPath())->resize(500, 500)->save($final_destination);
    return $path. '/'.$image_name;
}
}


?>
