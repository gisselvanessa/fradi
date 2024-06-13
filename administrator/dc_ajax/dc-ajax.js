function objetoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function cerrarSession(){
  window.location.href = "login/index.php";
}

/**
 * 
 * @param {*} id este metodo es para actualizar jsakdjlasjalk ... el parametro es el id del valor aksjkd
 */




function actualizarValor(id){ //español C5
  val1es= document.getElementById('textField_5_2').value
  document.getElementById('textField_5_4').value=val1es
  
  val2es= document.getElementById('textField_5_3').value
  document.getElementById('textField_5_5').value=val2es
  
cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')

option=id;
option4=cad[0].value; 
option6=cad[1].value;
option5=document.formulMasdetalles.iddetalle.value;


  if(val1es!=="" && val2es!==""){

    enviarDatos(val1es,val2es,option4,option6, option5)
    console.log(val1es,val2es)
    // console.log(id)
    }
}



function actualizarValor2(id){ //english C5
  val1en= document.getElementById('textField_5_4').value
   document.getElementById('textField_5_2').value=val1en
   val2en= document.getElementById('textField_5_5').value
   document.getElementById('textField_5_3').value=val2en

   cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')

option=id;
option4=cad[0].value; 
option6=cad[1].value;
option5=document.formulMasdetalles.iddetalle.value;


  if(val1en!=="" && val2en!==""){
    enviarDatos(val1en,val2en,option4,option6, option5)
    console.log(val1en,val2en)
    // console.log(id)


    }
}

function actualizarValor3(id){ //english C6
  val1en= document.getElementById('textField_6_2').value
   document.getElementById('textField_6_3').value=val1en

   cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')

option=id;
option4=cad[0].value; 
option6=cad[1].value;
option5=document.formulMasdetalles.iddetalle.value;


  if(val1en!==""){
    console.log(val1en)

    // console.log(id)

    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/envioValoresC14.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+val1en+"&valor3="+option4+"&valor4="+option6+"&valor5="+option5);
   
      console.log('envioCheckDB'+id+','+option);
    }
}

function actualizarValor4(id){ //english C6
  val1en= document.getElementById('textField_6_3').value
   document.getElementById('textField_6_2').value=val1en

cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')

option=id;
option4=cad[0].value; 
option6=cad[1].value;
option5=document.formulMasdetalles.iddetalle.value;


  if(val1en!==""){
    // enviarDatos(val1en,val2en,option4,option6, option5)
    console.log(val1en)
    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/envioValoresC14.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+val1en+"&valor3="+option4+"&valor4="+option6+"&valor5="+option5);
   
      console.log('envioCheckDB'+id+','+option);
    }
}
function radioParalelo(id){

  cad2=document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0]

    console.log(cad2);
    ch= document.getElementById(id).checked
    // // console.log(fath);
    

    if(ch){
      //checar tambien al padre
      document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0].checked = true;
      console.log('checkbox trrue')
      // fath.check
    }
    else{
      console.log("error")
    }

  rad1=document.getElementById('rad_7_1')
  rad2=document.getElementById('rad_7_3')
  rad3=document.getElementById('rad_7_2')
    cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')
    option=id;
    option4=cad[0].value; 
    option6=cad[1].value;
    option5=document.formulMasdetalles.iddetalle.value;


  if(rad1.checked ===true){
    rad2.checked =true;
    console.log(cad)
  }
  else if(rad2.checked ===true){
    rad1.checked=true;
  }

  ajax=objetoAjax();
  ajax.open("POST", "administrator/registry/envioValoresC7.php",true);


  ajax.onreadystatechange=function() 
    {
      if (ajax.readyState==4) 
      {
        option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
      }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("valor1="+rad1.checked+"&valor2="+rad3.checked+"&valor3="+option4+"&valor4="+option6+"&valor5="+option5);
 
    console.log('envioCheckDB'+id+','+option);

    envioCheckDB(cad2.id);

}

function radioParalelo2(id){

  cad2=document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0]

    console.log(cad2);
    ch= document.getElementById(id).checked
    // // console.log(fath);
    

    if(ch){
      //checar tambien al padre
      document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0].checked = true;
      console.log('checkbox trrue')
      // fath.check
    }
    else{
      console.log("error")
    }


  rad1=document.getElementById('rad_7_2')
  rad2=document.getElementById('rad_7_4')
  rad3=document.getElementById('rad_7_1')
  cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')
    option=id;
    option4=cad[0].value; 
    option6=cad[1].value;
    option5=document.formulMasdetalles.iddetalle.value;


   if(rad1.checked ===true){
    rad2.checked =true;
    console.log(cad)
  }
  else if(rad2.checked ===true){
    rad1.checked=true;
  }

   ajax=objetoAjax();
  ajax.open("POST", "administrator/registry/envioValoresC7.php",true);

