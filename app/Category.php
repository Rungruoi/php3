<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    public function post(){
    	return $this->hasMany('App\Post','cate_id','id');	    	
    	
    }
    public function product(){
        return $this->hasMany('App\Product','pro_id','id');
    }

    protected $fillable=[
    	'name','description'
    ];
    protected $hidden=[
    	'name','description
    '];
}
