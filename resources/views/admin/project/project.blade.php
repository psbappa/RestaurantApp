<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Projects</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/admin-lte/dist/css/skins/skin-blue.min.css">

  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
  .column{
    width:40%;
    float:left;
    padding: 0 5%;
    color:blue;
    font-family: Verdana;
    font-size: 15px; 
  }

  body {background:#e2e2e2;}
  /********card frame **************/
  .card {position: relative; border-radius: 3px; background-color: #fff;color: #4f5256;border: 1px solid #f2f2f2;margin-bottom: 16px;background:#fff;}
  .card-header{ padding: 16px;margin:0px;}
  .card-body {position: relative; padding: 16px;}

  .gaadiex-list {list-style-type: none; margin: 0;padding: 0;}
  .gaadiex-list>.gaadiex-list-item {padding: 0 22px;}
  .gaadiex-list-item-img  {
      float: left;
      width: 58px;
      height: 58px;
      margin-top: 20px;
      margin-bottom: 8px;
      margin-right: 20px;
      border-radius: 50%;
  }
  .gaadiex-list-item i  {
      float: left;
      font-size:48px;
      width: 58px;
      height: 58px;
      margin-top: 20px;
      margin-bottom: 8px;
      margin-right: 20px;
      border-radius: 50%;
  }
  .border-b-1 {border-bottom: 1px solid rgba(162,162,162,.16);}
</style>
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
        Project Management
      </h1>
      
    </section>
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{url('admin/saveProject')}}" method="post"  novalidate="" class="ng-untouched ng-pristine ng-invalid" enctype='multipart/form-data'>
                @csrf

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
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

                <div class="panel b">
                  <div class="panel-body">
                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                                Add Project
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                              Project List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
                                Options
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tab-space">
                        <div class="tab-pane active" id="link1" aria-expanded="true">
                          <div class="form-group">
                            <label>Project name*</label>
                            <input class="form-control ng-untouched ng-pristine ng-invalid" id="projectname" name="projectname" required="" type="text">
                          </div>
                          
                          <div class="form-group">
                              <label>Client name*</label>
                              <input class="form-control ng-untouched ng-pristine ng-invalid" id="clientname" name="clientname" required="" type="text">
                          </div>
      
                          <div  class="form-group">
                            <label >Description*</label>
                            <textarea  class="form-control ng-untouched ng-pristine ng-invalid" id="description" name="description" required="" rows="3"></textarea>
                          </div>
                          
                          <div  class="form-group">
                            <label >Assigned Developers*</label>
                              <div class="container">
                                <div class="row">
                                    <div class="col-md-8 offset-2 mt-5">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <h6 class="text-white">Choose Our Dedicated Developers</h6>
                                            </div>
                                            <div class="card-body">
                                              <div class="">
                                                  <label><strong>Select Category :</strong></label><br/>
                                                  <select class="selectpicker" multiple data-live-search="true" name="assigned_members[]">
                                                    <?php foreach($dedicatedMembers as $value) { ?>
                                                      <option value="{{$value['id']}}">{{$value['membertname']}}</option>
                                                    <?php } ?>
                                                  </select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                          </div>

                          <div class="form-group">
                            <label>Time Line*</label><br>
                              <div class="row">
                                  <div class="col-lg-6">
                                      <label>Start Date</label>
                                      <input name="startdate" id="startdate" width="270" />
                                  </div>
                                  <div class="col-lg-6">
                                      <label>End Date</label>
                                      <input name="duedate" id="duedate" width="270" />
                                  </div>
                              </div>
                          </div>
      
                          <div  class="form-group">
                            <div  class="col-sm-12 text-right">
                              <button  class="btn btn-danger ">Cancel</button>&nbsp;&nbsp; 
      
                              <button  class="btn btn-primary ladda-button" data-spinner-color="#000000" data-style="expand-right" type="submit" data-spinner-size="30" data-spinner-lines="12" >
                                <span class="ladda-label">Add Project</span>
                                <span class="ladda-spinner"></span>
                              </button>
                            </div>
                          </div>
                          <p><small  class="text-muted">* Required Fields</small></p>
                        </div>
                        <div class="tab-pane" id="link2" aria-expanded="false">
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-header">
                                <h4>Project with members </h4>
                              </div>
                              <?php 
                              // print_r($allprojects);
                              foreach ($allprojects as $value) { ?>
                              <div class="gaadiex-list">
                                <div class="gaadiex-list-item">
                                  {{-- <img class="gaadiex-list-item-img" src="/images/members/{{$value['']}}" alt="List user"> --}}
                                  <div class="gaadiex-list-item-text">
                                    <h3><a href="#">{{$value['projectname']}}</a></h3>
                                    <div>
                                      <small style="float:left">Client ::</small><h4>{{$value['clientname']}}</h4>
                                      <div class="card">
                                        <div class="row w-100">
                                                <div class="col-md-3">
                                                    <div class="card border-info mx-sm-1 p-3">
                                                        <div class="card border-info shadow text-info p-3 my-card" >
                                                          {{-- <span class="fa fa-car" aria-hidden="true"></span> --}}
                                                          <img class="img-responsive" alt="" src="/images/members/1599098476_8241_tmpphpumXNcD.png" />
                                                        </div>
                                                        <div class="text-info text-center mt-3"><h4>Cars</h4></div>
                                                        <div class="text-info text-center mt-2"><h5>234</h5></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card border-success mx-sm-1 p-3">
                                                        <div class="card border-success shadow text-success p-3 my-card">
                                                          {{-- <span class="fa fa-eye" aria-hidden="true"></span> --}}
                                                          <img class="img-responsive" alt="" src="/images/members/1599098476_8241_tmpphpumXNcD.png" />
                                                        </div>
                                                        <div class="text-success text-center mt-3"><h4>Eyes</h4></div>
                                                        <div class="text-success text-center mt-2"><h5>9332</h5></div>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                    {{-- <p>description</p> --}}
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="link3" aria-expanded="false">
                            Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                            <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                        </div>
                    </div>
                    
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

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
   $('#startdate').datepicker({
        uiLibrary: 'bootstrap'
    });

    $('#duedate').datepicker({
        uiLibrary: 'bootstrap'
    });

    $('select').selectpicker();
</script>
</body>
</html>