const TITLE = document.getElementById('title');
const DATE_FORM = document.getElementById('date');
const TIME_FORM = document.getElementById('time');
const ADD_DATE_BTN = document.getElementById('add_date');
const ADD_FROODLE = document.getElementById('add_froodle')
let dates = [];

ADD_DATE_BTN.addEventListener('click', addDate);
ADD_FROODLE.addEventListener('click', addFroodle);

function addDate(){
  //añado la fecha a un array y al ui:
  let date = DATE_FORM.value;
  let time = TIME_FORM.value;
  fechas.innerHTML += '<p>' + date + " " +  time + ' <button class = "btn btn-danger" onclick = "eliminar(this.parentElement, date)"> Eliminar </button></p>';
  dates.push({'date':date,'time':time})
}
function eliminar(e, date){
  //eliminamos la fecha del array y del ui:
  let index = dates.indexOf(date);
  dates.splice(index, 1)
  e.parentNode.removeChild(e);
}

function addFroodle(){
  //monto un array y lo paso a php...:
  let title = TITLE.value;
  dates.splice(0, 0, title);
  $.post('validate.php', {value: dates},
   function(data){
     console.log(data);
   });
  //antes de meter el array en la db habria que formatearlo un poco...
}
