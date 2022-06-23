<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// CMS
use App\Models\Inline;
use App\Models\Boxes;
use App\Models\Image;
use App\Models\Investment;
use App\Models\Slider;
use App\Models\Section;
use App\Models\Map;
use App\Models\RodoRules;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $sliders = Slider::all()->sortBy("sort");
        $rules = RodoRules::orderBy('sort')->whereStatus(1)->get();

        return view('front.homepage.index', compact(
            'sliders',
            'rules'
        ));
    }

}
