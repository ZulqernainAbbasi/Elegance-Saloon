function handleScroll() {
    const images = document.querySelectorAll('.car-image img');
    images.forEach((img) => {
        const rect = img.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;

        // Check if the image is in view
        if (rect.top <= windowHeight && rect.bottom >= 0) {
            img.classList.add('animate');
        } else {
            img.classList.remove('animate'); // Reset animation when out of view
        }
    });
}

// Listen for scroll events
window.addEventListener('scroll', handleScroll);

// Initial check in case the image is already in view on page load
handleScroll();

var typed1 = new Typed('#element_1', {
    strings: ['Welcome to <br /> Elegance'],
    typeSpeed: 50,
    showCursor: false,
    onComplete: function() {
        var typed2 = new Typed('#element_2', {
            strings: ['Your Go-To Beauty Provider.'],
            typeSpeed: 50,
            showCursor: false,
        });
    }
});

var typed3 = new Typed('#element_3', {
    strings: ['Shop Our Products'],
    typeSpeed: 50,
    showCursor: false
});

var typed4 = new Typed('#element_4', {
    strings: ['Our Story'],
    typeSpeed: 50,
    showCursor: false
});


document.addEventListener("DOMContentLoaded", function() {
    const carousel = new bootstrap.Carousel(document.querySelector('#carouselExampleSlidesOnly'), {
        interval: 20000,
        wrap: true
    });
});


document.querySelector('.nav-link[href="#contactForm"]').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent default anchor link behavior
    document.querySelector('#contactForm').scrollIntoView({
      behavior: 'smooth'  // Enables smooth scrolling
    });
  });
  
  
  
  

