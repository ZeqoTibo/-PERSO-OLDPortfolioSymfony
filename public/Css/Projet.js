var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex-1].style.display = "block";
}


//Droite haut
var slideIndex2 = 1;
showSlides2(slideIndex2);

function plusSlides2(n) {
    showSlides2(slideIndex2 += n);
}

function showSlides2(n) {
    var j;
    var slides = document.getElementsByClassName("mySlides2");
    if (n > slides.length) {slideIndex2 = 1}
    if (n < 1) {slideIndex2 = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex2-1].style.display = "block";
}

//bas
var slideIndex3 = 1;
showSlides3(slideIndex3);

function plusSlides3(n) {
    showSlides3(slideIndex3 += n);
}

function showSlides3(n) {
    var j;
    var slides = document.getElementsByClassName("mySlides3");
    if (n > slides.length) {slideIndex3 = 1}
    if (n < 1) {slideIndex3 = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex3-1].style.display = "block";
}




