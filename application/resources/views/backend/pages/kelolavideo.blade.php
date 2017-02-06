@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Video
    <small>Kelola Video</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Kelola Video</li>
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

  <div class="modal fade" id="modalflagedit" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Status Video</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk mengubah status video ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="setflagpublish">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modaldelete" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Video</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin untuk menghapus video ini?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger btn-flat" id="sethapus">Ya, saya yakin</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modaledit" role="dialog">
    <div class="modal-dialog">
      <form class="form-horizontal" action="{{route('video.edit')}}" method="post">
        {{csrf_field()}}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Konten Video</h4>
          </div>
          <div class="modal-body">
            <div class="col-md-14">
              <label class="control-label">URL Youtube</label>
              <input type="text" name="url_video" class="form-control" id="url_video">
              <input type="hidden" name="id" id="id">
              @if($errors->has('url_video'))
                <span class="help-block">
                  <strong>{{ $errors->first('url_video')}}
                  </strong>
                </span>
              @endif
            </div>
            <div class="col-md-14">
              <label class="control-label">Judul Video</label>
              <input type="text" class="form-control" name="judul_video" id="judul_video">
              @if($errors->has('judul_video'))
                <span class="help-block">
                  <strong>{{ $errors->first('judul_video')}}
                  </strong>
                </span>
              @endif
            </div>
            <div class="col-md-14">
              <label class="control-label">Status</label>
              <select class="form-control" name="flag_video">
                <option value="1" id="flag_aktif">Aktif</option>
                <option value="0" id="flag_nonaktif">Tidak Aktif</option>
              </select>
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
    <div class="col-md-4">
      <form class="form-horizontal" action="{{route('video.store')}}" method="post">
        {{csrf_field()}}
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Formulir Tambah Video Baru</h3>
          </div>
          <div class="box-body">
            <div class="col-md-14">
              <label class="control-label">URL Youtube</label>
              <input type="text" name="url_video" class="form-control">
              @if($errors->has('url_video'))
                <span class="help-block">
                  <strong>{{ $errors->first('url_video')}}
                  </strong>
                </span>
              @endif
            </div>
            <div class="col-md-14">
              <label class="control-label">Judul Video</label>
              <input type="text" name="judul_video" class="form-control">
              @if($errors->has('judul_video'))
                <span class="help-block">
                  <strong>{{ $errors->first('judul_video')}}
                  </strong>
                </span>
              @endif
            </div>
            <div class="col-md-14">
              <label class="control-label">Status</label>
              <select class="form-control" name="flag_video">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right btn-sm btn-flat">Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm btn-flat pull-right" style="margin-right:5px;">Reset Formulir</button>
          </div>
        </div>
      </form>
    </div>

    <div class="col-md-8">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Seluruh Data Video</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelinfo" class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Video</th>
                <th>Judul Video</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($getvideo as $key)
                <tr>
                <td>{{$i}}</td>
                <td>
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo substr($key->url_video,-11,23)?>" allowfullscreen></iframe>
                </td>
                <td>{{$key->judul_video}}</td>
                <td>
                  @if($key->flag_video=="1")
                    <span class="badge bg-blue" data-toggle="tooltip" title="Aktif"><i class="fa fa-thumbs-up"></i></span>
                  @else
                    <span class="badge bg-red" data-toggle="tooltip" title="Tidak Aktif"><i class="fa fa-thumbs-down"></i></span>
                  @endif
                </td>
                <td>
                  @if($key->flag_video=="1")
                    <span data-toggle="tooltip" title="Ubah Status">
                      <a href="#" class="btn btn-xs btn-danger btn-flat flagpublish" data-toggle="modal" data-target="#modalflagedit" data-value="{{$key->id}}"><i class="fa fa-heartbeat"></i></a>
                    </span>
                  @else
                    <span data-toggle="tooltip" title="Ubah Status">
                      <a href="#" class="btn btn-xs btn-primary btn-flat flagpublish" data-toggle="modal" data-target="#modalflagedit" data-value="{{$key->id}}"><i class="fa fa-heart"></i></a>
                    </span>
                  @endif
                  <span data-toggle="tooltip" title="Edit">
                    <a href="#" class="btn btn-xs btn-warning btn-flat edit" data-toggle="modal" data-target="#modaledit" data-value="{{$key->id}}"><i class="fa fa-edit"></i></a>
                  </span>
                  <span data-toggle="tooltip" title="Hapus">
                    <a href="#" class="btn btn-xs btn-danger btn-flat hapus" data-toggle="modal" data-target="#modaldelete" data-value="{{$key->id}}"><i class="fa fa-remove"></i></a>
                  </span>
                </td>
                </tr>
                <?php $i++; ?>
              @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

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

      $("#tabelinfo").on("click", "a.flagpublish", function(){
        var a = $(this).data('value');
        $('#setflagpublish').attr('href', '{{url('admin/publish-video/')}}/'+a);
      });

      $("#tabelinfo").on("click", "a.hapus", function(){
        var a = $(this).data('value');
        $('#sethapus').attr('href', '{{url('admin/delete-video/')}}/'+a);
      });

      $("#tabelinfo").on("click", "a.edit", function(){
        var a = $(this).data('value');
        $.ajax({
          url: "{{url('/')}}/admin/bind-video/"+a,
          dataType: 'json',
          success: function(data){
            var id = data.id;
            var url_video = data.url_video;
            var judul_video = data.judul_video;
            var flag_video = data.flag_video;

            $('#id').attr('value', id);
            $('#url_video').val(url_video);
            $('#judul_video').val(judul_video);
            if(flag_video=="1") {
              $('#flag_aktif').attr('selected', true);
            } else {
              $('#flag_nonaktif').attr('selected', true);
            }
          }
        })
      });
    });
  </script>

@stop
