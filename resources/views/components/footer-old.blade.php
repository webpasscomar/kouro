<div role="contentinfo" class="relative flex w-full flex-col text-gray-800 bg-slate-400 mt-20 justify-center p-10">

  <div class="flex mt-1 w-auto flex-col md:flex-row items-center justify-around">
    <img src="{{ asset('./img/logo2.png') }}" alt="logo kouro" class="w-24">
    {{-- Correo - Whatsapp  --}}
    <div class="flex mt-5 md:mt-0 flex-col md:items-stretch items-center md:flex-row gap-x-5 gap-y-3 md:gap-y-0">
      {{-- Correo  --}}
      <a href="mailto:kouroarg@gmail.com" class="flex items-center">
        <img src="{{ asset('./img/mail.svg') }}" alt="correo" class="w-6">
        <span class="ml-2" title="email">
          <strong class="text-base text-center font-semibold">kouroarg@gmail.com</strong>
        </span>
      </a>
      {{-- Whatsapp --}}
      <a href="https://wa.me/5491146275723" class="flex items-center mr-3" target="_blank" title="whatsapp">
        <img src="{{ asset('./img/whatsapp.svg') }}" alt="whatsapp" class="w-6">
        <span class="ml-2">
          <strong class="text-sm font-semibold">011 4627-5723</strong>
        </span>
      </a>
    </div>
    {{-- Redes Sociales  --}}
    <div class="flex gap-x-2 items-center mt-5 md:mt-0">
      <a href="" title="facebook">
        <img src="{{ asset('./img/facebook.svg') }}" alt="facebook" class="w-6">
      </a>
      <a href="" title="instagram">
        <img src="{{ asset('./img/instagram.svg') }}" alt="instagram" class="w-6">
      </a>
      <a href="" title="linkedin">
        <img src="{{ asset('./img/linkedin.svg') }}" alt="linkedin" class="w-6">
      </a>
    </div>
  </div>
  <div class="flex mt-5 justify-center">
    <p class="text-center"><strong>Kouro</strong> - © Copyright 2023 - Todos los derechos reservados.</p>
    <button
      class="absolute right-2 bottom-1 md:bottom-7 md:right-5 bg-slate-500 text-white p-3 rounded-full w-12 h-12 shadow shadow-slate-500 hover:bg-slate-600"
      id="btn-top"><i class="fas fa-chevron-up"></i>
    </button>
  </div>
</div>
