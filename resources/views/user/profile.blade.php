<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileImage" content="/2.jpg">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ 'I Q R A ' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            width: 100vw;
            height: 100vh;
            margin: 0;
            padding: 2% 30% 2% 30%;
            background-image: url("/images/bg.jpg");
            -webkit-background-image: url("/images/bg.jpg");
            background-position: top;
            background-size: cover;

        }


        .content2{
            text-align: center;
            border-radius: 5%;
            padding-top: 3%;
            padding-bottom: 2%;
            margin-bottom: 5%;
            background: white;
            width: 100%;
            height: auto;
            box-shadow: #b9b9b9 -3PX -3PX 20PX 3PX  ;
            font-size:14px ;

        }
        .modal {
            display: none; /* Hidden by default */
            z-index: 1; /* Sit on top */
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 27%; /* Could be more or less, depending on screen size */
        }
        .modal-content1 {
            background-color: #fefefe;
            margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 90%; /* Could be more or less, depending on screen size */
        }
        hr{
            width: 50%;
        }
        @media (max-width: 1200px) {
            .content2{
                padding-top: 3%;
            }
        }
        @media (max-width: 1000px) {
            .modal-content {
                background-color: #fefefe;
                margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }
            .content2{
                padding-top: 3%;
            }
            body{
                padding: 2% 20% 2% 20%;
            }
        }
        @media (max-height:98vh) {
            body{overflow: scroll; padding-bottom: 0px;}
            .content2{ height: 400px;}

        }
        .bb{
            margin: 30px;
            width: 300px;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }
    </style>


</head>
<body>
@if((Config::get('msg'))!=null)
    <div style=" padding: 20px;
    @if((Config::get('msg'))== "mot de pass a etait changer")
            background-color: #0dd50a;
    @else
            background-color: #f44336;
    @endif
                  color: white;
                  opacity: 1;
                  transition: opacity 0.6s;
                  border-radius:7px;
                  margin-bottom: 15px;">
        <span class="closebtn" style=" margin-left: 15px;
                  color: white;
                  font-weight: bold;
                  float: right;
                  font-size: 22px;
                  line-height: 20px;
                  cursor: pointer;
                  transition: 0.3s;">&times;</span>
        <strong>{{Config::get('msg')}}</strong>.
        <script>
            var close = document.getElementsByClassName("closebtn");
            var i;

            for (i = 0; i < close.length; i++) {
                close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                }
            }
        </script>
    </div>
@endif

