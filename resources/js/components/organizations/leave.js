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

function modal_overlay(id) {
  document.querySelector(`#${id}`)?.classList.toggle("hidden");
  document.querySelector("#modal-overlay").classList.toggle("hidden");
}

// build
function setQueryString(id) {
  const url = new URL(window.location)
  url.searchParams.set("id", id)
  history.pushState(null, '', url);
}

// get query string
function getQueryString(item) {
  const searchParams = new URLSearchParams(window.location.search);
  if (searchParams.has(item)) {
    return searchParams.get(item)
  }
}
