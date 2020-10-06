<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViconPribadi;
use App\Vicon;
use Carbon\Carbon;
use App\MeetId;
use App\Bagian;
use App\Meet;
use Alert;
use Auth;

class ViconPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagians = Bagian::all();

        $date = \Carbon\Carbon::today()->subDays(7);

        $meets = ViconPribadi::select(
                                'user_id', 'nohp', 'agenda', 'bagian', 'r_meeting', 
                                'tanggal', 'email', 'meeting_id', 'meeting_idl',
                                'peserta_cabang', 'peserta_orang', 'created_at', 
                                'mulai', 'selesai', 'id', 'status', 'pic', 'no_surat'
                                )
                    ->where('tanggal','>=','$date')
                    ->where('user_id', Auth::User()->id)
                    ->whereIn('status', [1,2,3,11])
                    ->orderBy('tanggal','DESC')
                    ->orderBy('mulai','DESC')
                    ->paginate(3);
        
        return view('member.viconpribadi.index', compact('meets', 'bagians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createviconpribadi()
    {#admin
        $bagians    = Bagian::all();
        $meeting_id = MeetId::all();
        //dd($bagians);
        return view('admin.pribadi.booking', compact('bagians', 'meeting_id'));
    }

    public function indexviconpribadi()
    {#admin
        $data = ViconPribadi::where('status', 1)
                ->orderby('tanggal', 'ASC')
                ->orderby('mulai', 'ASC')->get();
        
        return view('admin.pribadi.index', compact('data'));
    }

    public function saveviconpribadi(Request $request)
    {#admin
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');
        
        #cek booking today banned
        /*if($tanggalny == Carbon::now()->format('d/m/yy')){
            Alert::success('Booking Di Tolak, Silahkan Booking Vicon 1 Hari Sebelumnya', 'Gagal Booking')->autoclose(5000);
            return redirect('/user/vicon');
        }*/

        if($vmulai1 >= $vselesai1){
            
            return "<script LANGUAGE='JavaScript'>
                    window.alert('Jam selesai lebih kecil dari jam mulai meetingg');
                    window.history.back();
                    </script>";

        }

        $cek1 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek2 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        $cek3 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek4 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        if (!empty($cek1) || !empty($cek2)){
            Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            
        }else if (!empty($cek3) || !empty($cek4)) {
                
             Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            

        }else{
            $save                 = New ViconPribadi();
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


        }
        return redirect('/admin/booking/vicon');
        
    }

    public function saveviconpribadi2(Request $request)
    {#admin
        
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');
        
        #cek booking today banned
        /*if($tanggalny == Carbon::now()->format('d/m/yy')){
            Alert::success('Booking Di Tolak, Silahkan Booking Vicon 1 Hari Sebelumnya', 'Gagal Booking')->autoclose(5000);
            return redirect('/user/vicon');
        }*/

        if($vmulai1 >= $vselesai1){
            
            return "<script LANGUAGE='JavaScript'>
                    window.alert('Jam selesai lebih kecil dari jam mulai meetingg');
                    window.history.back();
                    </script>";

        }

        $cek1 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek2 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        $cek3 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek4 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        if (!empty($cek1) || !empty($cek2)){
            Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            
        }else if (!empty($cek3) || !empty($cek4)) {
                
             Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            

        }else{
            $save                 = New ViconPribadi();
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


        }
        return redirect('/admin/booking/vicon');
    
    }

    public function detailviconpribadi($id)
    {#admin
        $meet      = ViconPribadi::find($id);
        $meetingId = MeetId::all();
        $bagian    = Bagian::all();     
        #dd($meet);
        return view('admin.pribadi.detail', compact('meet', 'meetingId', 'bagian'));
    }
    public function deleteviconpribadi($id)
    {#admin
        try {
            
            $meet = ViconPribadi::find($id);
            #dd($meet->id);
            $meet->delete();
            
            Alert::success('Berhasil Di Hapus', 'Delete Booking')->autoclose(4000);
            
            return back();

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
    }

    public function savepic(Request $request, $id)
    {#admin

        $meet = ViconPribadi::find($id);
        $meet->peserta_cabang = $request->get('peserta_cabang');
        $meet->peserta_orang  = $request->get('peserta_orang');
        $meet->agenda         = $request->get('agenda');
        $meet->email          = $request->get('email');
        $meet->pic            = $request->get('pic');
        $meet->pics           = $request->get('pics');
        $meet->r_meeting      = $request->get('r_meeting');
        $meet->meeting_id     = $request->get('meeting_id');    
        $meet->meeting_idl    = $request->get('meeting_idl');
        $meet->no_surat       = $request->get('no_surat');
        $meet->nohp           = $request->get('nohp');
        $meet->tanggal        = $request->get('tanggal');
        $meet->mulai          = $request->get('mulai');
        $meet->selesai        = $request->get('selesai');
        $meet->save();

        Alert::success('Berhasil Diubah', 'Simpan')->autoclose(5000);

        return redirect('/admin/booking/vicon');

    }

    public function create()
    {
        $bagians    = Bagian::all();
        $meeting_id = MeetId::all();
        
        return view('member.viconpribadi.booking', compact('bagians', 'meeting_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');
        
        #cek booking today banned
        if($tanggalny == Carbon::now()->format('d/m/yy')){
            Alert::success('Booking Di Tolak, Silahkan Booking Vicon 1 Hari Sebelumnya', 'Gagal Booking')->autoclose(5000);
            return redirect('/user/vicon-pribadi');
        }

        if($vmulai1 >= $vselesai1){
            
            return "<script LANGUAGE='JavaScript'>
                    window.alert('Jam selesai lebih kecil dari jam mulai meetingg');
                    window.history.back();
                    </script>";

        }

        $cek1 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek2 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        $cek3 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek4 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        if (!empty($cek1) || !empty($cek2)){
            Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            
        }else if (!empty($cek3) || !empty($cek4)) {
                
             Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            

        }else{
            $save                 = New ViconPribadi();
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


        }
        return redirect('/user/vicon-pribadi');
        
    }

    public function store2(Request $request)
    {
        
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');
        
        #cek booking today banned
        if($tanggalny == Carbon::now()->format('d/m/yy')){
            Alert::success('Booking Di Tolak, Silahkan Booking Vicon 1 Hari Sebelumnya', 'Gagal Booking')->autoclose(5000);
            return redirect('/user/vicon-pribadi');
        }

        if($vmulai1 >= $vselesai1){
            
            return "<script LANGUAGE='JavaScript'>
                    window.alert('Jam selesai lebih kecil dari jam mulai meetingg');
                    window.history.back();
                    </script>";

        }

        $cek1 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek2 = ViconPribadi::
                    Where([
                        ['meeting_id', $request->get('meeting_id')],
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        $cek3 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('mulai')],
                        ['selesai', '>=', $request->get('mulai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();
        $cek4 = ViconPribadi::
                    Where([
                        ['mulai', '<=', $request->get('selesai')],
                        ['selesai', '>=', $request->get('selesai')],
                        ['r_meeting', $request->get('r_meeting')],
                        ['tanggal', $request->get('tanggal')],
                    ])
                    ->first();

        if (!empty($cek1) || !empty($cek2)){
            Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            
        }else if (!empty($cek3) || !empty($cek4)) {
                
             Alert::success('Cek Ruang Meeting / Meeting ID Sudah Di Booking', 'Gagal Booking')->autoclose(5000);
            

        }else{
            $save                 = New ViconPribadi();
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


        }
        return redirect('/user/vicon-pribadi');
    
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
            
            $meet = ViconPribadi::find($id);
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
