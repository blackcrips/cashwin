let burger = document.getElementById("tab-design");
let headerNav = document.getElementById("header");
let containerNavigation = document.getElementById("container-navigation");

burger.addEventListener("click", () => {
  if (burger.classList.contains("active")) {
    burger.classList.remove("active");
    headerNav.classList.remove("active");
    containerNavigation.classList.remove("active");
  } else {
    burger.classList.add("active");
    headerNav.classList.add("active");
    containerNavigation.classList.add("active");
  }
});

//setting event listener to open modal when logout is clicked
let btnLogout = document.getElementById("btn-logout");
let overlay = document.getElementById("container-overlay");
let btnLogoutCancel = document.getElementById("modal-cancel");
let body = document.getElementById("body");

btnLogout.addEventListener("click", () => {
  overlay.classList.add("active");
  body.classList.add("active-body");
});

btnLogoutCancel.addEventListener("click", () => {
  overlay.classList.remove("active");
  body.classList.remove("active-body");
});
