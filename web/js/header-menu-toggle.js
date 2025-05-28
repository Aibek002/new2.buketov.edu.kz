
document.addEventListener('DOMContentLoaded', function () {
const header = document.querySelector('.header');
const logo = document.querySelector('.logoBuketov');

// if(window.location.pathname !== '/'  &&  header){
//   logo.style.display='block';
//   header.style.backgroundColor = 'var(--indigoblue)';
// }
/* Script Dropdown Header*/
let dropDownHeader =document.querySelector('.dropdown-toggle-header');
let dropDownMenuHeader = document.querySelector('.dropdown-menu-header');
let year_toggle_btn_2024 = document.querySelector('.year-toggle-btn--2024');
let year_toggle_btn_2023 = document.querySelector('.year-toggle-btn--2023');
let year_toggle_btn_2022 = document.querySelector('.year-toggle-btn--2022');
let year_toggle_btn_2021 = document.querySelector('.year-toggle-btn--2021');

year_toggle_btn_2024.addEventListener('click' , function(){
  openYearMenu('2024');
});
year_toggle_btn_2023.addEventListener('click' , function(){
  openYearMenu('2023');
});
year_toggle_btn_2022.addEventListener('click' , function(){
  openYearMenu('2022');
});
year_toggle_btn_2021.addEventListener('click' , function(){
  openYearMenu('2021');
});

function openYearMenu(year) {
  let researchJobStudent_2024 = document.querySelector('.ResearchJobStudent-2024');
  let researchJobStudent_2023 = document.querySelector('.ResearchJobStudent-2023');
  let researchJobStudent_2022 = document.querySelector('.ResearchJobStudent-2022');
  let researchJobStudent_2021 = document.querySelector('.ResearchJobStudent-2021');

  // Словарь для упрощения
  let elements = {
    '2024': researchJobStudent_2024,
    '2023': researchJobStudent_2023,
    '2022': researchJobStudent_2022,
    '2021': researchJobStudent_2021,
  };

  // Если выбранный год уже активен — отключаем все и выходим
  if (elements[year].classList.contains('active')) {
    Object.values(elements).forEach(el => el.classList.remove('active'));
    return;
  }

  // Иначе: выключаем все и включаем выбранный
  Object.values(elements).forEach(el => el.classList.remove('active'));
  elements[year].classList.add('active');
}

dropDownHeader.addEventListener('click', function(){
  // console.log("Кнопка нажата");
openDropDown('header-dropdown');
});

function openDropDown(type){
  let toOpenSvg=document.querySelector('.dropdown-toggle-header img');
 
  if(type == 'header-dropdown'){
    dropDownMenuHeader.classList.toggle('active');
    if (toOpenSvg) {
      console.log('change svg');

      toOpenSvg.classList.remove('rotate');
      
      toOpenSvg.src = dropDownMenuHeader.classList.contains('active') 
        ? '/bg-images/svg/toClose.svg'
        :  '/bg-images/svg/toOpen.svg';
      
      toOpenSvg.onload = () => {
        void toOpenSvg.offsetWidth; // перезапускаем анимацию
        toOpenSvg.classList.add('rotate');
      };

    } 
  }
}

/* Script Dropdown Select role*/

let menuAboutUs = document.querySelector('#menu-for-about-us');
let menuIncoming = document.querySelector('#menu-for-incoming');
let menuStudent = document.querySelector('#menu-for-student');
let menuFaculties = document.querySelector('#menu-for-faculties');
let menuGraduation = document.querySelector('#menu-for-graduation');
let menuScience = document.querySelector('#menu-for-science');
let menuInternationalCooperation = document.querySelector('#menu-for-international-cooperation');
let menuJobOpenings = document.querySelector('#menu-for-job-openings');
let menuContacts = document.querySelector('#menu-for-contacts');



menuAboutUs.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для сотрудника");

  openSubMenu('about-us');
});
menuIncoming.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для родитель");
  openSubMenu('incoming');
});
menuStudent.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для студентов");
  openSubMenu('student');
});
menuFaculties.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для выпускников");
  openSubMenu('faculties');
});
menuGraduation.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для выпускников");
  openSubMenu('graduation');
});
menuScience.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для выпускников");
  openSubMenu('science');
});
menuInternationalCooperation.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для выпускников");
  openSubMenu('international-cooperation');
});
menuJobOpenings.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для выпускников");
  openSubMenu('job-opening');
});
menuContacts.addEventListener('click',function(){
  console.log("Кнопка нажата, открыта раздел для выпускников");
  openSubMenu('contacts');
});

