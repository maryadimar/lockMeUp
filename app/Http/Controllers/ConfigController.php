<?php

namespace App\Http\Controllers;

use App\Paginate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
	public function jsonPaginate(){
        
        $data = Paginate::get();
        
        return Datatables::of($data)
                ->addColumn('action', function ($data) {

                return '<a class="btn-action btn btn-danger" id="'.$data->id.'" onclick="deleteConfirmation(this)" title="Delete"><i class="fa fa-trash"></i></a>';
                  })  

                ->rawColumns(['action'])
                ->make(true); 
    }

    /*public indexPaginate()
    {

    }*/
}
