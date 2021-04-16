<?php

namespace App\Http\Controllers;
use DB;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Interessado;
use App\Models\Utilizador;
use App\Models\Propriedade;
use App\routes\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InteressadoController extends Controller
{
 

    //Create a new Inquilino

    public function createInquilino(Request $request)
    {
        print_r($request->input());
        $order = new Inquilino;
        $order->id=$request->input('id');
        $order->email=$request->input('email');
        $order->save();
       //$inquilino = Inquilino::create($request->all());

       //return response()->json($inquilino);
    }

    //List all Inquilinos

    public function allInquilinos()
    {
        $inquilino = Inquilino::all();
        //$inquilino = $this->model->all();

        return response()->json($inquilino);
        
        //return response()->json('Mostra todas os inquilinos');
        
    }

    //Show Inquilino By ID
    public function showUserByUsername($username)
    {
        
        $users = DB::table('utilizadores')->where('username','=' ,'goncalo')->get();
        //return view('profile_user',['data'=>$users]);
        return response()->json($users);
    }
    
    //Deletes Inquilino
    public function deleteInquilino($id)
    {
        $inquilino = Inquilino::find($id);
        $inquilino->delete();

        //retrun response()->json($property);
        //return response()->json('Mostra um inquilino com esse id');
        
        return response()->json('Removed successfully.');
    }
    
    public function showAllUsers()
    {
        $results = Inquilino::all();
  
        return response()->json($results);

    }

    //Updates Inqilino
    public function updateInquilino(Request $req, $username)
    {
        $data = Utilizador::find('goncalo');
        $data->Username=$req->input('nomeUser');
        $data->PrimeiroNome=$req->input('primeiroNome');
        $data->UltimoNome=$req->input('ultimoNome');
        $data->Email=$req->input('mail');
        $data->Morada=$req->input('morada');
        $data->save();
        
        return response()->json('Updated successfully.');
    }

    public function interessadoProfile($username)
    {
        $user = Utilizador::where('username','=' ,$username)->where('TipoConta','=' ,'Interessado')->get();

        return view('profile_interessado',['data'=>$user]);
    }

    public function findPropriedade(Request $request)
    {
        //$user = Utilizador::where('username','=' ,$username)->where('TipoConta','=' ,'Interessado')->get();
        //$search_data1 = $_GET['query'];
        //$search_data2 = $_GET['query'];
        $search_data1 = $request->input('tipoProp');
        $search_data2 = $request->input('query2');
        $search_data3 = $request->input('areaMetros');

        if ($search_data3 == ""){
            $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%')
            ->where('Localizacao', 'LIKE', '%'.$search_data2.'%')
            //->where('AreaMetros', '<',(int)$search_data3)
            ->paginate(1);
        }
        else{
            $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%')
            ->where('Localizacao', 'LIKE', '%'.$search_data2.'%')
            ->where('AreaMetros', '<',(int)$search_data3)
            ->get();
        }
        $proprerties->appends($request->all());

        return view('find_propriedade',compact('proprerties'));
    }
}


?>