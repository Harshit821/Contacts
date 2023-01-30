<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contact;
use App\Number;
use App\Http\Requests\UserStoreRequest;
class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "hello";
        //user (get)
       // $users = DB::table('Contacts')->orderBy('name','asc')->get();
       //echo Contact::find(1)->Numbers;
       //$numb = Contact::find(1)->Numbers;
       //print_r($temp);
       $users=Contact::all();
        //print_r($users);
        
        return view("user.index",compact("users"));
        //return view("user.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.add");
        //user/create (get)

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cstore(array $req,Contact $data){
        
        $data->name = $req['name'];
        //dd($data->name);
        $data->address = $req['address'];
        $data->email = $req['email'];
        $data->birthdate = $req['birthdate'];
        $data->social = $req['social'];
        $data->notes = $req['notes'];

       
       // $data->'created_at' => date('Y-m-d H:i:s');
        $data->save();
    }
    public function nstore(array $request,$id){
        $nums = new Number;
        
        

       //$nums->Contact_id = $id;

       $data = [
            ['contact_id' => $id, 'mobile' => $request['mobile1']], 
            ['contact_id' => $id, 'mobile' => $request['mobile2']], 
            ['contact_id' => $id, 'mobile' => $request['mobile3']]
        ];
        $nums->insert($data);

        // $nums->mobile = $request['mobile1'];
        // if($request['mobile2']!=""){
        //     $num2 = new Number;
        //     $num2->Contact_id = $id;
            
        //     $num2->mobile = $request['mobile2'];
        //     $num2->save();
        // }
        // if($request['mobile3']!=""){
        //     $num3 = new Number;
        //     $num3->Contact_id = $id;
            
            
        //     $num3->mobile = $request['mobile3'];
        //     $num3->save();
        // }
        // $nums->save();
    }
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        //user (post)
        // $request->validate ([
        //     'name' => 'required|max:50',
        //     'mobile1' => 'required|min:3|max:12',
        //     'mobile2' => 'required|min:3|max:12',
        //     'mobile3' => 'required|min:3|max:12',
        //     'email' => 'nullable|max:150|email',
        //     'address'=>'nullable|max:150',
        //     'social'=>'nullable|max:150',
        //     'birthdate'=>'nullable',
        //     'notes' => 'nullable|max:200'
        // ]);
        //dd($validated);
        $data= new Contact;
        $temp = $request->all();
        //dd($temp['name']);
        $this->cstore($temp,$data);
        $this->nstore($temp,$data->id);
        // $data = [
        //     'name' => $request->name,
        //     'mobile' => $request->mobile,
        //     'address' => $request->address,
        //     'email' => $request->email,
        //     'birthdate' => $request->birthdate,
        //     'social' => $request->input('social'),
        //     'notes' => $request->notes,
        //     'created_at' => date('Y-m-d H:i:s')
        // ];
        //print_r($data);
        // DB::table('Contacts')->insert($data);
        
         return redirect('user');
        //print_r($data);
        //print_r($request->all());
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Contact $contact)
    {
        //echo "$id";
        //User/id (get)
        //$users = DB::table('user')->where('id','=',$id)->first();
       
        $users = $contact->show_con($id);
        //$nums = Number::show_no($id);
        //dd($users);
        //echo($users);
        return view("user.show",compact("users"));
        //return view("user.show",compact("users","nums"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$users = DB::table('user')->where('id','=',$id)->first();
        // $users = Contact::where('id',$id)->first();
        // $nums = Number::where('Contact_id',$id)->get();
        $Contact = new Contact;
        $users = $Contact->show_con($id);
        return view("user.edit",compact("users"));
       // $nums = Number::show_no($id);
       // return view("user.edit",compact("users","nums"));
        //user/id/edit (get)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreRequest $request, $id)
    {
        //user/id (put/patch)
        // $request->validate ([
        //     'name' => 'required|max:50',
        //     'mobile1' => 'required|min:3|max:12',
        //     'mobile2' => 'required|min:3|max:12',
        //     'mobile3' => 'required|min:3|max:12',
        //     'email' => 'nullable|max:150|email',
        //     'address'=>'nullable|max:150',
        //     'social'=>'nullable|max:150',
        //     'birthdate'=>'nullable',
        //     'notes' => 'nullable|max:200'
        // ]);
        $validated = $request->validated();
        $data = [
            'name' => $request->name,
            
            'address' => $request->address,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'social' => $request->social,
            'notes' => $request->notes,
            
        ];
       //echo "$id";
       echo "$request->id1";
       echo "$request->id2";
       echo "$request->id3";
        //Contact::where('id', $request['id'])->update($request);
        //print_r($data);
        Contact::where('id',$id)->update($data);
        // $num = [
        //     'mobile1' => $request->mobile1,
        //     'mobile2' => $request->mobile2,
        //     'mobile3' => $request->mobile3,
        // ];
        $num = ['mobile' => $request->mobile1];
        Number::where('id',$request->id1)->update($num);

        $num = ['mobile' => $request->mobile2];
        Number::where('id',$request->id2)->update($num);
        
        $num = ['mobile' => $request->mobile3];
        Number::where('id',$request->id3)->update($num);

        return redirect('user');
        //DB::table('user')->where('id','=',$id)->update($data);
       // print_r($request->all());
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



        //user/id (DEELETE)
        //DB::table('user')->where('id','=',$id)->delete();
        Contact::where('id',$id)->delete();
        Number::where('Contact_id',$id)->delete();
        return redirect('user');
    }
}
