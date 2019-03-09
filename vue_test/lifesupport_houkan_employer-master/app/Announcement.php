<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $dateFormat = 'U';

    protected $guarded = [];

	public static function getAllAnnouncement() {
		$announcements = Announcement::where([
			"deleted_flag" => 0,
			"status" => 1
		])
		->WhereRaw("FIND_IN_SET(1,site)")
		->get();
		return $announcements;
	}
}
