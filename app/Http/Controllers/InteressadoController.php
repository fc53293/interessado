<?php

namespace App\Http\Controllers;
use DB;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Interessado;
use App\Models\Utilizador;
use App\Models\Propriedade;
use App\Models\Message;
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
        $my_username = 1;
        //$inquilino = Inquilino::all();
        $messages = Message::where('id',1)->get();

        return response()->json($messages);
        //return view('messages.messagesContent',compact('messages'));
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

    public function propertyInfo($id)
    {
        $property = Propriedade::where('IdPropriedade', $id)->get();

        return view('propInfo',compact('property'));
    }

    public function starNewRent()
    {
        $values = array('IdInquilino' => 2,'Username' => 'tobias','IdPropriedade' => 2,'InicoiContrato' => '2021-03-16 16:22:55','FimContrato' => '2021-03-16 16:22:55');
        DB::table('inquilino')->insert($values);
        //return view('propInfo',compact('property'));
    }


    public function showChat()
    {
        $users = Utilizador::all();

        return view('homeChat',compact('users'));
    }

    public function getMessage($user_username)
    {
        $my_username = "fabio";
        //user_username is the person who we want to see the messages
        //get all messages from a selected user

        //$messages = Message::where(function ($query) use ($user_username,$my_username){
        //    $query->where('from',$my_username)->where('to',$user_username);
        //})->orWhere(function ($query) use ($user_username,$my_username){
        //    $query->where('from',$user_username)->where('to',$my_username);
       // })->get();
        $messages = Message::where('id',1)->get();
        return $user_username;

        //return view('messages.messagesContent',compact('messages'));
    }
}
?>