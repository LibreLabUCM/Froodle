
  var dates = [];
  const enviar = document.getElementById('enviar');
  const crear = document.getElementById('crear');
  const add_element = document.getElementById('add_element');

  add_element.addEventListener('click' , add_elements);
  enviar.addEventListener('click' , addDate);
  crear.addEventListener('click', addFroodle);

  function addDate(){

    let includes = false;
    const titulo = document.getElementById('titulo').value;
    var date = document.getElementById('fecha').value;
    var time = document.getElementById('hora').value;

    //compruebo si el date ya se encuentra en alguna entrada anterior:
    for(entry of dates){
      if(entry.date.includes(date)){
        includes = true;
      }else{
        includes = false;
      }
    }
    if(includes){
      //en este caso sólo meto la hora
      entry.hours.push({'hour': time});
    }else{
      //en otro caso tengo que crear una entrada nueva entera del array
      dates.push({'date': date, 'hours' : [{'hour': time}]});
    }
  }

  function addFroodle(){
    let title = titulo.value;
    dates.splice(0, 0, title);
    $.post('validateFroodle.php', {value: dates},
    function(data){
      console.log(data);
      window.location = "froodleCreated.php?title=" + title;
    });
  }
  function add_elements(){
    console.log(element);
    elements.push(element);
  }
