<?php

namespace ProactiveAnts\Advertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Advertisement\Advertisement;

class AdvertisementController extends Controller
{
    public function fetchImage($id)
    {
        $adv = Advertisement::findOrFail($id);
        $image_file = Image::make($adv->image);
        $reponse = Response::make($image_file->encode('jpeg'));
        $reponse->header('Content-Type', 'image/jpeg');
        return $reponse;
    }
}