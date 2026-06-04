<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ url('admin/dasbor') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('assets/admin') }}/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">TARUNA BANGSA</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            

            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >

              <!-- dashboard -->
              <li class="nav-item">
                <a href="{{ url('admin/dasbor') }}" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <!-- dashboard -->
              <li class="nav-item">
                <a href="{{ url('admin/parkir') }}" class="nav-link">
                  <i class="nav-icon bi bi-p-circle-fill"></i>
                  <p>Transaksi Parkir</p>
                </a>
              </li>

              <!-- pengguna -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-card-checklist"></i>
                  <p>
                    Master
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('admin/user') }}" class="nav-link">
                      <i class="nav-icon bi bi-arrow-return-right"></i>
                      <p>Pengguna Sistem</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/jenis-kendaraan' )}}" class="nav-link">
                      <i class="nav-icon bi bi-arrow-return-right"></i>
                      <p>Jenis Kendaraan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('admin/pintu-parkir') }}" class="nav-link">
                      <i class="nav-icon bi bi-arrow-return-right"></i>
                      <p>Pintu Parkir</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">{{ $title }}</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ url('admin/dasbor') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  
                  <div class="card-body" style="min-height: 500px;">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terdapat kesalahan pada form:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
