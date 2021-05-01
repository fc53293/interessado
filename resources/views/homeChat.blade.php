@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $user)
                            <li class="user" id="{{$user['Username']}}">
                                
                                    <span class="pending"> 1</span>
                                
                                    

                                <div class="media">
                                    <div class="media-left">
                                        <img src="https://via.placeholder.com/150" alt="" class="media-object">
                                    </div>

                                    <div class="media-body">
                                        <p class="name">{{$user['Username']}}</p>
                                        <p class="email">{{$user['Email']}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages">


            </div>
        </div>
    </div>
