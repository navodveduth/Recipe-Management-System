/* reference : https://www.youtube.com/watch?v=KcdBOoK3Pfw */

const slider = document.querySelector('.slider');
const sliderImages = document.querySelectorAll('.slider img');

const preBtn = document.querySelector('#preBtn');
const nxtBtn = document.querySelector('#nxtBtn');

let count = 0;
const size = sliderImages[0].clientWidth;

slider.style.transform = 'translateX(' + (-size * count) + 'px)';

nxtBtn.addEventListener('click', ()=> {
    if (count >= sliderImages.length - 1 ) return;
    slider.style.transition = "transform 0.5s ease-in-out";
    count++;
    slider.style.transform = 'translateX(' + (-size * count) + 'px)';
    console.log(count);

    if(count === 5)
    {
        count = 0;
        slider.style.transform = 'translateX(' + (-size * -count) + 'px)';
    }
});

preBtn.addEventListener('click', ()=> {
    if (count <= 0 ) return;
    slider.style.transition = "transform 0.5s ease-in-out";
    count--;
    slider.style.transform = 'translateX(' + (-size * count) + 'px)';
});

