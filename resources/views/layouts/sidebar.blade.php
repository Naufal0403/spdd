<div id="side-menu"
        class="fixed overflow-y-scroll overflow-x-hidden h-full z-30 w-full md:max-w-md top-0 right-0 bottom-0 bg-gradient-to-bottom-dark-slate-blue-dark">
        <div id="side-menu-container"
            class="relative z-30 drawer pt-32 pb-8 px-8 sm:pb-16 sm:px-16 md:px-16 lg:pr-0 md:pb-12 top-0 bottom-0 right-0 w-full md:max-w-md">
            <a class="md:hidden absolute logo" href="/">
                <img style="width: 113px;" class="logo-image"
                    src="https://bud.agency/wp-content/uploads/2019/11/bud-logo-colour-white.svg"
                    alt="Logo for Bud Agency" width="113" height="36" />
            </a><i id="side-menu-close"
                class="absolute icon-close cursor-pointer text-xl hover:text-squash md:hidden"></i>
            <div class="h-full flex flex-col items-center md:items-start">
                <div class="menu-primary-menu-container pb-12">
                    <nav class="font-inter text-4xl text-center md:text-left">
                        <ul class="flex flex-col items-center md:items-start">
                            @auth

                            <li class="flex flex-wrap justify-center items-center menu-item menu-item-type-page py-4 md:justify-start">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                            <li class="flex flex-wrap justify-center items-center menu-item menu-item-type-page py-4 md:justify-start">
                                <a href="#">Beranda</a>
                            </li>
                            @endauth

                            @guest

                            <li
                                class="flex flex-wrap justify-center items-center menu-item menu-item-type-page py-4 md:justify-start">
                                <div class="flex pt-12 pb-16 -mx-2 border-faint border-t border-0 border-solid">
                                    <a href="/home" class="btn btn-small btn-contact no-arrow capitalize">
                                        Sistem Login
                                    </a>
                                </div>
                                <a href="{{route('login')}}"
                                    class="transition hover:text-squash text-xl text-white menu-item menu-item-type-post_type menu-item-object-page menu-item-56">
                                    Login Akun Anda
                                </a>

                            </li>

                            <li class="mb-2">

                                <a href="{{route('register')}}"
                                    class="transition hover:text-squash text-xl text-white menu-item menu-item-type-post_type menu-item-object-page menu-item-52">
                                    Buat akun
                                </a>
                                <li class="flex flex-wrap justify-center items-center menu-item menu-item-type-page py-4 md:justify-start">
                                    <a href="{{route('profile')}}">Profil</a>
                                </li>
                            </li>
                            @endguest

                            <li class="mb-2">
                                <a href="https://bud.agency/content-marketing/"
                                    class="transition hover:text-squash text-xl text-white menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                </li>
                <li
                    class="flex flex-wrap justify-center items-center menu-item menu-item-type-page py-4 md:justify-start">
                    <a class="transition hover:text-squash menu-item menu-item-type-post_type menu-item-object-page menu-item-55"
                        href="https://bud.agency/trail-stories/">
                        <!-- Blog: Trail Stories -->
                    </a>
                </li>
                </ul>
                </nav>
            </div>
            <div class="flex pt-12 pb-16 -mx-2 border-faint border-t border-0 border-solid">
                <a href="/home" class="btn btn-small btn-contact no-arrow capitalize">
                    Start your journey
                </a>
            </div>
            <div class="mt-8 pr-12">
                <div class="flex items-baseline mb-4">
                    <i class="text-cornflower-blue icon-phone mr-3"></i><a id="-call-link" class="hover:text-squash"
                        href="tel:(08) 9468 2555">(+62) 823 4063 4760</a>
                </div>
                <div class="flex items-baseline mb-4">
                    <i class="text-cornflower-blue icon-mobile mr-3"></i><a id="-mobile-link" class="hover:text-squash"
                        href="tel:0488 822 947">0488 822 947</a>
                </div>
                <div class="flex items-baseline mb-4">
                    <i class="text-cornflower-blue icon-email mr-3"></i><a id="-email-link" class="hover:text-squash"
                        href="mailto:KantorDesaOoDompu@gmail.com">KantorDesaOoDompu@gmail.com</a>
                </div>
                <div class="flex items-baseline mb-4">
                    <i class="text-cornflower-blue icon-location mr-3"></i><a id="-location-link"
                        class="hover:text-squash" target="_blank" rel="noreferrer nofollow"
                        href="https://www.google.com/maps/search/desaOo">Jln Lintas Sumbawa Desa O'o Dompu </a>
                </div>
            </div>
            <div class="pt-12 pb-16 flex justify-between sm:justify-center md:justify-start w-full">
                <div class="sm:mr-12">

                    <a href="https://bud.agency/content-marketing/"
                        class="transition hover:text-squash text-xl text-white menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
                    </a></li>
                    </ul>
                    </nav>
                </div>
                </li>
                <li
                    class="flex flex-wrap justify-center items-center menu-item menu-item-type-page py-4 md:justify-start">
                    <a class="transition hover:text-squash menu-item menu-item-type-post_type menu-item-object-page menu-item-55"
                        href="https://bud.agency/trail-stories/">
                        <!-- Blog: Trail Stories -->
                    </a>
                </li>
                </ul>
                </nav>
            </div>
            <div class="flex pt-12 pb-16 -mx-2 border-faint border-t border-0 border-solid">
                <a href="/home" class="btn btn-small btn-contact no-arrow capitalize">
                    About Me SPDD
                </a>
            </div>
            <div class="mt-8 pr-12">
                <div class="flex items-baseline mb-4">
                    </a></div>
            </div>
            <div class="flex items-baseline mb-4">
                <a class="hover:text-squash" href="/about">About</a>
            </div>
            <div class="flex items-baseline mb-12">
                <a class="hover:text-squash" href="https://wa.me/6282230344716">Contact</a>
            </div>
        </div>
    </div>
