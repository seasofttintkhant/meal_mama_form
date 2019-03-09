<?php

namespace App\Http\Controllers;

use App\EmployerMessageTemplate;
use Validator;
use Illuminate\Http\Request;

class EmployerMessageTemplateController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $messages = [

        'required' => ":attribute は必須項目です。",
        
    ];

    protected $attributes = [

        'title' => 'Title',
        'content' => 'Content',

    ];

    public function index()
    {
        $message_templates = EmployerMessageTemplate::where("employer_id", auth()->user()->id)->orderBy("created_at","desc")->paginate(10);
        foreach ($message_templates as $message_template) {
            $message_template->content = str_limit($message_template->content, 50);
        }
        return view('mode_switch.message_templates', [
            "message_templates" => $message_templates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mode_switch.message_template_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => ['required','string','max:200'],
            'content' => ['required','string','max:3000'],
        ],$this->messages,$this->attributes);

        if($validator->fails()) 
        {
            return redirect()->back()->with('errors', $validator->errors());
        }

        EmployerMessageTemplate::insert([
            "employer_id" => auth()->user()->id,
            "title" => $request->title,
            "content" => $request->content,
            "editable" => 1,
            "created_at" => time(),
        ]);

        return redirect()->route('message-templates.index')->with('success','メールアドレスが正常に変更されました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message_template = EmployerMessageTemplate::where("id", $id)->first();
        return view('mode_switch.message_template_edit', [
            "message_template" => $message_template
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required','string','max:200'],
            'content' => ['required','string','max:3000'],
        ],$this->messages,$this->attributes);

        if($validator->fails()) 
        {
            return redirect()->back()->with('errors', $validator->errors());
        }

        EmployerMessageTemplate::where("id", $id)
        ->where("employer_id", auth()->user()->id)
        ->update([
            "title" => $request->title,
            "content" => $request->content,
        ]);

        return redirect()->route('message-templates.index')->with('success','メールアドレスが正常に変更されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployerMessageTemplate::where("id", $id)
        ->where("employer_id", auth()->user()->id)
        ->where("editable", 1)
        ->delete();

        return redirect()->route('message-templates.index')->with('success','メールアドレスが正常に変更されました。');
    }


}
