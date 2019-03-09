<?php

namespace App\Http\Controllers;

use App\Message;
use App\Scout;
use App\EmployerMessageTemplate;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Jenssegers\Agent\Agent as UserAgent;

class MessageController extends Controller
{
  
    protected $userAgent;

    public function __construct(UserAgent $userAgent)
    {
        $this->userAgent = $userAgent;
        $this->middleware('auth');
    }

    public function getData(Request $request)
    {
        $limit = 10; 
        if(isset($request->limit) && !empty($request->limit))
        {
            $limit = $request->limit;
        }

        $messages = Message::join('employees','employees.id','=','messages.employee_id')
        ->where(function($q) use($request){
            if(isset($request->status) && !empty($request->status))
            {
                if($request->status == 1 ){
                    $q->where('read_by_employer',0);
                }
                elseif($request->status == 2 )
                {
                    $q->where('answer_by_employer',0);
                }
            }

        })->select('messages.*', 'employees.gender as employee_gender',
            \DB::raw('concat(employees.last_name, " ", employees.first_name) as employee_name'),
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as employee_age'),
            \DB::raw('(select concat(SUBSTRING(message_threads.content,1,36),"...") from message_threads where messages.id = message_threads.message_id order by created_at limit 1) as content_excerpt'),
            \DB::raw("from_unixtime(messages.updated_at, '%Y/%m/%d %h:%i') as last_sent")
            )->where('messages.employer_id',auth()->user()->id)->take(10)->get();
   

        return response(['data'=> $messages],200);  
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserAgent $userAgent)
    {    
        $message_templates =EmployerMessageTemplate::getMessageTemplates(); 
        $this->userAgent = $userAgent;
        if($this->userAgent->isMobile())
        {
            return view('mobileview.messages.index',compact('message_templates'));
        }
        
        
        return view('messages.index',compact('message_templates'));
    }

    public function scout_count()
    {   
        $total_count = 200;
        $scout_counts = Scout::where('employer_id',auth()->user()->id)
        ->groupBy(\DB::raw("MONTH(created_at),YEAR(created_at)"))
        ->count();
        

        $remaining_count = $total_count  - $scout_counts;
        $data = [
            'remaining_count' => $remaining_count,
            'total_count' => $total_count,
        ];

        return response($data,200); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMessageThreads($id)
    {
        Message::find($id)->fill([
            'read_by_employer' => true
        ])->update();

        $message =Message::join('employees','employees.id','=','messages.employee_id')
            ->join('jobs','jobs.id','=','messages.job_id')
            ->join('facilities','jobs.facility_id','=','facilities.id')
            ->join('job_categories','jobs.job_category_id','=','job_categories.id')
            ->select('messages.*', 
            'employees.gender as employee_gender',
            'facilities.name as facility_name',
            'job_categories.name as job_category_name',
            'jobs.employment_type as job_employment_type',
            \DB::raw('concat(employees.last_name, " ", employees.first_name) as employee_name'),
            \DB::raw('YEAR(CURDATE()) - YEAR(employees.birthday) as employee_age')
            )->where('messages.id',$id)
            ->where('messages.employer_id',auth()->user()->id)
            ->first();

        if(isset($message) && !empty($message)){      
            $message->job_employment_type = config('custom.employment_type')[$message->job_employment_type];    
        }

        if($message->employer_id != auth()->user()->id)
        {
            return response([],404);  
        }
        $messageThreads = $message->getThreads();

        foreach($messageThreads as $messageThread)
        {
            $messageThread->sent_time = isset($messageThread->created_at) && !empty($messageThread->created_at) ? date('Y/m/d H:i',$messageThread->created_at->timestamp) : "";
            $messageThread->content = nl2br($messageThread->content);
        }
        
        return response(['message'=>$message , 'message_threads'=>$messageThreads],200);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request,$id)
    {
        $message = Message::findOrFail($id);

        if($message->employer_id != auth()->user()->id)
        {
            return response([],404); 
        }

        $this->validate($request,[
            'content' => 'required'
        ]);

        $type = 1;
        $content = $request->content;
        $template_id = 0;
        $message->fill([   
            'read_by_employer' => true,
            'answer_by_employer' => true,      
            'read_by_employee' => false,
            'answer_by_employee' => false,      
        ])->update();
        $message->sendMessageThread($type, $template_id, $content);
    }

    public function sendScout(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'content'=> 'required|max:3000'
        ]);
        if(is_array($request->scout_users))
        { 
           foreach($request->scout_users as $scout_user)
           {
               
            $message = new Message;
            $message->fill([
                'employer_id' => auth()->user()->id,
                'employee_id' => $scout_user,
                'job_id' => $request->job_id,
                'read_by_employer' => true,
                'answer_by_employer' => true,

            ]);

            $type = 1;
            $content = $request->message_content;
            $template_id = 0;
            if($message->save())
            {
                $scout = new Scout;
                $scout->fill([
                    'employer_id' => auth()->user()->id,
                    'employee_id' => $scout_user,
                    'job_id' => $request->job_id,
                    'message_id' => $message->id
                ])->save();
            }
    
            $message->sendMessageThread($type, $template_id, $content);
           }

        }
     

       
    }


  
    public function getMessageTemplate($id)
    {
      
        $idArr = explode("-",$id);

        if(!empty($idArr[1])){
            $id = $idArr[1];
        }
         
        $content = null;
        $message_template = EmployerMessageTemplate::find($id);

        if(isset($message_template) && !emptY($message_template))
        {
            $content= $message_template->content;
        }

        return response(['content'=>$content],200);  
    }
}
