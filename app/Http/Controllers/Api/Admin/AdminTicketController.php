<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketSoporte;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = TicketSoporte::with('evento:id,nombre')->get();
        return response()->json($tickets);
    }
}
