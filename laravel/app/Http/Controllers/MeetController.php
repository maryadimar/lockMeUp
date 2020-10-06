<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViconPribadi;
use App\Bagian;
use App\MeetId;
use DataTables;
use App\Vicon;
use App\Meet;
use Jumlah;
use Alert;
use Auth;

class MeetController extends Controller
{
    public function json(){
        
        $data = Meet::with('users')->select('pn', 'user_id','id', 'bagian', 'r_meeting', 'tanggal', 'mulai', 'selesai', 'status', 'agenda', 'peserta', 'nohp')
            ->whereIn('status', [1,2,3,11])
            ->orderby('tanggal', 'desc')->get();
        
        return Datatables::of($data)
                ->addColumn('action', function ($data) {

                $x = '';
                if ($data->status == 3) {
                    $x ='<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="bmeeting(this)" title="undo meeting"><i class="fa fa-thumbs-up"></i></a>';
                }if($data->status == 1 || $data->status == 11){
                    $x = '<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="cancelm(this)" title="Batalkan meeting"><i class="fa fa-ban"></i></a>';
                }

                return '<a class="btn-action btn btn-info" onclick="show('.$data->id.')" title="View"><i class="fa fa-eye"></i></a> '.$x.' <a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="deleteConfirmation(this)" title="Delete"><i class="fa fa-trash"></i></a>';
                  })  

                ->rawColumns(['action'])
                ->make(true); 
    }

    public function jsonantrian(){
        
        $data = Meet::with('users')->select('pn', 'user_id','id', 'bagian', 'r_meeting', 'tanggal', 'mulai', 'selesai', 'status', 'agenda', 'peserta', 'nohp')
            ->where('status', 4)
            ->orderby('tanggal', 'desc')->get();
        
        return Datatables::of($data)
                ->addColumn('action', function ($data) {

                $x = '';
                if ($data->status == 4) {
                    $x ='<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="appmeeting(this)" title="approve meeting"><i class="fa fa-thumbs-up"></i></a>';
                }

                return '<a class="btn-action btn btn-info" onclick="show('.$data->id.')" title="View"><i class="fa fa-eye"></i></a> '.$x.' <a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="deleteConfirmation(this)" title="Delete"><i class="fa fa-trash"></i></a>';
                  })  

                ->rawColumns(['action'])
                ->make(true); 
    }

    public function create(){
        
        $countMeeting = Meet::where('status', 1)->get()->count();
        $countSM      = Meet::where('status', 2)->get()->count(); 
        $countBM      = Meet::where('status', 3)->get()->count(); 
        $countNT      = Meet::where('status', 4)->get()->count();  
        $countDN      = Meet::where('status', 5)->get()->count(); 
        $countMV      = Meet::where('status', 11)->get()->count();  
        $meetingid    = MeetId::get();
        $bagian       = Bagian::get();

        return view('admin.booking.create', compact('countMeeting', 'countBM', 'countSM', 'countMV', 'countNT', 'countDN', 'meetingid', 'bagian'));
    
    }

    public function index(){
       
        $countMeeting = Meet::where('status', 1)->get()->count();
        $countSM      = Meet::where('status', 2)->get()->count(); 
        $countBM      = Meet::where('status', 3)->get()->count(); 
        $countNT      = Meet::where('status', 4)->get()->count();  
        $countDN      = Meet::where('status', 5)->get()->count(); 
        $countMV      = Meet::where('status', 11)->get()->count();   
       
        return view('admin.booking.index', compact('countMeeting', 'countBM', 'countSM', 'countMV', 'countNT', 'countDN'));
    
    }

    public function antrian(){
       
        $countMeeting = Meet::where('status', 1)->get()->count();
        $countSM      = Meet::where('status', 2)->get()->count(); 
        $countBM      = Meet::where('status', 3)->get()->count(); 
        $countNT      = Meet::where('status', 4)->get()->count();  
        $countDN      = Meet::where('status', 5)->get()->count(); 
        $countMV      = Meet::where('status', 11)->get()->count(); 
       
        return view('admin.booking.antrian', compact('countMeeting', 'countBM', 'countSM', 'countMV', 'countNT', 'countDN'));
    
    }

    public function createvicon(){
        
        $meeting_id = MeetId::get();
        $bagian     = Bagian::get();

        return view('admin.vicon.booking', compact('meeting_id', 'bagian'));
    
    }

    public function savevicon(Request $request){
        
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');

        if($vmulai1 >= $vselesai1){

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
            
            Alert::success('Booking Berhasil Di Simpan', 'Simpan Booking')->autoclose(5000);

        }
        return redirect('/admin/booking/vicon'); 
    
    }

    public function savevicon2(Request $request){
        $vmulai1   = $request->get('mulai');
        $vselesai1 = $request->get('selesai');
        $tanggalny = $request->get('tanggal');

        if($vmulai1 >= $vselesai1){

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
            
            Alert::success('Booking Berhasil Di Simpan', 'Simpan Booking')->autoclose(5000);

        }
        return redirect('/admin/booking/vicon'); 
    
    }

    public function vicon(){
        
        $data = Vicon::where('status', 1)
                ->orderby('tanggal', 'ASC')
                ->orderby('mulai', 'ASC')->get();

        $pribadi = ViconPribadi::where('status', 1)
                ->orderby('tanggal', 'ASC')
                ->orderby('mulai', 'ASC')->get();


        return view('admin.vicon.index', compact('data', 'pribadi'));
    
    }

    public function detailvicon($id)
    {
        $meet      = Vicon::find($id);
        $meetingId = MeetId::all();
        $bagian    = Bagian::all();
        #dd($meet);
        return view('admin.vicon.detail', compact('meet', 'bagian', 'meetingId'));
    }

