<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $dateFormat = 'U';
    
    protected $guarded = [];


    /* Resource Type 
    * 1 . Employer
    * 2 . Employee
    */

    /*Message Type 
    * 応募 = > 1
    * 通常返信 = > 2
    * 内定通知 = > 3
    * 不採用通知 => 4
    */

    public function sendMessageThread($type, $template_id, $content=null)
    {
      $messageThread = new  MessageThread;
      $messageThread->message_id  = $this->id;
      $messageThread->type  = $type;
        
      if(isset($content) && !empty($content))
      {
        $messageThread->content = $content;
      }
      else
      {
        $messageThread->content = MessageTemplate::find($template_id)->content;
      }
      
      $messageThread->resource_type = 1;
      $messageThread->save();
    }

    public function getThreads()
    {
       $messages = MessageThread::where('message_id',$this->id)->orderBy('created_at','asc')->get();

       return $messages;
    }
}
