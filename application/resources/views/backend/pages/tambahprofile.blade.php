@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <script src="{{url('/')}}/plugins/ckeditor/ckeditor.js"></script>
  <script src="{{url('/')}}/plugins/ckfinder/ckfinder.js"></script>
  <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Management Profile
    <small>Tambah Informasi Profile</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Tambah Informasi Profile</li>
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

    <div class="col-md-12">
      <form class="form-horizontal"
        @if(isset($editinfo))
          action="{{route('profile.update', $editinfo->id)}}"
        @else
          action="{{route('profile.store')}}"
        @endif
      method="post" style="margin-top:10px;">
        {{csrf_field()}}
        <div class="box box-danger">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Informasi Profile</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Posting</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="tanggal_posting"
                @if(isset($editinfo))

                  value="{{ \Carbon\Carbon::parse($editinfo->created_at)->format('d-M-y')}}" readonly>
                @else
                  value="<?php echo date('d-M-y'); ?>" readonly>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kategori</label>
              <div class="col-sm-5">
                <select class="form-control select2" name="id_kategori">
                  <option>-- Pilih --</option>
                  @if(!$getkategori->isEmpty())
                    @if(isset($editinfo))
                      @foreach($getkategori as $key)
                        @if($editinfo->id_kategori==$key->id)
                          <option value="{{$key->id}}" selected="true">{{$key->nama_kategori}}</option>
                        @else
                          <option value="{{$key->id}}">{{$key->nama_kategori}}</option>
                        @endif
                      @endforeach
                    @else
                      @foreach($getkategori as $key)
                        <option value="{{$key->id}}">{{$key->nama_kategori}}</option>
                      @endforeach
                    @endif
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Isi Konten</label>
              <div class="col-sm-9">
                <textarea name="isi_berita" id="editor1">
                  @if(isset($editinfo))
                    {{$editinfo->isi_berita}}
                  @endif
                </textarea>
                  @if($errors->has('isi_berita'))
                    <span class="help-block">
                      <strong>{{ $errors->first('isi_berita')}}
                      </strong>
                    </span>
                  @endif
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="button" class="btn btn-primary pull-right btn-flat">Simpan</button>
            <button type="submit" name="button" class="btn btn-danger pull-right btn-flat" style="margin-right:5px;">Reset Form</button>
          </div>
        </div><!-- /.box -->
      </form>
    </div>
  </div>

  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- SlimScroll -->
  <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

  <script type="text/javascript">
  $(".select2").select2();
  </script>


  <script language="javascript">
    CKEDITOR.replace('editor1');
    CKFinder.setupCKEditor( null, { basePath : '{{url('/')}}/plugins/ckfinder/'} );
  </script>

@stop
