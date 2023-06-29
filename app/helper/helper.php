<?php

function uploadImage($request,$object,$filename){
    if($request->hasFile($filename)){
           $file=$request->$filename;
           $newName =time() . '.' . $file->getClientOriginalExtension();
           $file->move('images',$newName);
           $object->$filename="images/$newName";
       }
}
