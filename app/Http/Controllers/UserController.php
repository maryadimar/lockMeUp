<?php

namespace App\Http\Controllers;

use\Auth;
use\Alert;
use Redirect;
use App\User;
use App\Meet;
use Validator;
use DateTime;
use App\MeetId;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {	
    	    	
    	$showTimeline = Meet::select('user_id', 'peserta', 'agenda', 'bagian', 'r_meeting', 'tanggal', 'mulai', 'selesai', 'status' ,'created_at')
                        ->where('tanggal', Carbon::now()->format('d/m/yy'))
                        ->with('users')->orderBy('tanggal', 'ASC')
                        ->paginate(2);
    	
        return view('member.layout.profile', compact('showTimeline'));
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            
            Alert::error('Error', 'Password Sekarang Tidak Ditemukan. Silahkan Coba lagi.')->autoclose(5000);
            return back();
        }
         
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            
            Alert::error('Error', 'Password Baru Tidak Boleh Sama Dengan Password Sekarang. Silahkan Tentukan Password Yang Berbeda.')->autoclose(5000);
            return back();

        }
        if(!(strcmp($request->get('new_password'), $request->get('new_confirm_password'))) == 0){
            
            Alert::error('Error', 'Konfirm Password Harus Sama Dengan Password Baru.')->autoclose(5000);
            return back();
        }
        
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->get('new_password'));
        
        $user->save();

        Alert::success('Password Berhasil Diubah', 'Simpan Password')->autoclose(5000);
        return back();
		
    }

    public function saveMeeting(Request $request)
    {	
    	try {
         
            $cek1 = Meet::
                        Where([
                            ['mulai', '<=', $request->get('mulai')],
                            ['selesai', '>=', $request->get('mulai')],
                            ['r_meeting', $request->get('r_meeting')],
                            ['tanggal', $request->get('tanggal')],
                        ])
                        ->first();
            $cek2 = Meet::
                        Where([
                            ['mulai', '<=', $request->get('selesai')],
                            ['selesai', '>=', $request->get('selesai')],
                            ['r_meeting', $request->get('r_meeting')],
                            ['tanggal', $request->get('tanggal')],
                        ])
                        ->first();

            
            if (empty($cek1) && empty($cek2)) {
                    
                $save            = New Meet();
                $save->user_id   = Auth::User()->id;
                $save->pn        = Auth::User()->pn;
                $save->nohp      = $request->get('nohp');
                $save->agenda    = $request->get('agenda');
                $save->bagian    = $request->get('bagian');
                $save->r_meeting = $request->get('r_meeting');
                $save->tanggal   = $request->get('tanggal');
                $save->mulai     = $request->get('mulai');
                $save->selesai   = $request->get('selesai');
                $save->peserta   = $request->get('peserta');                
                $save->status    = 1;
                $save->save();

                $data = [
                    "status"=>"sukses",
                    "message"=> "Booking Berhasil Di Simpan",
                    "title"=> "Simpan Booking",
                ];

                return response()->json($data);

                        
            }else{

                $save            = New Meet();
                $save->user_id   = Auth::User()->id;
                $save->pn        = Auth::User()->pn;
                $save->nohp      = $request->get('nohp');
                $save->agenda    = $request->get('agenda');
                $save->bagian    = $request->get('bagian');
                $save->r_meeting = $request->get('r_meeting');
                $save->tanggal   = $request->get('tanggal');
                $save->mulai     = $request->get('mulai');
                $save->selesai   = $request->get('selesai');
                $save->peserta   = $request->get('peserta');    
                $save->status    = 4;
                $save->save();
                
                $data = [
                    "status"  => "sukses",
                    "message" => "Waktu dan ruangan meeting sudah dibooking, data anda masuk ke dalam antrian",
                    "title"   => "Simpan Booking",
                ];

                return response()->json($data);
            }
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }

    }

    public function search()
    {
    	return view('member.search');
    }

    public function actSearch(Request $request)
    {
        $search = Meet::when($request->q, function ($query) use ($request) {
                 $query->where('tanggal', 'LIKE', "%{$request->q}%");
                 })->paginate(1);
        $search->appends($request->only('q'));
        
        if(!$search->isEmpty()) {
           return view('member.search-result', ['search' => $search, 'q' => $request->q]);
        }  else {
           return view('member.search-noresult', ['q' => $request->q]);
        }
    
    }

    public function formvicon($id)
    {
        $vicon = Meet::find($id);
        $meetids = MeetId::all();
        
        return view('member.viconform', compact('vicon', 'meetids'));
    }

    public function formviconsave(Request $request, $id)
    {
        
        #dd($vicon);
        
        #status ruangan
        # 1 = booking meeting
        # 2 = sedang meeting
        # 3 = selesai 
        # 4 = pending
        # 5 = batal
         
        try {

            $save                 = Meet::find($id);
            $save->email          = $request->get('email');
            $save->meeting_id     = $request->get('meeting_id');
            $save->meeting_idl    = $request->get('meeting_idl');
            $save->peserta_cabang = $request->get('peserta_cabang');
            $save->peserta_orang  = $request->get('peserta_orang');
            $save->pic            = $request->get('pic');
            $save->no_surat       = $request->get('no_surat');
            $save->status         = 11;
            $save->save();

            Alert::success('Berhasil', 'Vicon Berhasil Disimpan.')->autoclose(3000);

            return redirect('/home');
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }     
    }

    public function antrian()
    {
        
        $antrianku = Meet::select(
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
                ->where([
                                ['status', 4],
                                ['user_id', Auth::user()->id]
                            ])
                ->whereIn('status', [1,2,3,11])
                ->orderBy('created_at', 'DESC')
                ->orderBy('tanggal', 'DESC')
                ->paginate(3);
        
        return view('member.antrianku', compact('antrianku'));
    }
    
    public function destroy($id)
    {
    	try {
        
        $meet = Meet::find($id);
        $meet->delete();
        
        Alert::success('Berhasil Di Hapus', 'Hapus Item')->autoclose(3000);

        return back();

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
        
    }


}
