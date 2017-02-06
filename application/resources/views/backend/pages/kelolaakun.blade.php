@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Management Akun
    <small>Kelola Akun</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Kelola Akun</li>
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

  <div class="modal fade" id="modaledit" role="dialog">
    <div class="modal-dialog">
      <form class="form-horizontal" action="{{route('akun.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Akun</h4>
          </div>
          <div class="modal-body">
            <div class="col-md-14 {{ $errors->has('email') ? 'has-error' : '' }}">
              <label class="control-label">Email</label>
              <input type="hidden" name="id" id="id">
              <input id="edit_email" type="email" name="email" class="form-control" placeholder="Email"
              @if($errors->has('email'))
                value="{{ old('email') }}"
              @endif
              readonly>
              @if($errors->has('email'))
                <span class="help-block">
                  <i>* {{$errors->first('email')}}</i>
                </span>
              @endif
            </div>
            <div class="col-md-14 {{ $errors->has('name') ? 'has-error' : '' }}">
              <label class="control-label">Name</label>
              <input id="edit_name" type="input" name="name" class="form-control" placeholder="Name"
              @if($errors->has('name'))
                value="{{ old('name') }}"
              @endif>
              @if($errors->has('name'))
                <span class="help-block">
                  <i>* {{$errors->first('name')}}</i>
                </span>
              @endif
            </div>
            <div class="col-md-14 {{ $errors->has('level') ? 'has-error' : '' }}">
              <label class="control-label">Level</label>
              <select class="form-control" name="level" id="leveluser">
                <option value="-- Pilih --">-- Pilih --</option>
                <option value="1" {{ old('level')=="1" ? 'selected' : '' }} id="flag_admin">Administrator</option>
                <option value="2" {{ old('level')=="2" ? 'selected' : '' }} id="flag_guest">Guest</option>
              </select>
              @if($errors->has('level'))
                <span class="help-block">
                  <i>* {{$errors->first('level')}}</i>
                </span>
              @endif
            </div>
            <div class="col-md-14 {{ $errors->has('activated') ? 'has-error' : '' }}">
              <label class="control-label">Status Aktif</label>
              <select class="form-control" name="activated" id="activatedid">
                <option value="-- Pilih --">-- Pilih --</option>
                <option value="0" {{ old('activated')=="0" ? 'selected' : '' }} id="flag_tidak_aktif">Tidak Aktif</option>
                <option value="1" {{ old('activated')=="1" ? 'selected' : '' }} id="flag_aktif">Aktif</option>
              </select>
              @if($errors->has('activated'))
                <span class="help-block">
                  <i>* {{$errors->first('activated')}}</i>
                </span>
              @endif
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-primary btn-flat">Simpan Perubahan</a>
          </div>
        </div>
    </form>
    </div>
  </div>

  <div class="modal fade" id="modaldelete" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Akun</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk menghapus akun ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="sethapus">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>

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

    <form class="form-horizontal" method="post" action="{{route('akun.store')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Tambah Akun </h3>
            </div>
            <div class="box-body">
              <div class="col-md-14 {{ $errors->has('email') ? 'has-error' : '' }}">
                <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email"
                @if($errors->has('email'))
                  value="{{ old('email') }}"
                @endif
                >
                @if($errors->has('email'))
                  <span class="help-block">
                    <i>* {{$errors->first('email')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-14 {{ $errors->has('name') ? 'has-error' : '' }}">
                <label class="control-label">Name</label>
                <input type="input" name="name" class="form-control" placeholder="Name"
                @if($errors->has('name'))
                  value="{{ old('name') }}"
                @endif
                >
                @if($errors->has('name'))
                  <span class="help-block">
                    <i>* {{$errors->first('name')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-14 {{ $errors->has('level') ? 'has-error' : '' }}">
                <label class="control-label">Level</label>
                <select class="form-control" name="level" id="leveluser">
                  <option value="-- Pilih --">-- Pilih --</option>
                  <option value="1" {{ old('level')=="1" ? 'selected' : '' }} >Administrator</option>
                  <option value="2" {{ old('level')=="2" ? 'selected' : '' }} >Guest</option>
                </select>
                @if($errors->has('level'))
                  <span class="help-block">
                    <i>* {{$errors->first('level')}}</i>
                  </span>
                @endif
              </div>
              <div class="col-md-14 {{ $errors->has('url_foto') ? 'has-error' : '' }}">
                <label class="control-label">Pilih Foto</label>
                <input type="file" name="url_foto" accept=".jpg, .png, .bmp">
                <font color="red"><small>*Ukuran Foto 128px X 128px</small></font>
                @if($errors->has('url_foto'))
                  <span class="help-block">
                    <strong>{{ $errors->first('url_foto')}}
                    </strong>
                  </span>
                @endif
              </div>
              <div class="col-md-14 {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"
                @if($errors->has('password'))
                  value="{{ old('password') }}"
                @endif
                >
                @if($errors->has('password'))
                  <span class="help-block">
                    <i>* {{$errors->first('password')}}</i>
                  </span>
                @endif
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right btn-sm btn-flat">Simpan</button>
              <button type="reset" class="btn btn-danger btn-sm btn-flat pull-right" style="margin-right:5px;">Reset Formulir</button>
            </div>
          </div>
        </div>
    </form>
    <!-- END FORM-->
    <!-- START TABLE-->
    <div class="col-md-8">
      <div class="box box-success">
        <div class="box-header with-border">
          <div class="box-title">
            Seluruh Data Akun 
          </div>
        </div>
        <div class="box-body">
          <table id="tabelinfo" class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Email</th>
                <th>Level</th>
                <th>Nama User</th>
                <th>Status Aktifasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($getuser as $key)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$key->email}}</td>
                  <td>
                    @if($key->level=="1")
                      Administrator
                    @elseif($key->level=="2")
                      Guest
                    @endif
                  </td>
                  <td>{{$key->name}}</td>
                  <td>
                    @if($key->activated=="0")
                      <span class="badge bg-red" data-toggle="tooltip" title="Tidak Aktif">
                        <i class="fa fa-thumbs-down"></i>
                      </span>
                    @elseif($key->activated=="1")
                      <span class="badge bg-blue" data-toggle="tooltip" title="Aktif">
                        <i class="fa fa-thumbs-up"></i>
                      </span>
                    @endif
                  </td>
                  <td>
                    <span data-toggle="tooltip" title="Edit">
                      <a class="btn btn-xs btn-warning btn-flat edit" data-toggle="modal" data-target="#modaledit" data-value="{{$key->id}}">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                    <span data-toggle="tooltip" title="Hapus">
                      <a href="#" class="btn btn-xs btn-danger btn-flat hapus" data-toggle="modal" data-target="#modaldelete" data-value="{{$key->id}}">
                        <i class="fa fa-remove"></i>
                      </a>
                    </span>
                  </td>
                </tr>
                <?php $i++; ?>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- START TABLE-->
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

  <script>
    $(function () {
      $("#tabelinfo").DataTable();

      $("#tabelinfo").on("click", "a.edit", function(){
        var a = $(this).data('value');
        $.ajax({
          url: "{{url('/')}}/admin/bind-akun/"+a,
          dataType: 'json',
          success: function(data){
            var id = data.id;
            var email = data.email;
            var name = data.name;
            var level = data.level;
            var activated = data.activated;

            $('#id').attr('value', id);
            $('#edit_email').attr('value', email);
            $('#edit_name').attr('value', name);
            if (level=="1") {
              $('#flag_admin').attr('selected', true);
            } else {
              $('#flag_guest').attr('selected', true);
            }
            if (activated=="0") {
              $('#flag_tidak_aktif').attr('selected', true);
            } else {
              $('#flag_aktif').attr('selected', true);
            }
          }
        })
      });

      $("#tabelinfo").on("click", "a.hapus", function(){
        var a = $(this).data('value');
        $('#sethapus').attr('href', '{{url('admin/delete-akun/')}}/'+a);
      });

    });
  </script>

@stop
