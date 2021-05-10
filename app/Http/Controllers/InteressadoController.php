<?php

namespace App\Http\Controllers;
use DB;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Propriedade;
use App\Models\Interessado;
use App\Models\Utilizador;
use App\Models\Inquilino;
use App\Models\HistoricoSaldo;
use App\Models\Message;
use App\Models\Likes;
use App\routes\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pusher\Pusher;
Use Carbon\Carbon;

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
        $inquilino = Propriedade::all();
        //$messages = Message::where('id',1)->get();

        return response()->json($proprerties);
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
    public function updateInquilino(Request $req, $id)
    {
        $data = Utilizador::find($id);
        $data->Username=$req->input('nomeUser');
        $data->PrimeiroNome=$req->input('primeiroNome');
        $data->UltimoNome=$req->input('ultimoNome');
        $data->Email=$req->input('mail');
        $data->Morada=$req->input('morada');
        $data->Nascimento=$req->input('dateNascimento');
        $data->save();
        
        return response()->json('Updated successfully.');
    }

    public function interessadoProfile($id)
    {
        $data = Utilizador::where('IdUser','=' ,$id)->where('TipoConta','=' ,'Interessado')->get();
        //$data = Utilizador::find($id)->get();
        return view('profile_interessado',compact('data'));
    }

    public function findPropriedade(Request $request)
    {
        //$user = Utilizador::where('username','=' ,$username)->where('TipoConta','=' ,'Interessado')->get();
        $dataLike = Likes::where('IdUser','=' ,1)->get();
        //$search_data2 = $_GET['query'];
        $search_data1 = $request->input('tipoProp');
        $search_data2 = $request->input('query2');
        $search_data3 = $request->input('areaMetros');
        $search_data4 = $request->input('lprice');
        $search_data5 = $request->input('nquartos');
        $search_data6 = $request->input('oriSolar1');
        //$search_data7 = $request->input('oriSolar2');

        $proprerties = Propriedade::where('Localizacao', 'LIKE', '%'.$search_data2.'%');
        if (!$search_data1 && !$search_data2 && !$search_data3 && !$search_data4){
            $proprerties = Propriedade::where('Localizacao', 'LIKE', '%'.$search_data2.'%');
        }
        //dd($search_data4);
        if ($search_data1){
            $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%');

        }

        if ($search_data2){
            $proprerties = $proprerties->where('Localizacao', 'LIKE', '%'.$search_data2.'%');

        }

        if ($search_data4){
            $proprerties = $proprerties->where('Preco', '<',(int)$search_data4);

        }

        if ($search_data5){
            $proprerties = $proprerties->where('NumeroQuartos',(int)$search_data5);

        }

        if ($search_data6){
            //dd($search_data6);
            $proprerties = $proprerties->where('OrientacaoSolar',$search_data6);

        }


        // else if ($search_data3 == ""){
        //     $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%')
        //     ->where('Localizacao', 'LIKE', '%'.$search_data2.'%')
        //     //->where('AreaMetros', '<',(int)$search_data3)
        //     //->where('Preco', '<',(int)$search_data4)
        //     ->paginate(1);
        // }
        // else{
        //     $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%')
        //     ->where('Localizacao', 'LIKE', '%'.$search_data2.'%')
        //     ->where('AreaMetros', '<',(int)$search_data3)
        //     ->where('Preco', '<',(int)$search_data4)
        //     ->get();
        // }
        //$proprerties->appends($request->all());
        $proprerties = $proprerties->paginate(1)->appends(request()->query());
        
        return view('find_propriedade',compact('proprerties'));
    }

    public function propertyInfo($id)
    {
        $property = Propriedade::where('IdPropriedade', $id)->get();

        return view('propInfo',compact('property'));
    }

    public function starNewRent($idProp)
    {
        // $values = array('IdInquilino' => 2,'IdUser'=> 3,'Username' => 'tobias','IdPropriedade' => 2,'InicoiContrato' => '2021-03-16 16:22:55','FimContrato' => '2021-03-16 16:22:55');
        // DB::table('inquilino')->insert($values);
        //return view('propInfo',compact('property'));
        $userLoged = 1;
        $data = Utilizador::where('IdUser','=' ,$userLoged)->get();
        foreach ($data as $dataz) {
        
        
        $user = new Inquilino();
        //$user->IdSenhorio=1;
        $user->IdUser=$userLoged;
        $user->Username=$dataz->Username;
        $user->IdPropriedade=$idProp;
        $user->InicoiContrato=Carbon::now();
        $user->FimContrato=Carbon::now();
        $user->save();
        }
        return redirect('home');

    }


    public function showChat()
    {
        $users = Utilizador::all();

        return view('homeChat',compact('users'));
    }

    public function getMessage($user_id)
    {
        $my_id = 1;
        //user_username is the person who we want to see the messages
        //get all messages from a selected user

        $messages = Message::where(function ($query) use ($user_id,$my_id){
            $query->where('from',$my_id)->where('to',$user_id);
        })->orWhere(function ($query) use ($user_id,$my_id){
            $query->where('from',$user_id)->where('to',$my_id);
        })->get();

        //$messages = Message::where('id',1)->get();

        //return $user_username;
        //return response()->json('OPla');
        return view('messages.messagesContent',compact('messages'));
    }

    //Adiciona uma quantidade de saldo ao saldo atual do inquilino
    public function addSaldo($id, Request $amount){
        $user = Utilizador::find($id);
        $user->Saldo=$amount->input('amountToAdd')+$user->Saldo;
        $user->save();

        $histSaldo = new HistoricoSaldo();
        //$user->IdSaldo=1;
        $histSaldo->IdUser=$id;
        $histSaldo->Username=$amount->input('nameUser');
        $histSaldo->Valor=$amount->input('amountToAdd');
        $histSaldo->Data=Carbon::now();
        $histSaldo->save();

        //return view('wallet');
    }

    //Apresenta a pagina da wallet desse inquilino
    public function showWallet($id)
    {
        $user = Utilizador::where('IdUser','=',$id)->get();

        $userHist = HistoricoSaldo::where('IdUser','=',$id)->orderBy('IdSaldo', 'desc')->limit(4)->get();

        return view('wallet',['data'=>$user],['data2'=>$userHist]);
    }

    //Vai para a home page
    public function goHome()
    {
        //$user = Utilizador::where('username','=' ,$username)->get();

        return view('home');
    }

    //Atribuir interesse a uma propriedade, dando like
    public function likeProp($idProp)
    {
        $proplike = new Likes();
        $proplike->IdUser=1;
        $proplike->IdPropriedade=$idProp;
        $proplike->Data=Carbon::now();
        $proplike->save();

        return response()->json('Deu like na propriedade');

    }

    public function sendMessage(Request $request)
    {
        
        $from = 1;
        $to = $request->receiver_id;
        $message = $request->message;
        
        //$data2 = new Message();
        //$data2->from = 1;
        //$data2->to = 2;
        //$date2->message = $message;
       //$data2->id_read = 0;
        //$data2->save();

        
        $data = array('from' => $from, 'to' => $to, 'message' => $message, 'is_read' => 0);
        Message::create($data);    

        // pusher
         $options = array(
             'cluster' => 'eu',
             'useTLS' => true
         );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        
        // $app_id = 1197400;
        // $app_key = b9767ecdf7ebd85a488a;
        // $app_secret = 44d7fbdc4e3878fe58ca;
        // $app_cluster = eu;
        
        // $pusher = new Pusher\Pusher( $app_key, $app_secret, $app_id, array('cluster' => $app_cluster) );

        $data= "string do gui";
        //$data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        //$data = array('from' => $from, 'to' => $to);
        $pusher->trigger('my-channel', 'my-event', $data);

    }
}
?>