console.log(rad1.checked,rad3.checked)
  ajax.onreadystatechange=function() 
    {
      if (ajax.readyState==4) 
      {
        option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
      }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("valor1="+rad3.checked+"&valor2="+rad1.checked+"&valor3="+option4+"&valor4="+option6+"&valor5="+option5);
 
    console.log('envioCheckDB'+id+','+option);
    envioCheckDB(cad2.id);


}

// function enviaDate(){
//   console.log('Holaa')
// }

function actualizarValor14_1(id){
  val1es= document.getElementById('textField_14_2').value
  document.getElementById('textField_14_3').value=val1es
  
  // val2es= document.getElementById('textField_5_3').value
  // document.getElementById('textField_5_5').value=val2es
  
  cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')

  option=id;
  option4=cad[0].value; 
  option6=cad[1].value;
  option5=document.formulMasdetalles.iddetalle.value;


    console.log(val1es)

    // console.log(id)

    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/envioValoresC14.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+val1es+"&valor3="+option4+"&valor4="+option6+"&valor5="+option5);
   
      console.log('envioCheckDB'+id+','+option);
    

}

function actualizarValor14_2(id){
  val1en= document.getElementById('textField_14_3').value
  document.getElementById('textField_14_2').value=val1en
  
  // val2es= document.getElementById('textField_5_3').value
  // document.getElementById('textField_5_5').value=val2es
  
  cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')

  option=id;
  option4=cad[0].value; 
  option6=cad[1].value;
  option5=document.formulMasdetalles.iddetalle.value;

  console.log(val1en)

    // console.log(id)

    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/envioValoresC14.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+val1en+"&valor3="+option4+"&valor4="+option6+"&valor5="+option5);
   
      console.log('envioCheckDB'+id+','+option);
    
}

function enviarDatos(opt1,opt2,opt3,opt4,opt5){

    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/envioValores.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+opt1+"&valor2="+opt2+"&valor3="+opt3+"&valor4="+opt4+"&valor5="+opt5);
   
      // console.log('envioCheckDB'+id+','+option);
    
}

function BuscadorRegistros(){

  // window.location.href = "client.php";
	       divResultado = document.getElementById('consultapersonas');
         // divResultado =window.location.assign("client.php");
	       // console.log(divResultado);
         // console.log("hi");
			opcion1=document.form1.textfield.value;
	 console.log(opcion1); 

			divResultado.innerHTML= '<p class="loader" align="center"></p>';
			ajax=objetoAjax();
			ajax.open("POST", "administrator/consultas/index1.php",true);
            //ajax.open("POST", "administrator/consultas/index_filtro.php",true);
			//ajax.open("GET", datos);
            //document.form3.submit.disabled=false;
    //   $.ajax({
    //   type: "GET",
    //   url: "yourPage.php"
    // }).done(function( data) {
    //   alert( "Request is done" );
    // });


			ajax.onreadystatechange=function() 
			{
				if (ajax.readyState==4) 
				{
					
					divResultado.innerHTML = ajax.responseText
					//confirm('Verificar Mensaje...')
                    
				}
			}
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			ajax.send("valor1="+opcion1);

}
function BuscadorRegistrosUser(){

  // window.location.href = "client.php";
	       divResultado = document.getElementById('consultapersonas');
         // divResultado =window.location.assign("client.php");
	       // console.log(divResultado);
         // console.log("hi");
			opcion1=document.form1.textfield.value;
	 console.log(opcion1); 

			divResultado.innerHTML= '<p class="loader" align="center"></p>';
			ajax=objetoAjax();
			ajax.open("POST", "../user/consultas/index1.php",true);
            //ajax.open("POST", "administrator/consultas/index_filtro.php",true);
			//ajax.open("GET", datos);
            //document.form3.submit.disabled=false;
    //   $.ajax({
    //   type: "GET",
    //   url: "yourPage.php"
    // }).done(function( data) {
    //   alert( "Request is done" );
    // });


			ajax.onreadystatechange=function() 
			{
				if (ajax.readyState==4) 
				{
					
					divResultado.innerHTML = ajax.responseText
					//confirm('Verificar Mensaje...')
                    
				}
			}
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			ajax.send("valor1="+opcion1);

}

