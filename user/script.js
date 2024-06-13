document.addEventListener("DOMContentLoaded",()=>{
// // Escuchamos el click del botón
// const $boton = document.querySelector ("#btnCrearPdf");
// 	$boton.addEventListener("click", () => {
	const $elementoParaConvertir = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
	html2pdf()
	.set({
	margin: 0.7, 
	filename: 'documento.pdf',
	image: {
		type: 'jpeg', 
		quality: 0.98
	},
	html2canvas: {
		scale: 4, // A mayor escala, mejores gráficos, pero más peso
		letterRendering: true,
	},
	jsPDF: {
		unit: "in",
		 format: "a4",
		orientation: 'portrait' // landscape o portrait
	}
	})
	// .from($elementoParaConvertir)
	.from($elementoParaConvertir)
		.output('bloburl') // Cambiamos a 'bloburl' en lugar de 'blob'
		.then((pdfUrl) => {
		  window.open(pdfUrl, "_blank");
		})
	.catch(err => console. log(err));
	// });
});