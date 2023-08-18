import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

//  Botón Top

const botonIrArriba = document.querySelector("#btn-top");
botonIrArriba.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

// Slice productos destacados
document.addEventListener("DOMContentLoaded", () => {
    const productosDestacados = document.querySelector(
        // contenedor slice
        "#contenedor-slice-destacados"
    );

    const btnSliceDestacadosNext = document.querySelector(
        // Botón avanzar
        "#btn-slice-destacados-next"
    );

    const btnSliceDestacadosPrev = document.querySelector(
        // Botón retroceder
        "#btn-slice-destacados-prev"
    );

    // Contenedor sección slice
    const seccionSlice = document.querySelector("#seccion-slice");

    // Ocultar flecha izquierda cuando no se hizo scroll hacia la derecha
    if (productosDestacados.scrollLeft <= 0) {
        btnSliceDestacadosPrev.style.display = "none"; // ocultar flecha para deslizar hacia la izquierda
    } else {
        btnSliceDestacadosPrev.style.display = "block"; // mostrar flecha para deslizar hacia la izquierda
    }

    // Mover slice hacia la derecha
    btnSliceDestacadosNext.addEventListener("click", () => {
        productosDestacados.scrollBy({
            left: productosDestacados.offsetWidth,
            behavior: "smooth",
        });
    });
    // Mover slice hacia la izquierda
    btnSliceDestacadosPrev.addEventListener("click", () => {
        productosDestacados.scrollBy({
            left: -productosDestacados.offsetWidth,
            behavior: "smooth",
        });
    });

    // Escuchar el evento scroll del slice
    productosDestacados.addEventListener("scroll", () => {
        const limitContenedor =
            productosDestacados.scrollWidth - productosDestacados.clientWidth;

        if (productosDestacados.scrollLeft <= 0) {
            btnSliceDestacadosPrev.style.display = "none"; // ocultar flecha para deslizar hacia la izquierda
        } else {
            btnSliceDestacadosPrev.style.display = "block"; // mostrar flecha para deslizar hacia la izquierda
        }

        if (productosDestacados.scrollLeft >= limitContenedor) {
            btnSliceDestacadosNext.style.display = "none"; // ocultar flecha para deslizar hacia la derecha
        } else {
            btnSliceDestacadosNext.style.display = "block"; // mostrar flecha para deslizar hacia la derecha
        }
    });

    // Mostrar las flechas (next -prev) si el cursor del mouse esta dentro del contenedor del slice
    seccionSlice.addEventListener("mouseenter", () => {
        const limitContenedor =
            productosDestacados.scrollWidth - productosDestacados.clientWidth;

        if (productosDestacados.scrollLeft <= 0) {
            btnSliceDestacadosPrev.style.display = "none"; // ocultar flecha para deslizar hacia la izquierda
        } else {
            btnSliceDestacadosPrev.style.display = "block"; // mostrar flecha para deslizar hacia la izquierda
        }

        if (productosDestacados.scrollLeft >= limitContenedor) {
            btnSliceDestacadosNext.style.display = "none"; // ocultar flecha para deslizar hacia la derecha
        } else {
            btnSliceDestacadosNext.style.display = "block"; // mostrar flecha para deslizar hacia la derecha
        }
    });
    // ocultar las flechas (next -prev) si el cursor del mouse esta dentro del contenedor del slice
    seccionSlice.addEventListener("mouseleave", () => {
        btnSliceDestacadosNext.style.display = "none";
        btnSliceDestacadosPrev.style.display = "none";
    });
});
