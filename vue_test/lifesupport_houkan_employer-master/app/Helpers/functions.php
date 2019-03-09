<?php


/*Make Array options to string */
function makeOptionString($options=[]){
    $option_string = null;
    if(!empty($options)){
        $option_string= implode(",",$options);
    }
    return $option_string;
}

/* Make String options to array */

function makeOptionArray($option_string){
    $options = [];

    if(!empty($option_string))
    {
        $options = explode(',',$option_string);
    }

    return $options;

}
function getPrefectureID($name)
{
    $jsonString = file_get_contents(base_path('database/jsons/prefectures.json'));

    $data = json_decode($jsonString, true);
    // var_dump($data);die();
    $prefecture_id = null;
    foreach($data as $key => $prefecture)
    {
        if($prefecture['name']==$name)
        {
            $prefecture_id = $prefecture['id'];
            break;
        }
    }  
    return $prefecture_id;
}
function getCityID($name){
    $jsonString = file_get_contents(base_path('database/jsons/cities.json'));

    $data = json_decode($jsonString, true);
    // var_dump($data);die();
    $city_id = null;
    foreach($data as $key => $city)
    {
        if($city['name']==$name)
        {
            $city_id = $city['id'];
        }
    }  
    return $city_id;
}

function makeUploadDestination($dirname){
    return $dirname.date('Y')."/".date('m');
}
function makeStoreImageName($image_name){
    return date('Y')."/".date('m') ."/". $image_name;
}
function makeImageName($ext){
    return uniqid().'_'.time().'.'.$ext;
}