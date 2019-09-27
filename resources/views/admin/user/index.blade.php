@extends('layouts.admin')

@section('title-website')
    User
@endsection

@section('title')
    Data User
@endsection

@section('content')
@include('admin.user.create')
@include('admin.user.edit')
@include('admin.user.delete')
@include('layouts.flash')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <button id="tambah-data" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">Add Data</button>
                    </h3>
                </div>  
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>User Name</center></th>
                                <th><center>Email</center></th>
                                <th><center>Role Name</center></th>
                                <th colspan="2" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no =1; @endphp
                        @foreach ($user as $data)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td><center>{{ $data->name }}</center></td>
                                <td><center>{{ $data->email }}</center></td>
                                <td><center>
                                    @if($data->hasRole('Admin'))
                                    Administrator
                                    @elseif($data->hasRole('Member'))
                                    Member
                                    @endif
                                </center></td>

                                <td align="right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit"
                                 data-id="{{ $data->id }}"
                                 data-name="{{ $data->name }}"
                                 data-email="{{ $data->email }}"
                                 data-password="{{ $data->password }}"
                                 data-role="{{ $data->hasRole('Role') }}"><i class="fa fa-edit"></i></button>
                                </td>
        
                                @if( $data->id != Auth::id() )
                                <td>
                                    <button type="button" id="hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus"
                                    data-id="{{ $data->id }}" 
                                    data-name="{{ $data->name }}"><i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                                @endif
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
        $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var password = button.data('password')
        var modal = $(this)
    
        modal.find('input[name="id"]').val(id)
        modal.find('input[name="name"]').val(name)
        modal.find('input[name="email"]').val(email)
        modal.find('input[name="password"]').val(password)
    })  
   </script>

   <script>
        $('#hapus').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
    
        modal.find('input[name="id"]').val(id)
        modal.find('input[name="name"]').val(name)
    })  
    </script>
@endpush