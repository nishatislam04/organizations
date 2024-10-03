document.addEventListener("click", function (ev) {
  const btn = ev.target;
  const id = btn.dataset.userId;

  if (ev.target.id === "approve-user-btn") {
    modal_overlay('approve-user-modal');

    document.querySelector("#approve-user-form").action = `http://nio.php/users/${id}/approve`
  }
  if (ev.target.id === "reject-user-btn") {
    modal_overlay('reject-user-modal')

    document.querySelector("#reject-user-form").action = `http://nio.php/users/${id}/reject`
    console.log(document.querySelector("#reject-user-form").action = `http://nio.php/users/${id}/reject`)
  }


  // hide overlay
  if (ev.target.closest(".modal-close-btn")
    && (ev.target.closest('#approve-user-modal') || ev.target.closest('#reject-user-modal'))) {
    document.querySelector("#approve-user-modal").classList.contains("hidden") ? document.querySelector("#reject-user-modal").classList.toggle("hidden") : document.querySelector("#approve-user-modal").classList.toggle("hidden")
    document.querySelector("#modal-overlay").classList.toggle("hidden");
    // modal_overlay(modalToClose);
  }

})

function modal_overlay(id) {
  document.querySelector(`#${id}`)?.classList.toggle("hidden");
  document.querySelector("#modal-overlay").classList.toggle("hidden");
}
