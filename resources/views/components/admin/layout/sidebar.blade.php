<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                       data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="{{ route('admin.profile.index') }}" class="dropdown-item">
                            <i class="ti-user"></i> @lang('Profile')
                        </a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti-power-off"></i> @lang('Log out')
                            </button>
                        </form>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.index') }}" aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <span class="hide-menu">
                            @lang('Home')
                        </span>
                    </a>
                </li>
                @if(auth()->user()->isAdmin())
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.settings') }}" aria-expanded="false">
                            <i class="icons-Gears"></i>
                            <span class="hide-menu">
                                @lang('Settings')
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.contact') }}" aria-expanded="false">
                            <i class="icons-Phone-2"></i>
                            <span class="hide-menu">
                                @lang('Contact')
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.about') }}" aria-expanded="false">
                            <i class="icon-info"></i>
                            <span class="hide-menu">
                                @lang('About')
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.faq.index') }}" aria-expanded="false">
                            <i class="icon-question"></i>
                            <span class="hide-menu">
                                @lang('FAQ')
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.categories.index') }}"
                           aria-expanded="false">
                            <i class="icon-folder"></i>
                            <span class="hide-menu">
                                @lang('Categories')
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.messages.index') }}"
                           aria-expanded="false">
                            <i class="icon-envelope"></i>
                            <span class="hide-menu">
                                @lang('Messages')
                            </span>
                        </a>
                    </li>
                @endif
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.blog.index') }}" aria-expanded="false">
                        <i class="icon-docs"></i>
                        <span class="hide-menu">
                            @lang('Blog')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.properties.index') }}"
                       aria-expanded="false">
                        <i class="icons-Home"></i>
                        <span class="hide-menu">
                            @lang('Properties')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.customer_messages.index') }}"
                       aria-expanded="false">
                        <i class="icons-Envelope"></i>
                        <span class="hide-menu">
                            @if(auth()->user()->isAdmin())
                                Customer
                            @endif Messages
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
