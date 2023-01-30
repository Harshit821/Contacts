<?php
use App\User;
namespace App\Http\Resources;
use App\Number;

use Illuminate\Http\Resources\Json\Resource;

class Deleted extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //dd('hjj');
        //return parent::toArray($request);
        //dd($request);
        return [
            'id'=>$this->id,
            'contact_id'=>$this->contact_id,
            'mobile'=>$this->mobile,
            //'number'=>$this->number,
        ];
        //return ["name"=>"harshit"];
    }
}
