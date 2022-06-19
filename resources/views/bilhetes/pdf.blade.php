<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tailwind CSS Invoce </title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>


    </head>

    <body>
        <div class="flex items-center justify-center min-h-screen items-center align-center bg-gray-100 ">
            <div class="object-scale-down">
                Nome: {{$user->name}}
                <br>
                <img class="h-20 mt-5  rounded-full" src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('img/default_img.png') }}">

                <img class="h-20 mt-5 ml-5" src="data:image/png;base64, {!! base64_encode(QrCode::size(200)->generate('http://projetoai.test/filmes/'.$filme->id.'/'.$sessao->id.'/'.$lugar->id)) !!}">
            </div>
            <div class="w-3/5 bg-white shadow-lg">
                </div>
                <div class="flex justify-center p-4">
                    <div class="border-b border-gray-200 shadow">
                     
                                    <p class="px-6 py-4 text-sm text-gray-500">
                                    Id do bilhete: {{$bilhete->id}}
                                    </p>
                                    <p class="px-6 py-4 text-sm text-gray-500">
                                    Filme: {{$filme->titulo}}
                                    </p>
                                    <p class="px-6 py-4">
                    
                                        Sala: {{$sala->nome}}
                                    
                                    </p>
                                    <p class="px-6 py-4 text-sm text-gray-500">
                                    Data: {{$recibo->data}}
                                    </p>
                                    <p class="px-6 py-4 text-sm text-gray-500">
                                    Horario:  {{$sessao->horario_inicio}}
                                    </p>
                                    <p class="px-6 py-4 text-sm text-gray-500">
                                    Lugar:  {{$lugar->fila}}-{{$lugar->posicao}}
                                    </p>
                    </div>
                </div>

            </div>
</html>
