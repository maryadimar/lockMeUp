<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use App\Meet;
use Carbon\Carbon;
use Auth;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagians = Bagian::all();

        /*$meets = Meet::select('bagian','user_id','nohp', 'peserta', 'agenda', 'r_meeting', 'tanggal', 'mulai', 'selesai', 'created_at', 'id', 'status')
                ->where('user_id', Auth::User()->id)->orderBy('created_at', 'DESC')
                ->whereIn('status', [1,2,3,11])
                ->paginate(3);*/
        /*$now = date('d/m/Y');
        
        $end = date('d/m/Y', strtotime("+7 days"));

        whereBetween('tanggal', [$now,$end])*/

        
        $meets = Meet::where('user_id', Auth::User()->id)
                ->whereIn('status', [1,2,3,11])
                ->orderBy('created_at', 'DESC')
                ->orderBy('tanggal','ASC')
                ->orderBy('mulai','ASC')
                ->paginate(3);

        return view('member.room.index', compact('meets', 'bagians'));
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
        //
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
        //
    }
}
