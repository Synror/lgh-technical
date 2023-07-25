<?php

namespace App\Http\Controllers;

use App\Models\OnRent;
use App\Models\OnRentLines;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalChartController extends Controller
{
    public $onRents;
    public $total = 0;
    public $weeklyAverage = [];

    public function handle()
    {
        $this->onRents = OnRent::
            whereDate('gen_date', '>=', Carbon::now()->subDays(20))
            ->whereDate('gen_date', '<=', Carbon::now())
            ->orderBy('gen_date', 'ASC')
            ->get();


        foreach ($this->onRents as $key => $onRent) {
            $this->total += $onRent->weekly_value;
            $this->weeklyAverage[] = round($this->total / ($key + 1), 2);
        }

        return view('welcome')
            ->with('onRents', $this->onRents)
            ->with('weeklyAverage', $this->weeklyAverage);
    }
}
