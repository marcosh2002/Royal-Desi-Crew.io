<?php
/**
 * Header Template - PRODUCTION VERSION
 * Completely stripped of external stylesheets - CSS only inline
 */
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><text x='0' y='14' font-size='14' font-weight='bold' fill='%23d4af37'>R</text></svg>" />
    
    <!-- FONTS ONLY - NO STYLESHEETS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Montserrat:wght@300;400;500;600&family=Prata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- COMPLETE INLINE CSS - NO EXTERNAL STYLESHEET LINKS -->
    <style>
* { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; height: 100%; }
:root {
    --gold: #D4AF37;
    --dark: #000000;
    --darker: #0a0a0a;
    --light-gray: #e0e0e0;
    --text-gray: #b0b0b0;
    --border-gold: #6b5f2f;
    --rose-gold: #b76e79;
    --cream: #f5f1e8;
}
body {
    font-family: 'Montserrat', sans-serif;
    background-color: var(--dark);
    color: var(--light-gray);
    line-height: 1.6;
    overflow-x: hidden;
    min-height: 100vh;
    padding-top: 135px;
}
.container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
header.header {
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 9999;
    border-bottom: 1px solid rgba(212, 175, 55, 0.15);
    backdrop-filter: blur(20px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
}
.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    padding: 5px 0;
}
.logo {
    font-size: 18px;
    font-weight: bold;
    color: white;
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Playfair Display', serif;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}
.logo:hover { color: var(--gold); text-shadow: 0 0 10px rgba(212, 175, 55, 0.3); }
.logo-img {
    max-height: 120px;
    width: auto;
    object-fit: contain;
    transition: all 0.3s ease;
}
.logo:hover .logo-img { filter: drop-shadow(0 0 8px rgba(212, 175, 55, 0.4)); }
.logo-section { display: flex; align-items: center; gap: 12px; position: relative; z-index: 9999; }
.badge-wrapper { display: none !important; }
.since-badge { display: none !important; }
.nav {
    display: flex;
    gap: 30px;
    align-items: center;
    flex: 1;
    justify-content: flex-end;
}
.nav a {
    color: var(--light-gray);
    text-decoration: none;
    transition: color 0.3s ease;
    font-size: 14px;
    display: flex;
    align-items: center;
    height: 100%;
}
.nav a:hover { color: var(--gold); }
.nav-book-btn {
    background: linear-gradient(135deg, var(--gold) 0%, #e8c547 100%);
    color: var(--dark);
    padding: 10px 24px;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
    display: flex;
    align-items: center;
    height: fit-content;
    white-space: nowrap;
}
.nav-book-btn:hover {
    background: linear-gradient(135deg, #e8c547 0%, var(--gold) 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
}
.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
}
.hamburger span {
    width: 25px;
    height: 3px;
    background-color: var(--gold);
    border-radius: 2px;
    transition: all 0.3s ease;
}
.hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(8px, 8px); }
.hamburger.active span:nth-child(2) { opacity: 0; }
.hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(7px, -7px); }

/* HERO SECTION */
.hero {
    margin-top: 0;
    padding-top: 45px;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
}
.hero-bg-carousel { position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1; width: 100%; height: 100%; }
.hero-bg-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center top;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0.55) 50%, rgba(0, 0, 0, 0.70) 100%);
    z-index: 2;
    pointer-events: none;
}
.hero-content { position: relative; z-index: 3; animation: fadeInUp 1s ease; }
.hero-title {
    font-size: 72px;
    font-weight: 900;
    margin-bottom: 20px;
    line-height: 1.3;
    font-family: 'Poppins', sans-serif;
    text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.8), 0 0 20px rgba(212, 175, 55, 0.3);
    word-spacing: 0.1em;
}
.hero-title .gold { color: var(--gold); }
.hero-subtitle {
    font-size: 24px;
    color: var(--light-gray);
    margin-bottom: 40px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
    font-weight: 500;
    letter-spacing: 0.5px;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
}
.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}
.btn {
    padding: 16px 40px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    transition: all 0.4s ease;
    border-radius: 50px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
}
.btn-primary {
    background: linear-gradient(135deg, var(--gold) 0%, #e8c547 100%);
    color: var(--dark);
}
.btn-primary:hover {
    background: linear-gradient(135deg, #e8c547 0%, var(--gold) 100%);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
}
.btn-secondary {
    background-color: transparent;
    color: var(--gold);
    border: 2px solid var(--gold);
}
.btn-secondary:hover {
    background-color: var(--gold);
    color: var(--dark);
    transform: translateY(-2px);
}

.hero-trust-section { margin-top: 40px; text-align: center; }
.trust-stats {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}
.stat-item { display: flex; align-items: center; gap: 8px; color: var(--gold); font-size: 16px; font-weight: 600; }
.stat-icon { font-size: 20px; }
.stat-text { color: white; }
.stat-divider { color: var(--gold); opacity: 0.5; }

.experience-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(212, 175, 55, 0.1);
    border: 1px solid var(--gold);
    padding: 10px 20px;
    border-radius: 50px;
    margin-bottom: 25px;
    font-weight: 600;
    color: var(--gold);
}

section { padding: 80px 0; }
.section-header { text-align: center; margin-bottom: 60px; position: relative; padding-bottom: 20px; }
.section-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
}
.section-header h2 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 15px;
    line-height: 1.2;
    font-family: 'Playfair Display', serif;
    letter-spacing: 1px;
}
.section-header h2 .gold { color: var(--gold); font-style: italic; }
.section-header p {
    font-size: 16px;
    color: var(--text-gray);
    font-weight: 300;
}

