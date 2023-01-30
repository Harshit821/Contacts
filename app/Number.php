<?php

namespace App;
//use SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class number extends Model
{
    use SoftDeletes;
    //
    protected $table = "numbers";
    public function contacts(){
    return $this->belongsTo('App\contact',contact_id);
    }
    public static function show_no($id){
        return Number::where('Contact_id',$id)->get();
    }
}
