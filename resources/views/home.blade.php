<head>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="UniRent">
    <title>Home | UniRent</title>
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
    <script src="/js/scripts.js"></script>
</head>

<body>

{{$data}}
<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
        <a class="navbar-brand" href="#">
        <!-- Empty Logo -->    
        </a>
        <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

<!-- Banner -->
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="content text-center">
	<img src="img/logo/UniRent-V2.png" class="m-2" alt="uni rent logo" style="width: 150px;">
        <h1 class="homeTitle pb-2">Your new life stars here!</h1>
		<h3>1,000+ Students across 4,000+ Colleges use UniRent</h3>
        <div class="row px-3 py-4 g-3">
            <div class="col">
                <input type="date" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Location" aria-label="Last name">
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Search me!</button>
            </div>
        </div>
    </div>
</div>
<!-- END Banner -->
	
<!-- Comments
<div class="commentsSection">
	<div class="gridComments">
		<div class="gridItem"><img src="img/utilizador.png" class="utilizadorImg" alt="utilizador"><h1>Review <br> bla bla bla bla</h1> <br> <p>Maria Rodrigues, 21, Lisboa </p></div>
		<div class="gridItem"><img src="img/utilizador.png" class="utilizadorImg" alt="utilizador"><h1>Review <br> bla bla bla bla</h1> <br> <p>Maria Rodrigues, 21, Lisboa </p></div>
		<div class="gridItem"><img src="img/utilizador.png" class="utilizadorImg" alt="utilizador"><h1>Review <br> bla bla bla bla</h1> <br> <p>Maria Rodrigues, 21, Lisboa </p></div>
		<div class="gridItem"><img src="img/utilizador.png" class="utilizadorImg" alt="utilizador"><h1>Review <br> bla bla bla bla</h1> <br> <p>Maria Rodrigues, 21, Lisboa </p></div>
	</div>
</div>
END Comments -->

<div class="container mt-3 p-3">
    <div class="row bg-light m-4 p-2" style="border-radius: 25px !important;">
        <div class="col-3 align-middle imagem-comentario">
            <img src="img/logo/UniRent-V2.png" class="m-2" alt="uni rent logo" style="width: 150px;">
        </div>
        <div class="col-8 comentario">
            <h2 class="p-3">Nome utilizador</h2>
            <h2 class="p-3">Comentário</h2>
        </div>
    </div>
    <div class="row bg-light m-4 p-2" style="border-radius: 25px !important;">
        <div class="col-3 align-middle imagem-comentario">
            <img src="img/logo/UniRent-V2.png" class="m-2" alt="uni rent logo" style="width: 150px;">
        </div>
        <div class="col-8 comentario">
            <h2 class="p-3">Nome utilizador</h2>
            <h2 class="p-3">Comentário</h2>
        </div>
    </div>
    <div class="row bg-light m-4 p-2" style="border-radius: 25px !important;">
        <div class="col-3 align-middle imagem-comentario">
            <img src="img/logo/UniRent-V2.png" class="m-2" alt="uni rent logo" style="width: 150px;">
        </div>
        <div class="col-8 comentario">
            <h2 class="p-3">Nome utilizador</h2>
            <h2 class="p-3">Comentário</h2>
        </div>
    </div>
    <div class="row bg-light m-4 p-2" style="border-radius: 25px !important;">
        <div class="col-3 align-middle imagem-comentario">
            <img src="img/logo/UniRent-V2.png" class="m-2" alt="uni rent logo" style="width: 150px;">
        </div>
        <div class="col-8 comentario">
            <h2 class="p-3">Nome utilizador</h2> 
            <h2 class="p-3">Comentário</h2>
        </div>
    </div>
</div>

<!-- <script>
    console.log("Teste data contrato",{{$data}});
</script> -->
</body>