.services { background-color: var(--darker); }
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
}
.service-card {
    background: rgba(15, 15, 15, 0.8);
    border: 1px solid rgba(212, 175, 55, 0.25);
    padding: 30px;
    border-radius: 12px;
    transition: all 0.4s ease;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
}
.service-card:hover {
    border-color: var(--gold);
    transform: translateY(-12px);
    box-shadow: 0 20px 40px rgba(212, 175, 55, 0.3);
}
.service-card h3 { font-size: 20px; margin-bottom: 15px; color: white; font-family: 'Playfair Display', serif; }
.service-card p { font-size: 14px; color: var(--text-gray); margin-bottom: 20px; flex-grow: 1; }

.packages {
    background-color: var(--dark);
    display: block !important;
    visibility: visible !important;
    padding: 80px 0;
}
.packages-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.package-card {
    background: linear-gradient(135deg, rgba(15, 15, 15, 0.9) 0%, rgba(20, 20, 20, 0.8) 100%);
    border: 2px solid rgba(212, 175, 55, 0.3);
    padding: 30px 20px;
    border-radius: 15px;
    transition: all 0.4s ease;
    display: flex;
    flex-direction: column;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
}
.package-card:hover {
    border-color: var(--gold);
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(212, 175, 55, 0.25);
}
.package-header h3 {
    font-size: 28px;
    color: white;
    margin-bottom: 8px;
    font-family: 'Playfair Display', serif;
    font-weight: 800;
}
.package-features {
    list-style: none;
    margin-bottom: 30px;
    flex-grow: 1;
}
.package-features li {
    color: var(--text-gray);
    font-size: 14px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.package-features i { color: var(--gold); font-size: 16px; }

.about { background-color: var(--darker); display: block !important; padding: 80px 0; }
.about-content { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
.about-text h2 { font-size: 42px; margin-bottom: 30px; }
.about-text h2 .gold { color: var(--gold); }
.about-text p { color: var(--text-gray); margin-bottom: 20px; line-height: 1.8; }
.about-stats { display: flex; gap: 40px; margin-top: 40px; }
.stat { display: flex; align-items: center; gap: 15px; }
.stat i { font-size: 32px; color: var(--gold); }
.stat-number { font-size: 28px; font-weight: 700; color: var(--gold); }
.stat-label { color: var(--text-gray); font-size: 14px; }
.about-image {
    height: 500px;
    background: linear-gradient(135deg, #8f6f3f 0%, #5a4a2a 100%);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(212, 175, 55, 0.2);
    border: 3px solid var(--gold);
}

.testimonials { background-color: var(--dark); display: block !important; padding: 80px 0; }
.testimonials-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
.testimonial-card {
    background: rgba(212, 175, 55, 0.05);
    border: 1px solid rgba(212, 175, 55, 0.15);
    padding: 30px;
    border-radius: 10px;
    transition: all 0.3s ease;
}
.testimonial-card:hover {
    border-color: var(--gold);
    box-shadow: 0 10px 30px rgba(212, 175, 55, 0.2);
}
.stars { display: flex; gap: 5px; margin-bottom: 15px; }
.stars i { color: var(--gold); font-size: 16px; }
.testimonial-text { font-size: 14px; color: var(--text-gray); font-style: italic; margin-bottom: 20px; }
.testimonial-author { display: flex; flex-direction: column; gap: 5px; }
.testimonial-author strong { color: white; font-size: 15px; }
.testimonial-author span { color: var(--gold); font-size: 13px; }

.gallery { background-color: var(--dark); }
.gallery-filters {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 40px;
    flex-wrap: wrap;
}
.filter-btn {
    padding: 10px 25px;
    border: 2px solid rgba(212, 175, 55, 0.4);
    background: transparent;
    color: var(--light-gray);
    font-size: 14px;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.filter-btn:hover {
    border-color: var(--gold);
    color: var(--gold);
    box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
}
.filter-btn.active {
    background: var(--gold);
    color: var(--dark);
    border-color: var(--gold);
    box-shadow: 0 5px 20px rgba(212, 175, 55, 0.4);
}
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}
.gallery-item {
    position: relative;
    aspect-ratio: 1;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    background: var(--darker);
    border: 1px solid rgba(212, 175, 55, 0.2);
    transition: all 0.3s ease;
}
.gallery-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(212, 175, 55, 0.2);
}

.signature-moments { background: linear-gradient(135deg, rgba(0, 0, 0, 0.9) 0%, rgba(10, 10, 10, 0.95) 100%); padding: 80px 0; }
.moments-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px; }
.moment-card {
    position: relative;
    height: 320px;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid rgba(212, 175, 55, 0.2);
    transition: all 0.4s ease;
}
.moment-card:hover {
    transform: translateY(-10px);
    border-color: rgba(212, 175, 55, 0.5);
    box-shadow: 0 20px 50px rgba(212, 175, 55, 0.2);
}

.contact { background-color: var(--darker); display: block !important; padding: 80px 0; }
.contact-content { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; }
.contact-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.contact-form h2 {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 800;
    color: var(--gold);
}
.contact-form input,
.contact-form select,
.contact-form textarea {
    background: linear-gradient(135deg, rgba(30, 30, 30, 0.6) 0%, rgba(15, 15, 15, 0.7) 100%);
    border: 1px solid rgba(212, 175, 55, 0.25);
    padding: 12px 15px;
    color: white;
    border-radius: 8px;
    transition: all 0.3s ease;
}
.contact-form input:focus,
.contact-form select:focus,
.contact-form textarea:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
}

