//JS Botton

const btn = document.getElementById("btnTop")

btn.addEventListener("click", function () {
    window.scrollTo(0,0)
})

document.addEventListener('scroll', ocultar)

function ocultar() {
    if (window.scrollY > 10) {
        btn.style.display = "flex"
    } else {
        btn.style.display = "none"
    }
}

ocultar()
const carouselSlide = document.querySelector('.carousel-slide');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let counter = 0;
const size = document.querySelector('.carousel-card').clientWidth;

nextBtn.addEventListener('click', () => {
    if (counter >= 2) return;
    carouselSlide.style.transform = 'translateX(' + (-size * ++counter) + 'px)';
});

prevBtn.addEventListener('click', () => {
    if (counter <= 0) return;
    carouselSlide.style.transform = 'translateX(' + (-size * --counter) + 'px)';
});





