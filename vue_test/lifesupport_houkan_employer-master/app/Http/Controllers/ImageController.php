<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\EmployerImage;
use Validator;
use File;
use App\Http\Resources\EmployerImage as EmployerImageResource;

class ImageController extends Controller
{

    private $upload_dir;

    public function __construct()
    {
        $this->upload_dir = base_path() . '/public/img/uploads/';
    }

    public function index()
    {
        return view('image_managers.index');
    }

    public function description(Request $request,$id)
    {
        $image = EmployerImage::find($id);
        if(!isset($image) || empty($image))
        {
            return response()->json(['message'=>'image not found'],404);
        }

        if($image->employer_id != auth()->user()->id)
        {
            return response()->json(['message'=>'not allowed'],403);
        }

        $image->description = strip_tags(trim($request->description));
        $image->update();
        return response()->json(['message'=>'success'],200);
    }

    public function update(Request $request){
        if(isset($request->images) && !empty($request->images) && is_array($request->images))
        {
            foreach($request->images as $image)
            {
                $image_ids[] = $image['id'];
            }
            $images = EmployerImage::whereIn('id',$image_ids)->get();
            $resource_type = null;
            if(isset($request->resource_type) && !empty($request->resource_type))
            {
                switch($request->resource_type){
                    case 'facility' :
                        $resource_type = EmployerImage::ResourceFacility;
                         break;
                    case 'job' :
                        $resource_type = EmployerImage::ResourceJob;
                        break;
                }    
            }
     
            $insertedImages=[];
            foreach($images as $image)
            {
                $data= [
                    'name' => $image->name,
                    'dimension' => $image->dimesion,
                    'recommended_size' =>  $image->recommended_size,
                    'resource_type' => $resource_type,
                    'employer_id' => auth()->user()->id,
                    'created_at' => time(),
                    'updated_at' => time(),
                ];

               $employerImage =  new EmployerImage;
               $employerImage->fill($data)->save();
               $insertedImages[] = $employerImage;
              

            }


            $collection = collect($insertedImages);

            $images = EmployerImageResource::collection($collection);
            return $images;
        }
    
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'file' => 'image|max:10240'
        ]);
       
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }

        $destination = makeUploadDestination($this->upload_dir);

        $fileUpload = $request->file('file');
        $originalName = $fileUpload->getClientOriginalName();
        $originalExtension = $fileUpload->getClientOriginalExtension();
        $img = Image::make($fileUpload);
        $width =$img->width();
        $height =$img->height();
        $dimension =  $width . " x ". $height;
        
        $recommended_size = true;
        if($width < 1200 || $height < 675)
        {
            $recommended_size  = false;
        }
      
        $image_name = makeImageName($originalExtension);
        
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $image = $img->save($destination."/".$image_name);
        $data = [
            'name' => makeStoreImageName($image_name),
            'employer_id' => isset(auth()->user()->id) && !empty(auth()->user()->id) ? auth()->user()->id : 0,
            'dimension' => $dimension,
            'description' => null,
            'resource_id' => null,
            'resource_type' => null,
            'recommended_size' => $recommended_size,
        ];


        if(isset($request->resource_type) && !empty($request->resource_type))
        {
            switch($request->resource_type){
                case 'facility' :
                    $data['resource_type'] = EmployerImage::ResourceFacility;
                     break;
                case 'job' :
                    $data['resource_type'] = EmployerImage::ResourceJob;
                    break;
                case 'employer' :
                    $data['resource_type'] = EmployerImage::ResourceEmployer;
                    break;
            }    
        }

        if(isset($request->resource_id) && !empty($request->resource_id) && is_numeric($request->resource_id))
        {
            $data['resource_id'] = $request->resource_id;
        }

        $image = new EmployerImage;
        $image->fill($data)->save();


        $image = new EmployerImageResource($image);
        return $image;
    }

    public function get(Request $request) {
        $limit = 20;
        $paginaId = 1;
        if(isset($request->limit) && !empty($request->limit) && is_numeric($request->limit)){
            $limit = $request->limit;
        }
        if(isset($request->page) && !empty($request->page) && is_numeric($request->page)){
            $paginaId = $request->page;
        }
        
        $images = EmployerImage::where(function($q) use ($request){
            if(isset($request->resource_id) && !empty($request->resource_id) && is_numeric($request->resource_id)){
                $q->where('resource_id',$request->resource_id);
            }
            if(isset($request->resource_type) && !empty($request->resource_type)){
                if(in_array($request->resource_type,[ EmployerImage::ResourceFacility, EmployerImage::ResourceJob]))
                {
                    $q->where('resource_type',$request->resource_type);
                }               
            }
            if(isset($request->code) && !empty($request->code)){
                if($request->code == 1) {
                    $q->whereNotNull('resource_id');
                }elseif($request->code == 2) {
                    $q->whereNull('resource_id');
                }
            }
            if(isset($request->description) && !empty($request->description)){
                $description = strip_tags(trim($request->description));
                $q->where('description' ,'LIKE',"%{$description}%");
            }
        })
        ->where('employer_id', auth()->user()->id)
        ->orderBy('updated_at','desc')
        ->paginate($limit,['*'], 'page', $paginaId);
        $images = $images->appends($request->all());

        $images = EmployerImageResource::collection($images);
        return $images;
    }


    public function getAll(Request $request) {
        $images = EmployerImage::where(function($q) use ($request){
            if(isset($request->resource_id) && !empty($request->resource_id) && is_numeric($request->resource_id)){
                $q->where('resource_id',$request->resource_id);
            }
            if(isset($request->resource_type) && !empty($request->resource_type)){
                if(in_array($request->resource_type,[ EmployerImage::ResourceFacility, EmployerImage::ResourceJob]))
                {
                    $q->where('resource_type',$request->resource_type);
                }               
            }
        })
        ->where('employer_id', auth()->user()->id)->get();

        $images = EmployerImageResource::collection($images);
        return $images;
    }

    public function delete(Request $request,$id)
    {
        $image = EmployerImage::find($id);
        
        $deleted_image_id = null;
        if(isset($image) && !empty($image))
        {
            if(auth()->check())
            {
                if($image->employer_id !== auth()->user()->id)
                {
                    return response()->json(['message'=>'not authorized'], 401);
                }
            }

            $deleted_image_id = $image->id;
            $image_path = $this->upload_dir.$image->name;
            File::delete($image_path);
            $image->delete();
    
        }
     
        return response()->json([ 'deleted_image_id' =>$deleted_image_id ], 200);
    }

    public function getOne($id)
    {
        $image = EmployerImage::find($id);
        if(isset($image) && !empty($image)) {
            $image =  new EmployerImageResource($image);
            return response()->json(['image' =>$image ], 200);
        }

        return response()->json([], 404);
    }

    public function updateOne(Request $request) {
        $image = EmployerImage::find($request->id);

        if(auth()->check())
        {
            if($image->employer_id != auth()->user()->id) {
                return response()->json([], 403);
            }
        }
       

        $validator = Validator::make($request->all(), [
            'description' => ['nullable','max:40'],
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }

        $image->update([
            "description" => strip_tags(trim($request->description)),
        ]);

        return response()->json(['id'=>$image->id],200);
    }
}
