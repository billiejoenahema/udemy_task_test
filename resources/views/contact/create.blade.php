@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                      @csrf
                      <div class="form-group">
                        <label>氏名</label>
                        <input type="text" name="your_name">
                      </div>
                      <div class="form-group">
                        <label>件名</label>
                        <input type="text" name="title">
                      </div>

                      <div class="form-group">
                        <label>メールアドレス</label>
                        <input type="email" name="email">
                      </div>

                      <div class="form-group">
                        <label>ホームページ</label>
                        <input type="url" name="url">
                      </div>

                      <div class="form-group form-check form-check-inline">
                        <span>性別</span>
                        <input class="ml-3 form-check-label" type="radio" name="gender" value="0">
                        <label class="form-check-label">男性</label>
                        <input class="ml-3 form-check-label" type="radio" name="gender" value="1">
                        <label class="form-check-label">女性</label>
                      </div>

                      <div class="form-group">
                      <label>年齢</label>
                        <select name="age">
                          <option value="">選択してください</option>
                          <option value="1">〜19歳</option>
                          <option value="2">20〜29歳</option>
                          <option value="3">30〜39歳</option>
                          <option value="4">40〜49歳</option>
                          <option value="5">50〜59歳</option>
                          <option value="6">60歳〜</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>お問い合わせ内容</label>
                        <br>
                        <textarea name="contact"></textarea>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="caution" value="1">
                          <label>注意事項に同意する</label>
                      </div>

                      <div class="form-group">
                        <input class="btn btn-info" type="submit" value="登録する">
                      </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection