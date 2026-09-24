const menuButton = document.querySelector(".menu-toggle");
const mainNav = document.querySelector(".main-nav");

if (menuButton && mainNav) {
  const closeMenu = () => {
    menuButton.classList.remove("is-open");
    mainNav.classList.remove("is-open");
  };

  menuButton.addEventListener("click", () => {
    menuButton.classList.toggle("is-open");
    mainNav.classList.toggle("is-open");
  });

  mainNav.addEventListener("click", (event) => {
    if (event.target.closest("a")) closeMenu();
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") closeMenu();
  });
}