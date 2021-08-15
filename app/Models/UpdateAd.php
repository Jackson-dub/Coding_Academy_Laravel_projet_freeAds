<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateAd extends Model
{
    use HasFactory;


    public function updateAd($request,$location,$id){
        $title = filter_var($request->title, FILTER_SANITIZE_SPECIAL_CHARS);
        $body = filter_var($request->description, FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_var($request->price, FILTER_VALIDATE_INT);
        $location = $location;

        if ($price <= 0) {
            session()->flash('error', 'Price must be a number more than 0');
            return redirect(route('ads.edit'));
        } else {

            $ad = Ad::findOrFail($id);
            $ad->title = $title;
            $ad->description = $body;
            $ad->user_id = auth()->user()->id;
            $ad->category_id = $request->category;
            $ad->location = $location;
            $ad->price = $price;
            $ad->update();

             if($request->hasFile('picture')){
                $files = $request->file('picture');
                foreach($files as $file){
                    $name = time().'-'.$file->getClientOriginalName();
                    $name = str_replace(' ','-',$name);
                    $file->move('ad-images',$name);
                    $ad->images()->create(['name'=>$name,'ad_id' => $id]);
                }
             }   
        }
        session()->flash('message','Your ad has been updated');
    }
}
