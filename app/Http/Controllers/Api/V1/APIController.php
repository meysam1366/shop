<?php

namespace App\Http\Controllers\Api\V1;

use App\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\SliderCollection;

class APIController extends Controller
{
    public function slider()
    {
        $slider = Slider::all();
        return new SliderCollection($slider);
    }
}
