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
    <div class="category-create">
      <form class="category-create__form" action="{{ route('category-store') }}" method="post">
        @csrf
        <input class="category-create__input" type="text" name="name" placeholder="カテゴリを入力してください">
        <button class="c-btn c-btn--create" type="submit">作成</button>
      </form>
    </div>
    <div class="category-list">
      <h2 class="category-list__title">カテゴリ</h2>
      <ul class="category-list__table">
        @foreach ($categories as $category)
        <li class="category-list__item">
          <form id="form-update-{{ $category->id }}" class="category-list__form-update" action="{{ route('category-update', $category->id) }}" method="post">
            @method('patch')
            @csrf
            <input type="text" name="name" value="{{ $category->name }}" placeholder="{{ $category->name }}">
            <button class="category-list__btn-update c-btn c-btn--update" type="button" onclick="confirmUpdate('{{ $category->id }}', '{{ $category->name }}')">更新</button>
          </form>
          <form id="form-delete-{{ $category->id }}" class="category-list__form-delete action=" action="{{ route('category-delete', $category->id) }}" method="post">
            @method('delete')
            @csrf
            <button class="category-list__btn-delete c-btn c-btn--delete" type="button" onclick="confirmDelete('{{ $category->id }}', '{{ $category->name }}')">削除</button>
          </form>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</main>
@endsection