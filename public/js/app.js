const hamburger = document.getElementById("hamburger");
const navLinks = document.getElementById("nav-links");
const links = document.querySelectorAll("#nav-links a");

// Hamburger toggle
hamburger.addEventListener("click", () => {
  navLinks.classList.toggle("active");
  hamburger.classList.toggle("open"); // For hamburger animation
});

// Active link detection using hash
const currentHash = window.location.hash || "#home";
links.forEach((link) => {
  if (link.getAttribute("href") === currentHash) {
    console.log("Active link found:", link);
    link.classList.add("active-link");
  }

  link.addEventListener("click", () => {
    navLinks.classList.remove("active");
    hamburger.classList.remove("open");
  });
});

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");

        // Animate skill bars
        if (entry.target.classList.contains("skill-level")) {
          entry.target.classList.add("show");
        }
      }
    });
  },
  { threshold: 0.2 }
);

document
  .querySelectorAll(".animate-on-scroll")
  .forEach((el) => observer.observe(el));
document.querySelectorAll(".skill-level").forEach((el) => observer.observe(el));
