<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  @yield('style')

  <style>
    #logout-form{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
    align-items: center;
    gap: 6px;
    }
    #logout-form:hover{
        color: #FF8075;
    }
    .logout-button:hover{
        color: #FF8075;
    }
  </style>


  <title>Frigo Tools</title>
</head>

<body id="top">

  <!--
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a class="logo">
        <img src="{{ asset('images/frigo-tools-logo.png') }}" width="160" height="50" alt="frigo-tools logo">
      </a>

      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="{{ asset('images/frigo-tools-logo.png') }}" width="190" height="50" alt="frigo-tools logo">
        </a>

        <ul class="navbar-list">

            <li class="navbar-item">
                <a href="{{ route('admin.index') }}" class="navbar-link">Home</a>
            </li>

          <li class="navbar-item">
            <a href="{{ route('admin.index') }}" class="navbar-link">Products</a>
          </li>

          <li class="navbar-item">
            <a href="{{ route('admin.category') }}" class="navbar-link">Category</a>
          </li>

        </ul>

        <ul class="nav-action-list">

            <li>
                <a style="cursor: pointer" class="nav-action-btn">
                    <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                    <span class="nav-action-text">{{ Auth::guard('admin')->user()->FullName }}</span>
                    <h5>{{ Auth::guard('admin')->user()->FullName }}</h5>
                </a>
            </li>
            <li>
                <form id="logout-form" action="{{ route('admin.logoutAdmin') }}" method="POST">
                    <ion-icon style="font-size: 25px" name="log-out-outline" aria-hidden="true"></ion-icon>
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </li>


        </ul>

      </nav>

    </div>
  </header>



@yield('content')


  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
