@extends('documents::layouts.app')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de Alumnos
    <small>Aquí se muestran todos los alumnos del grupo</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li>Administrar</li>
    <li class="active">Alumnos</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Alumnos</h3>
          <button type="button" class="btn btn-primary" title="Agregar" id="btnAdd">
            <i class="fa fa-plus"></i> Agregar
          </button>
          <br><br>
          <p><b>Grupo:</b> {{ $group->nombre }}</p>
          <p><b>Descripción:</b> {{ $group->descripcion }}</p>
          <p><b>Profesor:</b> {{ optional($group->profesor)->nombre_completo ?: '---' }}</p>
        </div>
        <form role="form">
          <div class="box-body">
            <div class="col-md-12">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="box-body table-responsive no-padding">
                      <table id="tblAlumnos" class="table table-hover table-striped">
                        <thead>
                          <tr role="row">
                            <th>Nombre</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($group->alumnos as $student)
                          <tr role="row" class="odd" id="row-{{ $student->id }}">
                            <td>{{ $student->nombre_completo }}</td>
                            <td>
                              <div class="btn-group form-inline">
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-url="{{ route('groups.remove-student', [$group, $student]) }}" data-el="#row-{{ $student->id }}">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          @empty
                          {{-- <tr>
                            <td colspan="5" class="text-center">No hay alumnos</td>
                          </tr> --}}
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar Alumno</h4>
        </div>
        <div class="modal-body">
          <div>
            <div class="form-group">
              <label>Usuario:</label>
              <select name="id_student" id="id_student" class="form-control"></select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" onclick="addStudent()" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('extra-js')
<script>
  const urlAddStudent = '{{ route('groups.add-student', $group) }}'
  const btnAdd = document.querySelector('#btnAdd')

  btnAdd.addEventListener('click', async e => {
    e.preventDefault()

    try {
        document.querySelector('#id_student').innerHTML = ''
        const res = await axios.get('{{ route('groups.available-users', $group) }}')
        const users = res.data.users

        if (! users.length) {
            const emptyOption = `<option value="">No hay usuarios</option>`
            document.querySelector('#id_student').insertAdjacentHTML('beforeend', emptyOption)
        }

        users.forEach(user => {
            const option = `<option value="${user.id}">${user.nombre_completo}</option>`
            document.querySelector('#id_student').insertAdjacentHTML('beforeend', option)
        });

        $('#modal').modal('show');
    } catch (err) {
        console.log(err)
    }
  })

  const addStudent = async _ => {
    const id_student = document.querySelector('#id_student').value

    try {
      const res = await axios.post(urlAddStudent, { id_student })
      const { url, student } = res.data
      const btnRemove = `
        <div class="btn-group form-inline">
          <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-url="${url}" data-el="#row-${student.id}">
            <i class="fa fa-trash"></i>
          </button>
        </div>
      `
      const rowNode = table.row.add([student.nombre_completo, btnRemove]).draw().node()
      $(rowNode).attr('id', `row-${student.id}`)
      $('#modal').modal('hide');
      swal('Éxito', 'Datos guardados correctamente', 'success', alertConfig);
    } catch (err) {
      swal('Error', 'Ocurrió un error al guardar los datos', 'error', alertConfig)
    }
  }
</script>
@endpush