.footer { background-color: #0f0f0f; padding: 30px 0; text-align: center; border-top: 1px solid rgba(212, 175, 55, 0.1); color: var(--text-gray); }

.whatsapp-btn {
    position: fixed;
    bottom: 25px;
    right: 25px;
    z-index: 9999;
    text-decoration: none;
    cursor: pointer;
    border: none;
    background: none;
    padding: 0;
}
.whatsapp-btn:hover { transform: scale(1.1); }

.modal {
    display: none !important;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.9) 100%);
}
.modal.show { display: flex !important; align-items: center; justify-content: center; }
.modal-content {
    background: linear-gradient(135deg, rgba(15, 15, 15, 0.95) 0%, rgba(25, 25, 25, 0.95) 100%);
    border: 2px solid rgba(212, 175, 55, 0.4);
    border-radius: 15px;
    width: 85%;
    max-width: 400px;
    padding: 20px;
}

@keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

@media (max-width: 768px) {
    .hamburger { display: flex; }
    .nav {
        position: fixed;
        top: 70px;
        left: 0;
        right: 0;
        background-color: rgba(15, 15, 15, 0.98);
        flex-direction: column;
        gap: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    .nav.active { max-height: 500px; }
    .nav a { padding: 15px 20px; display: block; }
    .hero-title { font-size: 36px; }
    .section-header h2 { font-size: 28px; }
    .about-content { grid-template-columns: 1fr; }
    .contact-content { grid-template-columns: 1fr; }
    .packages-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 480px) {
    .hero-title { font-size: 22px; }
    .packages-grid { grid-template-columns: 1fr; }
}
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="header">
    <div class="container">
        <div class="logo-section">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Royal Desi Crew" class="logo-img">
            </div>
        </div>
        
        <nav class="nav" id="nav">
            <a href="#services">Services</a>
            <a href="#packages">Packages</a>
            <a href="#about">About</a>
            <a href="#gallery">Gallery</a>
            <a href="#contact">Contact</a>
            <button class="nav-book-btn" onclick="document.getElementById('bookingModal').classList.add('show')">Book Now</button>
        </nav>

        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
