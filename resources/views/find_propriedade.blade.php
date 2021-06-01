
<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="UniRent">
    <title>User | UniRent</title>
    <link rel="shortcut icon" type="image/jpg" href="img/logo/UniRent-V2.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script type="text/javascript" src="/JS/sidebar.js"></script>
    <script type="text/javascript" src="/JS/scripts.js"></script>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
</head>

<body>
    
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
      <a class="navbar-brand" href="/senhorio/home">
        <img src="/img/logo/UniRent-V2.png" alt="" width="100">
      </a>
      <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">

                    <style>
                      .dropbtn {
                        
                        background: url('/img/blankProfileImg.png') no-repeat;
                        background-size: 50px 50px;
                        color: white;
                        font-size: 16px;
                        border: none;
                        cursor: pointer;
                        border-radius: 50%;
                        padding: 25px 25px;
                        
                      }

                      .dropbtn:hover, .dropbtn:focus {
                        background-color: #2980B9;
                      }

                      .dropdown {
                        position: relative;
                        
                        display: inline-block;
                      }

                      .dropdown-content {
                        right: 0px;
                        top: 55px;
                        display: none;
                        position: absolute;
                        background-color: #f1f1f1;
                        min-width: 160px;
                        overflow: auto;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                      }

                      .dropdown-content a {
                        color: black;
                        padding: 12px 16px;
                        text-decoration: none;
                        display: block;
                      }

                      .outro {
                        color: black;
                        padding: 12px 16px;
                        text-decoration: none;
                        display: block;
                        border-bottom: 1px outset rgba(0,0,0,0.2);
                        text-align: right;
                        margin: 0px;
                      }

                      

                      .dropdown a:hover {background-color: #ddd;}

                      .show {display: block;}
                      </style>

                      <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"></button>
                        <div id="myDropdown" class="dropdown-content">
                          <p class="outro">Hi, {{$user[0]['PrimeiroNome']}}!</p>
                          <a href="{{ url('/homeInteressado') }}">Home</a>
                          <a href="{{ url('/interessadoProfile/2') }}">Profile</a>
                          <a href="{{ url('/chat') }}">Messages</a>
                          <a href="{{ url('/walletInteressado/2') }}">Wallet</a>
                          <a href="{{ url('/findPropriedadeInteressado/2') }}">Search</a>
                          <a href="#">Sign Out</a>
                        </div>
                      </div>

                      <script>
                      /* When the user clicks on the button, 
                      toggle between hiding and showing the dropdown content */
                      function myFunction() {
                        document.getElementById("myDropdown").classList.toggle("show");
                      }

                      // Close the dropdown if the user clicks outside of it
                      window.onclick = function(event) {
                        if (!event.target.matches('.dropbtn')) {
                          var dropdowns = document.getElementsByClassName("dropdown-content");
                          var i;
                          for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                              openDropdown.classList.remove('show');
                            }
                          }
                        }
                      }

                      </script>        
        </ul>
      </div>
    </div>
    </nav>
    <!-- END Nav bar -->

    <!-- Banner -->
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <!--good-->
                <div class="col profile-container">
                    <div class="row m-1">
                        <!-- main -->
                        <div class="col-3 pt-2">
                            <!-- Inicio Search Form-->
                            <br>
                            <form action="{{url('/findPropriedadeInteressado/2')}}" type="get" novalidate="novalidate">
                                <div class="form-row">
                                    <div class="col p-2">
                                        <select class="form-control search-slt" name="tipoProp"
                                            id="exampleFormControlSelect1" >
                                            <option name="query5" value="">Qualquer tipos de aluguer</option>
                                            <option name="query3" value="Quarto">Quarto</option>
                                            <option name="query4" value="Casa">Casa</option>
                                        </select>
                                        <small id="emailHelp" class="p-1 form-text text-muted">Selecionar tipo de
                                            aluguer</small>
                                    </div>
                                    <div class="col p-2">
                                        <input type="text" class="form-control search-slt" placeholder="Local" name="query2" value="{{$search_data2}}">
                                        <small id="emailHelp" class="p-1 form-text text-muted">Escolha uma
                                            localidade</small>
                                    </div>
                                    <div class="col p-2">
                                        <select class="form-control search-slt" name="nquartos"
                                            id="exampleFormControlSelect2">
                                            <option name="query5" value="">Numero de quartos</option>
                                            <option name="query3" value="1">1</option>
                                            <option name="query4" value="2">2</option>
                                            <option name="query4" value="3">3</option>
                                            <option name="query4" value="4">4</option>
                                            <option name="query4" value="5">5</option>
                                        </select>
                                        <small id="emailHelp" class="p-1 form-text text-muted">Selecionar o número de quartos</small>
                                    </div>
                                    <div class="col p-2">
                                        <select class="form-control search-slt" name="areaMetros" id="exampleFormControlSelect3">
                                            <option name="query5" value="">Qualquer área</option>
                                            <option name="query3" value="7">Até 7 m2</option>
                                            <option name="query4" value="10">Até 10 m2</option>
                                            <option name="query5" value="20">Até 20</option>
                                            <option name="query5" value="100">Até 100</option>
                                            <option name="query5" value="200">Até 200</option>
                                        </select>
                                        <small id="emailHelp" class="p-1 form-text text-muted">Selecione o tamanho do
                                            seu aluguer</small>
                                    </div>
                                
                                    <div class="slidecontainer">
                                       
                                        <input type="range" min="50" max="2000" value={{$search_data4 ? $search_data4 : 400}} class="slider" id="myRange" name="lprice">
                                        <p>Max Price: <span id="priceFilter"></span> €</p>
                                        <input type="hidden" id="priceFilter2"  >
                                    </div>
                                    <div class="col p-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="checkbox" id="solar1" name="oriSolar1" value="N" class="ckeckJust1">
                                                <label for="vehicle1"> N</label><br>
                                                <input type="checkbox" id="solar2" name="oriSolar1" value="S" class="ckeckJust1">
                                                <label for="vehicle2"> S</label><br>

                                            </div>

                                            <div class="col-md-4">
                            
                                                <input type="checkbox" id="solar3" name="oriSolar1" value="E" class="ckeckJust1">
                                                <label for="vehicle2"> E</label><br>
                                                <input type="checkbox" id="solar4" name="oriSolar1" value="O" class="ckeckJust1">
                                                <label for="vehicle2"> O</label><br>
                                            </div>
                                            <small id="emailHelp" class="p-1 form-text text-muted">Selecione a orientação solar que deseja</small>

                                        </div>
                                    </div>

                                    <div class="col p-2">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <input type="checkbox" id="ext1" name="extra1" value="1">
                                                    <label for="vehicle1"> Internet</label><br>
                                                    <input type="checkbox" id="ext2" name="extra2" value="1">
                                                    <label for="vehicle2"> Limpeza</label><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="checkbox" id="rest1" name="restricao1" value="1">
                                                    <label for="vehicle1"> Fumadores</label><br>
                                                    <input type="checkbox" id="rest2" name="restricao2" value="1">
                                                    <label for="vehicle2"> Animais</label><br>
                                                </div>
                                            <small id="emailHelp" class="p-1 form-text text-muted">Selecione opções extra</small>
                                        </div>
                                    </div>
                                    <div class="col p-2">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <input type="checkbox" id="rest3" name="restricao3" value="1">
                                                    <label for="vehicle1"> Masculino</label><br>
                                                    <input type="checkbox" id="rest4" name="restricao4" value="1">
                                                    <label for="vehicle2"> Feminino</label><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="vehicle2"> Fiaxa Etária:</label><br>
                                                    <input type="text" id="idades" class="form-control" readonly> 
                                                    <div id="slider-range"></div>
                                                    <div class="form-group col-md-2"> 
                
                                                        <input type="text" id="faixaEtariaMin" name="faixaEtariaMin" class="form-control" value={{$search_data13 ? $search_data13 : 18}} readonly hidden> 
                                                        </div>
                                                        <div class="form-group col-md-2"> 
                                                        
                                                        <input type="text" id="faixaEtariaMax" name="faixaEtariaMax" class="form-control" value={{$search_data14 ? $search_data14 : 23}} readonly hidden> 
                                                    </div>
                                                </div>
                                    
                                        </div>
                                    </div>
                                    <div class="col text-center mt-2 p-2">
                                        <a href="{{ url('/findPropriedadeInteressado/2') }}"><button type="button"  class="btn btn-outline-danger">Limpar Pesquisa</button></a>
                                    </div>
                                    <div class="col text-center mt-2 p-2">
                                        <button type="submit" class="btn btn-primary wrn-btn">Procurar</button>
                                    </div>
                                </div>
                            </form>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
                            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                            <link rel="stylesheet" href="/resources/demos/style.css">
                            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                            <script>
                                    escolha = (document.getElementById('exampleFormControlSelect1').value = "{{$search_data1}}");
                                    console.log(escolha);
                                    escolha.selected = true;

                                    escolha2 = (document.getElementById('exampleFormControlSelect2').value = "{{$search_data5}}");
                                    console.log(escolha);
                                    escolha2.selected = true;
                                    
                                    escolha3 = (document.getElementById('exampleFormControlSelect3').value = "{{$search_data3}}");
                                    console.log(escolha);
                                    escolha3.selected = true;
                                    @if ($search_data6 && $search_data6 == "N")
                                        $( "#solar1" ).prop( "checked", true );
                                    @elseif ($search_data6 && $search_data6 == "S")
                                        $( "#solar2" ).prop( "checked", true );
                                    @elseif ($search_data6 && $search_data6 == "E")
                                        $( "#solar3" ).prop( "checked", true );
                                    @elseif ($search_data6 && $search_data6 == "O")
                                        $( "#solar4" ).prop( "checked", true );
                                    @endif

                                    @if ($search_data7)
                                        $( "#ext1" ).prop( "checked", true );
                                    @endif
                                    @if ($search_data8)
                                        $( "#ext2" ).prop( "checked", true );
                                    @endif
                                    @if ($search_data9)
                                        $( "#rest1" ).prop( "checked", true );
                                    @endif
                                    @if ($search_data10)
                                        $( "#rest2" ).prop( "checked", true );
                                    @endif
                                    @if ($search_data11)
                                        $( "#rest3" ).prop( "checked", true );
                                    @endif
                                    @if ($search_data12)
                                        $( "#rest4" ).prop( "checked", true );
                                    @endif
                                $( function() {
           
                                $( "#slider-range" ).slider({
                                range: true,
                                min: 14,
                                max: 88,
                                values: [ {{$search_data13 ? $search_data13 : 18}}, {{$search_data14 ? $search_data14 : 23}} ],
                                slide: function( event, ui ) {
                                    $( "#idades" ).val( ui.values[ 0 ] +" - "+ ui.values[ 1 ] );
                                    $( "#faixaEtariaMin" ).val( ui.values[ 0 ] );
                                    $( "#faixaEtariaMax" ).val( ui.values[ 1 ] );
                                }
                                
                                });
                                $( "#idades" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
                                " - " + $( "#slider-range" ).slider( "values", 1 ) );
                            } );
                            </script>
                            <!-- Fim Search Form -->
                        </div>
                        <div class="col-9">
                            <h1 class="px-2 py-4 font-effect__blue">Pesquisa de Alojamentos:</h1>
                            <h2 class="px-2 py-4 font-effect__blue">RESULTADOS:</h2>

                            @if(isset($proprerties))

                            <div id="divResultsProp" class="container profile-container__searchOptions text-center p-2 mb-2 position-relative">
                                @if(count($proprerties)>0)
                                @php
                                    $piaa = "False";
                                    $ckeckLike = "False";
                                @endphp
                                @foreach($proprerties as $propInfo)
                                    @foreach($dataLike as $dataLikeCheck)
                                        <!-- <p>{{$dataLikeCheck->IdPropriedade}}= {{$propInfo['IdPropriedade'] }}</p> -->

                                        @if($dataLikeCheck->IdPropriedade == $propInfo['IdPropriedade'])
                                            @php 
                                                $ckeckLike = "True";
                                            @endphp
                                        @endif
                                    @endforeach
                                <div class="row">
                                    <div class="col h-25">
                                        <a href="{{ url('/propertyInfo/' . $propInfo->IdPropriedade.'/user/2') }}">
                                            <img class="rounded float-start img-fluid position-relative" src="/img/room1.jpg" alt="" id="propertyImgOnResults" >
                                        </a>
                                    </div> 
                                    <div class="col">
                                        <div class="row">
                                            <br>
                                        </div>
                                        <div class="row p-2 position-relative" id="row1">
                                            <label class="fs-10"><strong>ID PROPRIEDADE: </strong>{{$propInfo['IdPropriedade']}}</label>
                                        </div>
                                        <div class="row p-2 position-relative" id="row2">
                                            <label class="fs-10"><strong>TIPO PROPRIEDADE: </strong>{{$propInfo['TipoPropriedade']}}</label>
                                        </div>
                                        <div class="row p-2 position-relative" id="row3">
                                            <label class="fs-10"><strong>LOCALIZAÇÃO: </strong>{{$propInfo['Localizacao']}}</label>
                                        </div>
                                        <div class="row p-2 position-relative" id="row4">
                                            <label class="fs-10"><strong>Metros quadrados: </strong>{{$propInfo['AreaMetros']}} m2</label>
                                        </div>
                                        <div class="row p-2 position-relative" id="row4">
                                            <label class="fs-10"><strong>Preço: </strong>{{$propInfo['Preco']}} €</label>
                                        </div>
                                        <!--<div class="{{ $propInfo->IdPropriedade == 1 ? 'btn btn-primary' : 'btn btn-outline-primary' }}">
                                        <div class="row py-2 px-5" id="row5">
                                            <button type="button" class="{{ $ckeckLike == 'True' ? 'btn btn-primary' : 'btn btn-outline-primary' }}">Like!</button>
                                            <button type="button" class="btn btn-primary">Liked!</button>
                                        </div>-->
                                        <form  method="post" id="formLike">
                                            <div class="row py-2 px-5" id="row5">
                                                <button type="submit" class="{{ $ckeckLike == 'True' ? 'btn btn-primary' : 'btn btn-outline-primary' }}">Like</button>
                                            </div>
                                        </form>
                                    </div>
                                    <script>

                                    
    
                                    $(document).ready(function(){
                                    
                                    $('#formLike').on('click', function(event){
                                        
                                        // var a = $(this);
                                        // var form = $('#formLike');
                                        // var action = a.attr('id');
                                        var var_verLike = "<?php echo $ckeckLike; ?>";
                                        //alert(var_verLike);
                                        if (var_verLike == "True"){
                                            $("#formLike").attr('action', "{{ url('/nolikeProperty/'.$propInfo['IdPropriedade'].'/user/2') }}"); 
                                            form.submit();
                                        }else{
                                            $("#formLike").attr('action', "{{ url('/likeProperty/'.$propInfo['IdPropriedade'].'/user/2') }}"); //Se nao tiver like faz isto (vai buscar a func pa por like)
                                            form.submit(); 
                                        }
                                        //action="/likeProperty/{{$propInfo['IdPropriedade']}}"
                                    });

                                    });
                                    </script>
                                </div><br><br>
                                @endforeach
                                
                                @else
                                <div class="row">
                                    <h1>No results found</h1>
                                </div>
                                
                                @endif
                            </div>
                            <!--<div id="divResultsPropTeste" class="container profile-container__searchOptions p-2">
                              <div id="gridItem"></div>
                              <div id="gridItem"></div>
                              <div id="gridItem"></div>
                            </div>-->
                            @endif
                            <!-- <table class="table">
                                //@if(count($proprerties) > 0)

                                //@foreach ($proprerties as $propInfo)
                                <tr class="profile-container__searchOptions">
                                //    <th scope="row">{{$propInfo['IdPropriedade']}}</th>
                                //    <td>{{$propInfo['TipoPropriedade']}}</td>
                                //    <td>{{$propInfo['Localizacao']}}</td>
                                //    <td>{{$propInfo['AreaMetros']}} m<sup>2</sup></td>
                                </tr>
                                //@endforeach
                                //@else
                                <tr>
                                    <td>No results found!</td>
                                </tr>
                               // @endif

                            </table> -->
                           

                            <div>
                                {{ $proprerties->links('pagination::bootstrap-4') }}
                                
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END Banner -->

</body>