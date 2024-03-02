  <header id="header">

      <div class="container">
          <!--NAVIGATION START-->

          <div class="navigation-col">

              <nav class="navbar navbar-inverse">

                  <div class="navbar-header">

                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                          aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                      </button>

                      <strong class="logo"><a href="/"><img src="{{ asset('assets/images/kisor.png') }}"
                                  alt="logo" width="200" height="100"
                                  style="margin-bottom: -15px;margin-top: -24px;"></a></strong>

                      <div id="navbar" class="collapse navbar-collapse">

                          <ul class="nav navbar-nav" id="nav">
                              <li><a href="/">হোম</a></li>
                              <li><a href="/about-us">আমাদের সম্পর্কে</a></li>
                              <li><a href="http://67.205.135.141/amader-kishoreganj/">ই-কমার্স</a></li>
                              <li><a href="javascript:void(0);">সেবা</a>
                                  <ul>
                                      <li><a href="/doctor">ডাক্তার</a></li>
                                      {{-- <li><a href="javascript:void(0);">হাসপাতাল/ক্লিনিক</a></li> --}}
                                      {{-- <li><a href="/rent_car">ড্রাইভার</a></li> --}}
                                      <li><a href="/rent_car">গাড়ি ভাড়া</a></li>
                                  </ul>
                              </li>
                              <li><a href="javascript:void(0)">পেশাজীবী</a>
                                  <ul>
                                      <li><a href="/electrician">ইলেকট্রিশিয়ান</a></li>
                                      <li><a href="/lawyer">আইনজীবী</a></li>
                                      <li><a href="/beautician">বিউটিশিয়ান</a></li>
                                      <li><a href="/barbar">নাপিত</a></li>
                                  </ul>
                              </li>
                              <li><a href="https://digitalhat.amader-kishoreganj.com/">ডিজিটাল পশুর হাট</a></li>
                              <li><a href="/contact-us">যোগাযোগ </a></li>
                          </ul>

                      </div>

              </nav>

          </div>

          <!--NAVIGATION END-->

      </div>

      <!--USER OPTION COLUMN START-->

      <div class="user-option-col">
          <div class="dropdown-box">
              <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img
                          src="{{ asset('assets/images/option-icon.png') }}" alt="img">
                    </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    @if (auth()->guard('admin')->check())
                        <li>
                            <a href="{{ route('adminDashboard') }}" class="btn-login">Admin dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('adminLogout') }}" class="btn-login"><i class="fa fa-signout"></i>Logout</a>
                        </li>
                    @elseif (auth()->check())
                        <li>
                            <a
                                href="{{ route('userDashboard') }}" class="btn-login">User dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('userLogout') }}" class="btn-login"><i class="fa fa-signout"></i>Logout</a>
                        </li>
                    @else
                        <li>
                            <a href="/user/login" class="btn-login"><i class="fa fa-sign-in"></i> ইউজার লগইন</a>
                        </li>
                        <li>
                            <a href="{{ route('adminLogin') }}" class="btn-login">এডমিন লগইন</a>
                        </li>
                    @endif
                  </ul>
              </div>
          </div>
      </div>

      <!--USER OPTION COLUMN END-->

  </header>

  <!--HEADER END-->
