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
use App\Models\Senhorio;
use App\Models\Rating;
use App\Models\Arrendamento;
use App\Models\Indisponivel;
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
    public function updateInteressado(Request $req, $id)
    {
        if((Carbon::createFromFormat('Y-m-d', $req->input('dateNascimento'))->isPast()) == 0){
            echo ("n passou");
        }

        $data = Utilizador::find($id);
        $data->Username=$req->input('nomeUser');
        $data->PrimeiroNome=$req->input('primeiroNome');
        $data->UltimoNome=$req->input('ultimoNome');
        $data->Email=$req->input('mail');
        $data->Morada=$req->input('morada');
        $data->Nascimento=$req->input('dateNascimento');
        
        
        //Limpamos eventuais espaços a mais
        $nif=trim($req->input('NIF'));
        $ignoreFirst=true;
        //Verificamos se é numérico e tem comprimento 9
        if (!is_numeric($nif) || strlen($nif)!=9) {
            return response()->json('NIF Invalido');
            $validadeNIF = False;
        } else {
            $nifSplit=str_split($nif);
            //O primeiro digíto tem de ser 1, 2, 3, 5, 6, 8 ou 9
            //Ou não, se optarmos por ignorar esta "regra"
            if (
                in_array($nifSplit[0], array(1, 2, 3, 5, 6, 8, 9))
                ||
                $ignoreFirst
            ) {
                //Calculamos o dígito de controlo
                $checkDigit=0;
                for($i=0; $i<8; $i++) {
                    $checkDigit+=$nifSplit[$i]*(10-$i-1);
                }
                $checkDigit=11-($checkDigit % 11);
                //Se der 10 então o dígito de controlo tem de ser 0
                if($checkDigit>=10) $checkDigit=0;
                //Comparamos com o último dígito
                if ($checkDigit==$nifSplit[8]) {
                    $data->NIF=$req->input('NIF');
                    $validadeNIF = True;
                } else {
                    return response()->json('NIF Invalido');
                    $validadeNIF = False;
                }
            } else {
                return response()->json('NIF Invalido');
                $validadeNIF = False;
            }
        }

        $data->Nacionalidade=$req->input('Nacionalidade');
        $data->Telefone=$req->input('Telefone');
        $data->save();
        
        return compact('validadeNIF');
    }

    public function interessadoProfile($id)
    {
        $user = Utilizador::where('IdUser','=',$id)->get();
        $data = Utilizador::where('IdUser','=' ,$id)->where('TipoConta','=' ,'Interessado')->get();
        $dataHoje = Carbon::now();
        $validadeNIF = True;
        return view('profile_interessado',compact('data','dataHoje','user','validadeNIF'));
    }

    public function findPropriedade(Request $request, $idUser)
    {
        $user = Utilizador::where('IdUser','=',$idUser)->get();
         //$user = Utilizador::where('username','=' ,$username)->where('TipoConta','=' ,'Interessado')->get();
         $dataLike = Likes::where('IdUser',$idUser)->get();
         //$search_data2 = $_GET['query'];
         $search_data1 = $request->input('tipoProp');
         $search_data2 = $request->input('query2');
         $search_data3 = $request->input('areaMetros');
         $search_data4 = $request->input('lprice');
         $search_data5 = $request->input('nquartos');
         $search_data6 = $request->input('oriSolar1');
         $search_data7 = $request->input('extra1');
         $search_data8 = $request->input('extra2');
         $search_data9 = $request->input('restricao1');
         $search_data10 = $request->input('restricao2');
         $search_data11 = $request->input('restricao3');
         $search_data12 = $request->input('restricao4');
         $search_data13 = $request->input('faixaEtariaMin');
         $search_data14 = $request->input('faixaEtariaMax');

 
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

         if ($search_data3){
            $proprerties = $proprerties->where('AreaMetros','<', $search_data3);

        }

         if ($search_data5){
             $proprerties = $proprerties->where('NumeroQuartos',(int)$search_data5);
 
         }
 
         if ($search_data6){
             //dd($search_data6);
             $proprerties = $proprerties->where('OrientacaoSolar',$search_data6);
 
         }

         if ($search_data7){
            //dd($search_data6);
            $proprerties = $proprerties->where('internetAcess',$search_data7);

        }

        if ($search_data8){
            //dd($search_data6);
            $proprerties = $proprerties->where('limpeza',$search_data8);

        }

        if ($search_data9){
            //dd($search_data6);
            $proprerties = $proprerties->where('aceitaFumadores',$search_data9);

        }

        if ($search_data10){
             //dd($search_data6);
             $proprerties = $proprerties->where('aceitaAnimais',$search_data10);
 
         }

        if ($search_data11){
            //dd($search_data6);
            $proprerties = $proprerties->where('generoMasc',$search_data11);

        }

        if ($search_data12){
            //dd($search_data6);
            $proprerties = $proprerties->where('generoFemin',$search_data12);

        }

        if ($search_data13){
            //dd($search_data6);
            $proprerties = $proprerties->where('faixaEtariaMin','>=',$search_data13);

        }

        if ($search_data14){
            //dd($search_data6);
            $proprerties = $proprerties->where('faixaEtariaMax','<=',$search_data14);

        }

         $proprerties = $proprerties->paginate(1)->appends(request()->query());
         //return response()->json($dataLike);
         return view('find_propriedade',compact('proprerties','dataLike','user','search_data1','search_data2','search_data4','search_data5','search_data3',
         'search_data6','search_data7','search_data8','search_data9','search_data10','search_data11','search_data12','search_data13','search_data14'));
        //return redirect()->back()->with(compact('proprerties','dataLike','user'));

     }

    public function propertyInfo($id,$idUser)
    {
        $user = Utilizador::where('IdUser','=',$idUser)->get();
        $property = Propriedade::where('IdPropriedade', $id)->get();
        $ratingGiven = Rating::where('IdPropriedade', $id)->where('IdUser',$idUser)->get();
        $avgStar = Rating::where('IdPropriedade', $id)->avg('Rating');
        $arrendamentos = Arrendamento::where('IdPropriedade', $id)->get();
        $indisponiveis = Indisponivel::where('IdPropriedade', $id)->get();
        $data = Carbon::now();

        //return response()->json($avgStar);
        return view('propInfo',compact('property','ratingGiven','avgStar','arrendamentos','indisponiveis','data','user'));
    }

    public function starNewRent(Request $request, $idProp,$idUser)
    {

        $userLoged = $idUser;
        
        $data = Utilizador::where('IdUser',$userLoged)->get();
        $prop = Propriedade::where('IdPropriedade',$idProp)->value('DuracaoAluguer');
        $prop2 = Propriedade::where('IdPropriedade',$idProp)->value('Preco');
        $prop3IdSenhorio = Propriedade::where('IdPropriedade',$idProp)->value('IdSenhorio');
        $prop4IdUser = Senhorio::where('IdSenhorio',$prop3IdSenhorio)->value('IdUser');
        // dd($prop4IdUser);
        $guardaSaldo = null;
        //$guardaPreco = null;
        foreach ($data as $data1){
            $guardaSaldo = $data1['Saldo'];
        }
     
        // foreach ($prop as $prop1){
        //     $guardaPreco = $prop1['Preco'];
        // }

        if ($result = $guardaSaldo < $prop2){
            //return compact('result');
            return response()->json("Nao tem dinheiro suficiente");
        }
     
        else{
            foreach ($data as $dataz) {
        
        
                $user = new Inquilino();
                $user->IdUser=$userLoged;
                $user->Username=$dataz->Username;
                $user->IdPropriedade=$idProp;
                $user->InicoiContrato=Carbon::now();
                $user->FimContrato=Carbon::now()->addMonthsNoOverflow((int)$prop);
                $user->save();
                }
        
                //$prop = Propriedade::where('IdPropriedade','=',$idProp)->get();
                $prop = Propriedade::where('IdPropriedade', $idProp)
               ->update([
                   'Disponibilidade' => 'indisponivel'
                ]);
                $data = Utilizador::where('IdUser',$userLoged)
                ->update([
                    'Saldo' => $guardaSaldo-$prop2
                 ]);

                $data2 = Utilizador::where('IdUser',$prop4IdUser)
                ->update([
                    'Saldo' => +$prop2
                ]);

                //return response()->json($prop);
                return redirect('homeInteressado');
        }


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
        $histSaldo->Descricao=$amount->input('Descricao');
        $histSaldo->Valor=$amount->input('amountToAdd');
        $histSaldo->Data=Carbon::now();
        $histSaldo->save();

        return response()->json(['res'=>$user->Saldo]);
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
        $myDate = '2021-05-19 01:11:43';
        $result = Carbon::createFromFormat('Y-m-d H:i:s', $myDate)->isPast();

        return view('homeInteressado',['data'=>$result]);
    }

    //Atribuir interesse a uma propriedade, dando like
    public function likeProp(Request $request,$idProp,$idUser)
    {
        $userLoged = $idUser;

        $proplike = new Likes();
        $proplike->IdUser=$userLoged;
        $proplike->IdPropriedade=$idProp;
        $proplike->Data=Carbon::now();
        $proplike->save();

        return response()->json('Deu like na propriedade');

    }

    //Retirar o like dado anteriormente 
    public function deleteLikeProp($idProp,$idUser)
    {
        $proplike=Likes::where('IdPropriedade',$idProp)->where('IdUser',$idUser)->delete();

        return response()->json('Like retirado com sucesso');

    }

    //Atribuir pontuação a uma propriedade
    public function rateProp(Request $req, $idProp, $idUser)
    {
        $proplike = new Rating();
        $proplike->IdUser=$idUser;
        $proplike->IdPropriedade=$idProp;
        $proplike->Rating=$req->input('star');
        $proplike->Data=Carbon::now();
        $proplike->save();

        $avgStar = Rating::where('IdPropriedade', $idProp)->avg('Rating');


        //return compact('medStar');
        return response()->json(['res'=>$avgStar]);

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

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);

    }

    //Guardar a imagem de perfil
    public function storeProfileImg(Request $req, $id)
    {
        //Methods we can use on Request
        //guessExtension()
        //getMimeType()
        //store()
        //asStore()
        //storePublicly()
        //move
        //getClientOriginalName()
        //getClientMimeType()
        //guessClientExtension()

        //dd($req->all());
        $this->validate($req,[
            'imgProfile' => 'required|mimes:jpg,png,jpeg,|max:5048'
        ]);
        $file = $req->imgProfile->getClientOriginalName();
        $fileName = pathinfo($file,PATHINFO_FILENAME);

        $newImgName = time() . '-' . $fileName . '.' . 
        $req->imgProfile->extension();

        $req->imgProfile->move('img',$newImgName);

        $user = Utilizador::find($id);
        $user->imagem=$newImgName;
        $user->save();
    }
}
?>