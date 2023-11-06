const togglesButton = document.querySelector('#toogle-button');
const toggleXl = document.querySelector('#toogle-xl');
const nav = document.querySelector('#nav');
const line1 = document.getElementById('line1');
const line2 = document.getElementById('line2');
const line3 = document.getElementById('line3');
const line4 = document.getElementById('line4');

const body = document.querySelector('body');

body.addEventListener('click', function(event) {
    if (!togglesButton.contains(event.target) && nav.classList.contains('translate-x-0')) {
        nav.classList.remove('translate-x-0');
        nav.classList.remove('ml-4');
        nav.classList.add('-translate-x-full')
        nav.classList.add('ml-0')

        if(line1.classList.contains('w-2/3')){
            line1.classList.remove('w-2/3');
            line1.classList.add('w-full');
            line2.classList.remove('w-2/3');
            line2.classList.add('w-full');
        }
    }
});

togglesButton.addEventListener('click', () => {

    if(nav.classList.contains('-translate-x-full')){
        nav.classList.remove('-translate-x-full');
        nav.classList.remove('ml-0');
        nav.classList.add('ml-4')
        nav.classList.add('translate-x-0');

        if(line1.classList.contains('w-full')){
            line1.classList.remove('w-full');
            line1.classList.add('w-2/3');
            line2.classList.remove('w-full');
            line2.classList.add('w-2/3');
        }
    }else{
        nav.classList.remove('translate-x-0');
        nav.classList.remove('ml-4');
        nav.classList.add('-translate-x-full')
        nav.classList.add('ml-0')

        if(line1.classList.contains('w-2/3')){
            line1.classList.remove('w-2/3');
            line1.classList.add('w-full');
            line2.classList.remove('w-2/3');
            line2.classList.add('w-full');
        }

    }

})

toggleXl.addEventListener('click', () => {
    if(nav.classList.contains('xl:translate-x-0')){
        nav.classList.remove('xl:translate-x-0');
        nav.classList.remove('xl:ml-4');

        if(line3.classList.contains('w-full')){
            line3.classList.remove('w-full');
            line3.classList.add('w-2/3');
            line4.classList.remove('w-full');
            line4.classList.add('w-2/3');
        }
    }else{
        nav.classList.add('xl:translate-x-0');
        nav.classList.add('xl:ml-4');
        if(line3.classList.contains('w-2/3')){
            line3.classList.remove('w-2/3');
            line3.classList.add('w-full');
            line4.classList.remove('w-2/3');
            line4.classList.add('w-full');
        }
    }
})




