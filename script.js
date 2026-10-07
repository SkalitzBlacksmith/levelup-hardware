const menuButton = document.querySelector(".menu-toggle");
const mainNav = document.querySelector(".main-nav");

if (menuButton && mainNav) {
  const closeMenu = () => {
    menuButton.classList.remove("is-open");
    mainNav.classList.remove("is-open");
    menuButton.setAttribute("aria-expanded", "false");
  };

  menuButton.addEventListener("click", () => {
    menuButton.classList.toggle("is-open");
    mainNav.classList.toggle("is-open");
    menuButton.setAttribute("aria-expanded", mainNav.classList.contains("is-open"));
  });

  mainNav.addEventListener("click", (event) => {
    if (event.target.closest("a")) closeMenu();
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") closeMenu();
  });
}
const themeButton = document.querySelector(".theme-toggle");
let savedTheme = null;
try { savedTheme = localStorage.getItem("levelup-theme"); } catch (error) { /* Zonder opslag blijft de knop werken. */ }
if (savedTheme === "light") document.body.classList.add("light-mode");

function updateThemeButton() {
  const light = document.body.classList.contains("light-mode");
  themeButton.textContent = light ? "Donker thema" : "Licht thema";
  themeButton.setAttribute("aria-pressed", light);
}

if (themeButton) {
  updateThemeButton();
  themeButton.addEventListener("click", () => {
    document.body.classList.toggle("light-mode");
    const theme = document.body.classList.contains("light-mode") ? "light" : "dark";
    try { localStorage.setItem("levelup-them", theme); } catch (error) { /* Opslag is optioneel. */ }
    updateThemeButton();
  });
}

const newsletterModal = document.querySelector("#newsletter-modal");
if (newsletterModal) {
  document.querySelectorAll("[data-open-newsletter]").forEach((button) => {
    button.addEventListener("click", () => newsletterModal.showModal());
  });
  newsletterModal.querySelector(".modal-close").addEventListener("click", () => newsletterModal.close());
  newsletterModal.addEventListener("click", (event) => {
    if (event.target === newsletterModal) {
      const box = newsletterModal.getBoundingClientRect();
      if (event.clientX < box.left || event.clientX > box.right || event.clientY < box.top || event.clientY > box.bottom) newsletterModal.close();
    }
  });
}
