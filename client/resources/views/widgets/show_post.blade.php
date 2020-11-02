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
        <form method="POST" action="{{route('get.post')}}">
            @csrf
            <div class="form-group">
                <label for="uuid">UUID</label>
                <input type="text" name="uuid">
            </div>
            <input type="submit" name="find" value="Submit" class="btn btn-dark btn-block">
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
            <a href="{{route('create.post')}}">Create Post</a>
        </button>
</div>
