<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function destinations()
    {
        return view('frontend.destinations');
    }

    public function destinationDetail($id)
    {
        
        return view('frontend.destination-detail');
    }

    public function guides()
    {
        return view('frontend.guides');
    }

    public function guideDetail($id)
    {
        return view('frontend.guide-detail');
    }

    public function itineraries()
    {
        return view('frontend.itineraries');
    }

    public function itineraryDetail($id)
    {
        return view('frontend.itinerary-detail');
    }

    public function villa()
    {
        return view('frontend.villa');
    }
}
