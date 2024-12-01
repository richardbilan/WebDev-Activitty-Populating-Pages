<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopulatingPagesController extends Controller
{
    public function index(Request $request)
    {
        $startMonth = $request->input('start_month');
        $endMonth = $request->input('end_month');
        $posts = [];

        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        if ($startMonth && $endMonth) {
           
            if (!is_numeric($startMonth) || $startMonth < 1 || $startMonth > 12) {
                $startMonth = 1;
            }

            if (!is_numeric($endMonth) || $endMonth < 1 || $endMonth > 12) {
                $endMonth = 12;
            }

            
            if ($startMonth > $endMonth) {
                list($startMonth, $endMonth) = [$endMonth, $startMonth];
            }

            
            for ($month = $startMonth; $month <= $endMonth; $month++) {
                $posts[] = [
                    'Username' => $monthNames[$month],  
                    'month' => $month,                   
                    'content' => "This is the month: " . $monthNames[$month],  
                ];
            }
        }

        return view('dashboard', compact('posts', 'startMonth', 'endMonth'));
    }
}
