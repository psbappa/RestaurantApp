<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Product</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{-- Admin Template CSS --}}
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
        /* Style The Dropdown Button */
        .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
        position: relative;
        display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
        display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
        background-color: #3e8e41;
        }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- header -->
  @include('admin/layout/header')


  <!-- leftbar -->
  @include('admin/layout/sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Product Listing
      </h1>
      
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product Listing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{url('admin/saveProduct')}}" method="post" novalidate="" class="ng-untouched ng-pristine ng-invalid" enctype='multipart/form-data'>
                @csrf

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                <img src="images/{{ Session::get('image') }}">
                @endif

                @if (count($errors) > 0)
                  <div class = "alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                  </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                      <label for='productName'>Product Name*</label>
                      <div class="form-group">
                        <input type="email" class="form-control form-control-alternative" class="productName" id="productName" placeholder="Product Name" name="productName">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for='productCat'>*</label>
                      <div class="form-group">
                        <input type="text" placeholder="Regular" class="form-control form-control-alternative" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for='productName'>Price*</label>
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                          </div>
                          <input class="form-control form-control-alternative" name="price" id="price" placeholder="Price" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for='productWeight'>Product weight*</label>
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control" placeholder="weight" name="weight" id="weight" type="text">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-success">
                        <input type="text" placeholder="Success" class="form-control form-control-alternative is-valid" />
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                        <label for='productDescription'>Product Description*</label>
                        <textarea class="form-control form-control-alternative"  name="description" rows="3" placeholder="Write a large text here ..."></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12 text-right">
                    <button class="btn btn-danger ">Cancel</button>&nbsp;&nbsp; 

                    <button class="btn btn-primary ladda-button" data-spinner-color="#000000" data-style="expand-right" type="submit" data-spinner-size="30" data-spinner-lines="12" >
                      <span class="ladda-label">Add Product </span>
                      <span class="ladda-spinner"></span
                    ></button>
                    </div>
                  </div>
                  <p>
                    <small class="text-muted">* Required Fields</small>
                  </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- footer -->
  @include('admin/layout/footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ url('/') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/bower_components/admin-lte/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
</body>
</html>