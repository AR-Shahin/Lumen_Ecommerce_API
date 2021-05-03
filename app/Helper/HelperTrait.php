<?php

namespace App\Helper;

trait HelperTrait {
    public function storageImageOrFile($image, $path, $field, $instance) :bool
    {
        $ext = $image->getClientOriginalExtension();
        $name =  hexdec(uniqid()) . '.' . $ext;
        $last_image = $path . $name;
        $instance->$field = $last_image;
        if ($instance->save()) {
            $image->move($path, $last_image);
        }
        return true;
    }
}
