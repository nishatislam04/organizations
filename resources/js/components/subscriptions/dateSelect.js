document.addEventListener("click", function (ev) {
  if (!(ev.target.closest("#subscription-type") || ev.target.closest("#select-date-container"))) return;

  const selectedType = document.querySelector("#subscription-type").value;

  if (ev.target.closest("#subscription-type")) {
    document.querySelector("#monthly-picker").classList.add("hidden")
    document.querySelector("#yearly-picker").classList.add("hidden")
  }


  document.querySelector(`#${selectedType}-picker`)?.classList.toggle("hidden")

  document.querySelector("#start").value = ev.target.dataset.date;
})

// document.addEventListener('DOMContentLoaded', function () {
//   const monthInput = document.getElementById('start');
//   const monthPicker = document.getElementById('month-picker');
//   const monthOptions = monthPicker.querySelectorAll('p');

//   // Show the month picker when input is clicked
//   monthInput.addEventListener('click', function () {
//     monthPicker.classList.toggle('hidden');
//   });

//   // Hide the month picker and set value when a month is clicked
//   monthOptions.forEach(function (monthOption) {
//     monthOption.addEventListener('click', function () {
//       const selectedMonth = monthOption.getAttribute('data-month');
//       monthInput.value = selectedMonth;  // Set the selected month in the input
//       monthPicker.classList.add('hidden');  // Hide the month picker
//     });
//   });

//   // Close the month picker if clicked outside
//   document.addEventListener('click', function (e) {
//     if (!monthPicker.contains(e.target) && !monthInput.contains(e.target)) {
//       monthPicker.classList.add('hidden');
//     }
//   });
// });
