document.addEventListener("DOMContentLoaded", function () {
  const SECTION_SOLE = "Решения Единственного Акционера";
  const SECTION_BOARD = "Совет директоров";
  const add = "add";
  const remove = "remove";

  const select_subsection = document.querySelector(
    ".select-subsection-corpupr"
  );

  const select_board_subsec = document.querySelector(".select-board-subsec");
  const committee_subsec = document.querySelector(".select-committee-subsec");
  const committee_subsection = document.querySelector(
    ".select-committee-subsection"
  );

  const select_year = document.querySelector(".select-year");
  const select_file = document.querySelector(".select-file");
  const select_language = document.querySelector(".language_file");
  const name_url = document.querySelector(".name_url_input");
  const submitButton = document.querySelector(".submitButton");

  // 🔄 Добавляем один раз обработчик board_subsec

  select_board_subsec.addEventListener("change", function () {
    console.log("click 2");
    resetBoardSubFields(
      committee_subsec,
      committee_subsection,
      select_year,
      select_file,
      select_language,
      name_url
    );
    submitButton.classList.remove("active");

    if (
      select_board_subsec.value === "Заседание Совета директоров" ||
      select_board_subsec.value === "Корпоративные события"
    ) {
      selectedYear(
        select_year,
        select_file,
        select_language,
        name_url,
        submitButton,
        add
      );
    } else if (select_board_subsec.value === "Комитеты Совета директоров") {
      committee_subsec.classList.add("active");
      selectedYear(
        select_year,
        select_file,
        select_language,
        name_url,
        submitButton,
        remove
      );
    }
  });
  // 🔄 Добавляем один раз обработчик committee_subsec
  committee_subsec.addEventListener("change", function () {
    console.log("2");
    if (committee_subsec.selectedIndex > 0) {
      committee_subsection.classList.add("active");
    } else {
      committee_subsection.classList.remove("active");
    }
  });
  // 🔄 Добавляем один раз обработчик committee_subsection
  committee_subsection.addEventListener("change", function () {
    resetCommitteeSubsectionFields(
      select_year,
      select_file,
      select_language,
      name_url
    );
    if (committee_subsection.value !== "Положение") {
      console.log(committee_subsection.value);
      selectedYear(
        select_year,
        select_file,
        select_language,
        name_url,
        submitButton,
        add
      );
      selectFile(select_file, select_language, name_url, submitButton, remove);
    } else {
      selectedYear(
        select_year,
        select_file,
        select_language,
        name_url,
        submitButton,
        remove
      );
      selectFile(select_file, select_language, name_url, submitButton, add);
    }
  });

  // 🔄 Обработка смены категории
  select_subsection.addEventListener("change", function () {
    resetAllFields(
      select_board_subsec,
      select_year,
      select_file,
      select_language,
      name_url
    );
    submitButton.classList.remove("active");

    if (select_subsection.value === SECTION_SOLE) {
      selectedYear(
        select_year,
        select_file,
        select_language,
        name_url,
        submitButton,
        add
      );
    } else if (select_subsection.value === SECTION_BOARD) {
      select_board_subsec.classList.add("active");
    }
  });
});

function selectedYear(
  year,
  select_file,
  select_language,
  name_url,
  submitButton,
  type
) {
  if (type === "add") {
    year.classList.add("active");
    year.addEventListener("change", function () {
      if (year.selectedIndex > 0) {
        selectFile(select_file, select_language, name_url, submitButton, type);
      }
    });
  } else {
    selectFile(select_file, select_language, name_url, submitButton, type);
    year.classList.remove("active");
  }
}

function selectFile(
  select_file,
  select_language,
  name_url,
  submitButton,
  type
) {
  if (type === "add") {
    select_file.classList.add("active");
    select_language.classList.add("active");
    select_file.addEventListener("change", function () {
      if (select_file.files.length > 0) {
        select_name_url(name_url, submitButton, type);
      } else {
        name_url.classList.remove("active");
      }
    });
  } else {
    select_name_url(name_url, submitButton, type);
    select_file.classList.remove("active");
  }
}

function select_name_url(name_url, submitButton, type) {
  if (type === "add") {
    name_url.classList.add("active");
    name_url.addEventListener("change", function () {
      if (name_url.value.trim() !== "") {
        submitButton.classList.add("active");
      } else {
        submitButton.classList.remove("active");
      }
    });
  } else {
    name_url.classList.remove("active");
    submitButton.classList.remove("active");
  }
}
function selectCommitteeSubsec(committee_subsec) {}
function resetCommitteeSubsectionFields(
  select_year,
  select_file,
  select_language,
  name_url
) {
  select_year.selectedIndex = 0;
  select_file.value = "";
  name_url.value = "";
  select_language.selectedIndex = 0;
  select_file.classList.remove("active");
  select_language.classList.remove("active");
  name_url.classList.remove("active");
  select_year.classList.remove("active");
}
function resetBoardSubFields(
  committee_subsec,
  committee_subsection,
  select_year,
  select_file,
  select_language,
  name_url
) {
  select_year.selectedIndex = 0;
  select_language.selectedIndex = 0;

  select_file.value = "";
  committee_subsec.selectedIndex = 0;
  committee_subsection.selectedIndex = 0;

  name_url.value = "";
  committee_subsec.classList.remove("active");
  committee_subsection.classList.remove("active");
  select_language.classList.remove("active");
  select_file.classList.remove("active");
  name_url.classList.remove("active");
  select_year.classList.remove("active");
}
function resetAllFields(
  select_board_subsec,

  select_year,
  select_file,
  select_language,
  name_url
) {
  select_board_subsec.value = "";
  select_year.selectedIndex = 0;
  select_language.selectedIndex = 0;

  select_file.value = "";
  name_url.value = "";
  select_board_subsec.classList.remove("active");
  select_language.classList.remove("active");

  select_file.classList.remove("active");
  name_url.classList.remove("active");
  select_year.classList.remove("active");
}
