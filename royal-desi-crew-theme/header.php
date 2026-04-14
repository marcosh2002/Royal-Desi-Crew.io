<?php
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><text x='0' y='14' font-size='14' font-weight='bold' fill='%23d4af37'>R</text></svg>" />
    
    <!-- FONTS ONLY -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Montserrat:wght@300;400;500;600&family=Prata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- COMPLETE INLINE CSS -->
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
.nav a.active { color: var(--gold); border-bottom: 2px solid var(--gold); }
.hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
    z-index: 10000;
}
.hamburger span {
    width: 25px;
    height: 3px;
    background: var(--light-gray);
    border-radius: 2px;
    transition: all 0.3s ease;
}
.hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(8px, 8px); }
.hamburger.open span:nth-child(2) { opacity: 0; }
.hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(8px, -8px); }
@media (max-width: 768px) {
    .hamburger { display: flex; }
    .nav { position: absolute; top: 135px; left: 0; right: 0; flex-direction: column; gap: 0; background: rgba(0,0,0,0.95); max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
    .nav.open { max-height: 400px; }
    .nav a { padding: 15px 20px; border-bottom: 1px solid rgba(212,175,55,0.1); }
}
.hero {
    margin-top: 0;
    background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.8) 100%), url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg"><rect fill="%23000" width="1920" height="1080"/></svg>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    padding: 120px 20px;
    text-align: center;
    min-height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.hero h1 {
    font-size: 56px;
    margin-bottom: 20px;
    color: var(--gold);
    font-family: 'Playfair Display', serif;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}
