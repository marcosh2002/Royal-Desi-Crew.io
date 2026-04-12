// ===== EmailJS Configuration =====
// Initialize EmailJS
emailjs.init("ZbITBo3U3lGnGZVXi"); // Replace with your EmailJS Public Key

// Your EmailJS credentials (replace these)
const EMAILJS_SERVICE_ID = "service_b8hukgl"; // e.g., "service_abc123"
const EMAILJS_BOOKING_TEMPLATE = "template_c5e065c"; // Template for booking form
const EMAILJS_CONSULTATION_TEMPLATE = "template_hx4pwb6"; // Template for consultation
const ADMIN_EMAIL = "royaldesicrew@gmail.com"; // Your admin email
// ===== End EmailJS Configuration =====

// Background Image Carousel for Hero Section
const slides = [
    '/static/Images/Background.png',
    '/static/Images/background%20image%202.jpg',
    '/static/Images/background%203.jpg',
    '/static/Images/corporate%20event1.jpeg',
    '/static/Images/Wedding.png'
];

let slideIndex = 0;

function showSlide(index) {
    const allSlides = document.querySelectorAll('.hero-bg-slide');
    
    if (allSlides.length === 0) {
        console.error('No slides found!');
        return;
    }
    
    // Hide all slides
    allSlides.forEach((slide, i) => {
        slide.style.opacity = '0';
        slide.style.transition = 'opacity 1s ease-in-out';
        console.log(`Hiding slide ${i + 1}`);
    });
    
    // Show current slide
    allSlides[index].style.opacity = '1';
    console.log(`✓ Now showing slide ${index + 1}/${slides.length}`);
}

// Initialize carousel
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded - Setting up carousel');
    
    // Show first slide immediately
    showSlide(0);
    slideIndex = 0;
    
    // Change slides every 5 seconds
    setInterval(function() {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }, 5000);
    
    // Hamburger Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
        
        // Close menu when a link is clicked
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Scroll animation for elements
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe service cards, gallery items, testimonial cards
document.querySelectorAll('.service-card, .gallery-item, .testimonial-card, .package-card, .info-item').forEach(el => {
    el.style.animation = 'none';
    observer.observe(el);
});

// EmailJS Configuration
// Initialize EmailJS (Replace with your public key from EmailJS)
emailjs.init('YOUR_PUBLIC_KEY_HERE');

// Form submission with EmailJS
const contactForm = document.querySelector('.contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        
        // Send email via EmailJS
        emailjs.sendForm(
            'YOUR_SERVICE_ID_HERE',      // Replace with your EmailJS service ID
            'YOUR_TEMPLATE_ID_HERE',     // Replace with your EmailJS template ID
            this
        ).then(
            function(response) {
                console.log('SUCCESS!', response.status, response.text);
                alert('Thank you for your inquiry! We will contact you shortly.');
                contactForm.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            },
            function(error) {
                console.log('FAILED...', error);
                alert('Oops! Something went wrong. Please try again or contact us directly.');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        );
    });
}

// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.style.boxShadow = '0 2px 10px rgba(212, 175, 55, 0.1)';
    } else {
        header.style.boxShadow = 'none';
    }
});

// View All Photos Button
const viewAllPhotosBtn = document.getElementById('viewAllPhotosBtn');
if (viewAllPhotosBtn) {
    viewAllPhotosBtn.addEventListener('click', function() {
        window.location.href = 'gallery.html';
    });
}

// Gallery hover effects
document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
        this.style.boxShadow = '0 10px 30px rgba(212, 175, 55, 0.3)';
    });
    
    item.addEventListener('mouseleave', function() {
        this.style.boxShadow = 'none';
    });
});

// Button interactions
document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
        this.style.opacity = '0.9';
    });
    
    btn.addEventListener('mouseleave', function() {
        this.style.opacity = '1';
    });
});

// WhatsApp Enquiry Function for Services
function openWhatsApp(serviceType) {
    const phoneNumber = '919614028424'; // +91 9614028424 without + sign
    const message = `Hi Royal Desi Crew, I'm interested in your ${serviceType} services. Can you please provide more details and pricing?`;
    const encodedMessage = encodeURIComponent(message);
    const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
    window.open(whatsappURL, '_blank');
}

