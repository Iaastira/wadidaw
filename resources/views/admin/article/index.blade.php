@extends('layouts.admin')

@section('title-website')
    Article
@endsection

@section('title')
    Data Article
@endsection

@section('content')
@include('admin.article.create')
@include('admin.article.delete')
@include('layouts.flash')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <button id="tambah-data" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdd">Add Data</button>
                    </h3>
                </div>
            <table>
            <tr>
                <td>&nbsp &nbsp</td>
                <form action="{{ route('article.index') }}">
                    <td><input type="text" class="form-control" name="cari" placeholder="Search"></td>
                    <td>&nbsp &nbsp</td>
                      <td><button class="btn btn-primary"><i class="fa fa-search"></i></button></td>
                </form>
            </tr>
            </table>    
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><center> No </center></th>
                                <th><center> Title </center></th>
                                <th><center> Slug </center></th>
                                <th><center> Category </center></th>
                                <th><center> Tags </center></th>
                                <th><center> Author </center></th>
                                <th><center> Image </center></th>
                                <th colspan="2" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no =1; @endphp
                        @foreach ($article as $data)
                            <tr>
                                <td><center> {{ $no++ }}</td></center>
                                <td><center> {{$data->judul}}</td></center>
                                <td><center> {{$data->slug}}</td></center>
                                <td><center> {{$data->category->nama}}</td></center>
                                <td><center> 
                                    <ol>
                                        @foreach($data->tag as $a)
                                            <li>{{ $a->nama }}</li>
                                        @endforeach
                                    </ol>
                                </td></center>
                                <td><center> {{$data->user->name}}</td></center>
                                <td>
                                    <center>
                                    <img width="60px" height="60px"
                                    src="{{ asset('assets/img/article/'. 
                                    $data->foto.'') }}" alt="Foto" style="border-radius: 6%">
                                    </center>
                                </td>

                                <td align="right">
                                    <a href="{{route('article.edit', $data->id)}}">
                                    <button type="button" id="edit-data" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" id="edit-data" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus"
                                            data-id="{{ $data->id }}" 
                                            data-judul="{{ $data->judul }}"><i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@endsection

@section('css')
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{asset('AdminLTE/assets/vendor/select2/select2.min.css')}}">

@endsection

@push('js')

    <!-- jQuery 3 -->
    <script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('AdminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
   
    <script src="{{asset('AdminLTE/assets/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('AdminLTE/assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('AdminLTE/assets/js/components/select2-init.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        $(document).ready(function () {
        $('#select2').select2();
    })
    </script>

     <script>
        $('#hapus').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var judul = button.data('judul')
        var modal = $(this)
    
        modal.find('input[name="id"]').val(id)
        modal.find('input[name="judul"]').val(judul)
    })  
        </script>
@endpush