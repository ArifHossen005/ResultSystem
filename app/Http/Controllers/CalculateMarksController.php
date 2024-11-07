<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateMarksController extends Controller
{
    public function index()
    {
        return view('calculateResult.totalMarks');
    }
}
