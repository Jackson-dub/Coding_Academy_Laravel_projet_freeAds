<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Image;
use App\Models\Category;
use App\Models\Location;
use App\Models\DisplayAds;
use App\Models\CreateAd;
use App\Models\UpdateAd;

class AdsController extends Controller

/**
 * Create a new controller instance.
 *
 * @return void
 */

{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $categories = Category::All();
        $ads = new DisplayAds();
        return view('ads.index')->with(['ads' => $ads->listPaginateAdsDesc(),'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        return view('ads.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);

        $newLocation = new Location();
        //$ip =  $newLocation->getUserIp();
        $ip = '91.167.214.84';
        $location = $newLocation->getUserPosition($ip)['geoplugin_countryCode'];

        $newad = new CreateAd();
        $newad -> createAd($request,$location);
        return redirect('/ads');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        return view('ads.show')->with('ad', $ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $categories = Category::all();
        //Check for correct user
        if (auth()->user()->id !== $ad->user_id) {
        	session()->flash('errorMessage','Unauthorized Page');
            return redirect()->route("ads.manager");
        } else {
            return view('ads.edit')->with(['ad' => $ad, 'categories' => $categories]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => ['required', 'min:0'],
            'category' => 'required',
        ]);


        $newLocation = new Location();
        //$ip =  $newLocation->getUserIp();
        $ip = '91.167.214.84';
        $location = $newLocation->getUserPosition($ip)['geoplugin_countryCode'];
        $newad = new UpdateAd();
        $newad -> updateAd($request,$location,$id);
        return redirect('/ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();
        return redirect('/ads/manager')->with('flashMessage', 'Your ad has been deleted');
    }
}
