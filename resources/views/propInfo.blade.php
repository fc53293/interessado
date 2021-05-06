<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="UniRent">
    <title> House | UniRent</title>
    <link rel="shortcut icon" type="image/jpg" href="img/logo/UniRent-V2.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
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
                    </div>
                </div>
                @foreach($property as $propInfo)
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
                            <button type="submit" class="btn btn-primary mt-3">Alugar!</button>
                        </form>
                    </div>
                    <div class="row text-center">
                        <form action="" method="post" name="form">
                            <button type="submit" class="btn btn-primary mt-3">Contactar Proprietário</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
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


</body>