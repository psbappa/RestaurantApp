<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add User</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/skins/skin-blue.min.css">

  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        Add category
      </h1>
      
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{url('admin/saveCategory')}}" method="post" _ngcontent-dum-c12="" novalidate="" class="ng-untouched ng-pristine ng-invalid" enctype='multipart/form-data'>
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

                <div _ngcontent-dum-c12="" class="panel b">
                  <div _ngcontent-dum-c12="" class="panel-body">
                    <div _ngcontent-dum-c12="" class="form-group">
                      <label _ngcontent-dum-c12="">Title*</label>
                      <input _ngcontent-dum-c12="" class="form-control ng-untouched ng-pristine ng-invalid" id="title" name="title" required="" type="text">
                    </div>
                    <div _ngcontent-dum-c12="" class="form-group">
                      <label _ngcontent-dum-c12="">Description*</label>
                      <textarea _ngcontent-dum-c12="" class="form-control ng-untouched ng-pristine ng-invalid" id="descripion" name="descripion" required="" rows="3"></textarea>
                    </div>
                    <div _ngcontent-dum-c12="" class="row form-group">
                      <div _ngcontent-dum-c12="" class="col-md-4">
                        <div _ngcontent-dum-c12="" class=" fileUpload btn btn-primary choose-btn">
                          <span _ngcontent-dum-c12="">
                          <i _ngcontent-dum-c12="" aria-hidden="true" class="fa fa-upload"></i> &nbsp; Upload</span>
                          <input _ngcontent-dum-c12="" accept="image/*" class="upload" ng2fileselect="" type="file" name='image'>
                        </div>
                      </div>
                    </div>
                    <br _ngcontent-dum-c12="">
                    <div _ngcontent-dum-c12="" class="form-group">
                      <div _ngcontent-dum-c12="" class="col-sm-12 text-right">
                      <button _ngcontent-dum-c12="" class="btn btn-danger ">Cancel</button>&nbsp;&nbsp; 

                      <button _ngcontent-dum-c12="" class="btn btn-primary ladda-button" data-spinner-color="#000000" data-style="expand-right" type="submit" data-spinner-size="30" data-spinner-lines="12" >
                        <span class="ladda-label">Add Category </span>
                        <span class="ladda-spinner"></span
                      ></button>
                      </div>
                    </div>
                    <p _ngcontent-dum-c12="">
                      <small _ngcontent-dum-c12="" class="text-muted">* Required Fields</small>
                    </p>
                  </div>
                </div>
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