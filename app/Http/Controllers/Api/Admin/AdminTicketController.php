<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketSoporte;
use App\Http\Resources\TicketSoporteResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of all support tickets.
     */
    public function index(): AnonymousResourceCollection
    {
        $tickets = TicketSoporte::with('evento:id,nombre')->get();
        return TicketSoporteResource::collection($tickets);
    }

    /**
     * Get the count of open support tickets.
     */
    public function countOpen(): JsonResponse
    {
        $count = TicketSoporte::open()->count();
        return response()->json(['count' => $count]);
    }
}