function RegistrarDetalleReclamo(){
  divResultado = document.getElementById('reportegrabars');
  // divResultado.innerHTML ='<p align=center><font color=red>Cargando1...</font></p>';
 // document.formulMasdetalles.btregistrar.disabled=true;
  var Insertaremos = confirm("Desea Almacenar los Registros REs?")
  if ( Insertaremos ) 
  {
      

      opciones1=document.formulMasdetalles.comerce.value;
      opciones2=document.formulMasdetalles.fechaReg.value;
      opciones3=document.formulMasdetalles.description.value;
      opciones4=document.formulMasdetalles.amount.value;
      opciones5=document.formulMasdetalles.iddetalle.value;
    
  if( opciones1=='' || opciones2=='' || opciones3=='' || opciones4=='' )
  {
    confirm("Por favor llenar el formulario con los datos solicitados. \n(*) Campos Importantes.")
    divResultado.innerHTML ='<p align=center><font color=red>Por favor llenar el formulario con los datos solicitados. (*) Campos Importantes.</font></p>'; 
    
 //   document.frmguardars.btregistrar.disabled=false;  
//     open("index.php");

  }
  else
  {
      divResultado.innerHTML= '<p align="center"><font color="#666666">Verificando los registros ingresados en el formulario...</font></p>';
      ajax=objetoAjax();
      ajax.open("POST", "administrator/registry/registrardetallereclamo.php",true);
      //ajax.open("GET", datos);
      ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          divResultado.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';

        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+opciones1+"&valor2="+opciones2+"&valor3="+opciones3+"&valor4="+opciones4+"&valor5="+opciones5)
  
  }
   }
  else
  {
    alert('Por favor revisar el formulario los campos importantes en el caso de que desee registrar...')
    // divResultado.innerHTML ='<p align=center><font color=red>Cancelado el almacenamiento de registro...</font></p>';
    // document.frmguardars.btregistrar.disabled=false;
    return false;
  }
}

function RegistrarDetalleReclamoUser(){
  divResultado = document.getElementById('reportegrabars');
  // divResultado.innerHTML ='<p align=center><font color=red>Cargando1...</font></p>';
 // document.formulMasdetalles.btregistrar.disabled=true;
  var Insertaremos = confirm("Desea almacenar los registros?")
  if ( Insertaremos ) 
  {
      

      opciones1=document.formulMasdetalles.comerce.value;
      opciones2=document.formulMasdetalles.fechaReg.value;
      opciones3=document.formulMasdetalles.description.value;
      opciones4=document.formulMasdetalles.amount.value;
      opciones5=document.formulMasdetalles.iddetalle.value;
    
  if( opciones1=='' || opciones2=='' || opciones3=='' || opciones4=='' )
  {
    confirm("Por favor llenar el formulario con los datos solicitados. \n(*) Campos Importantes.")
    divResultado.innerHTML ='<p align=center><font color=red>Por favor llenar el formulario con los datos solicitados. (*) Campos Importantes.</font></p>'; 
    
 //   document.frmguardars.btregistrar.disabled=false;  
//     open("index.php");
    
  }
  else
  {
      divResultado.innerHTML= '<p align="center"><font color="#666666">Verificando los registros ingresados en el formulario...</font></p>';
      ajax=objetoAjax();
      ajax.open("POST", "administrator/registry/registrardetallereclamo.php",true);
      //ajax.open("GET", datos);
      ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          divResultado.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';

        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+opciones1+"&valor2="+opciones2+"&valor3="+opciones3+"&valor4="+opciones4+"&valor5="+opciones5)


  }
   }
  else
  {
    alert('Por favor revisar el formulario los campos importantes en el caso de que desee registrar...')
    // divResultado.innerHTML ='<p align=center><font color=red>Cancelado el almacenamiento de registro...</font></p>';
    // document.frmguardars.btregistrar.disabled=false;
    return false;
  }
  document.formulMasdetalles.comerce.value = '';
  document.formulMasdetalles.fechaReg.value = '';
  document.formulMasdetalles.description.value = '';
  document.formulMasdetalles.amount.value = '';
  console.log(document.formulMasdetalles.comerce.value);
  console.log(document.formulMasdetalles.fechaReg.value);
  console.log(document.formulMasdetalles.description.value);
  console.log(document.formulMasdetalles.amount.value);
  console.log('holiiii');
}



