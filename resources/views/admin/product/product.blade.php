
<?php
//dd($users);
?>


<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Category</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/skins/skin-blue.min.css">

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style type="text/css">
  .gallery
  {
      display: inline-block;
      margin-top: 20px;
  }
  .close-icon{
    border-radius: 50%;
      position: absolute;
      right: 5px;
      top: -10px;
      padding: 5px 8px;
  }
  .form-image-upload{
      background: #e8e8e8 none repeat scroll 0 0;
      padding: 15px;
  }
  </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- header -->
  @include('admin.layout.header')


  <!-- leftbar -->
  @include('admin.layout.sidebar')


  <!-- Content Wrapper. Contains page content -->
  
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="{{ url('admin/addProduct/')}}">
                  <button _ngcontent-dum-c10="" class="btn btn-warning"><em _ngcontent-dum-c10="" class="fa fa-plus"></em>&nbsp;&nbsp; Add New Product</button>
                </a>
              </h3>
            </div>
            @if( Session::has( 'success' ))
              <div class = "alert alert-success">
                  <ul>
                    <li>{{ Session::get( 'success' ) }}</li>
                  </ul>
              </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Category Title</th>
                        <th class="th-sm">Desription</th>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Posted By</th>
                        <th class="th-sm">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        // dd($category_list);
                        // foreach ($category_list as $key => $category) { ?>
                            <tr>
                              <td>test</td>
                              <td>test</td>
                              <td>
                                <a class="thumbnail fancybox" rel="ligthbox" href="/images/category/" style="width:30%">
                                    <img class="img-responsive" alt="" src="/images/category/" />
                                    <div class='text-center'>
                                        <small class='text-muted'></small>
                                    </div> <!-- text-center / end -->
                                </a>
                                
                                {{-- <img src="/admin/product/{{$category['image']}}" height="30px" width="30px" /> --}}
                              </td>
                              <td></td>
                              <td>
                                  <a href="{{url('admin/editCategory/')}}"><img src="https://img.icons8.com/officexs/30/000000/broken-pencil.png"/></a>
                                  <a href="{{url('admin/deleteCategory/')}}" onClick="return confirm('Delete This account?')"><img src="https://img.icons8.com/color/30/000000/delete-forever.png"/></a>
                              </td>
                            </tr>
                      <?php 
                        // }  
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Posted By</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  


  <!-- footer -->
  @include('admin.layout.footer')

  <div class="control-sidebar-bg"></div>
</div>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ url('/') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/bower_components/admin-lte/dist/js/adminlte.min.js"></script>
<script src="{{ url('/') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script type="text/javascript">
        $(document).ready(function(){
          var $= jQuery.noConflict();
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>
</body>
</html>