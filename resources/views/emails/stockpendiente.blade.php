<h2> Hola  {{ $data->email}}</h2>
<br>



<strong>Fecha Solicitud: {{ $data->fechaSolicitud}} </strong><br>
<strong>Producto       : {{ $data->nombre}} </strong><br>
<strong>Talle          : {{ $data->talle}} </strong><br>
<strong>Color          : {{ $data->color}} </strong><br>
<strong>Cantidad       : {{ $data->cantidad}} </strong><br>

<strong>Fecha Respuesta: {{ $data->fechaRespuesta}} </strong><br>
<strong>Respuesta      : {{ $data->respuesta}} </strong><br>




Muchas gracias por tu contacto
Te esperamos en nuestra web {{env('APP_URL')}}


