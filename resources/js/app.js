// import $ from 'jquery';
import 'bootstrap';
// import Popper from 'popper.js';


// import "./bootstrap";
// // import "flowbite";

import './functions';


// Mostrar Toast de productos agregados al carrito
Livewire.on('message-add-cart', () => {

  const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    },
    customClass: {
      popup: 'colored-toast',
    },
    iconColor: "#fff",
  });
  Toast.fire({
    icon: "success",
    title: "Produto agregado al carrito",
  });

});

// Mensaje de advertencia al eliminar productos del carrito
Livewire.on('message-remove-cart', (idProducto, idTalle, idColor) => {
  Swal.fire({
    title: "Está seguro?",
    text: "Se eliminará el item del carrito",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      Livewire.emit("remove-item-cart", idProducto, idTalle, idColor);
    }
  });
});





// import Alpine from "alpinejs";

// window.Alpine = Alpine;

// Alpine.start();

//  Botón Top

// const botonIrArriba = document.querySelector("#btn-top");
// botonIrArriba.addEventListener("click", () => {
//     window.scrollTo({
//         top: 0,
//         behavior: "smooth",
//     });
// });

