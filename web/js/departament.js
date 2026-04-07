const header = document.querySelector(".header");
const blurs = document.querySelector(".blur");
const more_teachers = document.querySelector(".more-teachers-overlay");
function openTeachersBox(element) {
  let fio = element.dataset.fio;
  let job_title = element.dataset.jobtitle;
  let info = element.dataset.info;
  let email = element.dataset.email;
  let academic_degree = element.dataset.academicdegree;
  let academic_rank = element.dataset.academicrank;
  let work_experience = element.dataset.workexperience;

  let translatedFullNameText = element.dataset.textFullname;

  let translatedJobTitleText = element.dataset.textJobTitle;
  let translatedWorkExperienceText = element.dataset.textWorkExperience;
  let translatedAcademicDegreeText = element.dataset.textAcademicDegree;
  let translatedAcademicRankText = element.dataset.textAcademicRank;
  let translatedYearText = element.dataset.textYear;
  let translatedEmailText = element.dataset.textEmail;

  header.style.display = "none";
  blurs.classList.add("active");
  more_teachers.innerHTML = "";
  more_teachers.classList.add("active");
  more_teachers.innerHTML = `
<div class="teacher-info event-modal p-5 rounded shadow-lg text-white" style="width: 100%; height: 100%; position: relative; background: white; ">
    <!-- Кнопка закрытия -->
    <button onclick="closeBox('events')" style="position: absolute; top: 10px; right: 15px; font-size: 35px; background: none; border: none; color: var(--bs-danger); cursor: pointer;">&times;</button>

    <!-- Основной блок -->
    <div class="d-flex flex-row h-100">
    <div style="width: 20%; height: auto; "> <img src="https://cdn-icons-png.flaticon.com/512/4519/4519678.png" alt="${fio}" style="width: 100%; height: auto; border-radius: 10px; margin-bottom: 10px;"></img></div>
        <div style="
                font-family: 'Segoe UI', sans-serif;
                font-size: 20px;
                line-height: 1.6;
                max-width: 100%;
                padding: 16px;
                background-color: #fff;
                width: 80%;
            ">
            <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f0f0f0;">
                <span style="font-weight: bold; color: #555;">${translatedFullNameText}:</span>
                <span style="color: #333; text-align: right; max-width: 60%;">${fio}</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f0f0f0;">
                <span style="font-weight: bold; color: #555;">${translatedJobTitleText}:</span>
                <span style="color: #333; text-align: right; max-width: 60%;">${job_title}</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f0f0f0;">
                <span style="font-weight: bold; color: #555;">${translatedWorkExperienceText}:</span>
                <span style="color: #333; text-align: right; max-width: 60%;">${work_experience} ${translatedYearText}</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f0f0f0;">
                <span style="font-weight: bold; color: #555;">${translatedAcademicDegreeText}:</span>
                <span style="color: #333; text-align: right; max-width: 60%;">${academic_degree}</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid #f0f0f0;">
                <span style="font-weight: bold; color: #555;">${translatedAcademicRankText}:</span>
                <span style="color: #333; text-align: right; max-width: 60%;">${academic_rank}</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 6px 0;">
                <span style="font-weight: bold; color: #555;">${translatedEmailText}:</span>
                <span style="color: #333; text-align: right; max-width: 60%;">${email}</span>
            </div>
        </div>

</div>
`;
}
function closeBox(type) {
  header.style.display = "flex";
  blurs.classList.remove("active");
  more_teachers.innerHTML = "";
  more_teachers.classList.remove("active");
}
