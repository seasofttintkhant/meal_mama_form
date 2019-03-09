<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Http\Resources\Announcement as AnnouncementResource;
use Jenssegers\Agent\Agent as UserAgent;

class AnnouncementController extends Controller
{
    protected $userAgent;
    
    public function __construct(UserAgent $userAgent)
    {
        $this->userAgent = $userAgent;
        $this->middleware('auth');
    }

    public function index()
    {
        if($this->userAgent->isMobile())
        {
            $announcements = Announcement::orderBy('created_at','desc')->take(5)->get();
            return view('mobileview.announcements.index',compact('announcements'));
        }
        return redirect('/');
    }

    public function getAnnouncementInfo($id)
    {
    	$announcement_info = Announcement::find($id);
    	$announcement_info = new AnnouncementResource($announcement_info);
    	return response(["announcement_info" => $announcement_info], 200);
    }
}
