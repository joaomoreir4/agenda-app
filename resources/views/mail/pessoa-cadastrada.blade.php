<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device.width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: white; margin: 0; padding: 20px; }
        h1 { color: white; font-size: 1.25em; margin: 0; }
        h2 { font-size: 1.1em; margin-bottom: 10px; }
        ul { list-style: none; margin-bottom: 20px; padding-left: 0; }
        li { margin-bottom: 5px; font-size: 14px; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px 15px; font-size: 13px; letter-spacing: 0.05em; color: #2D3E33; border-bottom: 1px solid #507D60; border-right: 1px solid rgb(138, 138, 138); background-color: #BCC8B9; width: 50%;}
        td { padding: 12px 15px; font-size: 14px; color: white; border-bottom: 1px solid #9BBAA6; }
        tr:last-child td { border-bottom: none; }
        
        .container { max-width: 600px; margin: 0 auto; border-radius: 8px; overflow: hidden; }
        .header { background-color: #507D60; padding: 30px 24px; text-align: center; }
        .data { padding: 24px; background-color: #9BBAA6 }
        .contacts { padding: 0; } 
    </style>
</head>
<body class="container">
    <div class="header">
        <h1>Uma nova pessoa foi registrada no sistema!</h1>
    </div>
    
    <div class="data">
        <h2>Dados pessoais:</h2>
        <ul>
            <li><strong>Nome:</strong> {{ $nome }}</li>
            <li><strong>Endereço:</strong> {{ $endereco }}</li>
            <li><strong>Data de Nascimento:</strong> {{ $data_nasc }}</li>
        </ul>
    </div>
    <div class="contacts">
        <table>
            <tr>
                <th>TIPO:</th>
                <th>CONTATO:</th>
            </tr>
            @foreach ($contatos as $contato)
                <tr>      
                    <th>{{ $contato['tipo_registro'] }}</th>
                    <th>{{ $contato['contato'] }}</th>
                </tr>
            @endforeach
        </table>
    </div> 
</body>

