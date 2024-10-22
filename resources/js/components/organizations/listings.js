import { setQueryString, getQueryString, modal_overlay } from "./../../helper.js";

document.addEventListener("click", (ev) => {

  // join btn listing
  if (ev.target.closest("#join-organization-btn")) {

    setQueryString(ev.target.closest("#join-organization-btn").dataset.itemId)

    modal_overlay("join-organization-modal")
  }

  // join confirm
  if (ev.target.closest("#join-organization-form input")) {
    document.querySelector("#join-organization-form").action = `http://nio.com/organizations/${getQueryString('id')}/join`
  }

  // hide btn
  if (ev.target.closest("#hide-organization-btn")) {
    modal_overlay("hide-organization-modal")
    setQueryString(ev.target.closest("#hide-organization-btn").dataset.itemId)
  }

  // hide confirm form
  if (ev.target.closest("#hide-organization-form input")) {
    document.querySelector("#hide-organization-form").action = `http://nio.com/organizations/${getQueryString('id')}/hide`
  }

  // closing modal
  if (ev.target.closest("#join-organization-modal")) {
    modal_overlay("join-organization-modal")
  }

  if (ev.target.closest("#hide-organization-modal")) {
    modal_overlay("hide-organization-modal")
  }
})
