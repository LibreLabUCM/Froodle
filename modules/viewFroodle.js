

const BUTTON = document.getElementById('enviar');
const CONTAINER = document.getElementById('container');

BUTTON.addEventListener('click', searchFroodle);

function searchFroodle(){
  var title = document.getElementById('titulo').value;
  $.post('searchFroodle.php', {value:title},
  function(data){
    CONTAINER.innerHTML = data;
  });
}
