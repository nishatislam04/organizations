const deleteBtn = document.addEventListener("click", function (ev) {

  if (ev.target.closest("#delete-organization")) {

    const item = ev.target;
    const id = item.dataset.itemId;

    // show modal & overlay
    modal_overlay()

    document.querySelector("#delete-organization-form").action = `http://nio.php/organizations/${id}/delete`

  }

  // hide overlay
  if (ev.target.closest(".modal-close-btn"))
    modal_overlay()


})

function modal_overlay() {
  document.querySelector("#modal").classList.toggle("hidden");
  document.querySelector("#modal-overlay").classList.toggle("hidden");
}
