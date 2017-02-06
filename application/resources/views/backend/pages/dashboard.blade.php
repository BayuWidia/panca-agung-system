@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-6 col-md-3 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Profile</span>
          <span class="info-box-number">{{$countberita}}</span>

          <div class="progress">
            <div class="progress-bar" style="width:100%"></div>
          </div>
              <span class="progress-description">
                <i>Data yang telah terbuat</i>
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div><!-- ./col -->

    <div class="col-lg-6 col-md-3 col-xs-12">
      <div class="info-box bg-blue">
        <span class="info-box-icon"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah User</span>
          <span class="info-box-number">{{$countsudahterdaftar}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                <i>Data user yang telah terdaftar</i>
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div><!-- ./col -->

    <div class="col-lg-6 col-md-3 col-xs-12">
      <!-- small box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-frown-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Profile</span>
          <span class="info-box-number">{{$countpengaduanbelumpublish}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                 <i>Data yang belum dipublish</i>
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div><!-- ./col -->

    <div class="col-lg-6 col-md-3 col-xs-12">
      <!-- /.info-box -->
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-desktop"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Kategori</span>
          <span class="info-box-number">{{$countkategori}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                <i>Data kategori yang telah terbuat</i>
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>


    </div><!-- ./col -->
  </div>



  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Penjualan Perbulan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Produk Terlaris</strong>
              </p>

              <div class="progress-group">
                <span class="progress-text">Hordeng</span>
                <span class="progress-number"><b>160</b>/200</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Gagang Pintu</span>
                <span class="progress-number"><b>310</b>/400</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Mainan Anak</span>
                <span class="progress-number"><b>480</b>/800</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Baut</span>
                <span class="progress-number"><b>250</b>/500</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                <h5 class="description-header">$35,210.43</h5>
                <span class="description-text">TOTAL REVENUE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                <h5 class="description-header">$10,390.90</h5>
                <span class="description-text">TOTAL COST</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                <h5 class="description-header">$24,813.53</h5>
                <span class="description-text">TOTAL PROFIT</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                <h5 class="description-header">1200</h5>
                <span class="description-text">GOAL COMPLETIONS</span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-md-8">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Client</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Nama Client</th>
                <th>Keterangan Client</th>
                <th>Status Client</th>
              </tr>
              </thead>
              <tbody>
              @foreach($getclient as $key)
                <tr>
                  <td>{{$key->nama_client}}</td>
                  <td>
                    {{ str_limit($key->keterangan_client, $limit = 100) }}
                  </td>
                  <td>
                    @if($key->flag_client=="1")
                      <span class="label label-info">Aktif</span></td>
                    @else
                      <span class="label label-success">Tidak Aktif</span>
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="{{url('admin/lihat-client')}}" class="btn btn-sm btn-info btn-flat pull-right">Lihat Semua Client</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
    <div class="col-md-4">
      <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Pengguna</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <ul class="users-list clearfix">
              @foreach ($users as $key)
                <li>
                  @if($key->url_foto == null)
                    <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                  @else
                    <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$key->url_foto) }}" alt="{{$key->name}}">
                  @endif
                  <a class="users-list-name">{{ $key->name}}</a>
                </li>
              @endforeach
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="pagination pagination-sm no-margin pull-right">
              {{ $users->links() }}
            </div>
        </div>
          <!-- /.box-footer -->
        </div>
    </div>
  </div>

  <div class="row">
    <section class="col-md-12">

    </section>
  </div><!-- /.row (main row) -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{asset('plugins/chartjs/Chart.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>


@stop
