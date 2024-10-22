import { setQueryString, getQueryString, modal_overlay } from "./../../helper.js";

document.addEventListener("click", (ev) => {
  if (ev.target.closest("#organization-leave-btn")) {

    setQueryString(ev.target.closest("#organization-leave-btn").dataset.oId)
    modal_overlay("leave-organization-modal")
  }

  if (ev.target.closest("#leave-organization-form input")) {
    document.querySelector("#leave-organization-form").action = `http://nio.com/organizations/${getQueryString("id")}/leave`
  }

  if (ev.target.closest("#leave-organization-modal")) {
    modal_overlay("leave-organization-modal")
  }
})
