// FUNCTIONS

const addDetail = async e => {
  e.preventDefault()
  let id_nivel = document.querySelector('[name="id_nivel"]').value
  let escuela = document.querySelector('[name="escuela"]').value
  let carrera = document.querySelector('[name="carrera"]').value
  let fecha_inicio = document.querySelector('[name="fecha_inicio"]').value
  let fecha_fin = document.querySelector('[name="fecha_fin"]').value

  if (!id_nivel || !escuela || !carrera || !fecha_inicio || !fecha_fin) {
    swal('¡Error!', 'Llena todos los campos', 'error');
    return
  }

  try {
    const res = await axios.post(urlLevelDetails, { id_nivel, escuela, carrera, fecha_inicio, fecha_fin })
    const data = res.data.detalleNivel
    swal('Ok', 'Se agregó correctamente', 'success');
    
    document.querySelector('[name="escuela"]').value = ''
    document.querySelector('[name="carrera"]').value = ''
    document.querySelector('[name="fecha_inicio"]').value = ''
    document.querySelector('[name="fecha_fin"]').value = ''

    const detailTemplate = `
      <tr id="detail-${data.id}">
        <td>${data.id_nivel}</td>
        <td>${data.escuela}</td>
        <td>${data.carrera}</td>
        <td>${data.fecha_inicio}</td>
        <td>${data.fecha_fin}</td>
        <td>${data.estatus}</td>
        <td>
          <div class="btn-group form-inline">
          <a class="btn btn-danger btn-sm" data-id="${data.id}">
            <i class="glyphicon glyphicon-trash"></i>
          </a>
          </div>
        </td>
      </tr>
    `
    $('#details').append(detailTemplate)
  } catch (e) {
    swal('¡Error!', 'No se pudo agregar', 'error');
  }
}

const deleteDetail = e => {
  e.preventDefault()
  const id = e.currentTarget.dataset.id

  swal({
    title: '¿Estás seguro?',
    text: "¡No se podrán deshacer los cambios!",
    type: 'warning',
    buttons: [
      'No, cancelar',
      'Si, Estoy seguro'
    ],
    dangerMode: true
  }).then(async isConfirm => {
    if (isConfirm) {
      try {
        const res = await axios.delete(`${urlLevelDetails}/${id}`)
        const data = res.data
        swal('Eliminado', 'Se eliminó correctamente', 'success');
        $(`#detail-${data.id}`).remove();
      } catch (e) {
        swal('¡Error!', 'No se pudo eliminar el registro', 'error');
      }
    }
  })
}


// EVENTS
const btnAddDetail = document.querySelector('#btnAddDetail')
const formDetail = document.querySelector('#formDetail')

btnAddDetail.addEventListener('click', addDetail)
$(document).on('click', '.btn-danger', deleteDetail)
