document.addEventListener("click", function (ev) {
  const btn = ev.target;
  const id = btn.dataset.userId;

  // approve
  if (ev.target.closest("#approve-user-btn")) {
    modal_overlay('approve-user-modal');

    const target = ev.target.closest("#approve-user-btn");
    const id = target.dataset.userId;

    document.querySelector("#approve-user-form").action = `http://nio.com/users/${id}/approve`
  }

  // reject
  if (ev.target.closest("#reject-user-btn")) {
    modal_overlay('reject-user-modal')

    const target = ev.target.closest("#reject-user-btn");
    const id = target.dataset.userId;

    document.querySelector("#reject-user-form").action = `http://nio.com/users/${id}/reject`
    console.log(document.querySelector("#reject-user-form").action = `http://nio.com/users/${id}/reject`)
  }

  // delete
  if (ev.target.closest("#delete-user-btn")) {

    const item = ev.target;
    const id = item.dataset.userId;

    // show modal & overlay
    modal_overlay("delete-modal")

    document.querySelector("#user-delete-form").action = `http://nio.com/users/${id}/delete`

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
