<style type="text/css">
  #colortreemenulihref{
      color: #000000;
    }
</style>
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      @if(Auth::user()->url_foto=="")
        <img src="{{ asset('/images/userdefault.png') }}" class="img-circle" alt="User Image">
      @else
        <img src="{{ url('images') }}/{{Auth::user()->url_foto}}" class="img-circle" alt="User Image">
      @endif
    </div>
    <div class="pull-left info">
      <p style="color:black">
        @if(Auth::user()->name=="")
          {{Auth::user()->email}}
        @else
          {{Auth::user()->name}}
        @endif
      </p>
      <a href="#" style="color:black"><i class="fa fa-circle text-success"></i>
        {{Auth::user()->email}}
      </a>
    </div>
  </div>
  <!-- search form -->
  <!-- <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form> -->
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li>
      <a href="{{url('backend/dashboard')}}" id="colortreemenulihref">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#" id="colortreemenulihref">
        <i class="fa fa-desktop"></i>
        <span>Profile Panca Agung</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/lihat-profile')}}"><i class="fa fa-circle-o"></i> List Data Profile</a></li>
        <li><a href="{{route('profile.kategori.lihat')}}"><i class="fa fa-circle-o"></i> Tambah Kategori Profile</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#" id="colortreemenulihref">
        <i class="fa fa-star"></i>
        <span>Manajemen Features</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/kelola-features')}}"><i class="fa fa-circle-o"></i> Kelola Features</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#" id="colortreemenulihref">
        <i class="fa fa-wrench"></i>
        <span>Manajemen Services</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/kelola-services')}}"><i class="fa fa-circle-o"></i> Kelola Services</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#" id="colortreemenulihref">
        <i class="fa fa-building-o"></i>
        <span>Manajemen Client</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/lihat-client')}}"><i class="fa fa-circle-o"></i> Kelola Client</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#" id="colortreemenulihref">
        <i class="fa fa-users"></i>
        <span>Manajemen Akun</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/kelola-akun')}}"><i class="fa fa-circle-o"></i> Kelola Akun</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#" id="colortreemenulihref">
        <i class="fa fa-image"></i>
        <span>Galeri & Slider</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/kelola-slider')}}"><i class="fa fa-circle-o"></i> Kelola Slider</a></li>
        <li><a href="{{url('admin/kelola-galeri')}}"><i class="fa fa-circle-o"></i> Kelola Galeri Foto</a></li>
        <li><a href="{{url('admin/kelola-video')}}"><i class="fa fa-circle-o"></i> Kelola Galeri Video</a></li>
      </ul>
    </li>
  </ul>
</section>
