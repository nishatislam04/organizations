document.addEventListener("click", function (ev) {
  if (!ev.target.closest("#checkbox")) return

  const type = ev.target.classList.contains("single") ? "single" : "all";
  const item = ev.target;
  const checked = item.checked;

  if (type === "all") {

    if (!checked)
      document.querySelectorAll(".single").forEach(item => item.checked = false)
    else
      document.querySelectorAll(".single").forEach(item => item.checked = true)
  }
})
