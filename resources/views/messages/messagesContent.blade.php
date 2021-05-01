<div class="message-wrapper">
                    <ul class="messages">
                        @foreach ($messages as $message)
                            <li class="message clearfix">
                                <div class="sent">
                                    <p>{{$message['message']}}</p>
                                    <p class="date">1 Mai, 2021</p>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="input-text">
                    <input type="text" name="message" class="submit">
                </div>