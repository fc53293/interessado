<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="UniRent">
    <title> House | UniRent</title>
    <link rel="shortcut icon" type="image/jpg" href="img/logo/UniRent-V2.png" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="/js/scripts.js"></script>
</head>

<body>
    <nav class="navbar bg-navbar navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/logo/UniRent-V2.png" alt="" width="100">
            </a>
            <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="{{ url('interessadoProfile/{id}') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="{{ url('findPropriedade') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="{{ url('wallet/{id}') }}">Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black text-end" href="#">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    <!-- END Nav bar -->
    
    <div class="banner-image justify-content-center d-flex ">
        <div class="container profile-container">
            <div class="row p-3 profile-container" id="parteCima">
                <div class="col align-middle" id="dataCasa">
                    <div class="row d-flex justify-content-center" id="dataCasa__imagens">
                        <img class="img-fluid" id="imgCasa" src="/img/QUARTO.jpg"
                            style="max-width: 700px; width:100%;  border-radius: 50px !important;">
                            
                        @foreach($property as $propInfo) 
                        <form class="foodstars" action="{{url('/rateProperty/'.$propInfo['IdPropriedade'])}}" id="addStar" method="POST">
                            <div class="mt-3 p-2 star-icon d-flex justify-content-center">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="star" value="5" classe="fa"><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4half" name="star" value="4.5" classe="fa"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                    <input type="radio" id="star4" name="star" value="4" classe="fa"><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3half" name="star" value="3.5" classe="fa"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                    <input type="radio" id="star3" name="star" value="3" classe="fa"><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2half" name="star" value="2.5" classe="fa"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                    <input type="radio" id="star2" name="star" value="2" classe="fa"><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1half" name="star" value="1.5" classe="fa"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                    <input type="radio" id="star1" name="star" value="1" classe="fa"><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    <input type="radio" id="starhalf" name="star" value="0.5" classe="fa"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                </fieldset>
                            </div>
                            <div class="mt-3 p-2 star-icon d-flex justify-content-center">
                                <label >Media Rating: </label> <h3 id="totalAVGrating"><b id="valorRate">{{$avgStar}}</b> </h3><i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                <div class="col" id="infoCasa">
                    <div class="row infoCasa__Border m-3">
                        <h1 class="infoCasa__Preco text-center p-3">{{$propInfo['Preco']}}€/Mês</h1>
                    </div>
                    <div class="row infoCasa__Border m-3 profile-container">
                        <div class="infoCasa__localizacao px-3 pt-3">
                            <h2>Localização:</h2>
                            <p>{{$propInfo['Localizacao']}}</p>
                        </div>
                        <div class="infoCasa__Descricao px-3 py-1">
                            <h2>Descrição: </h2>
                            <p>{{$propInfo['Descricao']}}</p>
                        </div>
                        <div class="infoCasa__Descricao px-3 py-1">
                            <h2>Area: </h2>
                            <p>{{$propInfo['AreaMetros']}} m2</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <form action="/startNewRent/{{$propInfo['IdPropriedade']}}" method="post" name="form">
                            <button type="button" class="btn btn-primary mt-3" onclick="div_show2()">Alugar!</button>
                        </form>
                    </div>
                    <div class="row text-center">
                        <form action="" method="post" name="form">
                            <button type="submit" class="btn btn-primary mt-3">Contactar Proprietário</button>
                        </form>
                    </div>
                </div>

            </div>
            @if(count($ratingGiven)>0)
                @foreach($ratingGiven as $specificRating)
                    @if($specificRating['Rating'] == 5)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star5").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 4.5)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star4half").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 4)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star4").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 3.5)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star3half").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 3)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star3").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 2.5)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star2half").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 2)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star2").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 1.5)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star1half").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 1)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#star1").prop("checked", true) 
                            });
                        });
                    </script>
                    @elseif($specificRating['Rating'] == 0.5)
                    <script>
                    //alert({{$specificRating['Rating']}});
                        $(document).ready(function(){
                            $(() => { 
                                $("#starhalf").prop("checked", true) 
                            });
                        });
                    </script>
                    @endif

                @endforeach
            @endif
            <script>
                $('#addStar').change('.fa', function(e) {
                //alert("ola");
                req = $.ajax({
                    type: 'POST',
                    cache: false,
                    dataType: 'JSON',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                    console.log(data);
                    }
                });
                req.done(function(data){
                    //$('#totalAVGrating').fadeOut(500).fadeIn(500);
                    $('#valorRate').text(data.res);
                    //console.log(res);
                });
                

                });
            </script>

            <div class="row p-3 profile-container" id="parteBaixo">
                <div class="col">
                    <div class="p-3">
                        <h1>Localização</h1>
                    </div>
                    <div class="p-3 d-flex justify-content-center">
                        <img class="img-fluid" src="/img/mapa.png"
                            style="max-width: 500px; width:100%;  border-radius: 50px !important;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="abc2">
        <!-- Popup Div Starts Here -->
        <div id="popupContact">
            <!-- Contact Us Form -->
            <form action="/startNewRent/{{$propInfo['IdPropriedade']}}" onsubmit="return check_empty()" id="form"
                method="post" name="form">
                <img id="close" src="/img/closeButton.png" onclick="div_hide2()">
                <h1>Start Renting</h1>
                <input id="name2" name="nameUser" placeholder="Amount" type="hidden" value="">
                <input id="name" name="amountToAdd" placeholder="Amount" type="number" value="{{$propInfo['Preco']}}"
                    disabled>
                <br><br><br>

                <!--<a href="javascript:%20check_empty()" id="submit" >Add</a>-->
                <button id="submitWallet" type="submit" name="sub" href="javascript:%20check_empty()">Pay</button>
            </form>
        </div>
        <!-- Popup Div Ends Here -->
    </div>
    </div>
    @endforeach
</body>