<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function categorysp(){
    	return $this->belongsTo('App\Category','pro_id', 'id');	    	
    	
    }	    
     protected $fillable = [
		'name', 'slug','feature_image','description',
		 	'status', 'pro_id','price'
    ];
}
