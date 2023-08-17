@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Чат жильцов дома</h1>

        <div class="card">
            <div class="card-body">
                @foreach ($chats as $chat)
                    <div class="alert alert-primary">
                        <div class=" toast-header">
                            <strong
                                class="me-auto">{{ $users->find($chat->user_id)->firs_name }} {{$users->find($chat->user_id)->last_name }}
                                :</strong>
                            <small class="text-body-secondary">11 mins ago</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
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
                    <a href="#" class="btn btn-icon btn-link text-body rounded-circle dz-clickable" id="dz-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-paperclip">
                            <path
                                d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                        </svg>
                    </a>
                </div>

                <div class="col">
                    <div class="input-group">
                        <textarea class="form-control px-0" name="message" placeholder="Введите сообщение..." rows="1"
                                  data-emoji-input="" data-autosize="true"
                                  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 47px;"></textarea>

                        <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                                <span class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-smile"><circle cx="12" cy="12"
                                                                                               r="10"></circle><path
                                                            d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9"
                                                                                                     x2="9.01"
                                                                                                     y2="9"></line><line
                                                            x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                                </span>
                        </a>
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
