//obtener todos los inputs
const inputs = document.querySelectorAll('.inputs-form');

//deshabilitarlos
inputs.forEach(input => {
  input.disabled = true; 
});

const btnEditar = document.getElementById('btn-editar');
const btnEliminar = document.getElementById('btn-eliminar');

btnEditar.addEventListener('click', () => {
  //habilitar inputs
  inputs.forEach(input => {
    input.disabled = false;
  });

  //cambiar value
  btnEditar.value='Guardar';
  btnEditar.name='btn-actualizarTarea';
  //ocultar boton de eliminar
  btnEliminar.style.display="none";
});



