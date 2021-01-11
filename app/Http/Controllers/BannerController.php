<?php

namespace App\Http\Controllers;

use App\Enums\AffiliateLinkTypes;
use App\Models\AffiliateLink;

class BannerController extends Controller
{
    public function index()
    {
        $banners = AffiliateLink::where('type', AffiliateLinkTypes::BANNER)->get();

        return view('banners.index', ['banners' => $banners]);
    }
}
