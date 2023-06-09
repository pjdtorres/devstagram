import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

if(document.querySelector('#dropzone')) {

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Faz upload da imagem",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Apagar Arquivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
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

dropzone.on("success", function (file, response) {
    document.querySelector('[name="imagem"]').value = response.imagem;
});

dropzone.on("removedfile", function () {
    document.querySelector('[name="imagem"]').value = "";
});

}