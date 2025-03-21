<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }

        .custom-toggler.navbar-toggler {
            border-color: #64A4D6;
        }

        .custom-toggler .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' %3E%3Cpath stroke='rgba(100, 164, 214, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24' /%3E%3C/svg%3E");
        }

        input[type="search"]::-webkit-input-placeholder {
            color: #1AA7EC;
        }

        input[type="search"]::-moz-placeholder {
            color: #1AA7EC;
        }
    </style>
</head>

<body style="background: linear-gradient(to top, #DAF1FE, white 20%)">
    <header class="border-bottom border-secondary p-3" style="background: linear-gradient(0.25turn, #1AA7EC 10%, #CAF0F8);">
        <nav class="navbar navbar-dark navbar-expand-md">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('main')}}" style="color: #eaf0f1">
                    <img src="{{asset('logo.png')}}" alt="" width="45" height="50" class="d-inline-block align-center-top">
                    Q&A Hub
                </a>
                <button class="navbar-toggler custom-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav">
                        @guest
                        <a class="nav-link" href="{{route('login')}}">Вход</a>
                        <a class="nav-link" href="{{route('reg')}}">Регистрация</a>
                        @endguest
                        @auth
                        <a class="nav-link" href="{{route('client.index')}}">Личный кабинет</a>
                        <a class="nav-link" href="{{route('client.forms')}}">Голосования</a>
                        <form action="{{route('logout')}}" method="get">
                            @csrf
                            <button type="submit" class="nav-link">Добрый день, {{ $user->name }}, Выйти?</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">@yield('content')</main>
    <footer class="text-center text-secondary p-3">
        <div class="container-fluid">
            <span style="color: #95C1E6">Q&A Hub <br>2025</span>
        </div>
    </footer>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script>
        const searchInput = document.querySelector('input[name="search"]');
        const pollContainers = document.querySelectorAll('.poll-container');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            pollContainers.forEach(container => {
                const pollName = container.querySelector('h2').textContent.toLowerCase();
                if (pollName.includes(searchTerm) || searchTerm === "") {
                    container.style.display = 'block';
                } else {
                    container.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>