function actualizarEstado(dato){
 //alert (dato);
  divResultado = document.getElementById('reportegrabars');
  // divResultado.innerHTML ='<p align=center><font color=red>Cargando2...</font></p>';
 // document.formulMasdetalles.btregistrar.disabled=true;
  var Insertaremos = confirm("Desea Actualizar?")
  if ( Insertaremos ) 
  {
      opciones1=dato;
      opciones5=document.formulMasdetalles.iddetalle.value;
      // alert (opciones1);
     
    
  if( opciones1=='' )
  {
    confirm("Por favor llenar el formulario con los datos solicitados. \n(*) Campos Importantes.")
    divResultado.innerHTML ='<p align=center><font color=red>Por favor llenar el formulario con los datos solicitados. (*) Campos Importantes.</font></p>'; 
    
 //   document.frmguardars.btregistrar.disabled=false;  
//     open("index.php");

  }
  else
  {
      divResultado.innerHTML= '<p align="center"><font color="#666666">Verificando la actualizacion en el formulario...</font></p>';
      // ajax=objetoAjax();
      ajax.open("POST", "administrator/registry/cambiodeestado.php",true);
      //ajax.open("GET", datos);
      ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          divResultado.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+opciones1+"&valor2="+opciones5)
  
    }
   }
  else
  {
      console.log("Has cancelado la actualizacion")
  }
}

// const stringg;
function envioCheckDB(id){
   option= document.getElementById(id).checked; //true or false 
   console.log(id)
   option2= id; //checkbox_6_1
    option5=document.formulMasdetalles.iddetalle.value;



   ajax=objetoAjax();
   ajax.open("POST", "administrator/registry/cambiocheckstate.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+option+"&valor2="+option2+"&valor5="+option5);
   
      console.log('envioCheckDB'+id+','+option);
      

 }

function envioCheckOptDB(id){
   option= document.getElementById(id).checked; //true or false 
   option2= id; //checkbox_6_1
   option3=document.getElementById(id).value;
   // alert(mensaje);
   option5=document.formulMasdetalles.iddetalle.value;

  cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')
  option4=cad[0].value; 
  option6=cad[1].value;
  option7= document.getElementById(id).closest("div").getElementsByClassName('datetime')[0].value

   if(option){
      if(option7==""){
        
        alert("Select a date");
        document.getElementById(id).checked = false;
     }
     else{
      // enviarFechaDB(option7)
      console.log(option7)

     }
   }
   ajax=objetoAjax();
   ajax.open("POST", "administrator/registry/cambiocheckoptstate.php",true);

    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+option+"&valor2="+option2+"&valor5="+option5+"&valor3="+option3+"&valor4="+option4+"&valor6="+option6+"&valor7="+option7);

 }


 function envioCheckOptDB2(id){
   option= document.getElementById(id).checked; //true or false 
   option2= id; //checkbox_6_1
   option3=document.getElementById(id).value;
   // alert(mensaje);
   option5=document.formulMasdetalles.iddetalle.value;

  cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')
  option4=cad[0].value; 
  option6=cad[1].value;
  option7= document.getElementById(id).closest("div").getElementsByClassName('datetime')[0].value
  option8= document.getElementById(id).closest("div").getElementsByClassName('datetime9')[0].value
  option9= document.getElementById(id).closest("div").getElementsByClassName('datetime9')[1].value


   if(option){
      if(option7==""){
        
        alert("Select a date");
        document.getElementById(id).checked = false;
     }
     else{
      // enviarFechaDB(option7)
      console.log(option7)

     }
   }
   ajax=objetoAjax();
   ajax.open("POST", "administrator/registry/envioValoresC9.php",true);

    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+option+"&valor2="+option2+"&valor5="+option5+"&valor3="+option3+"&valor4="+option4+"&valor6="+option6+"&valor7="+option7+"&valor8="+option8+"&valor9="+option9);

 }


function enviarFechaDB(option){
   ajax=objetoAjax();
   ajax.open("POST", "administrator/registry/cambiocheckoptstate.php",true);

    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor7="+option);
      console.log(option)

}

 function validar_fecha(id){
    option= document.getElementById(id).checked
    str=id.split('_')[1]

    date_id='datetime_'+str
    // console.log("dateetiqq", date_id )
    element= document.getElementById(date_id).value
    console.log(element)


    if(option){
      alert("La fecha es un campo requerido")
    }

 }

