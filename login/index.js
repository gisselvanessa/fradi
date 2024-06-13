

function IngresarDatos(){
    const authenticate={
        username: "",
        password: ""
    }
    console.log("holi")
    correo= document.getElementById('correo').value;
    clave= document.getElementById('clave').value;
    authenticate.username=correo;
    authenticate.password=clave;

    // console.log(correo)
    // console.log(clave)
    console.log(authenticate);
    // var xhr = new XMLHttpRequest();
    // postData('http://172.18.250.180:8080/api/authenticate', { answer: 42 })
    // .then(data => {
    //   console.log(data); // JSON data parsed by `data.json()` call
    // });

}
  
