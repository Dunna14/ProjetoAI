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

        <div class="flex items-center justify-center min-h-screen bg-gray-100 ">
            <div class="object-scale-down">
                Nome: {{$user->name}}
                <br>
                <img class="h-20 rounded-full" src="{{ $user->foto_url ? asset('storage/fotos/' . $user->foto_url) : asset('img/default_img.png') }}">
            </div>
            <div class="w-3/5 bg-white shadow-lg">
                </div>
                <div class="flex justify-center p-4">
                    <div class="border-b border-gray-200 shadow">
                        <table class="">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Id do bilhete
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Filme
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Sala
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Data
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Horario
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Lugar
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$bilhete->id}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$filme->titulo}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$sala->nome}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$recibo->data}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$sessao->horario_inicio}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$lugar->fila}}-{{$lugar->posicao}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</html>
