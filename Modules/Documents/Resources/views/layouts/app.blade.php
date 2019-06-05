<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  @include('documents::layouts.includes.head')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-yellow-light sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        @include('documents::layouts.includes.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('documents::layouts.includes.aside')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('documents::layouts.includes.footer')

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset("js/app.js") }}"></script>

    <!-- jQuery 3 -->
    <script src="{{ asset("/js/jquery.min.js") }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset("/js/bootstrap.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("/js/adminlte.min.js") }}"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
        Both of these plugins are recommended to enhance the
        user experience. -->
        <!-- Slimscroll -->
    <script src="{{ asset("/js/jquery.slimscroll.min.js") }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset("/js/bootstrap-datepicker.min.js") }}"></script>
    <script src="{{ asset("/js/bootstrap-datepicker.es.min.js") }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

    @stack('extra-js')

    <script type="text/javascript">
        $('.fecha').datepicker({format: 'yyyy/mm/dd',language: 'es', autoclose: true});
        $('.ano').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
            language: 'es'
        });

        const alertConfig = {
            timer: 1000,
            button: false
        }

        const dataTableConfig = {
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        }

        const deleteRow = e => {
            e.preventDefault()
            const url = e.currentTarget.dataset.url
            const el = e.currentTarget.dataset.el

            swal({
                title: '¿Estás seguro?',
                text: "No se podrán deshacer los cambios",
                type: 'warning',
                buttons: [
                    'No, cancelar',
                    'Si, Estoy seguro'
                ],
                dangerMode: true
            }).then(async isConfirm => {
                if (isConfirm) {
                    try {
                        const res = await axios.delete(url)
                        const data = res.data
                        swal('Eliminado', 'Se eliminó correctamente', 'success', alertConfig)
                        table.row(el).remove().draw()
                    } catch (e) {
                        swal('¡Error!', 'No se pudo eliminar el registro', 'error', alertConfig)
                    }
                }
            })
        }

        $(document).on('click', '.btn-danger', deleteRow)
        const table = $('.table').DataTable(dataTableConfig);
    </script>
</body>
</html>
