<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bagian;
use DataTables;
use App\User;
use Alert;

class UserSAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json(){
        
        $data = User::where('role_id', 2)->get();
        
        return Datatables::of($data)
                ->addColumn('action', function ($data) {
                $x = '';
                if ($data->actived == 1) {
                    $x ='<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="nonactive(this)" title="non aktif user"><i class="fa fa-ban"></i></a>';
                }if($data->actived == 0){
                    $x = '<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="active(this)" title="aktif user"><i class="fa fa-thumbs-up"></i></a>';
                }
                return '<a class="btn-action btn btn-primary btn-view ajukan" onclick="show('.$data->id.')" title="View"><i class="fa fa-eye"></i></a> <a class="btn-action btn btn-info btn-view" href="/sa/admin/'.$data->id.'/change-pwd" title="change password"><i class="fa fa-key"></i></a> '.$x.' ';
                  })   

                ->rawColumns(['action'])
                ->make(true); 
    }

    public function index()
    {   
        $bagians = Bagian::all();
        return view('superadmin.user.admin.index', compact('bagians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $meet = User::find($id);
        echo json_encode($meet);
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
            
            $admin           = new User();
            $admin->name     = $request->get('name');
            $admin->email    = $request->get('email');
            $admin->password = bcrypt($request->get('password'));
            $admin->role_id  = 2;
            $admin->actived  = 1;
            $admin->save();

            Alert::success('Simpan', 'Admin Berhasil Ditambah.')->autoclose(5000);
            return back(); 

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(5000);
            return redirect()->back();
        }
    }

    public function changepwd(Request $request, $id)
    {
        
        $edit = User::find($id);

        return view('superadmin.user.admin.password', compact('edit'));                  
    }

    public function changepwdsave(Request $request, $id)
    {
        
        $save            = User::find($id);
        $save->password  = bcrypt($request->get('password')); 

        Alert::success('Password Berhasil Diubah', 'Ubah Password')->autoclose(2000);
        
        $save->save();

        return redirect('/sa/admin');                       
    }

    public function nonActiveUser($id)
    {
        try {
            
            $user = User::find($id);
            $user->actived = 0;
            $user->save();

            return response()->json(array('status' => 'success', 'message' => 'User Berhasil Di Non Aktifkan'));

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

            return response()->json(array('status' => 'success', 'message' => 'User Berhasil Di Aktifkan'));

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Error', 'Whoops, Ada yang salah.')->autoclose(3000);
            return redirect()->back();
        }
        
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
        //
    }
}
