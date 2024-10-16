document.addEventListener("click", function (ev) {

  if (ev.target.closest("#delete-organization")) {

    const item = ev.target;
    const id = item.dataset.itemId;

    // show modal & overlay
    modal_overlay("delete-modal")

    document.querySelector("#delete-organization-form").action = `http://nio.com/organizations/${id}/delete`

  }

  // hide overlay
  if (ev.target.closest(".modal-close-btn")
    && (ev.target.closest("#delete-modal"))) {
    modal_overlay("delete-modal")
  }
})

function modal_overlay(id) {
  document.querySelector(`#${id}`)?.classList.toggle("hidden");
  document.querySelector("#modal-overlay").classList.toggle("hidden");
}
