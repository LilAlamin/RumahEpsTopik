<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use Auth;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(){
         $user = User::all();
         return datatables()->of($user)
         ->addColumn('action', function($row){
            $btn = '';  
            
            $btn = $btn.'<button type="button" id="btn-edit" class="btn btn-sm btn-warning "><i class="lni lni-pencil-alt "></i></button>';
              if ($row->id !=Auth::user()->id  )  {
            $btn = $btn.'<button title="Delete" id="btn-delete" class="delete-modal  btn-sm btn btn-danger btn-icon ml-1"><i class="lni lni-trash"></i></button>';
              }
            return $btn;
        })
        
         ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
    public function index()
    {
        
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'email' => 'required|unique:users,email',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      if($validator->fails()){
          return response()->json(['error' => $validator->errors()->all()]);
      }else{
        $user= new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= \Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->role);
         return response()->json(['success'=>'Data added successfully','data'=>$user]);
      }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);

        return view('user.edit', compact('user'));
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
        
         $rules = [
          
          'password_edit' => 'required',
        
        
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()->all()]);
      } else {
        $user = User::find($id);
        $user->name   = $request->name_edit;
        if ($request->password_edit) {
        $user->password = \Hash::make($request->password_edit);
        $user->save();
        $user->roles()->sync($request->role_edit);
    }
       
        $user->save();

        return response()->json(['success'=>'Data added successfully','data'=>$user]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return response()->json(['data'=>'success delete data']);
    }
}