<div class="content2">
    <div >

        @if($Abonner->gender =='homme')
            <img class="rounded-circle " width="150px" height="150px"  src="/images/user/homme.svg"   height="200px" class="card-img-top" alt="...">

        @else
            <img class="rounded-circle " width="150px" height="150px"  src="/images/user/famme.svg" src="/storage/gander/femme.png"  height="200px" class="card-img-top" alt="...">

        @endif
            <a class="btn btn-dark"href="/userhome" style="margin-top: 20%"><i class="fa fa-home mr-1"></i> Accueil</a>
            <a class="btn btn-dark" href="{{ route('logout') }}" style="margin-top: 20%"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out mr-1"></i> Déconnecter
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <hr>
        <div style="text-align: center;">
            @if($Abonner->privliger == 'simple')
                <i class="fa fa-star-half text-danger"></i>
            @endif
            @if($Abonner->privliger == 'fan')
                <i class="fa fa-star text-danger"></i>
                <i class="fa fa-star text-danger"></i>
            @endif
            @if($Abonner->privliger == 'superfan')
                <i class="fa fa-star text-danger"></i>
                <i class="fa fa-star text-danger"></i>
                <i class="fa fa-star text-danger"></i>
                <span class=" ml-1 badge badge-danger">Super fun</span>
            @endif
               | {{$Abonner->point}} ptn
                @if($Abonner->pen == true)
                    <div class="row-md-12  alert alert-danger ">
                            <strong>depanaliser en :2017-12-3</strong>
                    </div>
                 @else
                @endif
            <h2>{{$Abonner->nom}}</h2>
            <h3>{{$Abonner->prenom}}</h3>
                <hr><strong>numéro de carte : </strong>{{$Abonner->num}}
                <hr><strong>email  : </strong>{{$Abonner->email}}
                <hr><strong>numéro de telephone : </strong>0{{$Abonner->telephone}}
                <hr><strong>email  : </strong>{{$Abonner->email}}
                <hr>
                @if((Auth::guard('abonner')->user()->id)==($Abonner->id))
                    <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">changer le mot de pass</button>
                    <button @if((count($Abonner->emprunt))!=0 ) onclick="document.getElementById('id02').style.display='block'" @endif
                    class="@if((count($Abonner->emprunt))==0)ml-0 btn btn-dark disabled  @else  btn btn-primary @endif">Liste des documents prêtés</button>
                    <button  @if((count($Abonner->reservation))!=0) onclick="document.getElementById('id03').style.display='block'" @endif
                        class="@if((count($Abonner->reservation))==0)ml-0 btn btn-dark disabled  @else btn btn-warning @endif">
                        Document réservé
                    </button>
                @endif
                <div id="id01" class="modal">
                    <div class="modal-content animate" >
                        <form name="test" method="post" action="/changepassword">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$Abonner->id}}">
                            <label class="tt">ancien mot de pass :<br>
                                <input name="old" type="password" class="form-control " width="80%" />
                            </label>
                            <label class="tt">mot de pass<br>
                                <input name="password" id="password" type="password" class="form-control " width="80%" onkeyup='check();' />
                            </label>
                            <br>
                            <label class="tt">confirmer le mot de pass  <span id='message'></span><br>
                                <input type="password" name="confirm_password" class="form-control " id="confirm_password"  onkeyup='check();' />
                            </label>
                            <br>
                            <input type="submit" class="tt btn btn-dark" name="submit"  value="changer"  id="submit" disabled>

                        </form>

                        <script type="text/javascript">
                            var check = function() {
                                if (
                                    (document.getElementById('password').value == document.getElementById('confirm_password').value)&&
                                    (document.getElementById('password').value.length == document.getElementById('confirm_password').value.length)
                                )
                                {
                                    if((document.getElementById('password').value.length < 4)){
                                        document.getElementById('message').style.color = 'red';
                                        document.getElementById('message').innerHTML = '| min 4 charactair';
                                    }else{
                                    document.getElementById('message').style.color = 'green';
                                    document.getElementById('message').innerHTML = '| mot de pass correct';
                                    document.getElementById('submit').disabled = false;
                                    document.getElementById('submit').className = 'tt btn btn-success';
                                    }
                                } else {
                                    document.getElementById('message').style.color = 'red';
                                    document.getElementById('message').innerHTML = '| mot de pass incorrect';
                                    document.getElementById('submit').disabled = true;
                                    document.getElementById('submit').className = 'tt btn btn-dark';
                                }
                            }
                        </script>

                        <button class="bb btn btn-danger" id="can">Annuler</button>

                    </div>
                </div>
                <div id="id02" class="modal">
                    <div class="modal-content1 animate" >
                       <div class="row" style="text-align: center;">
                           @foreach( $Abonner->emprunt as $emp)

                                       <div class="col-md-3">
                                           Title :<strong>{{$emp->exemplaire->document->titre}}</strong>
                                           <br>
                                           numéro d'exemplaire :<strong>{{$emp->num_exem}}</strong>
                                           <br>
                                           date d'emprunt :<strong>{{$emp->date_emprunt}}</strong>
                                           <br>
                                           date de retour :<strong>{{$emp->date_retour}}</strong>
                                           <br>
                                       </div>
                           @endforeach
                       </div>
                        <div class="row" style="text-align: center;">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"> <button class="bb btn btn-success" id="can1">ok</button></div>
                        </div>
                    </div>
                </div>
                <div id="id03" class="modal">
                    <div class="modal-content animate" >
                        <h3> Document réservé</h3>
                        @foreach( $Abonner->reservation as $reservation)
                                Title :<strong>{{$reservation->document->titre}}</strong>
                                <br>
                                date de reservations :<strong>{{$reservation->date_reservations}}</strong>
                                <br>
                                la fin de reservations :<strong>{{$reservation->date_fin_reservations}}</strong>
                                <br>

                        <a class="btn btn-danger" href="/anuller_reserve/{{$reservation->id}}" style="width:60%;align-self: center;">anuller la résarvation</a>
                        <br>
                        @endforeach
                        <button class=" btn btn-success" id="can3" style="width:60%;align-self: center;margin-bottom: 10%;">ok</button>

                    </div>
                </div>
                <script>
                    // Get the modal
                    var modal1 = document.getElementById('id02');
                    var can1 = document.getElementById('can1');
                    can1.onclick=function () {
                        modal1.style.display = "none";
                    }
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal1) {
                            modal1.style.display = "none";
                        }
                    }
                </script>
                <script>
                    // Get the modal
                    var modal = document.getElementById('id01');
                    var can = document.getElementById('can');
                    can.onclick=function () {
                        modal.style.display = "none";
                    }
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <script>
                    // Get the modal
                    var modal3 = document.getElementById('id03');
                    var can3 = document.getElementById('can3');
                    can3.onclick=function () {
                        modal3.style.display = "none";
                    }
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal3) {
                            modal3.style.display = "none";
                        }
                    }
                </script>

        </div>
    </div>
</div>












<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

