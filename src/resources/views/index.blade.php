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
    <div class="todo-top">
      <h2 class="todo-top__title">新規作成</h2>
      <form class="todo-top__form" action="{{ route('store') }}" method="post">
        @csrf
        <input class="todo-top__input" type="text" name="content" value="{{ old('content') }}" placeholder="Todoを入力してください">
        <select class="todo-top__select" type="select" name="category_id">
          <option value="">カテゴリを選択</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : ''}}>{{ $category->name }}</option>
          @endforeach
        </select>
        <button class="c-btn c-btn--create" type="submit">作成</button>
      </form>
    </div>
    <div class="todo-top">
      <h2 class="todo-top__title">Todo検索</h2>
      <form class="todo-top__form" action="{{ route('search') }}" method="post">
        @csrf
        <input class="todo-top__input" type="text" name="content" placeholder="{{ !empty($content) ? $content : 'Todoを入力してください' }}">
        <select class="todo-top__select" type="select" name="category_id">
          <option value="">カテゴリを選択</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" 
          @if (isset($categoryId)){{ $category->id == $categoryId ? 'selected' : '' }}@endif>{{ $category->name }}</option>
          @endforeach
        </select>
        <button class="c-btn c-btn--create" type="submit">検索</button>
      </form>
    </div>
    <table class="todo-table">
      <thead>
        <tr>
          <th class="todo-table__title">
            <span>Todo</span><span>カテゴリ</span>
          </th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($todos as $todo)
        <tr class="todo-table__row">
          <td class="todo-table__item">
            <form id="form-update-{{ $todo->id }}" class="todo-table__form-update" action="{{ route('update', $todo->id) }}" method="post">
            @method('patch')
              @csrf
              <input type="text" name="content" value="{{ $todo->content }}" placeholder="{{ $todo->content }}">
              <select class="todo-table__select" type="select" name="category_id">
                <option value="">カテゴリを選択</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $todo->category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
              </select>
              {{-- <p>{{ $todo->category->name }}</p> --}}
              <button class="todo-table__btn-update c-btn c-btn--update" type="button" onclick="confirmUpdate('{{ $todo->id }}', '{{ $todo->content }}')">更新</button>
            </form>
          </td>
          <td class="todo-table__item">
            <form id="form-delete-{{ $todo->id }}" class="todo-table__form-delete action=" action="{{ route('delete', $todo->id) }}" method="post">
              @method('delete')
              @csrf
              <button class="todo-table__btn-delete c-btn c-btn--delete" type="button" onclick="confirmDelete('{{ $todo->id }}', '{{ $todo->content }}')">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </div>
  </div>
</main>
@endsection