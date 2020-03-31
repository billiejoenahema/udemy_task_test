@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('contact.update', ['id' => $contact->id]) }}">
                    @csrf

                    <div class="form-group">
                        <label>氏名</label>
                        <input type="text" name="your_name" value="{{ $contact->your_name }}">
                      </div>
                      <div class="form-group">
                        <label>件名</label>
                        <input type="text" name="title" value="{{ $contact->title }}">
                      </div>

                      <div class="form-group">
                        <label>メールアドレス</label>
                        <input type="email" name="email" value="{{ $contact->email }}">
                      </div>

                      <div class="form-group">
                        <label>ホームページ</label>
                        <input type="url" name="url" value="{{ $contact->url }}">
                      </div>

                      <div class="form-group form-check form-check-inline">
                        <span>性別</span>
                        <input class="ml-3 form-check-label" type="radio" name="gender" value="0"
                        @if($contact->gender === 0) checked @endif >
                        <label class="form-check-label">男性</label>
                        <input class="ml-3 form-check-label" type="radio" name="gender" value="1"
                        @if($contact->gender === 1) checked @endif >
                        <label class="form-check-label">女性</label>
                      </div>

                      <div class="form-group">
                      <label>年齢</label>
                        <select name="age">
                          <option value="">選択してください</option>
                          <option value="1" @if($contact->age === 1) selected @endif >〜19歳</option>
                          <option value="2" @if($contact->age === 2) selected @endif >20〜29歳</option>
                          <option value="3" @if($contact->age === 3) selected @endif >30〜39歳</option>
                          <option value="4" @if($contact->age === 4) selected @endif >40〜49歳</option>
                          <option value="5" @if($contact->age === 5) selected @endif >50〜59歳</option>
                          <option value="6" @if($contact->age === 6) selected @endif >60歳〜</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>お問い合わせ内容</label>
                        <br>
                        <textarea name="contact">{{ $contact->contact }}</textarea>
                      </div>

                    <div class="form-group">
                      <input class="btn btn-info" type="submit" value="更新する">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection