
<header class="header">
  <a href="{{ home_url('/') }}" class="logo-link">
    <img src="{{ get_theme_file_uri('/resources/images/logo0.svg') }}" alt="{{ get_bloginfo('name') }}" class="site-logo">
  </a>

  <div class="menu" >
    <p>Menu</p>
    <svg class="menu-icon rotate-90" width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="5.65128" width="21.8987" height="1.41282" fill="white"></rect>
                <rect width="21.8987" height="1.41282" fill="white"></rect>
                <rect y="11.3026" width="21.8987" height="1.41282" fill="white"></rect>
                <path d="M10.0659 23.8418C10.3588 24.1347 10.8336 24.1347 11.1265 23.8418L15.8995 19.0689C16.1924 18.776 16.1924 18.3011 15.8995 18.0082C15.6066 17.7153 15.1317 17.7153 14.8388 18.0082L10.5962 22.2509L6.35355 18.0082C6.06066 17.7153 5.58578 17.7153 5.29289 18.0082C5 18.3011 5 18.776 5.29289 19.0689L10.0659 23.8418ZM11.3462 23.3115V12.7154H9.84619V23.3115H11.3462Z" fill="white"></path>
            </svg>
</div>
 
  @include('partials.navigation')
</header>
