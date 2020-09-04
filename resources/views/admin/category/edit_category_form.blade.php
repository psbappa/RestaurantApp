<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit</title>
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
        Company
      </h1>
      
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{url('admin/saveCategory')}}/{{$category_data['id']}}" method="post" enctype='multipart/form-data'>
                @csrf

                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <?php
                    // dd($category_data);
                    // $title = $category_data['title'];
                    
                ?>
                <div class="form-group">
                  <label for="company_name">Category name:</label>
                  <input type="text" class="form-control"  name="title" value="{{$category_data['title']}}">
                </div>

                <div class="form-group">
                  <label for="address">Description:</label>
                  <textarea class="form-control" name="description" cols="20" rows="5">{{$category_data->descripion}}</textarea>
                </div>
                <div class="clearfix"></div>

                {{-- <div class="form-group">
                    <label for="address">Image:</label>
                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/category/{{$category_data['image']}}" style="width:30%">
                        <img class="img-responsive" alt="" src="/images/category/{{$category_data['image']}}" name="image_file" id="image_file"/>
                        <div class='text-center'>
                            <small class='text-muted'></small>
                        </div>
                    </a>
                    <input class="delete" type="button" onclick=this.deleteImage value="Delete" />
                </div> --}}

                {{-- <div  class="row form-group">
                  <div class="col-md-4">
                    <div class=" fileUpload btn btn-primary choose-btn">
                      <span>
                      <i aria-hidden="true" class="fa fa-upload"></i> &nbsp; Upload</span>
                      <input accept="image/*" class="upload" type="file" name='image'>
                    </div>
                  </div>
                </div> --}}
                <a class="thumbnail fancybox" rel="ligthbox" href="/images/category/{{$category_data['image']}}" style="width:30%">
                  <input accept="image/*" class="upload" type="file" name='image' onchange="readURL(this);">
                  <img id="blah" src="/images/category/{{$category_data['image']}}" alt="your image" />
                </a>
                <div class="clearfix"></div>
                
                <button type="submit" class="btn btn-primary product_btn">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- footer -->
  @include('admin/layout/footer')

  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->
<script src="{{ url('/') }}/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{ url('/') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/bower_components/admin-lte/dist/js/adminlte.min.js"></script>

<script>
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#blah')
                  .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>

</body>
</html>