function validar_checkbox(id) {
    // Obtener hijos dentro de etiqueta <div>
  option= document.getElementById(id).checked; //true or false 
   option2= id; //checkbox_3_1
   console.log('validar_checkbox',option2)
  str=option2.split('_')


  stringg='.form-check-input'+str[1];
  if (option == true){
      // envioCheckDB(option2);
      var cont = document.querySelectorAll(stringg);
      console.log(cont);
      // console.log('hola'.slice(-1));
      var i = 0;
      var al_menos_uno = false;
      //Recorrido de checkbox's
      while (i < cont.length) {
          // Verifica si el elemento es un checkbox
          if (cont[i].tagName == 'INPUT' && cont[i].type == 'checkbox') {
              // Verifica si esta checked
              if (cont[i].checked) {
                  al_menos_uno = true;
              }
          }
          i++
      }
    
      //Valida si al menos un checkbox es checked
      if (!al_menos_uno) {
          alert('Seleccione fecha y opcion');
          // if (e.preventDefault) {
          //     e.preventDefault();
          // } else {
          //     e.returnValue = false;
          // }
      }


}
        envioCheckDB(option2);
}
function checkAttachDocs(id){
   option=id;
  // option4=cad[0].value; 
  // option6=cad[1].value;
  option2=document.getElementById(id);
  option5=document.formulMasdetalles.iddetalle.value;

 

    console.log(option2);
    console.log(option);

    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/checkAttach.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+option2.checked+"&valor2="+option5+"&valor3="+option);
   
      console.log('nvio chechatacch');
    

}
function checkFather(id){

    // opts= id.split('_');
    // str=opts[1];
    // fath= 'checkbox_'+str+'_1'
    cad=document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0]

    console.log(cad);
    ch= document.getElementById(id).checked
    // // console.log(fath);
    

    if(ch){
      //checar tambien al padre
      document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0].checked = true;
      console.log('checkbox trrue')
      // fath.check
    }
    else{
      console.log("error")
    }
    envioCheckDB(cad.id);
    envioCheckOptDB(id);
}

function checkFather3(id){

    // opts= id.split('_');
    // str=opts[1];
    // fath= 'checkbox_'+str+'_1'
    cad=document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0]

    console.log(cad);
    ch= document.getElementById(id).checked
    // // console.log(fath);
    

    if(ch){
      //checar tambien al padre
      document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0].checked = true;
      console.log('checkbox trrue')
      // fath.check
    }
    else{
      console.log("error")
    }
    envioCheckDB(cad.id);
    envioCheckOptDB2(id);
}


function checkFather2(id){

  cad2=document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0]

    console.log(cad2);
    ch= document.getElementById(id).checked
    // // console.log(fath);
    

    if(ch){
      //checar tambien al padre
      document.getElementById(id).closest("div").getElementsByClassName('checkbox')[0].checked = true;
      console.log('checkbox trrue')
      // fath.check
    }
    else{
      console.log("error")
    }

 
  rad1=document.getElementById('opt_15_1')
  rad2=document.getElementById('opt_15_2')
  // rad3=document.getElementById('rad_7_2')
    cad=document.getElementById(id).closest("div").getElementsByClassName('hiddenField')
    option=id;
    option4=cad[0].value; 
    // option6=cad[1].value;
    option5=document.formulMasdetalles.iddetalle.value;

    console.log(rad1.checked,rad2.checked)

  ajax=objetoAjax();
  ajax.open("POST", "administrator/registry/envioValoresC15.php",true);


  ajax.onreadystatechange=function() 
    {
      if (ajax.readyState==4) 
      {
        option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
      }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("valor1="+rad1.checked+"&valor2="+rad2.checked+"&valor3="+option4+"&valor5="+option5);
 
    console.log('envioCheckDB'+id+','+option);

    envioCheckDB(cad2.id);

}




function checkChildren2(id){
  option= document.getElementById(id).checked; //true or false 
   option2= id; //checkbox_3_1
   // console.log('validar_checkbox',option2)
  str=option2.split('_')


  stringg='.form-check-input'+str[1];
  if (option === true){
      // envioCheckDB(option2);
      var cont = document.querySelectorAll(stringg);
      console.log(cont);
      if(cont.length!==0){

        return true;
      }
      else{
        return false;
      }
    }
}





