<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('/bootstrap/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">

<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

       <style>
           html, body {
               height: 100%;
           }

           body {
               margin: 0;
               padding: 0;
               width: 100%;
               color: black;
               display: table;
               font-weight: 100;
               font-family: 'Lato';
           }

           .container {
               text-align: center;
               display: table-cell;
               vertical-align: middle;
           }

           .content {
               text-align: center;
               display: inline-block;
           }

           .title {
               font-size: 45px;
               color: black;
           }


       </style>
     <div>
       <div class="content">
         <h1 class="headline text-yellow"> 404</h1>
         <h3><i class="fa fa-warning text-yellow"></i> Maaf Terjadi Kesalahan</h3>

         <h1 class="title">
           Halaman yang anda tuju tidak ditemukan kemungkinan sudah dihapus atau alamatnya sudah digantikan.
         </h1>

         <form class="search-form">
           <div class="input-group">
             <div class="input-group-btn">
                 <a class="btn btn-warning btn-flat" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp; Kembali Ke Halaman Sebelumnya</a>
             </div>
           </div>
           <!-- /.input-group -->
         </form>
       </div>
       <!-- /.error-content -->
     </div>
