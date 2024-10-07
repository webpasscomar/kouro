  <!-- Footer
  ============================================= -->
  <footer id="footer" class="dark">
    <div class="container">

      <!-- Footer Widgets
    ============================================= -->
      <div class="footer-widgets-wrap">

        <div class="row">
          <div class="col-lg-9">
            <div class="widget">

              <img src="{{ asset('img/logo.png') }}" alt="Kouro" class="alignleft"
                style="margin-top: 8px; padding-right: 18px; border-right: 1px solid #4A4A4A;">

              <p><strong>Kouro</strong> 'Línea fina', más de 30 años brindando atención personalizada y especializada.
              </p>

              <div class="line" style="margin: 30px 0;"></div>

              <div class="row col-mb-30">
                <div class="col-lg-3 col-6 widget_links">
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </div>

                <div class="col-lg-3 col-6 widget_links">
                  <ul>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Forums</a></li>
                  </ul>
                </div>

                <div class="col-lg-3 col-6 widget_links">
                  <ul>
                    <li><a href="#">Corporate</a></li>
                    <li><a href="#">Agency</a></li>
                    <li><a href="#">eCommerce</a></li>
                    <li><a href="#">Personal</a></li>
                    <li><a href="#">One Page</a></li>
                  </ul>
                </div>

                <div class="col-lg-3 col-6 widget_links">
                  <ul>
                    <li><a href="#">Restaurant</a></li>
                    <li><a href="#">Wedding</a></li>
                    <li><a href="#">App Showcase</a></li>
                    <li><a href="#">Magazine</a></li>
                    <li><a href="#">Landing Page</a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-3 mt-5 mt-lg-0">
            <div class="widget">

              <div class="row col-mb-30">
                <div class="col-12">
                  <div class="footer-contacts">
                    <span>Llamanos al:</span><br>
                    (11) 4627-5723
                  </div>
                </div>

                <div class="col-12">
                  <div class="footer-contacts">
                    <span>Escribinos:</span><br>
                    kouroarg@gmail.com
                  </div>
                </div>
              </div>

            </div>


            <div class="widget subscribe-widget">

              <div class="row col-mb-30">
                <div class="col-12 col-sm-6">
                  <a href="#" class="social-icon bg-dark h-bg-facebook mb-0 me-3">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>
                  <a href="#"><small class="d-block"><strong>Síguenos</strong><br>en Facebook</small></a>
                </div>
                <div class="col-12 col-sm-6">
                  <a href="#" class="social-icon bg-dark h-bg-rss mb-0 me-3">
                    <i class="fa-solid fa-rss"></i>
                    <i class="fa-solid fa-rss"></i>
                  </a>
                  <a href="#"><small class="d-block"><strong>Síguenos</strong><br>en Instagram</small></a>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div><!-- .footer-widgets-wrap end -->
    </div>

    <!-- Copyrights
   ============================================= -->
    <div id="copyrights">
      <div class="container">

        <div class="row justify-content-between col-mb-30">
          <div class="col-12 col-md-auto text-center text-md-start">
            Copyrights &copy; {{ date('Y') }} - Todos los derechos reservados.<br>
            <div class="copyright-links"><a href="#">Terminos de uso</a> / <a href="#">Política de
                privacidad</a></div>
          </div>

          <div class="col-12 col-md-auto text-center text-md-end">
            <div class="copyrights-menu copyright-links">
              <a href="{{ route('home') }}">Home</a>/<a href="{{ route('productos.destacados') }}">Destacados</a>/<a
                href="{{ route('nosotros') }}">Nosotros</a>/<a href="{{ route('sucursales') }}">Sucursales</a>/<a
                href="{{ route('faqs.index') }}">FAQs</a>/<a href="{{ route('contacto') }}">Contacto</a>
            </div>
          </div>
        </div>

      </div>
    </div><!-- #copyrights end -->
  </footer><!-- #footer end -->
