const hamburger = document.getElementById("hamburger");
const navLinks = document.getElementById("nav-links");

hamburger.addEventListener("click", () => {
  navLinks.classList.toggle("active");
});

const links = document.querySelectorAll("#nav-links a");
const current =
  window.location.pathname.replace("/personnel_profile", "") || "/";

links.forEach((link) => {
  if (link.getAttribute("href") === current) {
    link.classList.add("active-link");
  }
});