.hero p {
    font-size: 20px;
    color: var(--light-gray);
    margin-bottom: 30px;
    max-width: 600px;
}
.btn {
    display: inline-block;
    background: var(--gold);
    color: var(--dark);
    padding: 12px 30px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--gold);
}
.btn:hover {
    background: transparent;
    color: var(--gold);
}
.btn-secondary {
    background: transparent;
    color: var(--gold);
    border: 2px solid var(--gold);
}
.btn-secondary:hover {
    background: var(--gold);
    color: var(--dark);
}
section {
    padding: 80px 20px;
}
section h2 {
    font-size: 44px;
    color: var(--gold);
    text-align: center;
    margin-bottom: 50px;
    font-family: 'Playfair Display', serif;
}
section p {
    color: var(--light-gray);
    line-height: 1.8;
}
.services {
    background: var(--darker);
}
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}
.service-card {
    background: rgba(212, 175, 55, 0.1);
    border: 1px solid rgba(212, 175, 55, 0.2);
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    transition: all 0.3s ease;
}
.service-card:hover {
    background: rgba(212, 175, 55, 0.2);
    border-color: var(--gold);
    transform: translateY(-5px);
}
.service-card i {
    font-size: 48px;
    color: var(--gold);
    margin-bottom: 15px;
}
.service-card h3 {
    color: var(--gold);
    margin-bottom: 15px;
    font-size: 22px;
}
.packages {
    background: var(--dark);
}
.packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}
.package-card {
    background: rgba(212, 175, 55, 0.05);
    border: 2px solid rgba(212, 175, 55, 0.3);
    padding: 40px 30px;
    border-radius: 10px;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
}
.package-card.featured {
    border-color: var(--gold);
    background: rgba(212, 175, 55, 0.15);
    transform: scale(1.05);
}
.package-card h3 {
    color: var(--gold);
    font-size: 28px;
    margin-bottom: 15px;
}
.price {
    font-size: 36px;
    color: var(--gold);
    margin: 20px 0;
    font-weight: bold;
}
.features {
    list-style: none;
    margin: 30px 0;
    text-align: left;
}
.features li {
    padding: 10px 0;
    border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    color: var(--light-gray);
}
.features li:before {
    content: "✓ ";
    color: var(--gold);
    font-weight: bold;
    margin-right: 8px;
}
.about {
    background: var(--darker);
}
.about-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
}
.about-text h3 {
    color: var(--gold);
    font-size: 28px;
    margin-bottom: 20px;
}
.stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 30px;
}
.stat-item {
    background: rgba(212, 175, 55, 0.1);
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid var(--gold);
}
.stat-number {
    font-size: 32px;
    color: var(--gold);
    font-weight: bold;
}
.stat-label {
    color: var(--text-gray);
    font-size: 14px;
    margin-top: 5px;
}
.testimonials {
    background: var(--dark);
}
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}
.testimonial-card {
    background: rgba(212, 175, 55, 0.05);
    border: 1px solid rgba(212, 175, 55, 0.2);
    padding: 30px;
    border-radius: 10px;
}
.stars {
    color: var(--gold);
    margin-bottom: 15px;
}
.testimonial-text {
    color: var(--light-gray);
    margin-bottom: 15px;
    font-style: italic;
}
.testimonial-author {
    color: var(--gold);
    font-weight: 600;
}
.gallery {
    background: var(--darker);
}
.gallery-filters {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-bottom: 40px;
    flex-wrap: wrap;
}
.filter-btn {
    padding: 8px 20px;
    background: rgba(212, 175, 55, 0.1);
    border: 1px solid rgba(212, 175, 55, 0.3);
    color: var(--light-gray);
    cursor: pointer;
    border-radius: 5px;
    transition: all 0.3s ease;
}
.filter-btn.active {
    background: var(--gold);
    color: var(--dark);
    border-color: var(--gold);
}
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}
.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
}
.gallery-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.gallery-item:hover img {
    transform: scale(1.1);
}
.gallery-item .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(212, 175, 55, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-item:hover .overlay {
    opacity: 1;
}
.overlay i {
    color: var(--dark);
    font-size: 36px;
}
.signature-moments {
    background: var(--dark);
}
.moments-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}
.moment-card {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    height: 300px;
}
.moment-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.moment-card:hover img {
    transform: scale(1.05);
}
.moment-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.9));
    padding: 20px;
    color: white;
}
.moment-info h3 {
    color: var(--gold);
    margin-bottom: 5px;
}
.contact {
    background: var(--darker);
}
.contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
}
.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 15px;
    margin-bottom: 15px;
    background: rgba(212, 175, 55, 0.05);
    border: 1px solid rgba(212, 175, 55, 0.2);
    color: var(--light-gray);
    border-radius: 5px;
    font-family: 'Montserrat', sans-serif;
}
.contact-form input::placeholder, .contact-form textarea::placeholder {
    color: var(--text-gray);
}
.contact-form textarea {
    resize: vertical;
    min-height: 150px;
}
.contact-info-items {
    display: flex;
    flex-direction: column;
    gap: 30px;
}
.contact-info-item {
    display: flex;
    gap: 20px;
}
.contact-info-item i {
    color: var(--gold);
    font-size: 24px;
    min-width: 30px;
}
.contact-info-item div h4 {
    color: var(--gold);
    margin-bottom: 5px;
}
.contact-info-item div p {
    color: var(--text-gray);
}
footer {
    background: #0a0a0a;
    border-top: 1px solid rgba(212, 175, 55, 0.15);
    padding: 40px 20px;
    text-align: center;
    color: var(--text-gray);
}
footer p {
    margin: 10px 0;
}
.footer-social {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin: 20px 0;
}
.footer-social a {
    color: var(--gold);
    text-decoration: none;
    transition: all 0.3s ease;
}
.footer-social a:hover {
    color: white;
}
.modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.95);
}
.modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 90vh;
    padding: 20px;
}
.modal-content img {
    width: 100%;
    height: auto;
}
.close-modal {
    position: absolute;
    top: 20px;
    right: 40px;
    color: var(--gold);
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}
.close-modal:hover {
    color: white;
}
@media (max-width: 768px) {
    section { padding: 40px 20px; }
    section h2 { font-size: 32px; }
    .hero h1 { font-size: 36px; }
    .about-content { grid-template-columns: 1fr; }
    .contact-content { grid-template-columns: 1fr; }
    .stats { grid-template-columns: 1fr; }
    .modal-content { padding: 0; }
    .close-modal { top: 10px; right: 20px; font-size: 30px; }
}
@media (max-width: 480px) {
    body { padding-top: 100px; }
    .logo { font-size: 14px; }
    .nav { gap: 0; }
    .hero h1 { font-size: 28px; }
    section h2 { font-size: 24px; }
    section { padding: 30px 15px; }
}
    </style>
</head>
<body>
    <?php wp_body_open(); ?>
    
    <header class="header">
        <div class="container">
            <div class="logo-section">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <?php 
                    $custom_logo_id = get_theme_mod('custom_logo');
                    if ($custom_logo_id) {
                        echo wp_get_attachment_image($custom_logo_id, 'full', false, array('class' => 'logo-img'));
                    } else {
                        echo '<i class="fas fa-crown" style="color: var(--gold); font-size: 32px;"></i>Royal Desi Crew';
                    }
                    ?>
                </a>
            </div>
            <nav class="nav">
                <a href="#services">Services</a>
                <a href="#packages">Pricing</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
                <a href="#gallery" class="btn btn-secondary" style="margin: 0;">Book Now</a>
            </nav>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
</body>
</html>
