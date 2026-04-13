// Gallery Script - Handle gallery interactions and rendering
let currentPhotoId = null;

// Initialize gallery on page load
document.addEventListener('DOMContentLoaded', async function() {
    // Load photos
    if (window.photosLoader) {
        await photosLoader.loadPhotos();
        renderGallery();
    }
    
    // Setup event listeners
    setupEventListeners();
    
    // Hamburger Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
        
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }
});

// Render gallery grid
function renderGallery() {
    const galleryGrid = document.getElementById('galleryGrid');
    const photos = photosLoader.getFilteredPhotos();
    
    if (photos.length === 0) {
        galleryGrid.innerHTML = '<p style="grid-column: 1/-1; text-align: center; color: #d4af37;">No photos found</p>';
        return;
    }
    
    galleryGrid.innerHTML = photos.map(photo => `
        <div class="gallery-item" data-id="${photo.id}" onclick="openLightbox(${photo.id})">
            <div class="gallery-item-image" style="background-image: url('${photo.url}');">
                <div class="gallery-item-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
            <div class="gallery-item-caption">
                <p>${photo.caption}</p>
            </div>
        </div>
    `).join('');
    
    // Add animation
    document.querySelectorAll('.gallery-item').forEach((item, index) => {
        item.style.animation = `fadeInUp 0.6s ease forwards`;
        item.style.animationDelay = `${index * 0.1}s`;
    });
}

// Open lightbox
function openLightbox(photoId) {
    currentPhotoId = photoId;
    const photo = photosLoader.getPhotoById(photoId);
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');
    const lightboxCounter = document.getElementById('lightboxCounter');
    
    lightboxImage.src = photo.url;
    lightboxImage.alt = photo.caption;
    lightboxCaption.textContent = photo.caption;
    
    const currentIndex = photosLoader.getPhotoIndex(photoId) + 1;
    const total = photosLoader.getTotalPhotos();
    lightboxCounter.textContent = `${currentIndex} / ${total}`;
    
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// Close lightbox
function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('active');
    currentPhotoId = null;
    document.body.style.overflow = 'auto';
}

// Navigate to next photo
function nextPhoto() {
    if (!currentPhotoId) return;
    const nextPhoto = photosLoader.getNextPhoto(currentPhotoId);
    openLightbox(nextPhoto.id);
}

// Navigate to previous photo
function previousPhoto() {
    if (!currentPhotoId) return;
    const prevPhoto = photosLoader.getPreviousPhoto(currentPhotoId);
    openLightbox(prevPhoto.id);
}

// Handle filter buttons
function handleFilterClick(event) {
    if (event.target.classList.contains('filter-btn')) {
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');
        
        // Filter and re-render
        const category = event.target.getAttribute('data-filter');
        photosLoader.filterByCategory(category);
        renderGallery();
        
        // Smooth scroll to gallery
        document.querySelector('.gallery-main').scrollIntoView({ behavior: 'smooth' });
    }
}

// Setup all event listeners
function setupEventListeners() {
    // Lightbox controls - only if elements exist
    const closeLightboxBtn = document.getElementById('closeLightbox');
    const nextPhotoBtn = document.getElementById('nextPhoto');
    const prevPhotoBtn = document.getElementById('prevPhoto');
    const lightbox = document.getElementById('lightbox');
    const filterButtons = document.querySelector('.filter-buttons');
    
    // Only attach listeners if elements exist
    if (closeLightboxBtn) {
        closeLightboxBtn.addEventListener('click', closeLightbox);
    }
    
    if (nextPhotoBtn) {
        nextPhotoBtn.addEventListener('click', nextPhoto);
    }
    
    if (prevPhotoBtn) {
        prevPhotoBtn.addEventListener('click', previousPhoto);
    }
    
    if (lightbox) {
        lightbox.addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });
    }
    
    if (filterButtons) {
        filterButtons.addEventListener('click', handleFilterClick);
    }
    
    // Keyboard navigation (always safe to attach)
    document.addEventListener('keydown', function(e) {
        const lb = document.getElementById('lightbox');
        if (!lb || !lb.classList.contains('active')) return;
        
        if (e.key === 'ArrowLeft') previousPhoto();
        if (e.key === 'ArrowRight') nextPhoto();
        if (e.key === 'Escape') closeLightbox();
    });
}


