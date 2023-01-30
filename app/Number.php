<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class number extends Model
{
    //
    protected $table = "numbers";
    public function contacts(){
    return $this->belongsTo('App\contact',contact_id);
    }
    public static function show_no($id){
        return Number::where('Contact_id',$id)->get();
    }
}
