<?php

namespace App\Http\Controllers;

use File;
use Storage;
use App\Models\Data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$csv = array_map('str_getcsv', file('/var/www/html/reporteador/storage/app/import/m1_actores.csv'));
        #$csv2 = file('/var/www/html/reporteador/storage/app/import/m1_canalizadores.csv');
        
        $mydata = Data::all();      

        return view('admin.index',compact('mydata'));
    }
    
    public function cargar(Request $request)
    {
        $file = $request->file('file');
        $archivo = File::get($file);
        $nombre = $file->getClientOriginalName();
        Storage::disk('import')->put($nombre, $archivo);
        $contents = storage_path('app/import/').$nombre;
        $csv = array_map('str_getcsv', file($contents));
        unset($csv[0]);
        $cnt = count($csv[0]);
        $data = [];
        unset($csv[0]);
        foreach ($csv as $key => $item) {
            for ($i=0; $i < $cnt; $i++) { 
                $campo = 'c_'.str_pad($i+1, 2, "0", STR_PAD_LEFT); 
                $data = array_add($data,$campo,$item[$i]);
            }
            Data::create($data);
            $data = [];
        }
        

        return back();
    }
    public function configurar()
    {
        
    }
    public function reporte()
    {
        
    }
}
