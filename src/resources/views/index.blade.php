@extends('layouts.app')
@section('content')
<main>
  @if (session('success_msg'))
  <div class="success-msg">
    <p>{{ session('success_msg') }}</p>
  </div>
  @endif
  @if ($errors->first())
  <div class="error-msg">
    <p>{{ $errors->first() }}</p>
  </div>
  @endif
  <div class="l-container">
    <div class="todo-create">
      <form class="todo-create__form" action="{{ route('store') }}" method="post">
        @csrf
        <input class="todo-create__input" type="text" name="content" placeholder="Todoを入力してください">
        <button class="c-btn c-btn--create" type="submit">作成</button>
      </form>
    </div>
    <div class="todo-list">
      <h2 class="todo-list__title">Todo</h2>
      <ul class="todo-list__table">
        @foreach ($todos as $todo)
        <li class="todo-list__item">
          <form class="todo-list__form-update" action="{{ route('update', $todo->id) }}" method="post">
            @csrf
            <input type="text" name="content" value="{{ $todo->content }}">
            <button class="todo-list__btn-update c-btn c-btn--update" type="submit">更新</button>
          </form>
          <form class="todo-list__form-delete action=" action="{{ route('delete', $todo->id) }}" method="post">
            @csrf
            <button class="todo-list__btn-delete c-btn c-btn--delete" type="submit">削除</button>
          </form>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</main>
@endsection