<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use App\MeetId;
use App\Vicon;
Use \Carbon\Carbon;
use Alert;
use SweetAlert;
use Auth;

class ViconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $meets = Vicon::select(
                                'user_id',
                                'nohp', 
                                'agenda', 
                                'bagian',
                                'r_meeting', 
                                'tanggal',
                                'email',
                                'meeting_id',
                                'meeting_idl',
                                'peserta_cabang', 
                                'peserta_orang',
                                'created_at', 
                                'mulai', 
                                'selesai', 
                                'id', 
                                'status', 
                                'pic', 
                                'no_surat' 
                                )
                    ->where('user_id', Auth::User()->id)
                    ->whereIn('status', [1,2,3,11])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->paginate(3);
                    //dd($meets);
        return view('member.vicon.index', compact('meets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagians    = Bagian::all();
        $meeting_id = MeetId::all();
        
        return view('member.vicon.booking', compact('bagians', 'meeting_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #validasi jam
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');
        
        #cek booking today banned
        if($tanggalny == Carbon::now()->format('d/m/yy')){
            Alert::success('Booking Di Tolak, Silahkan Booking Vicon 1 Hari Sebelumnya', 'Gagal Booking')->autoclose(5000);
            return redirect('/user/vicon');
        }

        if($vmulai1 >= $vselesai1){
            
            //Alert::success('Jam selesai lebih kecil dari jam mulai', 'Cek Jam Booking')->autoclose(3000);

            return "<script LANGUAGE='JavaScript'>
                    window.alert('Jam selesai lebih kecil dari jam mulai meetingg');
                    window.history.back();
                    </script>";

        }

        $cek1 = Vicon::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        // ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek2 = Vicon::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        // ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        $cek3 = Vicon::
                    Where([
                        // ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek4 = Vicon::
                    Where([
                        // ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        //dd(empty($cek1), empty($cek2), $cek1, $cek2);
        if (!empty($cek1) || !empty($cek2)){
            Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            
        }else if (!empty($cek3) || !empty($cek4)) {
                
             Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            

        }else{
            $save                 = New Vicon();
            $save->user_id        = Auth::User()->id;
            $save->nohp           = $request->get('nohp');
            $save->agenda         = $request->get('agenda');
            $save->bagian         = $request->get('bagian');
            $save->r_meeting      = $request->get('r_meeting');
            $save->tanggal        = $request->get('tanggal');
            $save->mulai          = $request->get('mulai');
            $save->selesai        = $request->get('selesai');
            $save->email          = $request->get('email');
            $save->meeting_id     = $request->get('meeting_id');
            $save->peserta_cabang = $request->get('peserta_cabang');
            $save->peserta_orang  = $request->get('peserta_orang');
            $save->pic            = $request->get('pic');
            $save->no_surat       = $request->get('no_surat');
            $save->status         = 1;
            $save->save();
            
            Alert::success('Booking Berhasil Di Simpan', 'Simpan Booking')->autoclose(3000);

            return redirect('/user/vicon'); 
        }
        return redirect('/user/vicon'); 

    }

    public function store2(Request $request)
    {
        #validasi jam
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');
        
        #cek booking today banned
        if($tanggalny == Carbon::now()->format('d/m/yy')){
            Alert::success('Booking Di Tolak, Silahkan Booking Vicon 1 Hari Sebelumnya', 'Gagal Booking')->autoclose(5000);
            return redirect('/user/vicon');
        }

        if($vmulai1 >= $vselesai1){
            
            //Alert::success('Jam selesai lebih kecil dari jam mulai', 'Cek Jam Booking')->autoclose(3000);

            return "<script LANGUAGE='JavaScript'>
                    window.alert('Jam selesai lebih kecil dari jam mulai meetingg');
                    window.history.back();
                    </script>";

        }

        $cek1 = Vicon::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek2 = Vicon::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        $cek3 = Vicon::
                    Where([
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek4 = Vicon::
                    Where([
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        //dd(empty($cek1), empty($cek2), $cek1, $cek2);
        if (!empty($cek1) || !empty($cek2)){
            Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            
        }else if (!empty($cek3) || !empty($cek4)) {
                
             Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            

        }else{
            $save                 = New Vicon();
            $save->user_id        = Auth::User()->id;
            $save->nohp           = $request->get('nohp');
            $save->agenda         = $request->get('agenda');
            $save->bagian         = $request->get('bagian');
            $save->r_meeting      = $request->get('r_meeting');
            $save->tanggal        = $request->get('tanggal');
            $save->mulai          = $request->get('mulai');
            $save->selesai        = $request->get('selesai');
            $save->email          = $request->get('email');
            $save->meeting_idl    = $request->get('meeting_idl');
            $save->peserta_cabang = $request->get('peserta_cabang');
            $save->peserta_orang  = $request->get('peserta_orang');
            $save->pic            = $request->get('pic');
            $save->no_surat       = $request->get('no_surat');
            $save->status         = 1;
            $save->save();
            
            Alert::success('Booking Berhasil Di Simpan', 'Simpan Booking')->autoclose(3000);

            return redirect('/user/vicon'); 
        }
        return redirect('/user/vicon');  
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
            
            $meet = Vicon::find($id);
            #dd($meet->id);
            $meet->delete();
            
            Alert::success('Berhasil Di Hapus', 'Delete Booking')->autoclose(3000);
            
            return back();

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
    }
}
