<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\User;
use App\Models\Category;



class Ad extends Model
{
    use HasFactory;

   // protected $guarded = [];

	public function __construct(array $attributes = array()) {
    	parent::__construct($attributes);
		$this->user_id = auth()->id();
		//$this->setLocationAttribute();
		$this->attributes['published_at'] = now();
	}

 
    public function user(){

        return $this->belongsTo(User::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function images(){

        return $this->hasMany(Image::class);
    }

	public function uploadPictures() {
		if(request()->hasFile('picture')){
		   $files = request()->file('picture');
		   foreach($files as $file){
		       $name = time().'-'.$file->getClientOriginalName();
		       $name = str_replace(' ','-',$name);
		       $file->move('ad-images',$name);
			   Image::create(['name'=>$name,'ad_id' => $this->id]);
		   }
		}
	}

	//public function setLocationAttribute() {
		// $locale = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) : 'en-EN';
		// $this->attributes['location'] = $locale;
	 //}
	
	public function setDescriptionAttribute($description) {
		$this->attributes['description'] = $description;
		$this->attributes['excerpt'] = substr($description, 0, 30);
	}
}
