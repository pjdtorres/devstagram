import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Upload da imagem",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Apagar Arquivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        // alert('dropzone criado!');

        if (document.querySelector('[name="imagem"]').value.trim()) {
            const imagemPublicada = {};
            imagemPublicada.size = 1234;
            imagemPublicada.name =
                document.querySelector('[name="imagem"]').value;

            this.options.addedfile.call(this, imagemPublicada);

            this.options.thumbnail.call(
                this,
                imagemPublicada,
                `/uploads/${imagemPublicada.name}`
            );

            imagemPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }

    },

});

// dropzone.on("sending", function (file, xhr, formData) {
//     // console.log(file);    
//     console.log(formData);
// })


dropzone.on("success", function (file, response) {
    // console.log(response.imagem);
    document.querySelector('[name="imagem"]').value = response.imagem;
})

// // dropzone.on("error", function (file, message) {
// //     console.log(message);
// // })



// dropzone.on("removedfile", function (file, message) {
//     // console.log('Arquivo eliminado');
//     document.querySelector('[name="imagem"]').value = "";
// });


// // dropzone.on("success", function (file, response) {
// //     document.querySelector('[name="imagem"]').value = response.imagen;
// // });

dropzone.on("removedfile", function () {
    document.querySelector('[name="imagem"]').value = "";
});
