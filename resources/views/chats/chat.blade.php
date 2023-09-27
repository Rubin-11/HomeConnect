@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Чат жильцов дома</h1>
        <div class="card">
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                @foreach ($chats as $chat)
                    <div class="alert @if($chat->user_id === \Illuminate\Support\Facades\Auth::id()) alert-danger @else alert-light @endif">
                        <div class="toast-header">
                            <strong
                                class="me-auto">{{ $users->find($chat->user_id)->firs_name }} {{$users->find($chat->user_id)->last_name }}
                                :</strong>
                            <small class="text-body-secondary">{{$chat->created_at}}</small>

                            <form action="{{ route('chat.delete', $chat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="toast-body">
                            {{ $chat->message }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <form class="chat-form rounded-pill bg-dark bg-opacity-10" method="POST" action="{{route('chats.store')}}"
              data-emoji-form="">
            @csrf
            <div class="row align-items-center gx-0">
                <div class="col-auto">
                </div>
                <div class="col">
                    <div class="input-group">
                        <textarea class="form-control px-0" name="message" placeholder="Введите сообщение..." rows="1"
                                  data-emoji-input="" data-autosize="true"
                                  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 47px;"></textarea>
                    </div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-icon btn-primary rounded-circle ms-5" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-send">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
