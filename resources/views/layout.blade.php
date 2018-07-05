
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Простой одностраничный шаблон для фотогалереи, портфолио и многого другого.">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Альбом | Album example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">
</head>

<body>
@include('layouts.nav')

<main role="main">
@yield('content')
</main>
@include('layouts.footer')

</body>
</html>