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
            <div
                class="h-20 p-6 m-1 text-xl font-bold text-gray-600 bg-white border-2 border-gray-400 rounded-b-lg shadow-md">
                <a href="/">LOGO</a>
            </div>
        </nav>
    </header>
    <section>
        <div class="container px-4 mx-auto">




            <div class="p-4 mt-4 rounded-lg shadow-md bg-cyan-100">
                Welcome {{ auth()->user()->name }}
            </div>
            <div class="mt-1">
                <form class="inline float-end" method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 hover:text-white">Logout</button>
                </form>
                <div class="clear-right"></div>
            </div>


            <div class="rounded-lg mt-11 p4">
                <div class="p-5 bg-white shadow-md login rounded-2xl">
                    <form method="POST" action="/update/{{ $brand->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label class="block">

                            <span class="block text-sm font-medium text-slate-700">Brand name</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="text" name="brandName" placeholder="..." value="{{ $brand->brandName }}"
                                class="block w-1/2 px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />

                            @error('brandName')
                                <div class="mt-2 text-sm italic text-red-500 invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror


                            <span class="block text-sm font-medium text-slate-700">Brand site</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="text" name="brandSite" placeholder="..." value="{{ $brand->brandSite }}"
                                class="block w-1/2 px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />

                            @error('brandSite')
                                <div class="mt-2 text-sm italic text-red-500 invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror




                            <span class="block text-sm font-medium text-slate-700">Upload Image</span>
                            <!-- Using form state modifiers, the classes can be identical for every input -->
                            <input type="file" name="brandLogo" placeholder="..." value="{{ old('brandLogo') }}"
                                accept=".jpg,.jpeg,.bmp,.png"
                                class="block w-1/2 px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />

                            @error('brandLogo')
                                <div class="mt-2 text-sm italic text-red-500 invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror



                            <button
                                class="bg-blue-600 hover:bg-blue-800 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 text-white fw-bold rounded-md mt-5 p-2">
                                UPDATE
                            </button>

                        </label>
                        <!-- ... -->
                    </form>

                    <form class="inline" method="POST" action="/delete/{{ $brand->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-800 active:bg-gray-700 focus:outline-none focus:ring focus:ring-violet-300 text-white fw-bold rounded-md mt-2">DELETE</button>
                    </form>

                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 p-4 sm:grid-cols-3 md:grid-cols-4">


                <a href="{{ $brand->brandSite }}" class="p-2 text-center bg-white rounded-lg shadow-md hover:bg-gray-200">
                    <img src="{{ asset('images/' . $brand->brandLogo) }}" class="p-1" />
    
                    <p class="sm:text-2xl">{{ $brand->brandName }}</p>
                    <p class="hidden text-xs italic text-blue-500 sm:block">{{ $brand->brandSite }}</p>
                </a>


            </div>
        </div>

    </section>
    <footer></footer>
</body>

</html>
