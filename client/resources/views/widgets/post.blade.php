@extends('layouts.app')

<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form method="POST" action="{{route('store.post')}}">
            @csrf
            <div class="form-group">
                <label for="agenda">Agenda</label>
                <input type="text" name="agenda">
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <input type="text" name="topic">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <input type="text" name="text">
            </div>
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
        <div>
            @if($response ?? '')
                <div>
                    ID {{$response['id'] ?? ''}}
                </div>
                <div>
                    UUID {{$response['uuid'] ?? ''}}
                </div>
                <div>
                    Agenda {{$response['agenda'] ?? ''}}
                </div>
                <div>
                    Topic {{$response['topic'] ?? ''}}
                </div>
                <div>
                    Text {{$response['text'] ?? ''}}
                </div>
            @endif
        </div>
        <button>
            <a href="{{route('show.post')}}">FIND BY UUID</a>
        </button>
</div>
