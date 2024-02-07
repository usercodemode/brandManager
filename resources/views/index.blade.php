<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header>
        <nav>
            <div class="h-20 p-6 m-1 text-xl font-bold text-gray-600 bg-white border-2 border-gray-400 rounded-b-lg shadow-md">
                <a href="/" class="">LOGO</a> 
            </div>
        </nav>
    </header>
    <section>
        <div class="container px-4 mx-auto">

        <div class="grid grid-cols-2 gap-4 p-4 sm:grid-cols-3 md:grid-cols-4">
            @foreach ($brands->sortByDesc('updated_at') as $brand)
            <a href="{{ $brand->brandSite }}" class="p-2 text-center bg-white rounded-lg shadow-md hover:bg-gray-200">
                <img src="{{ asset('images/' . $brand->brandLogo) }}" class="p-1" />

                <p class="sm:text-2xl">{{ $brand->brandName }}</p>
                <p class="hidden sm:block text-xs italic text-blue-500">{{ $brand->brandSite }}</p>
            </a>
            @endforeach
            
           
        </div>
        
    </section>
    <footer></footer>
</body>
</html>