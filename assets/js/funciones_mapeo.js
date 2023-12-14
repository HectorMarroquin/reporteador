// let ip = document.getElementById('ver');

// function verIp(ip) {

// 	console.log(ip);
// }

// verIp(ip);

function abrir(nombre) {
	let valores = nombre.split(',');


	let nombre2 = valores[0];
	let numero = valores[1];

	let modal = document.getElementById('parte_black');
	modal.style.visibility = 'visible';
	modal.style.transitionProperty = "width";
	modal.style.transitionDuration = "1s";
	modal.style.width = "100%";

	let nombre3 = document.getElementById('nombre');
	nombre3.style.transitionProperty = "width";
	nombre3.style.transitionDuration = "1s";
	nombre3.style.width = "90%"

	let nuevo_nombre = document.getElementById('nuevo_nombre');
	nuevo_nombre.style.transitionProperty = "width";
	nuevo_nombre.style.transitionDuration = "1s";
	nuevo_nombre.style.width = "90%"

	let Mode = document.getElementById('Mod');
	Mode.style.transitionProperty = "width";
	Mode.style.transitionDuration = "1s";
	Mode.style.width = "60%";

	// Setear valores en campos ocultos
	let valor = document.getElementById('nombre');
	valor.value = nombre2;

	let Isla = document.getElementById('idIsla');
	Isla.value = numero;

}

function cerrar() {
	let modal = document.getElementById('parte_black');
	modal.style.transitionProperty = "width";
	modal.style.transitionDuration = "1s";
	modal.style.width = "1%";

	let nombre = document.getElementById('nombre');
	nombre.style.transitionProperty = "width";
	nombre.style.transitionDuration = "1s";
	nombre.style.width = "1%";

	let nuevo_nombre = document.getElementById('nuevo_nombre');
	nuevo_nombre.style.transitionProperty = "width";
	nuevo_nombre.style.transitionDuration = "1s";
	nuevo_nombre.style.width = "1%";

	let Mode = document.getElementById('Mod');
	Mode.style.transitionProperty = "width";
	Mode.style.transitionDuration = "1s";
	Mode.style.width = "1%";


	setTimeout(() => {
	  modal.style.visibility = 'hidden';
	}, 500);
}