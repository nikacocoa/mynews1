<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>プロフィール</title>
</head>
<body>
    <div class="container">
        <h1>プロフィール</h1>
        <p>名前: {{ $profile['name'] }}</p>
        <p>メールアドレス: {{ $profile['email'] }}</p>
    </div>
</body>
</html>
