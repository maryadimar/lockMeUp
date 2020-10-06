<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\MeetId;
use Alert;

class MasterMeetingidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.meetingid.index');
    }

    public function json()
    {
        $data = MeetId::get();
        
        return Datatables::of($data)
                ->addColumn('action', function ($data) {

                return '<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="deleteConfirmation(this)" title="Delete"><i class="fa fa-trash"></i></a>';
                  })  

        ->rawColumns(['action'])
        ->make(true); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
         
            #cek 
            $cek = MeetId::where('meeting_id', $request->get('meeting_id'))->first();
            #dd($cek->meeting_id);
            if (empty($cek)) {
                    
                $save             = New MeetId();
                $save->meeting_id = $request->get('meeting_id');
                $save->save();

                Alert::success('Berhasil Di Simpan', 'Simpan Meeting ID')->autoclose(3000);

                return back(); 
                        
            }else{

                Alert::error('Inputan Kosong / Data Sudah Ada', 'Error')->autoclose(3000);

                return back(); 
            }
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
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
        //
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
        try {
            
            $meetingid = MeetId::find($id);
            $meetingid->delete();
            return response()->json(array('status' => 'success', 'message' => 'Data Berhasil Dihapus'));

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
    }
}