    public function deletevicon($id)
    {
        try {
            
            $meet = Vicon::find($id);
            $meet->delete();

            Alert::error('Hapus', 'Data Berhasil Dihapus.')->autoclose(3000);
            return redirect('/admin/booking/vicon'); 

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
        
    }

    public function savepic(Request $request, $id)
    {
        $meet = Vicon::find($id);
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

        Alert::success('Berhasil Di Simpan', 'Simpan')->autoclose(5000);

        return redirect('/admin/booking/vicon');

    }

    public function jsonvicon(){
        #batal
        $data = Vicon::with('users')->select('bagian', 'r_meeting', 'tanggal', 'mulai', 'selesai', 'status', 'agenda', 'nohp')
            ->where('status', 1)
            ->orderby('tanggal', 'desc')->get();
        
        return Datatables::of($data)
             /*   ->addColumn('action', function ($data) {

                $x = '';
                if ($data->status == 4) {
                    $x ='<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="appmeeting(this)" title="approve meeting"><i class="fa fa-thumbs-up"></i></a>';
                }

                return '<a class="btn-action btn btn-info" title="View" href="/admin/show/'.$data->id.'/detailvicon"><i class="fa fa-eye"></i></a> '.$x.' <a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="deleteConfirmation(this)" title="Delete"><i class="fa fa-trash"></i></a>';
                  })  */

                ->rawColumns(['action'])
                ->make(true); 
    }

    public function storage(Request $request)
    {

        #status
        # 11 = booking room meeting & vicon
        # 1 = booking room meeting
        # 2 = sedang meeting
        # 3 = batal 
        # 4 = antrian
        # 5 = selesai
         
    	try {
         
            #cek range
            $cek = Meet::where([
                            ['mulai', '>=', $request->get('mulai')],
                            ['selesai', '<=', $request->get('selesai')]
                        ])->orWhere([
                            ['r_meeting', $request->get('r_meeting')],
                            ['tanggal', $request->get('tanggal')]
                        ])->first();

            
            if (empty($cek)) {
                    
                $save            = New Meet();
                $save->user_id   = Auth::User()->id;
                $save->nohp      = $request->get('nohp');
                $save->peserta   = $request->get('peserta');
                $save->agenda    = $request->get('agenda');
                $save->bagian    = $request->get('bagian');
                $save->r_meeting = $request->get('r_meeting');
                $save->tanggal   = $request->get('tanggal');
                $save->mulai     = $request->get('mulai');
                $save->selesai   = $request->get('selesai');
                $save->status    = 1;
                $save->save();

                Alert::success('Booking Berhasil Di Simpan', 'Simpan Booking')->autoclose(3000);

                return redirect('/admin/booking'); 

                        
            }else{

                $save            = New Meet();
                $save->user_id   = Auth::User()->id;
                $save->nohp      = $request->get('nohp');
                $save->peserta   = $request->get('peserta');
                $save->agenda    = $request->get('agenda');
                $save->bagian    = $request->get('bagian');
                $save->r_meeting = $request->get('r_meeting');
                $save->tanggal   = $request->get('tanggal');
                $save->mulai     = $request->get('mulai');
                $save->selesai   = $request->get('selesai');
                $save->status    = 4;
                $save->save();
                
                Alert::error('Waktu dan ruangan meeting sudah dibooking, data anda masuk ke dalam antrian', 'Error')->autoclose(3000);
                return back();
            }
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }              
    }

    public function detail($id)
    {
        $meet = Meet::with('users')->find($id);
        dd($meet);
        echo json_encode($meet);
    }

    public function batal($id)
    {
        try {
            
            $meet = Meet::find($id);
            $meet->status = 3;
            $meet->save();

            return response()->json(array('status' => 'success', 'message' => 'Meeting dibatalkan'));

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
        
    }

    public function undo($id)
    {
        try {
            
            $meet = Meet::find($id);
            $meet->status = 1;
            $meet->save();

            return response()->json(array('status' => 'success', 'message' => 'Status meeting dikembalikan'));

        } catch (Exception $e) {
            
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
            
        }
        
    }

    public function approve($id)
    {
            
            $meet = Meet::find($id);
            #dd($meet);
            $cek1 = Meet::
                        Where([
                            ['mulai', '<=', $meet->mulai],
                            ['selesai', '>=', $meet->mulai],
                            ['r_meeting', $meet->r_meeting],
                            ['tanggal', $meet->tanggal]
                        ])
                        ->first();

            $cek2 = Meet::
                        Where([
                            ['mulai', '<=', $meet->mulai],
                            ['selesai', '>=', $meet->mulai],
                            ['r_meeting', $meet->r_meeting],
                            ['tanggal', $meet->tanggal]
                        ])
                        ->first();

            if (!empty($cek1) || !empty($cek2)){

                return response()->json(
                        array(
                                'status' => 'success',
                                'message' => 'Cek Ruang Meeting Sudah Di Booking',
                                'timer' => 5000
                            )
                        );

                #Alert::success('Cek Ruang Meeting Sudah Di Booking', 'Gagal')->autoclose(5000);
                
            }else{
                
                $meet = Meet::find($id);
                $meet->status = 1;
                $meet->save();

                return response()->json(array('status' => 'success', 'message' => 'Approve Meeting'));

            }
            return back(); 
            
        
    }

    public function destroy($id)
    {
        try {
            
            $meet = Meet::find($id);
            $meet->delete();
            return response()->json(array('status' => 'success', 'message' => 'Data Berhasil Dihapus'));

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
        
    }
}
