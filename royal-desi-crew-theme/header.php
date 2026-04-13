<?php
/**
 * Header Template
 * 
 * @package Royal_Desi_Crew
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><text x='0' y='14' font-size='14' font-weight='bold' fill='%23d4af37'>R</text></svg>" />
    
    <!-- ===== EXTERNAL CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Montserrat:wght@300;400;500;600&family=Prata&display=swap" rel="stylesheet">
    
    <!-- ===== INLINE THEME CSS ===== -->
    <style><?php
        // Load and output main.css inline to bypass any server redirect issues
        $css_file = get_template_directory() . '/assets/css/main.css';
        if (file_exists($css_file)) {
            echo file_get_contents($css_file);
        }
    ?></style>
    <!-- ===== END INLINE CSS ===== -->
    
    <?php wp_head(); ?>
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-XXXXXXXXXX');
    </script>
    <!-- End Google Analytics -->
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Header Navigation -->
    <header class="header">
        <div class="container">
            <div class="logo-section">
                <div class="logo">
                    <?php
                    if (has_custom_logo()) {
                        echo royal_desi_crew_custom_logo();
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="Royal Desi Crew Logo" class="logo-img">';
                    }
                    ?>
                </div>
            </div>
            <nav class="nav" id="nav-menu">
                <a href="<?php echo esc_url(home_url('#services')); ?>">Services</a>
                <a href="<?php echo esc_url(home_url('#gallery')); ?>">Our Work</a>
                <a href="<?php echo esc_url(home_url('#packages')); ?>">Pricing</a>
                <a href="<?php echo esc_url(home_url('#about')); ?>">About</a>
                <a href="<?php echo esc_url(home_url('#contact')); ?>">Contact</a>
                <button class="nav-book-btn" onclick="openBookingModal()">Book Now</button>
            </nav>
            <!-- Hamburger Menu -->
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
