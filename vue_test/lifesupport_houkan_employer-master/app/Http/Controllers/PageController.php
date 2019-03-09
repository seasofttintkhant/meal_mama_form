<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;
use App\Setting;

class PageController extends Controller
{
    public function faqIndex()
    {
        $faqs = FAQ::where("deleted_flag",0)->get();

        return view("pages.faq", [
            "faqs" => $faqs,
        ]);
    }

    public function ruleIndex()
    {
		$data['rule'] = str_replace("\\","", Setting::getData('rule'));
        return view("pages.rule", [
            "data" => $data,
        ]);
    }
}
