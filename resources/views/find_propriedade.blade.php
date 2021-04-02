<head>
  <!DOCTYPE html>
  <html lang="en">
  <meta charset="UTF-8">
  <meta name="author" content="UniRent">
  <title>User | UniRent</title>
  <link rel="shortcut icon" type="image/jpg" href="img/logo/UniRent-V2.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/CSS/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>  
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="/img/logo/UniRent-V2.png" alt="" width="100">
      </a>
      <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-black text-end" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black text-end" href="login.html">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black text-end" href="register.html">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END Nav bar -->
  
  <!-- Banner -->
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="container profile-container"> 
      
        <!--<div class="col-4 profile-container__icon">
          <img class="m-3" src="img/logo/UniRent-V2.png" alt="" width="100">
        </div>-->

        <!-- Cartão do gajo-->
       
        <!--<div class="col-12 col-sm-6 col-lg-3">
         
          </div>-->
          
        <div class="col-12">
          <div class="row">
            <div class="col">
            
              <h1 class="pt-3 profile-container__welcomeUser">Welcome</h1>
            
            </div>
          </div>
          <div class="row">
          <div class="col profile-container__information">
          
          <!-- Search Bar-->
          <section class="search-sec">
            <div class="container">
                <form action="{{url('/findPropriedade')}}" type="get" novalidate="novalidate">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt" name="tipoProp" id="exampleFormControlSelect1">
                                        
                                        <option name="query5" value="">All</option>
                                        <option name="query3" value="Quarto">Quarto</option>
                                        <option name="query4" value="Casa">Casa</option>
                                        
                                      
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <input type="text" class="form-control search-slt" placeholder="Local" name="query2">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <select class="form-control search-slt" name="areaMetros" id="exampleFormControlSelect1">
                                        
                                        <option name="query5" value="">All</option>
                                        <option name="query3" value="7">Até 7 m2</option>
                                        <option name="query4" value="10">Até 10 m2</option>
                                        <option name="query5" value="20">Até 20</option>
                                        <option name="query5" value="100">Até 100</option>
                                        <option name="query5" value="200">Até 200</option>
                                      
                                      
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                                </div>
                                <h2>Resultados:</h2>

                                @if(isset($proprerties))

                                  <table class="table table-striped">
                                    @if(count($proprerties) > 0)

                                      @foreach ($proprerties as $propInfo)
                                        <tr>
                                          <th scope="row">{{$propInfo['IdPropriedade']}}</th>
                                          <td>{{$propInfo['TipoPropriedade']}}</td>
                                          <td>{{$propInfo['Localizacao']}}</td>
                                          <td>{{$propInfo['AreaMetros']}}</td>
                                        </tr>
                                      @endforeach
                                    @else
                                      <tr><td>No results found!</td></tr>
                                    @endif

                                  </table>
                                @endif

                                <div >
                                  {{ $proprerties->links('pagination::bootstrap-4') }}
                                </div>



                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </section>
          </div>
        </div>
       
    </div>
  </div>
  <!-- END Banner -->

</body>
