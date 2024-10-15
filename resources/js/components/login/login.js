document.addEventListener("click", (ev) => {
  if (ev.target.closest("#login-container")) {
    window.location.href = "http://nio.com/auth/google";
  }
})
