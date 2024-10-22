import { setQueryString, getQueryString, modal_overlay } from "./../../helper.js";

document.addEventListener("click", function (ev) {
  if (ev.target.closest("#installment-pay-btn")) {
    const target = document.querySelector("#installment-pay-btn")
    setQueryString("o", target.dataset.orgId)
    setQueryString("s", target.dataset.subId)
    setQueryString("i", target.dataset.insId)

    modal_overlay("installment-pay-modal")
  }

  if (ev.target.closest("#installment-pay-modal input")) {

    document.querySelector("#installment-pay-form").action = `http://nio.com/installments/pay/${getQueryString("o")}/${getQueryString("s")}/${getQueryString("i")}`
  }

  if (ev.target.closest("#installment-pay-modal")) {
    modal_overlay("installment-pay-modal")
  }
})