function openSubMenu(type){
  let aboutUsSubMenu=document.querySelector('.dropdown-submenu.university-info');
  let incomingSubMenu=document.querySelector('.dropdown-submenu.incoming');
  let studentSubMenu=document.querySelector('.dropdown-submenu.student');
  let facultiesSubMenu=document.querySelector('.dropdown-submenu.faculties');
  let graduateSubMenu=document.querySelector('.dropdown-submenu.graduate');
  let scienceSubMenu=document.querySelector('.dropdown-submenu.science');
  let internCooperSubMenu=document.querySelector('.dropdown-submenu.international-cooperation');
closeAllSubmenus();
  if (type == 'about-us') {
    aboutUsSubMenu.classList.toggle('active');
  } else if (type == 'incoming') {
    incomingSubMenu.classList.toggle('active');
  } else if (type == 'student') {
    studentSubMenu.classList.toggle('active');
  } else if (type == 'faculties') {
    facultiesSubMenu.classList.toggle('active');
  } else if (type == 'graduation') {
    graduateSubMenu.classList.toggle('active');
  } else if (type == 'science') {
    scienceSubMenu.classList.toggle('active');
  } else if (type == 'international-cooperation') {
    internCooperSubMenu.classList.toggle('active');
  }
}

function closeAllSubmenus() {
  // Закрыть все подменю, удалив класс 'active'
  let allSubmenus = document.querySelectorAll('.dropdown-submenu');
  allSubmenus.forEach(submenu => {
    submenu.classList.remove('active');
  });
}

});


let researchCenterBtn = document.querySelector('.researchCenterBtn');
let dissertationCouncilBtn = document.querySelector('.DissertationCouncilBtn');
let сompetitionsAndGrandsBtn = document.querySelector('.CompetitionsAndGrandsBtn');
let conferencesBtn = document.querySelector('.СonferencesBtn');
let researchJobStudentBtn = document.querySelector('.ResearchJobStudentBtn');


researchCenterBtn.addEventListener('click' , function(){
 openSubMenu('subMenuResearchCenter');
});
dissertationCouncilBtn.addEventListener('click' , function(){
 openSubMenu('subMenuDissertationCouncil');
});
сompetitionsAndGrandsBtn.addEventListener('click' , function(){
 openSubMenu('subMenuCompetitionsAndGrands');
});
conferencesBtn.addEventListener('click' , function(){
 openSubMenu('subMenuСonferences');
});
researchJobStudentBtn.addEventListener('click' , function(){
 openSubMenu('subMenuResearchJobStudent');
});
function openSubMenu(type){
  let subMenu=document.querySelector('.dropdown-menu-social');
  let existsType = ['researchCenter','DissertationCouncil','CompetitionsAndGrands','Conferences','ResearchJobStudent'];
  
  existsType.forEach((value) => {
    if(subMenu.classList.contains(value)){
        subMenu.classList.remove(value);
    }
  });

  if (type == 'subMenuResearchCenter'){
  subMenu.classList.toggle('researchCenter');
  }else if(type == 'subMenuDissertationCouncil'){
  subMenu.classList.toggle('DissertationCouncil');
  }else if(type == 'subMenuCompetitionsAndGrands'){
  subMenu.classList.toggle('CompetitionsAndGrands');
  }else if(type == 'subMenuСonferences'){
  subMenu.classList.toggle('Conferences');
  }else if(type == 'subMenuResearchJobStudent'){
  subMenu.classList.toggle('ResearchJobStudent');
  }
}