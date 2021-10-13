<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationController extends Controller
{


    public function show($id): \Inertia\Response
    {

        return Inertia::render('Dashboard', [
            'reservations' => [
                [
                    'id' => $id,
                    'name' => 'John Doe',
                    'date' => Carbon::now()->hour(16)->minute(30)->toISOString(),
                    'persons' => 4,
                    'tables' => '12, 13',
                    'short_notice' => 'Hund dabei',
                    'long_notice' => 'uff\nwhat else'
                ]
            ]
        ]);

    }

}
