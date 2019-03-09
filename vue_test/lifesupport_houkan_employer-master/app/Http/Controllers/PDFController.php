<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function index()
    {
        $data  = [
            'title'=> 'Title',
            'name' => 'Name'
        ];

        $pdf = \PDF::loadView('pdf.careersheets', $data)
        ->setPaper('a4', 'potrait')
        ->setOptions(['dpi' => 150, 'defaultFont' => 'ipag']);
        return $pdf->download('careersheets.pdf');


    }
}
