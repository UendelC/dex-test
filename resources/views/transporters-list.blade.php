<html>
    <head>
        <title>Transporters List</title>
    </head>
    <body>
        <h1>Lista de Transportadores</h1>
        Nome - Limite de Crédito
        <ul>
            @foreach ($transporters as $transporter)
                <li>{{ $transporter->name }} - {{ $transporter->credit_limit }}</li>
            @endforeach
        </ul>
    </body>
</html>
