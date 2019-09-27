@extends('layouts.admin')

@section('title-website')
    Tag
@endsection

@section('title')
    Data Tag
@endsection

@include ('layouts.flash')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <button id="tambah-data" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdd">Add Data</button>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <th>Tag Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="data-tag">
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@include('admin.tag.modal')

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

    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Data tag
            $('#dataTable').DataTable({
            dataType: "json",
            ajax: {
                    url: '/api/tag/',
                    dataType: "json",
                    type: "GET",
                    stateSave : true,
                    serverSide: true,
                    processing: true,
            },
            responsive:true,
            columns: [
                    { data: 'nama', name: 'nama' },
                    { data: 'slug', name: 'slug' },
                    { data: 'id', render : function (data, type, row, meta) {
                        return `
                        <button type="button" class= "btn btn-primary btn-sm"
                            data-target="#modalEdit"
                            data-toggle="modal"
                            data-id="${row.id}"
                            data-nama="${row.nama}"
                            ><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm"
                            data-id="${row.id}"
                            id="hapus-datatag"
                            ><i class="fa fa-trash-o"></i></button>
                        `;
                        }
                    }
                ]
            });
            // Tambah Data
            $('#formAdd').on('submit', (e) => {
                e.preventDefault();
                $.ajax({
                    url: '/api/tag',
                    method: 'POST',
                    data: {
                        nama: $('.c-nama').val()
                    },
                    dataType: 'json',
                    success: (res) => {
                        if(res.errors) {
                            $.each(res.errors, function(k, v) {
                            $('.notify-alert').show();
                            $('.notify-alert').html('')
                            $('.notify-alert').append(
                                    `
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-ban"></i> Upss!</h4>
                                        ${v}
                                    </div>
                                    `
                                )
                            })
                        } else {
                            $('#formAdd')[0].reset();
                            Swal.fire(
                                'Good job!',
                                res.message,
                                'success'
                            )
                            location.reload();
                        }
                    },
                    error: (err) => {
                        console.log(err);
                    }
                })
            })
            // Tampilan Modal Edit Data
          // get Edit data
            $('#modalEdit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var nama = button.data('nama')
                var modal = $(this)
                modal.find('.modal-body input[name="id"]').val(id)
                modal.find('.modal-body input[name="nama"]').val(nama)
            })
            // Update Data
            $('#formEdit').on('submit', (e) => {
                e.preventDefault();
                var formData = new FormData($('#formEdit')[0]);
                var id = formData.get('id');
                $.ajax({
                    url: '/api/tag/'+ id,
                    method: 'PUT',
                    data: {
                        id: id,
                        nama: $('.e-nama').val()
                    },
                    dataType: 'json',
                    success: (res) => {
                        if(res.errors) {
                            $.each(res.errors, function(k, v) {
                            $('.notify-alert-edit').show();
                            $('.notify-alert-edit').html('')
                            $('.notify-alert-edit').append(
                                    `
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-ban"></i> Upss!</h4>
                                        ${v}
                                    </div>
                                    `
                                )
                            })
                        } else {
                            Swal.fire(
                                'Data tag Successfully Edited!',
                                res.message,
                                'success'
                            )
                            location.reload();
                            $('#formEdit')[0].reset();
                          
                        }
                    },
                    error: (err) => {
                        console.log(err);
                    }
                });
            })
            //Tampilan Modal Hapus Data
            // Hapus Data
            $("#dataTable").on('click', '#hapus-datatag', function () {
                var id = $(this).data("id");
                // alert(id)
                $.ajax({
                    url: '/api/tag/' + id,
                    method: "DELETE",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function (berhasil) {
                        Swal.fire(
                            berhasil.message,
                            berhasil.type,
                            berhasil.success
                        )
                        location.reload();
                    },
                    error: function (gagal) {
                        console.log(gagal)
                    }
                })
            })
        })
    </script>
@endpush