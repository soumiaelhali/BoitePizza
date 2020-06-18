<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap rd-navbar-modern-wrap">
        <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
            data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
            data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
            data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
            data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
            data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle"
                            data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand"><a class="brand" href="index.html"><img
                                    src="images/logoo/logopizza.png" alt="" width="196" height="47" /></a></div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <!-- RD Navbar Basket-->


                            @include('website/layouts/cart')




                            <!-- RD Navbar Search-->
                            <div class="rd-navbar-search">
                                <button class="rd-navbar-search-toggle"
                                    data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                                <form class="rd-search" action="#">
                                    <div class="form-wrap">
                                        <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                                        <input class="rd-navbar-search-form-input form-input"
                                            id="rd-navbar-search-form-input" type="text" name="search">
                                        <button class="rd-search-form-submit fl-bigmug-line-search74"
                                            type="submit"></button>
                                    </div>
                                </form>
                            </div>
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Acceuil</a>
                                </li>
                                <li class="rd-nav-item "><a class="rd-nav-link drpa"
                                        href="about-us.html">Categories</a>


                                        @foreach ($categories as $categ)

                                <li id='cat{{$categ->id}}' >

                                    <a href="">

                                        <span>{{$categ->namecat}}</span></a>

                                </li>

                                @endforeach




                        </li>

                        </ul>
                    </div>
                    <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main"
                        data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                        <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span
                                class="project-hamburger-arrow-center"></span><span
                                class="project-hamburger-arrow-bottom"></span></div>
                        <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span
                                class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                        </div>
                        <div class="project-close"><span></span><span></span></div>
                    </div>
                </div>


                @include('website/layouts/sidemenu')


            </div>
    </div>
    </nav>
    </div>
</header>
