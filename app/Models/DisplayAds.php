<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplayAds extends Model
{
    use HasFactory;

    public function listPaginateAdsDesc(){

        // $ads = Ad::orderBy('created_at','desc')->get(); // Eloquent model to query and fetch all the data from a table
        //$ads = Ad::orderBy('created_at','desc')->take(1)->get();
        $ads = Ad::orderBy('created_at', 'desc')->paginate(10);
        return $ads;
        //return Ad::where('title','Post Two')->get();

    }
}