// WhatsApp Enquiry Function for Packages
function openWhatsAppPackage(packageName) {
    const phoneNumber = '919614028424'; // +91 9614028424 without + sign
    const message = `Hi Royal Desi Crew, I'm interested in your ${packageName}. Can you please provide more details and booking information?`;
    const encodedMessage = encodeURIComponent(message);
    const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
    window.open(whatsappURL, '_blank');
}

// Package card behavior removed - now uses WhatsApp function via onclick

// Photos Modal Functionality
const photosModal = document.getElementById('photosModal');
const closeModal = document.getElementById('closeModal');

if (closeModal) {
    closeModal.addEventListener('click', function() {
        if (photosModal) {
            photosModal.classList.remove('show');
        }
    });
}

// Close modal when clicking outside
if (photosModal) {
    photosModal.addEventListener('click', function(event) {
        if (event.target === photosModal) {
            photosModal.classList.remove('show');
        }
    });
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape' && photosModal && photosModal.classList.contains('show')) {
        photosModal.classList.remove('show');
    }
});

// Booking Modal Functionality
function openBookingModal() {
    const bookingModal = document.getElementById('bookingModal');
    if (bookingModal) {
        bookingModal.style.display = 'flex';
        bookingModal.classList.add('show');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }
}

function closeBookingModal() {
    const bookingModal = document.getElementById('bookingModal');
    if (bookingModal) {
        bookingModal.classList.remove('show');
        bookingModal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Allow scrolling
    }
}

// Close modal when clicking outside
window.addEventListener('click', function(event) {
    const bookingModal = document.getElementById('bookingModal');
    if (event.target === bookingModal) {
        closeBookingModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeBookingModal();
    }
});

// Handle booking form submission
document.addEventListener('DOMContentLoaded', function() {
    const modalForm = document.getElementById('modalContactForm');
    if (modalForm) {
        modalForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            // Add admin email as hidden field for template
            const adminEmailInput = document.createElement('input');
            adminEmailInput.type = 'hidden';
            adminEmailInput.name = 'admin_email';
            adminEmailInput.value = ADMIN_EMAIL;
            this.appendChild(adminEmailInput);
            
            // Send email via EmailJS
            emailjs.sendForm(
                EMAILJS_SERVICE_ID,              // Use configuration variable
                EMAILJS_BOOKING_TEMPLATE,        // Use configuration variable
                this
            ).then(
                function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    alert('Thank you for your inquiry! We will contact you shortly.');
                    modalForm.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    closeBookingModal();
                },
                function(error) {
                    console.log('FAILED...', error);
                    alert('Oops! Something went wrong. Please try again or contact us directly at +91 9614028424.');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }
            );
        });
    }
});

// ===== Consultation Modal Functions =====

function openConsultationModal() {
    const consultationModal = document.getElementById('consultationModal');
    if (consultationModal) {
        consultationModal.style.display = 'flex';
        consultationModal.classList.add('show');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }
}

function closeConsultationModal() {
    const consultationModal = document.getElementById('consultationModal');
    if (consultationModal) {
        consultationModal.classList.remove('show');
        consultationModal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Allow scrolling
    }
}

// Close consultation modal when clicking outside
window.addEventListener('click', function(event) {
    const consultationModal = document.getElementById('consultationModal');
    if (event.target === consultationModal) {
        closeConsultationModal();
    }
});

// Close consultation modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const consultationModal = document.getElementById('consultationModal');
        if (consultationModal && consultationModal.style.display === 'flex') {
            closeConsultationModal();
        }
    }
});

// Handle consultation form submission
document.addEventListener('DOMContentLoaded', function() {
    const consultationForm = document.getElementById('consultationForm');
    if (consultationForm) {
        consultationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Scheduling...';
            submitBtn.disabled = true;
            
            // Add admin email as hidden field for template
            const adminEmailInput = document.createElement('input');
            adminEmailInput.type = 'hidden';
            adminEmailInput.name = 'admin_email';
            adminEmailInput.value = ADMIN_EMAIL;
            this.appendChild(adminEmailInput);
            
            // Send email via EmailJS
            emailjs.sendForm(
                EMAILJS_SERVICE_ID,                  // Use configuration variable
                EMAILJS_CONSULTATION_TEMPLATE,       // Use configuration variable
                this
            ).then(
                function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    alert('Thank you! We\'ll schedule your free consultation shortly.');
                    consultationForm.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    closeConsultationModal();
                },
                function(error) {
                    console.log('FAILED...', error);
                    alert('Oops! Something went wrong. Please contact us directly at +91 9614028424.');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }
            );
        });
    }
});
