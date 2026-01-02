<?php require_once './template/layouts/header.php'; ?>
<?php require_once './template/layouts/navbar.php'; ?>

<!-- Add Font Awesome CDN in your header.php if not already added -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->

<section class="home-hero" id="home">
    <img src="./public/assets/profile.jpg" alt="Profile Photo">
    <h1>Mom Raksmey</h1>
    <p>Web Developer | Frontend & Backend | Cyber Security</p>

    <div>
        <a href="#contact" class="btn-primary">Contact Me</a>
        <a href="#project" class="btn-secondary">View Projects</a>
    </div>

    <!-- Social Media Links -->
    <div class="social-links">
        <a href="https://www.facebook.com/mey.i.503586" target="_blank" aria-label="GitHub">
            <i class="fab fa-github"></i>
        </a>
        <a href="https://www.facebook.com/mey.i.503586" target="_blank" aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.facebook.com/mey.i.503586" target="_blank" aria-label="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://www.tiktok.com/@meyy0582" target="_blank" aria-label="TikTok">
            <i class="fab fa-tiktok"></i>
        </a>
        <a href="https://www.facebook.com/mey.i.503586" target="_blank" aria-label="Twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://t.me/Raksmeyy41" target="_blank" aria-label="Telegram">
            <i class="fab fa-telegram-plane"></i>
        </a>
    </div>
</section>

<?php

include "./template/view/home/about.php";
include "./template/view/home/skills.php";
include "./template/view/home/projects.php";
include "./template/view/home/education.php";
include "./template/view/home/experience.php";
include "./template/view/home/contact.php";

?>

<?php require_once './template/layouts/footer.php'; ?>