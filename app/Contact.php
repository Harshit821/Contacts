<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Number;
class contact extends Model
{
    //
    protected $table = "contacts";
    public $primaryKey = 'id';
    public function numbers()
    {
        return $this->hasMany('App\number');
    }
    public function show_con($id){
        return Contact::with('numbers')->where('id',$id)->first();
            
    }
}
