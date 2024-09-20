<x-layouts.contact_index title="お問い合わせ">
  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
      <form class="form" action="{{ route('confirm') }}" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name" value="{{ old('name') }}" placeholder="お名前を入力してください" />
            </div>
            @if ($errors->has('name'))
              <div class="form__error">
                {{ $errors->first('name') }}
              </div>
            @endif
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" value="{{ old('email') }}" placeholder="example@abc.com" />
            </div>
            @if ($errors->has('email'))
              <div class="form__error">
                {{ $errors->first('email') }}
              </div>
            @endif
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="tel" name="tel" value="{{ old('tel') }}" placeholder="09012345678" />
            </div>
            @if ($errors->has('tel'))
              <div class="form__error">
                {{ $errors->first('tel') }}
              </div>
            @endif
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" placeholder="資料の送付をお願いしたいです。（1000文字以内）">{{ old('content') }}</textarea>
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送 信</button>
        </div>
      </form>
    </div>
  </main>
</x-layouts.cotact>