<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
<form method="POST" action="{{ route('create.message') }}">
    @csrf
    <div>
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
        <span role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <span role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
        @error('message')
        <span role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="checkbox" id="consent" name="consent" {{ old('consent') ? 'checked' : '' }} checked required>
        <label for="consent">Согласие на обработку персональных данных</label>
        @error('consent')
        <span role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Отправить</button>
    </div>
</form>
</body>

</html>


