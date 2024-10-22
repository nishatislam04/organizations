
// build query string
export function setQueryString(id) {
  const url = new URL(window.location)
  url.searchParams.set("id", id)
  history.pushState(null, '', url);
}

// get query string
export function getQueryString(item) {
  const searchParams = new URLSearchParams(window.location.search);
  if (searchParams.has(item)) {
    return searchParams.get(item)
  }
}

// handle modal & overlay
export function modal_overlay(id) {
  document.querySelector(`#${id}`)?.classList.toggle("hidden");
  document.querySelector("#modal-overlay").classList.toggle("hidden");
}
