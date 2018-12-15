<?php

namespace App\Http\Controllers;

use File;
use Storage;
use App\Models\Data;
use Illuminate\Http\Request;
use App\models\Configuracion;
use DB;
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
        $myconfig = Configuracion::first();
        // if($myconfig){
        //     $campos = '';
        //     for ($i=0; $i < $myconfig->columnas; $i++) { 
        //         $j=$i+1;
        //         $campos .= "c_$j";
        //         if($i<$myconfig->columnas-1)$campos .= ',';
        //     }
        // }
        $mydata = Data::whereNotNull('id')->paginate(10);  

        return view('admin.index',compact('mydata','myconfig'));
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
        $columnas = count($csv[1]);
        $filas = count($csv);
        $data = [];
        foreach ($csv as $key => $item) {
            for ($i=0; $i < $columnas; $i++) { 
                $campo = 'c_'.($i+1); 
                $data = array_add($data,$campo,$item[$i]);
            }
            Data::create($data);
            $data = [];
        }
        Configuracion::create(['archivo'=>$contents,'columnas'=>$columnas,'filas'=>$filas]);

        return back();
    }
    public function reset()
    {
        Data::where('id','>',0)->delete();
        Configuracion::where('id','>',0)->delete();
        return back();
    }
    public function reporte()
    {
        
    }
}
