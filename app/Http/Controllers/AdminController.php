<?php

namespace App\Http\Controllers;

use\Auth;
use\Alert;
use Redirect;
use App\User;
use App\Meet;
use Validator;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {	
    	return view('admin.profile');
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

    public function changeProfile(Request $request)
    {
		$request->validate([

            'email' => 'required',
            'name' => 'required',
            'nohp' => 'required',

        ]);

		User::where('id', auth()->user()->id)->update([
			'name'=> $request->get('name'),
			'nohp'=> $request->get('nohp'),
			'email'=> $request->get('email'
			)]
		);

        Alert::success('Berhasil Diubah', 'Perbaharui Profile')->autoclose(2000);

        return back();
    }

    public function saveMeeting(Request $request)
    {	
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

                return back(); 
                        
            }else{
                
                Alert::error('Waktu dan ruangan meeting sudah dibooking', 'Error')->autoclose(3000);
                return back();
            }
            
                
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }

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
