const ref_staff_id = document.querySelector(".ref_staff_id");
const fio = document.querySelector(".fio");
const contact = document.querySelector(".contact");
const information = document.querySelector(".information");
const date = document.querySelector(".date");

const submit = document.querySelector(".submit");

ref_staff_id.addEventListener("change", () => {
  if (ref_staff_id.value === "14" || ref_staff_id === "15") {
    fio.classList.add("active");
    date.classList.add("active");

    submit.classList.add("active");
  }
});
