<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img src="{{ asset('assets/images/logo.png') }}">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['admin']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['admin/posts/*', 'admin/posts', 'admin/categories', 'admin/categories/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#posts" role="button"
                    aria-expanded="{{ is_active_route(['admin/posts/*', 'admin/posts', 'admin/categories', 'admin/categories/*']) }}" aria-controls="posts">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Posts</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['admin/posts/*', 'admin/posts', 'admin/categories', 'admin/categories/*']) }}" id="posts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts') }}"
                                class="nav-link {{ active_class(['admin/posts', 'admin/posts/create']) }}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.postsCategories.index') }}"
                                class="nav-link {{ active_class(['admin/categories']) }}">Categorias</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item nav-category">Administração</li>
            <li class="nav-item {{ active_class(['admin/settings/*', 'admin/settings']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#configurations" role="button"
                    aria-expanded="{{ is_active_route(['settings/*', 'admin/settings']) }}"
                    aria-controls="configurations"> <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Gerencimento</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['admin/settings/*', 'admin/settings']) }}" id="configurations">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}"
                                class="nav-link {{ active_class(['admin/settings']) }}">Configurações</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.users') }}"
                                class="nav-link {{ active_class(['admin/settings/users']) }}">Usuários</a>
                        </li>
                    </ul>
                </div>
            </li>
                    <li class="nav-item {{ active_class(['admin/newsletter']) }}">
            <a href="{{ route('admin.newsletter.index') }}" class="nav-link">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Newsletter</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['admin/contatos']) }}">
            <a href="{{ route('admin.contact.index') }}" class="nav-link">
            <i class="link-icon" data-feather="inbox"></i>
            <span class="link-title">Contatos</span>
            </a>
        </li>
        </ul>
    </div>
</nav>
