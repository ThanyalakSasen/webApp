<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: Noto_sans_thai;
            src: url("../Noto_Sans_Thai/NotoSansThai-VariableFont_wdth,wght.ttf");
        }
        body{
            font-family: "Noto_sans_thai",sans-serif;
            margin: 0px;
        }
        header{
                display: flex;
                background-color: #ffffff;
                color: #011b60;
                box-shadow: 0px 2px 15px black;
                padding: 15px;
                width: 100%;
            justify-content: center;
            }
            header h3{
                width: 70%;
            }

            header a img{
 
                width: 60px;
                height: auto;
            }
            nav a{
                margin-right: 30px;
                color: #011b60;
                text-decoration: none;
                font-weight: bold;
            }
            nav{
                margin-top: auto;
                margin-bottom: auto;
            }
        section{
            display: flex;
            align-items: center;
            justify-content:center;
            width: 100%;
        }
        form{
            width: 50%;
            background-color: aliceblue;
            border: 1px solid black;
            border-radius: 10px;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .main h2{
            text-align: center
        }
        .main .forgotpass{
            text-align: end;
            font-size: small
        }
        .btn{
            background-color: #011b60;
            border-radius: 10px;

        }
    </style>
</head>
<body>
    <header>
        <a href="{{url('../welcome')}}"><img src="../../img/logo.png" alt=""></a>
            <h3>ParkingZone</h3>
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >Dashboard</a>
                @else

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >สมัครสมาชิก</a>
                    @endif
                @endauth
            </nav>
        @endif

    </header>
    <section class="mt-5">
        {{-- <x-validation-errors class="mb-4" />
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{-- {{ $value }} --}}
            {{-- </div>
        @endsession --}}
        
        <form method="POST" action="{{ route('login') }}">
            
            @csrf
            <div class="main">
                <h2 class="fw-bold fs-center">เข้าสู่ระบบ</h2>
                <div>
                    <x-label for="email" value="{{ __('Email') }}" /><br>
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
                
                <div class="mt-1">
                    <x-label for="password" value="{{ __('Password') }}" /><br>
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
                    <div class="forgotpass">
                        @if (Route::has('password.request'))
                        <a class="text-decoration-none text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                    <div class="sub-forgot">
                        <label for="remember_me" class="flex items-center justify-start">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                <div class="d-flex items-center justify-end mt-4">
                        <x-button class="ms-4 btn">
                            {{ __('Log in') }}
                        </x-button>
                </div>

            </div>
        </form>
    </section>
    
</body>
</html>

        

