document.addEventListener("click", function (ev) {
  if (!ev.target.closest("#select-month-container")) return;

  document.querySelector("#month-picker").classList.toggle("hidden")

  const month = ev.target.dataset.month;

  document.querySelector("#start").value = month;
})

