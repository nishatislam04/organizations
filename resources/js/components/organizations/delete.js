import { setQueryString, getQueryString, modal_overlay } from "./../../helper";

document.addEventListener("click", function (ev) {

  if (ev.target.closest("#delete-organization")) {

    setQueryString(ev.target.closest("#delete-organization").dataset.itemId)

    // show modal & overlay
    modal_overlay("delete-organization-modal")

    document.querySelector("#delete-organization-form").action = `http://nio.com/organizations/${getQueryString('id')}/delete`

  }

  // hide overlay
  if (ev.target.closest(".modal-close-btn")
    && (ev.target.closest("#delete-organization-modal"))) {
    modal_overlay("delete-organization-modal")
  }
})
