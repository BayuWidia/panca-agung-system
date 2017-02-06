@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Management Profile
    <small>Data Profile</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Manajemen Profile</li>
  </ol>
@stop

@section('content')
  <script>
    window.setTimeout(function() {
      $(".alert-info").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 2000);

    window.setTimeout(function() {
      $(".alert-warning").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);
  </script>

  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif

      @if(Session::has('messagefail'))
        <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Oops, terjadi kesalahan!</h4>
          <p>{{ Session::get('messagefail') }}</p>
        </div>
      @endif
    </div>

    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-success">
        <div class="box-body box-profile">
          @if($getuser->url_foto=="")
            <img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User profile picture">
          @else
            <img class="profile-user-img img-responsive img-circle" src="{{url('images')}}/{{$getuser->url_foto}}" alt="User profile picture">
          @endif
          @if($getuser->name=="")
            <h3 class="profile-username text-center">No Name</h3>
          @else
            <h3 class="profile-username text-center">{{$getuser->name}}</h3>
          @endif

          @if($getuser->level=="1")
            <p class="text-muted text-center">Administrator</p>
          @else
            <p class="text-muted text-center">Guest</p>
          @endif
          @if($getuser->activated=="1")
            <p class="text-muted text-center"><span class="label label-info">Aktif</span></p>
          @else
            <p class="text-muted text-center"><span class="label label-success">Tidak Aktif</span></p>
          @endif
          <hr>
          <strong><i class="fa fa-envelope margin-r-5"></i>  Email</strong>
          <p class="text-muted">
            {{$getuser->email}}
          </p>
          <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Terdaftar</strong>
          <p class="text-muted">{{ \Carbon\Carbon::parse($getuser->created_at)->format('d-M-y')}}</p>
          <hr>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->

    <div class="col-md-9">
      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            @if(Session::has('errors') || Session::has('erroroldpass'))
              <li><a href="#tabprofile" data-toggle="tab">Profile Pengguna</a></li>
              <li class="active"><a href="#tabpassword" data-toggle="tab">Ganti Password</a></li>
            @else
              <li class="active"><a href="#tabprofile" data-toggle="tab">Profile Pengguna</a></li>
              <li><a href="#tabpassword" data-toggle="tab">Ganti Password</a></li>
            @endif
            </ul>
            <div class="tab-content">
               @if(Session::has('errors') || Session::has('erroroldpass'))
                <div class="tab-pane" id="tabprofile">
              @else
                <div class="tab-pane active" id="tabprofile">
              @endif
                  <form class="form-horizontal" action="{{route('edit.profile.edit')}}" enctype="multipart/form-data" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="hidden" name="id" value="{{$getuser->id}}">
                      <input type="text" class="form-control" name="name"
                        @if($getuser->name!="")
                          value="{{$getuser->name}}"
                        @endif
                      >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" readonly
                        value="{{$getuser->email}}"
                      >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Hak Akses</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="hakakses" readonly
                        @if($getuser->level=="1")
                          value="Administrator"
                        @else
                          value="Guest"
                        @endif
                      >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Upload Foto</label>
                    <div class="col-sm-10">
                      <input type="file" name="url_foto" class="form-control">
                      <span style="color:red;">* Biarkan kosong jika tidak ingin diganti.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
                @if(Session::has('errors') || Session::has('erroroldpass'))
                  <div class="tab-pane active" id="tabpassword">
                @else
                  <div class="tab-pane" id="tabpassword">
                @endif
                <form class="form-horizontal" action="{{ route('change.password.user') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group {{ $errors->has('oldpass') ? 'has-error' : '' }} {{ Session::has('erroroldpass') ? 'has-error' : ''  }}">
                    <label class="col-sm-2 control-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input name="oldpass" type="password" class="form-control" placeholder="Password Lama"   @if(!$errors->has('oldpass'))
                        value="{{ old('oldpass') }}"
                      @endif
                      >
                      <input name="id" type="hidden" class="form-control" value="{{ $getuser->id }}">
                      @if($errors->has('oldpass'))
                        <span class="help-block">
                          <strong>{{ $errors->first('oldpass') }}
                          </strong>
                        </span>
                      @endif

                      @if(Session::has('erroroldpass'))
                        <span class="help-block">
                          <strong>{{ Session::get('erroroldpass') }}
                          </strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('newpass') ? 'has-error' : '' }} ">
                    <label class="col-sm-2 control-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input name="newpass" type="password" class="form-control" placeholder="Password Baru" @if(!$errors->has('newpass'))
                        value="{{ old('newpass') }}"
                      @endif
                      >
                      @if($errors->has('newpass'))
                        <span class="help-block">
                          <strong>{{ $errors->first('newpass') }}
                          </strong>
                        </span>
                      @endif
                      <span style="color:red;">* Password Minimal 8 digit.</span>
                    </div>
                </div>
                  <div class="form-group {{ $errors->has('newpass_confirmation') ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-10">
                      <input name="newpass_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password Baru"
                      @if(!$errors->has('newpass_confirmation'))
                        value="{{ old('newpass_confirmation') }}"
                      @endif
                      >
                      @if($errors->has('newpass_confirmation'))
                        <span class="help-block">
                          <strong>{{ $errors->first('newpass_confirmation') }}
                          </strong>
                        </span>
                      @endif
                      <span style="color:red;">* Password Minimal 8 digit.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-flat">Ganti Password</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
    </div><!-- /.col -->

  </div>
  <!-- END FORM -->

  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- SlimScroll -->
  <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

@stop
