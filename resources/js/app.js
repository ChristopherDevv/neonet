import 'flowbite';
import Dropzone from "dropzone";

import MiniMasonry from 'minimasonry';
import imagesLoaded from 'imagesloaded';
const idd = document.querySelector('#loading');
const container = document.querySelector('.container_1');  

let masonry;

function updateMasonry() {
  let base = 120;
  if (window.innerWidth > 430) {
    base = 170;
  }

  if (masonry) {
    masonry.destroy();
  }

  masonry = new MiniMasonry({
    container: '.container_1',
    minify: false,
    baseWidth: base,
  });

  // Oculta el mensaje de "cargando" cuando el masonry se ha acomodado
  idd.classList.add('hidden');
  container.classList.remove('opacity-0');
}

document.addEventListener("DOMContentLoaded", function() {
  if(idd){
    imagesLoaded(container, updateMasonry);
  }
});

window.addEventListener("resize", () => {
  if(idd){
    updateMasonry();
  }
});


/* --------------------------- */

Dropzone.autoDiscover = false;
let originalImage = document.querySelector('#upload-div');

if(document.querySelector('#dropzone')){
    const dropzone = new Dropzone("#dropzone", {
        dictDefaultMessage: '',
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
         thumbnailWidth: 250,
         thumbnailHeight: 250,
        dictRemoveFile: "Delete image",
        maxFiles: 1,
        uploadMultiple: false,

        init: function () {

            if(document.querySelector('[name="image"]').value.trim()){
                let imgElement = document.querySelector('#upload-div');
                if (imgElement) {
                    imgElement.remove();
                }
                const piblishedImage = {};
                piblishedImage.size = 1234;
                piblishedImage.name = document.querySelector('[name="image"]').value;
    
                this.options.addedfile.call(this, piblishedImage);
                this.options.thumbnail.call(this, piblishedImage, `/uploads/${piblishedImage.name}`);
    
                piblishedImage.previewElement.classList.add("dz-success", "dz-complete");
            }
        }
    
    });
    dropzone.on("addedfile", function() {
        let imgElement = document.querySelector('#upload-div');
        if (imgElement) {
            imgElement.remove();
        }
    });
    dropzone.on("success", function(file, response) {
        document.querySelector('[name="image"]').value = response.image;
    });
    
    dropzone.on('removedfile', function() {
        document.querySelector('[name="image"]').value = '';
         // Añade la imagen original de nuevo al formulario
         document.querySelector('#dropzone').appendChild(originalImage);
    });
    
}


/* -------------------------------- */
/* POST TAGS */
if(document.querySelector('#post-tags')){
  const tags = document.querySelectorAll('.post-tag');
  tags.forEach(tag => {
    tag.addEventListener('click', () => {
      tag.classList.toggle('bg-opacity-50')
    })
  })
}





