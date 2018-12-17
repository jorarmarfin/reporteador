<?php

namespace App\Http\Controllers;

use File;
use Storage;
use App\Models\Data;
use Illuminate\Http\Request;
use App\models\Configuracion;
use DB;
use PDF;
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
        return view('admin.reporte');
    }
    public function pdf()
    {
        $mydata = Data::all();

        foreach ($mydata as $key => $item) {

            PDF::SetTitle('FICHA DE INSCRIPCION');
            PDF::AddPage('U','A4');
            #TITULO
            PDF::SetXY(5,5);
            PDF::SetFont('helvetica','B',19);
            PDF::Cell(60,0,$item->c_2,1,0,'C');
        }
        PDF::Output(storage_path('app/pdf/').'Reporte_'.$item->c_1.'.pdf','FI');
    }
}
