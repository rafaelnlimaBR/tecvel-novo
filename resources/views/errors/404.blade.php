<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tecvel - Página não encontrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <img src="{{URL::asset('/images/logo.png')}}" alt="" height="80">
        <h1 class="display-1 fw-bold">404</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> </p>
        <p class="lead">
            Página Não Encontrada
        </p>
        <a href="{{route('site.index')}}" class="btn btn-primary">Voltar ao início</a>
    </div>
</div>
</body>

</html>
