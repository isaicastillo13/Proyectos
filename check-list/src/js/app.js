//obtener todos los inputs
const inputs = document.querySelectorAll('.inputs-form');

//deshabilitarlos
inputs.forEach(input => {
  input.disabled = true; 
});

const btnEditar = document.getElementById('btn-editar');
const btnCancelar = document.getElementById('btn-cancelar');
const btnActTarea = document.getElementById('btn-actTarea');
const btnEliminar = document.getElementById('btn-eliminar');

btnEditar.addEventListener('click', () => {
  //habilitar inputs
  inputs.forEach(input => {
    input.disabled = false;
  });
  
  btnActTarea.style.display = 'inline-block';
  btnEliminar.style.display = 'inline-block';
  btnEditar.style.display='none';
  btnCancelar.style.display='none';
});


