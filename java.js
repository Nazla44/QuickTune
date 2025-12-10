let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    header.classList.toggle('active', window.scrollY > 0);
});

menu.onclick = () => {
    navbar.classList.toggle('active');
}
window.onscroll = () => {
    navbar.classList.remove('active');
}

const sr = ScrollReveal({
    origin: 'top',
    distance: '85px',
    duration: 2500,
    reset: true
})

sr. reveal ('.home-text', {delay:300});
sr. reveal ('.about-img', {});
sr. reveal ('.about-text', {delay:300});
sr. reveal('.home-text',{delay:280, origin:'bottom'});

document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();
    
    if (name === "" || email === "" || message === "") {
            alert("Harap isi semua kolom!");
            return;
        }
            
        alert(`Terima Kasih atas kritik dan saranya!\n\nName: ${name}\nEmail: ${email}\nMessage: ${message}`);
        document.getElementById('contactForm').reset();
    });

