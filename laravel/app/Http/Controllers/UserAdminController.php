<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Bagian;
use App\User;
use App\Meet;
use Alert;

class UserAdminController extends Controller
{
    public function index()
    {
        $countMeeting = Meet::where('status', 1)->get()->count();
        $countSM      = Meet::where('status', 2)->get()->count();  
        $countBM      = Meet::where('status', 3)->get()->count();  
        
        $bagian = Bagian::all();

    	return view('admin.user.index', compact('countMeeting', 'countBM', 'countSM', 'bagian'));
    }

    public function data()
    {
    	$data = User::select('id', 'name', 'email', 'bagian', 'actived')->where('role_id',3)->orderby('name', 'DESC')->get();
        
        return Datatables::of($data)
                ->addColumn('action', function ($data) {
                $x = '';
                if ($data->actived == 1) {
                    $x ='<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="nonactive(this)" title="non aktif user"><i class="fa fa-ban"></i></a>';
                }if($data->actived == 0){
                    $x = '<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="active(this)" title="aktif user"><i class="fa fa-thumbs-up"></i></a>';
                }
                return '<a class="btn-action btn btn-primary btn-view ajukan" onclick="show('.$data->id.')" title="View"><i class="fa fa-eye"></i></a> <a class="btn-action btn btn-info btn-view" href="/admin/user/'.$data->id.'/change-pwd" title="change password"><i class="fa fa-key"></i></a> '.$x.' ';
                  })   

                ->rawColumns(['action'])
                ->make(true); 
    }

    public function storage(Request $request)
    {
    	try {

            $exsistMail = User::where('email', $request->get('email'))->first();

            if (!empty($exsistMail->email)) {
                Alert::error('Duplicated', 'Email sudah ada')->autoclose(3000);
                return back();

            }

            $save            = new User();
            $save->pn        = $request->get('pn'); 
            $save->name      = $request->get('name'); 
            $save->email     = $request->get('email'); 
            $save->bagian    = $request->get('bagian'); 
            $save->role_id   = 3; 
            $save->actived   = 1; 
            $save->password  = bcrypt($request->get('password')); 

            Alert::success('Berhasil Disimpan', 'Simpan User')->autoclose(3000);
            
            $save->save();

            return back();

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
                  
    }

    public function changepwd(Request $request, $id)
    {
        
        $edit = User::find($id);

        return view('admin.user.password', compact('edit'));                  
    }

    public function changepwdsave(Request $request, $id)
    {
        $save            = User::find($id);
        $save->password  = bcrypt($request->get('password')); 

        Alert::success('Password Berhasil Diubah', 'Ubah Password')->autoclose(2000);
        
        $save->save();

        return redirect('/admin/user');                 
    }

    public function detail($id)
    {
        $meet = User::find($id);
        echo json_encode($meet);
    }

    public function detailcpwd($id)
    {
        $pwd = User::find($id);
        echo json_encode($pwd);
    }

    public function nonActiveUser($id)
    {
        try {
            
            $user = User::find($id);
            $user->actived = 0;
            $user->save();

            return response()->json(array('status' => 'success', 'message' => 'Admin Berhasil Di Non Aktifkan'));

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
        
    }

    public function ActiveUser($id)
    {
        try {
            
            $user = User::find($id);
            $user->actived = 1;
            $user->save();

            return response()->json(array('status' => 'success', 'message' => 'Admin Berhasil Di Aktifkan'));

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
        
    }
}
