  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('accueil')}} " class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pharmacie</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/devise.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ userFullName() }} </a>
        </div>
      </div>

       <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('accueil') }}" class="nav-link {{ setMenuActive('accueil') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
          <li class="nav-item {{ setMenuClass('admin.habilitations.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.habilitations.', 'active') }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Habilitaions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.habilitations.users.index') }}" class="nav-link {{ setMenuActive('admin.habilitations.users.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('categorie')}} " class="nav-link {{ setMenuActive('categorie') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('fournisseur')}} " class="nav-link {{ setMenuActive('fournisseur') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Fournisseurs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('produit')}} " class="nav-link {{ setMenuActive('produit') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Produits
              </p>
            </a>
          </li>
          @can("gerant")
          <li class="nav-item">
            <a href="{{route('stock')}} " class="nav-link {{ setMenuActive('stock') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Stocks
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('entrer')}} " class="nav-link {{ setMenuActive('entrer') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Entrer
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('sortier')}} " class="nav-link {{ setMenuActive('sortier') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ventes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('commande')}} " class="nav-link {{ setMenuActive('commande') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Commandes
              </p>
            </a>
          </li>
          @endcan
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Operations
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
