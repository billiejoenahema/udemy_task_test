@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                    <li>{{ $contact->your_name }}</li>
                    <li>{{ $contact->title }}</li>
                    <li>{{ $contact->email }}</li>
                    <li>{{ $contact->url }}</li>
                    <li>{{ $gender }}</li>
                    <li>{{ $age }}</li>
                    <li>{{ $contact->contact }}</li>
                    </ul>

                    <form method="GET" action="{{ route('contact.edit', ['id' => $contact->id]) }}">
                    @csrf

                      <div class="form-group">
                        <input class="btn btn-info" type="submit" value="変更する">
                      </div>
                    </form>

                    <form method="POST" action="{{ route('contact.destroy', ['id' => $contact->id]) }}" id="delete_{{ $contact->id }}">
                    @csrf
                      <a href="#" class="btn btn-danger" data-id="{{ $contact->id }}" onclick="deletePost(this);">削除する</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  // 削除ボタンを押したら確認メッセージを表示
  function deletePost(e) {
    'use strict';
    if (confirm('本当に削除してもいいですか？')) {
      document.getElementById('delete_' + e.dataset.id).submit();
      console.log('delete_' + e.datasete.id);
    }
  }
</script>

@endsection