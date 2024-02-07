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
                LOGO
            </div>
        </nav>
    </header>
    <section>
        <div class="container px-4 mx-auto">
    
                <div class="p-4 mt-4 bg-white rounded-lg shadow-md md:ml-4 md:w-1/2">
                    <form action="{{ route('register') }}" method="post">
    
                        @csrf
    
                        <label for="email" class="block mt-2">Email: </label>
    
                        <input type="text" class="w-1/2 p-2 my-2 bg-white border-2 rounded-lg" name="email"
                            id="email" placeholder="Email" />

                        
                    @error('email')
                    <div class="mt-2 text-sm italic text-red-500 invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
    
                        <label for="" class="block mt-2">Name: </label>
    
                        <input type="text" class="w-1/2 p-2 my-2 bg-white border-2 rounded-lg" name="name"
                            id="name" placeholder="Name" />

                    
                            @error('name')
                            <div class="mt-2 text-sm italic text-red-500 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
    
    
                        <label for="password" class="block">Password: </label>
                        <input type="password" class="w-1/2 p-2 my-2 bg-white border-2 rounded-lg" name="password"
                            id="password" placeholder="Password" />

                        
                    @error('password')
                    <div class="mt-2 text-sm italic text-red-500 invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
    
                        <label for="password_confirmation" class="block">Confirm Password: </label>
                        <input type="password" class="w-1/2 p-2 my-2 bg-white border-2 rounded-lg"
                            name="password_confirmation" id="password" placeholder="Password" />
    
                        <button type="submit"
                            class="block px-4 py-2 mt-2 text-white bg-blue-600 rounded-lg shadow-md">REGISTER</button>
                    </form>
                </div>

            </div>
            
            

        </div>

    </section>
    <footer></footer>
</body>

</html>
