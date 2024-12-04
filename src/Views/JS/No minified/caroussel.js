let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.machines-images img');
    const totalSlides = slides.length;

    // S'assurer que l'index est dans la plage correcte
    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    // Déplacer les images
    const offset = -currentSlide * 100;
    document.querySelector('.machines-images').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

// Changer l'image toutes les 3 secondes
setInterval(nextSlide, 3000);
