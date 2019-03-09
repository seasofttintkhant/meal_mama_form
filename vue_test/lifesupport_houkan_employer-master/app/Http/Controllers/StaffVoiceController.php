<?php

namespace App\Http\Controllers;

use App\Question;
use App\StaffVoice;
use App\JobCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class StaffVoiceController extends Controller
{

    private $upload_dir;

    protected $rules =  [
        'job_category_id' => 'required',
        'role' => 'required',
        'years_of_exp' => 'required',
        'question_1' => 'required|max:50',
        'answer_1' => 'required|max:500|min:100',
        'question_2' => 'nullable|max:50',
        'answer_2' => 'nullable|max:500|min:100',
        'question_3' => 'nullable|max:50',
        'answer_3' => 'nullable|max:500|min:100',
        'image' => 'image|dimensions:min_width=100,min_height=100|mimes:jpeg,jpg,png|max:10000'
    ];

    protected $messages = [
        'required' => ':attribute は必須です。',
         'min'     => '100文字以上で入力してください'
    ];
    protected $attributes = [
        'job_category_id' => '職種',
        'role' => '役職・役割',
        'years_of_exp' => '経験年数',
        'image' => '顔写真',
        'question_1' => '質問/回答 01',
        'answer_1' => '回答 01',
        'question_2' => '質問/回答 02',
        'answer_2' => '回答 02',
        'question_3' => '質問/回答 03',
        'answer_3' => '回答 03',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->upload_dir = base_path() . '/public/img/staff_voices/';
        $this->middleware('auth');
    }

    public function index()
    {
       $staffVoices = StaffVoice::join('job_categories','job_categories.id','=','staff_voices.job_category_id')
       ->where('staff_voices.employer_id',auth()->user()->id)
       ->select('staff_voices.*','job_categories.name as job_category_name')
       ->orderBy('staff_voices.id','desc')->paginate(10);

        return view('staff_voices.index',compact('staffVoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all()->pluck('name','id')->toArray();
        $job_categories = JobCategory::where('deleted_flag', 0)->pluck('name', 'id')->toArray();
        return view('staff_voices.create', compact('questions', 'job_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->rules,$this->messages,$this->attributes);

        $image_name = NULL;            
        if($request->hasFile('image'))
        {
          $destination = $this->upload_dir;
          $fileUpload = $request->file('image');
          $originalName = $fileUpload->getClientOriginalName();
          $originalExtension = $fileUpload->getClientOriginalExtension();
          
          $image_name = str_replace(".$originalExtension", "", $originalName).'_'.time().'.'.$originalExtension;
          
          if (!file_exists($destination)) {
              mkdir($destination, 0777, true);
          }
  
          $image = Image::make($fileUpload)->fit(100,100);
          $image->orientate();
          $image->save($destination.$image_name);
        }
        $staffVoice = new StaffVoice;
        $staffVoice->fill([
            'job_category_id' => $request->job_category_id,
            'employer_id' => auth()->user()->id,
            'role' => $request->role,
            'years_of_exp' => $request->years_of_exp,
            'question_1' => $request->question_1,
            'answer_1' => $request->answer_1,
            'question_2' => $request->question_2,
            'answer_2' => $request->answer_2,
            'question_3' => $request->question_3,
            'answer_3' => $request->answer_3,
            'image' => $image_name
        ]);
        $staffVoice->save();


        return redirect()->route('staff_voices.index');
        
    }

    public function post_preview(Request $request)
    {
        $staffVoice = $request->all();
        $job_category_name = null;
        if(isset($request->job_category_id) && !empty($request->job_category_id)){
            $jobCategory=JobCategory::find($request->job_category_id);

            if(isset($jobCategory->name) && !empty($jobCategory->name))
            {
                $staffVoice= array_merge($staffVoice,['job_category_name'=>$jobCategory->name]);
            }
        } 
        

        if($request->hasFile('image'))
        {
           
            if($request->hasFile('image'))
            {
            $destination = $this->upload_dir ."/tmp/";
            $fileUpload = $request->file('image');
            $originalName = $fileUpload->getClientOriginalName();
            $originalExtension = $fileUpload->getClientOriginalExtension();
            
            $image_name = str_replace(".$originalExtension", "", $originalName).'_'.time().'.'.$originalExtension;
            
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }
    
            $image = Image::make($fileUpload)->fit(100,100);
            $image->orientate();
            $image->save($destination.$image_name);

            $staffVoice= array_merge($staffVoice,['image'=>$image_name]);
            }

        }   
        
        if(strlen($staffVoice['answer_1']) < 100)
        {   
            unset($staffVoice['answer_1']);
        }
        if(strlen($staffVoice['answer_2']) < 100)
        {
            unset($staffVoice['answer_2']);
        }
        if(strlen($staffVoice['answer_3']) < 100)
        {
            unset($staffVoice['answer_3']);
        }
   
        return view('staff_voices.preview',compact('staffVoice'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaffVoice  $staffVoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,StaffVoice $staffVoice)
    {
        //return view('preview.staff_voice_preview', compact('request','staffVoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffVoice  $staffVoice
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffVoice $staffVoice)
    {
        $questions = Question::all()->pluck('name','id')->toArray();
        $job_categories = JobCategory::where('deleted_flag', 0)->pluck('name', 'id')->toArray();
        return view('staff_voices.edit', compact('questions', 'job_categories','staffVoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffVoice  $staffVoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffVoice $staffVoice)
    {
        $this->validate($request, [
            'job_category_id' => 'required',
            'role' => 'required',
            'years_of_exp' => 'required',
            'question_1' => 'required|max:50',
            'answer_1' => 'required|max:500|min:100',
            'question_2' => 'nullable|max:50',
            'answer_2' => 'nullable|max:500|min:100',
            'question_3' => 'nullable|max:50',
            'answer_3' => 'nullable|max:500|min:100',
            'image' => 'image|dimensions:min_width=100,min_height=100'
        ]);

        
        $image_name = NULL;
        if($request->hasFile('image'))
        {
          $destination = $this->upload_dir;
          $fileUpload = $request->file('image');
          $originalName = $fileUpload->getClientOriginalName();
          $originalExtension = $fileUpload->getClientOriginalExtension();
          
          $image_name = str_replace(".$originalExtension", "", $originalName).'_'.time().'.'.$originalExtension;
          
          if (!file_exists($destination)) {
              mkdir($destination, 0777, true);
          }
  
          $image = Image::make($fileUpload)->fit(100,100);
          $image->orientate();
          $image->save($destination.$image_name);

          //remove old image
          $staffVoice->deleteOldImage($this->upload_dir);  
        }

    

        $staff_voice = [
            'job_category_id' => $request->job_category_id,
            'role' => $request->role,
            'years_of_exp' => $request->years_of_exp,
            'question_1' => $request->question_1,
            'answer_1' => $request->answer_1,
            'question_2' => $request->question_2,
            'answer_2' => $request->answer_2,
            'question_3' => $request->question_3,
            'answer_3' => $request->answer_3,
        ];

        if(isset($image_name) && !empty($image_name))
        {
            $staff_voice['image'] = $image_name;
        }
        if(isset($request->preview) && !empty($request->preview)){
            //return $request;
            return view('preview.staff_voice_preview', compact('request','staffVoice'));
        }
        $staffVoice->fill($staff_voice)->update();



        return redirect()->route('staff_voices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffVoice  $staffVoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffVoice $staffVoice)
    {
        //
    }
}
