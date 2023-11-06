
function copyToClipboard(url) {    
    var tempInput = document.createElement("input");
    tempInput.value = url;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
}

/* SAHRE POST BUTTON */
function sharePost() {
    // Deshabilitar el botón
    document.querySelector("#shareButton").disabled = true;
  
    // Aquí puedes poner el código para compartir el post
  }


function searchStar(){
   let spinner = document.querySelector('#spinner-search');
   spinner.classList.remove('hidden');
   spinner.classList.add('flex');
}

let bodyDiv = document.querySelector('#body');
let showAllElements = document.querySelectorAll('.show-all');
let helloElements = document.querySelectorAll('.hello');

for (let i = 0; i < showAllElements.length; i++) {
    let isHelloVisible = false;
    showAllElements[i].addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el evento se propague al cuerpo del documento
        if (isHelloVisible) {
            helloElements[i].classList.remove('opacity-100');
            helloElements[i].classList.add('opacity-0');
            setTimeout(() => {
                helloElements[i].classList.add('hidden');
            }, 600);
            isHelloVisible = false;
        } else {
            helloElements[i].classList.remove('hidden');
            setTimeout(() => {
                helloElements[i].classList.remove('opacity-0');
                helloElements[i].classList.add('opacity-100');
                isHelloVisible = true;
            }, 50);
        }
    });

    bodyDiv.addEventListener('click', function() {
        if (isHelloVisible) {
            helloElements[i].classList.remove('opacity-100');
            helloElements[i].classList.add('opacity-0');
            setTimeout(() => {
                helloElements[i].classList.add('hidden');
            }, 600);
            isHelloVisible = false;
        }
    });
}