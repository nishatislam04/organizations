import { setQueryString, getQueryString, modal_overlay } from "./../../helper.js";

document.addEventListener("click", function (ev) {
  // approve
  if (ev.target.closest("#approve-user-btn")) {
    modal_overlay('approve-user-modal');

    setQueryString(ev.target.closest("#approve-user-btn").dataset.userId)

    document.querySelector("#approve-user-form").action = `http://nio.com/users/${getQueryString('id')}/approve`
  }

  // reject
  if (ev.target.closest("#reject-user-btn")) {
    modal_overlay('reject-user-modal')

    setQueryString(ev.target.closest("#reject-user-btn").dataset.userId)

    document.querySelector("#reject-user-form").action = `http://nio.com/users/${getQueryString('id')}/reject`
  }

  // delete
  if (ev.target.closest("#delete-user-btn")) {
    setQueryString(ev.target.closest("#delete-user-btn").dataset.userId)

    // show modal & overlay
    modal_overlay("delete-user-modal")

    document.querySelector("#user-delete-form").action = `http://nio.com/users/${getQueryString('id')}/delete`
  }


  // hide overlay
  if (ev.target.closest(".modal-close-btn")
    && (ev.target.closest('#approve-user-modal') || ev.target.closest('#reject-user-modal') || (ev.target.closest("#delete-user-modal")))) {
    document.querySelector("#modal-overlay").classList.toggle("hidden");
    // toggle approve modal
    !document.querySelector("#approve-user-modal").classList.contains("hidden") &&
      document.querySelector("#approve-user-modal").classList.toggle("hidden");

    // toggle reject modal
    !document.querySelector("#reject-user-modal").classList.contains("hidden") &&
      document.querySelector("#reject-user-modal").classList.toggle("hidden");

    // toggle delete modal
    !document.querySelector("#delete-user-modal").classList.contains("hidden") &&
      document.querySelector("#delete-user-modal").classList.toggle("hidden");


    // document.querySelector("#approve-user-modal").classList.contains("hidden") ? document.querySelector("#reject-user-modal").classList.toggle("hidden") : document.querySelector("#approve-user-modal").classList.toggle("hidden")
    // document.querySelector("#modal-overlay").classList.toggle("hidden");
    // modal_overlay(modalToClose);
  }

})

