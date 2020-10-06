<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViconPribadi;
use Carbon\Carbon;
use DataTables;
use App\Vicon;
use App\Meet;
use DB;

class LantaiController extends Controller
{

    public function jsonvpribadi()
    {
        $data = ViconPribadi::get();
        
        return Datatables::of($data)
            
            ->make(true); 
    }

    public function viconPribadi()
    {

        $pribadi = ViconPribadi::orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        return view('depan.view-vicon-pribadi', compact('pribadi'));
    }

    public function viconRuangan()
    {
        return view('depan.view-vicon-ruangan');
    }

    public function vicon()
    {
        
        /*$date = \Carbon\Carbon::today()->subDays(1)->format('d/m/yy');
        
        $vicon = Vicon::where('tanggal','>=', '$date')
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->get();*/

        #dd($date);
        $vicon = Vicon::orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);
                    
        return view('depan.view-vicon', compact('vicon'));
    }

    public function aula()
    {
        
        /*$aula = Meet::where([
                    ['r_meeting', 'Aula'],
                    ['tanggal','>=',$date],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->get();*/
                    
        $aula = Meet::where([
                    ['r_meeting', 'Aula'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        #dd($aula1);
        return view('depan.ruangan.aula', compact('aula'));
    }

    public function lantai2()
    {
        
        $lantai2 = Meet::where([
                    ['r_meeting', 'Lantai 2'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai2);
        return view('depan.ruangan.lantai2', compact('lantai2'));
    }

    public function lantai3()
    {

        $lantai3 = Meet::where([
                    ['r_meeting', 'Lantai 3'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai3);
        return view('depan.ruangan.lantai3', compact('lantai3'));
    }

    public function lantai4()
    {
        #$date = \Carbon\Carbon::today()->subDays(7);

        $lantai4 = Meet::where([
                    ['r_meeting', 'Lantai 4'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai4);
        return view('depan.ruangan.lantai4', compact('lantai4'));
    }

    public function wawancaraI()
    {
        
        $wawancaraI = Meet::where([
                    ['r_meeting', 'R. wawancara I'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($wawancaraI);
        return view('depan.ruangan.wawancaraI', compact('wawancaraI'));
    }

    public function wawancaraII()
    {
        
        $wawancaraII = Meet::where([
                    ['r_meeting', 'R. wawancara II'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($wawancaraII);
        return view('depan.ruangan.wawancaraII', compact('wawancaraII'));
    }

    public function lantai8a()
    {
        
        $lantai8a = Meet::where([
                    ['r_meeting', 'lantai8 A'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai8a);
        return view('depan.ruangan.lantai8a', compact('lantai8a'));
    }

    public function lantai8b()
    {
        
        $lantai8b = Meet::where([
                    ['r_meeting', 'lantai8 B'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai8b);
        return view('depan.ruangan.lantai8b', compact('lantai8b'));
    }

    public function lantai8clf()
    {
        
        $lantai8clf = Meet::where([
                    ['r_meeting', 'lantai8 CLF'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai8clf);
        return view('depan.ruangan.lantai8clf', compact('lantai8clf'));
    }

    public function lantai9()
    {
        
        $lantai9 = Meet::where([
                    ['r_meeting', 'Aula LT 9'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        return view('depan.ruangan.lantai9', compact('lantai9'));
    }

    public function lantai10a()
    {
        
        $lantai10a = Meet::where([
                    ['r_meeting', 'lantai 10 A'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai10a);
        return view('depan.ruangan.lantai10a', compact('lantai10a'));
    }

    public function lantai10b()
    {
        
        $lantai10b = Meet::where([
                    ['r_meeting', 'lantai 10 B'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai10b);
        return view('depan.ruangan.lantai10b', compact('lantai10b'));
    }

    public function lantai10c()
    {
        
        $lantai10c = Meet::where([
                    ['r_meeting', 'lantai 10 C'],
                    ['status', 1]
                    ])
                    ->orderBy('tanggal','ASC')
                    ->orderBy('mulai','ASC')
                    ->simplePaginate(20);

        //dd($lantai10c);
        return view('depan.ruangan.lantai10c', compact('lantai10c'));
    }

    ###################################
    #     vicon                       #
    ###################################
    public function vaula()
    {

        $aula = Vicon::where([
                    ['r_meeting', 'Aula'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($aula);
        return view('depan.vicon.aula', compact('aula'));
    }

    public function vlantai2()
    {
        
        $lantai2 = Vicon::where([
                    ['r_meeting', 'Lantai 2'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai2);
        return view('depan.vicon.lantai2', compact('lantai2'));
    }

    public function vlantai3()
    {
       
        $lantai3 = Vicon::where([
                    ['r_meeting', 'Lantai 3'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai3);
        return view('depan.vicon.lantai3', compact('lantai3'));
    }

    public function vlantai4()
    {
       
        $lantai4 = Vicon::where([
                    ['r_meeting', 'Lantai 4'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai4);
        return view('depan.vicon.lantai4', compact('lantai4'));
    }

    public function vwawancaraI()
    {
       
        $wawancaraI = Vicon::where([
                    ['r_meeting', 'R. Wawancara I'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($wawancaraI);
        return view('depan.vicon.wawancaraI', compact('wawancaraI'));
    }

    public function vwawancaraII()
    {
       
        $wawancaraII = Vicon::where([
                    ['r_meeting', 'R. Wawancara II'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($wawancaraII);
        return view('depan.vicon.wawancaraII', compact('wawancaraII'));
    }

    public function vlantai8a()
    {
        $lantai8a = Vicon::where([
                    ['r_meeting', 'Lantai 8 A'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai8a);
        return view('depan.vicon.lantai8a', compact('lantai8a'));
    }

    public function vlantai8b()
    {
        $lantai8b = Vicon::where([
                    ['r_meeting', 'Lantai 8 B'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai8b);
        return view('depan.vicon.lantai8b', compact('lantai8b'));
    }

    public function vlantai8clf()
    {
        $lantai8clf = Vicon::where([
                    ['r_meeting', 'Lantai 8 CLF'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai8clf);
        return view('depan.vicon.lantai8clf', compact('lantai8clf'));
    }

    public function vlantai9()
    {
        
        $lantai9 = Vicon::where([
                    ['r_meeting', 'Aula LT 9'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai9);
        return view('depan.vicon.lantai9', compact('lantai9'));
    }

    public function vlantai10a()
    {

        $lantai10a = Vicon::where([
                    ['r_meeting', 'Lantai 10 A'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai10a);
        return view('depan.vicon.lantai10a', compact('lantai10a'));
    }

    public function vlantai10b()
    {

        $lantai10b = Vicon::where([
                    ['r_meeting', 'Lantai 10 B'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai10b);
        return view('depan.vicon.lantai10b', compact('lantai10b'));
    }

    public function vlantai10c()
    {

        $lantai10c = Vicon::where([
                    ['r_meeting', 'Lantai 10 C'],
                    ['status', 1],
                    ['tanggal', Carbon::now()->format('d/m/yy')]
                ])
                ->orderBy('tanggal', 'DESC')
                ->get();
        //dd($lantai10c);
        return view('depan.vicon.lantai10c', compact('lantai10c'));
    }
    #######################################
    #    END Vicon                        #
    #######################################

    public function all()
    {
        $sedangmeeting = Meet::where([
                                    ['tanggal', Carbon::now()->format('d/m/yy')],
                                    ['status', 2]
                                ])->count();

        $bookingmeeting = Meet::where([
                                    ['tanggal', Carbon::now()->format('d/m/yy')],
                                    ['status', 1]
                                ])->count();

        $batalmeeting = Meet::where([
                                    ['tanggal', Carbon::now()->format('d/m/yy')],
                                    ['status', 3]
                                ])->count();
        
        $aula = Meet::select('nohp', 'peserta', 'agenda', 'bagian', 'r_meeting', 'tanggal', 'mulai', 'selesai', 'created_at', 'status')
                ->where('tanggal', Carbon::now()->format('d/m/yy'))
                ->orWhere([
                            ['r_meeting', 'Aula'],
                            ['r_meeting', 'Lantai 2'],
                            ['r_meeting', 'Lantai 3'],
                            ['r_meeting', 'Lantai 4'],
                            ['r_meeting', 'Lantai 5'],
                            ['r_meeting', 'Lantai 8 (1)'],
                            ['r_meeting', 'Lantai 8 (2)'],
                            ['r_meeting', 'Lantai 9'],
                            ['r_meeting', 'Lantai 10 (1)'],
                            ['r_meeting', 'Lantai 10 (2)']
                            ])
                ->get();
        #dd($aula);        
        return view('meet.all', compact('aula', 'sedangmeeting', 'bookingmeeting', 'batalmeeting'));
    }

}
