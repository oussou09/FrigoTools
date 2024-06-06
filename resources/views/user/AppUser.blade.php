<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    #logout-form{
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
</style>
  @yield('style')
  <title>Frigo Tools</title>
</head>

<body id="top">

  <!--
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="{{ route('home.home') }}" class="logo">
        <img src="{{ asset('images/frigo-tools-logo.png') }}" width="160" height="50" alt="figo-toolso">
      </a>

      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="./assets/images/logo.svg" width="190" height="50" alt="Footcap logo">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="{{ route('home.home') }}" class="navbar-link">Home</a>
          </li>

          <li class="navbar-item">
            <a href="{{ route('home.about') }}" class="navbar-link">About</a>
          </li>

        </ul>

        <ul class="nav-action-list">

            @if (Auth::guard('user')->check())
            <li>
                <a style="cursor: pointer" class="nav-action-btn">
                    <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                    <span class="nav-action-text">{{ Auth::guard('user')->user()->name }}</span>
                    <h5>{{ Auth::guard('user')->user()->name }}</h5>
                </a>
            </li>
            <li>
                <button class="nav-action-btn">
                  <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>

                  <span class="nav-action-text">Wishlist</span>

                  <data class="nav-action-badge" value="5" aria-hidden="true">
                        {{ Auth::guard('user')->user()->likes()->count() }}
                  </data>
                </button>
              </li>

              <li style="margin-left: 10px;">
                <button class="nav-action-btn">
                  <ion-icon name="bag-outline" aria-hidden="true"></ion-icon>

                  <data class="nav-action-text" value="318.00">Basket: <strong>$...</strong></data>

                  <data class="nav-action-badge" value="4" aria-hidden="true">?</data>
                </button>
              </li>
            <li style="margin-left: 10px;">
                <form id="logout-form" action="{{ route('user.logoutuser') }}" method="POST">
                    <ion-icon style="font-size: 25px" name="log-out-outline" aria-hidden="true"></ion-icon>
                    {{--  --}}
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </li>
            @else
                <a href="{{ route('user.registeruser') }}" class="nav-action-btn">
                    <ion-icon name="person-circle-outline" aria-hidden="true"></ion-icon>

                    <span class="nav-action-text"><strong>Login / Register</strong></span>
                </a>
            @endif

        </ul>

      </nav>

    </div>
  </header>





  <main>
    @yield('content')
  </main>





  <!--
    - #FOOTER
  -->

  <footer class="footer">

    <div style="margin: 0px" class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a class="logo">
            <img src="{{ asset('images/frigo-tools-logo.png') }}" width="160" height="50" alt="Footcap logo">
          </a>

          <ul class="social-list">

            <li>
              <a class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Contact Us</p>
            </li>

            <li>
              <address class="footer-link">
                <ion-icon name="location"></ion-icon>

                <span class="footer-link-text">
                  2751 S CasaBlanca Rd, CO 80014, Morocco
                </span>
              </address>
            </li>

            <li>
              <a href="tel:+557343673257" class="footer-link">
                <ion-icon name="call"></ion-icon>

                <span class="footer-link-text">+2123436732570</span>
              </a>
            </li>

            <li>
              <a href="mailto:footcap@help.com" class="footer-link">
                <ion-icon name="mail"></ion-icon>

                <span class="footer-link-text">frigotools@help.com</span>
              </a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">My Account</p>
            </li>

            <li>
              <a class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">My Products</span>
              </a>
            </li>

            <li>
              <a class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">View Cart</span>
              </a>
            </li>

            <li>
              <a class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">Wishlist</span>
              </a>
            </li>

          </ul>

          <div class="footer-list">

            <p class="footer-list-title">Opening Time</p>

            <table class="footer-table">
              <tbody>

                <tr class="table-row">
                  <th class="table-head" scope="row">Mon - Tue:</th>

                  <td class="table-data">8AM - 10PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Wed:</th>

                  <td class="table-data">8AM - 7PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Fri:</th>

                  <td class="table-data">7AM - 12PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Sat:</th>

                  <td class="table-data">9AM - 8PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Sun:</th>

                  <td class="table-data">Closed</td>
                </tr>

              </tbody>
            </table>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Newsletter</p>

            <p class="newsletter-text">
              Authoritatively morph 24/7 potentialities with error-free partnerships.
            </p>

            <form action="" class="newsletter-form">
              <input type="email" name="email" required placeholder="Email Address" class="newsletter-input">

              <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>

          </div>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 <a href="{{ route('home.home') }}" class="copyright-link">Frigo Tools</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>





  <!--
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>





  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
