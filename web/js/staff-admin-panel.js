const ref_staff_id = document.querySelector(".ref_staff_id");
const fio = document.querySelector(".fio");
const contact = document.querySelector(".contact");
const information = document.querySelector(".information");
const welcome = document.querySelector(".welcome");
const job_title = document.querySelector(".job-title");
const faculty = document.querySelector(".faculty");
const departament = document.querySelector(".departament");
const dissertation = document.querySelector(".dissertation");

const show = document.querySelector(".show");
const upload_img = document.querySelector(".upload-img");

const date = document.querySelector(".date");
const submit = document.querySelector(".submit");
const allFields = [
  fio,
  contact,
  information,
  welcome,
  job_title,
  faculty,
  departament,
  show,
  date,
  upload_img,
  submit,
];

ref_staff_id.addEventListener("input", () => {
  allFields.forEach((el) => el.classList.remove("active"));
  if (ref_staff_id.value === "14" || ref_staff_id.value === "15") {
    fio.classList.add("active");
    date.classList.add("active");
    submit.classList.add("active");
  } else if (
    ref_staff_id.value === "1" ||
    ref_staff_id.value === "2" ||
    ref_staff_id.value === "6" ||
    ref_staff_id.value === "7"
  ) {
    fio.classList.add("active");
    contact.classList.add("active");
    information.classList.add("active");
    welcome.classList.add("active");
    job_title.classList.add("active");
    upload_img.classList.add("active");
    submit.classList.add("active");
  } else if (ref_staff_id.value === "3") {
    fio.classList.add("active");
    contact.classList.add("active");
    // information.classList.add("active");
    job_title.classList.add("active");
    upload_img.classList.add("active");
    faculty.classList.add("active");
    submit.classList.add("active");
  } else if (ref_staff_id.value === "5" || ref_staff_id.value === "12") {
    fio.classList.add("active");
    contact.classList.add("active");
    information.classList.add("active");
    welcome.classList.add("active");
    job_title.classList.add("active");
    upload_img.classList.add("active");
    faculty.classList.add("active");
    departament.classList.add("active");

    submit.classList.add("active");
  }else if(ref_staff_id.value === "13"){
    fio.classList.add("active");
    contact.classList.add("active");
    information.classList.add("active");
    
    job_title.classList.add("active");
    upload_img.classList.add("active");
    dissertation.classList.add("active");
  }
});
