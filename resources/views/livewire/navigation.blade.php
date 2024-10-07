<div>
  <!-- Top Bar
  ============================================= -->
  <div id="top-bar">
    <div class="container">

      <div class="row justify-content-between">
        <div class="col-12 col-md-auto">

          <!-- Top Social
      ============================================= -->
          <ul id="top-social">
            <li><a href="#" class="h-bg-facebook"><span class="ts-icon"><i
                    class="fa-brands fa-facebook-f"></i></span><span class="ts-text">Facebook</span></a></li>
            {{-- <li><a href="#" class="h-bg-twitter"><span class="ts-icon"><i
                    class="fa-brands fa-twitter"></i></span><span class="ts-text">Twitter</span></a></li> --}}
            {{-- <li><a href="#" class="h-bg-dribbble"><span class="ts-icon"><i
                    class="fa-brands fa-dribbble"></i></span><span class="ts-text">Dribbble</span></a></li> --}}
            {{-- <li><a href="#" class="h-bg-github"><span class="ts-icon"><i
                    class="fa-brands fa-github"></i></span><span class="ts-text">Github</span></a></li> --}}
            {{-- <li><a href="#" class="h-bg-pinterest"><span class="ts-icon"><i
                    class="fa-brands fa-pinterest-p"></i></span><span class="ts-text">Pinterest</span></a></li> --}}
            <li><a href="#" class="h-bg-instagram"><span class="ts-icon"><i
                    class="fa-brands fa-instagram"></i></span><span class="ts-text">Instagram</span></a></li>
          </ul><!-- #top-social end -->

        </div>

        <div class="col-12 col-md-auto">

          <!-- Top Links
      ============================================= -->
          <div class="top-links">
            <ul class="top-links-container">
              <li class="top-links-item"><a href="faqs.html">FAQs</a></li>
              <li class="top-links-item"><a href="contact.html">Contact</a></li>
            </ul>
          </div><!-- .top-links end -->

        </div>
      </div>

    </div>
  </div><!-- #top-bar end -->

  <!-- Header
  ============================================= -->
  <header id="header" class="header-size-sm" data-sticky-shrink="false">
    <div class="container mb-2">
      <div class="header-row">

        <!-- Logo
     ============================================= -->
        <div id="logo" class="ms-auto ms-lg-0 me-lg-auto">
          <a href="{{ route('home') }}">
            <img class="logo-default" srcset="{{ asset('img/logo.png') }}, demos/construction/images/logo@2x.png 2x"
              src="demos/construction/images/logo@2x.png" alt="Kouro">
          </a>
        </div><!-- #logo end -->

        <div class="header-misc d-none d-lg-flex">

          <ul class="header-extras">
            <li>
              <i class="i-plain bi-whatsapp m-0"></i>
              <div class="he-text">
                Llamanos
                <span>(11) 4627-5723</span>
              </div>
            </li>
            <li>
              <i class="i-plain bi-envelope m-0"></i>
              <div class="he-text">
                Escribinos
                <span>kouroarg@gmail.com</span>
              </div>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div id="header-wrap" class="bg-black">
      <div class="container">
        <div class="header-row justify-content-between flex-row-reverse flex-lg-row justify-content-lg-center">

          <div class="header-misc">

            <!-- Top Search
       ============================================= -->
            {{-- <div id="top-search" class="header-misc-icon">
              <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
            </div><!-- #top-search end --> --}}

            <div id="top-search" class="header-misc-icon">
              <a href="{{ route('carrito') }}" class="relative" role="button">
                <img src="{{ asset('img/carrito.svg') }}" alt="Carrito" class="w-10" title="Carrito">
                @if ($carrito > 0)
                  <span class="">
                    <span class="">
                      {{ $carrito }}
                    </span>
                  </span>
                @endif
              </a>
            </div>

          </div>

          <div class="primary-menu-trigger">
            <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
              <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
            </button>
          </div>

          <!-- Primary Navigation
      ============================================= -->
          <nav class="primary-menu with-arrows">

            <ul class="menu-container">
              <li class="menu-item"><a
                  class="menu-link @if (request()->is('/')) text-danger fw-bold @else text-dark @endif"
                  href="{{ route('home') }}">
                  <div>Home</div>
                </a></li>

              <li class="menu-item"><a
                  class="menu-link @if (request()->is('destacados')) text-danger fw-bold @else text-dark @endif"
                  href="{{ route('productos.destacados') }}">
                  <div>Destacados</div>
                </a></li>

              <li class="menu-item"><a
                  class="menu-link @if (request()->is('nosotros')) text-danger fw-bold @else text-dark @endif"
                  href="{{ route('nosotros') }}">
                  <div>Sobre Nosotros</div>
                </a></li>

              <li class="menu-item"><a
                  class="menu-link @if (request()->is('sucursales')) text-danger fw-bold @else text-dark @endif"
                  href="{{ route('sucursales') }}">
                  <div>Sucursales</div>
                </a></li>

              <li class="menu-item"><a
                  class="menu-link @if (request()->is('preguntas-frecuentes')) text-danger fw-bold @else text-dark @endif"
                  href="{{ route('faqs.index') }}">
                  <div>Preguntas frecuentes</div>
                </a></li>

              <li class="menu-item"><a
                  class="menu-link @if (request()->is('contacto')) text-danger fw-bold @else text-dark @endif"
                  href="{{ route('contacto') }}">
                  <div>Contacto</div>
                </a></li>
              {{-- <li class="menu-item">
                <div>

                  <a href="{{ route('carrito') }}" class="relative" role="button">
                    <img src="{{ asset('img/carrito.svg') }}" alt="Carrito" class="w-8">
                    @if ($carrito > 0)
                      <span class="">
                        <span class="">
                          {{ $carrito }}
                        </span>
                      </span>
                    @endif
                  </a>....
                </div>
              </li> --}}
            </ul>

          </nav><!-- #primary-menu end -->

          {{-- <form class="top-search-form" action="search.html" method="get">
            <input type="text" name="q" class="form-control" value=""
              placeholder="Type &amp; Hit Enter.." autocomplete="off">
          </form> --}}


        </div>
      </div>
    </div>
    <div class="header-wrap-clone"></div>
  </header><!-- #header end -->

</div>
