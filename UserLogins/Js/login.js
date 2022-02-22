let usernameTag = document.getElementById("username-tag");
let passwordTag = document.getElementById("password-tag");
let usernameInput = document.getElementById("username");
let passwordInput = document.getElementById("password");

usernameInput.addEventListener("keyup", () => {
  if (usernameInput.value.length == 0) {
    usernameTag.classList.remove("active");
  } else {
    usernameTag.classList.add("active");
  }
});

passwordInput.addEventListener("keyup", () => {
  if (passwordInput.value.length == 0) {
    passwordTag.classList.remove("active");
  } else {
    passwordTag.classList.add("active");
  }
});
