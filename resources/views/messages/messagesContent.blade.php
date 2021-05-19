<div class="message-wrapper">
                    <ul class="messages">
                        @foreach ($messages as $message)
                            <li class="message clearfix">
                                <!-- se a mensagem from id == auth id então foi enviada pelo user que deu login -->
                                <div class="{{ $message->from == 1 ? 'sent' : 'received' }}">
                                    <p>{{$message['message']}}</p>
                                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="input-text">
                    <input type="text" name="message" class="submit">
</div>