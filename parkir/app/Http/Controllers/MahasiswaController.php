<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Validator;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function data(){
         $mahasiswa = Mahasiswa::all();
         return datatables()->of($mahasiswa)
         ->addColumn('action', function($row){
            $btn = '';  
            $btn = $btn.'<div class="btn-group m-1" role="group" aria-label="Basic example">
								<button type="button" id="btn-edit" class="btn btn-info"><i class="lni lni-pencil"></i>
								</button>
								<button type="button" id="btn-delete" class="btn btn-danger"><i class="lni lni-trash"></i>
								</button>
							</div>';
          
            return $btn;
        })

        ->addIndexColumn()
        ->make(true);
    }
    public function index()
    {
        $data = Mahasiswa::all();
        return view ('mahasiswa.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
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
          
          
      ];
      $validator = Validator::make($request->all(),$rules);
      if($validator->fails()){
          return response()->json(['error' => $validator->errors()->all()]);
      }else{
          $data= Mahasiswa::create([
              'nim'=> request('nim'),
              
          ]);
          return response()->json(['success'=>'Data added successfully','data'=>$data]);
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
        return view('category.edit');
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
        
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()->all()]);
      } else {
        $data = Mahasiswa::find($id);
        $data->nim   = $request->nim_edit;
      
       
        $data->save();

        return response()->json(['success'=>'Data added successfully','data'=>$data]);
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
        $data=Mahasiswa::find($id);
        $data->delete();
    }
}
