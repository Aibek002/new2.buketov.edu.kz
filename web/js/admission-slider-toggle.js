
document.addEventListener('DOMContentLoaded', function () {
    
  const admissionBtnLeft = document.querySelector('.admissionBtnLeft');
  const admissionBtnRight = document.querySelector('.admissionBtnRight');

  if(admissionBtnLeft && admissionBtnRight){
    const moveBlock = document.querySelector('.admission-move');
    const admissionBtnBg = document.querySelector('.admission-btn-bg');
    admissionBtnLeft.addEventListener('click', function () {
      if (admissionBtnRight.classList.contains('active')) {
        admissionBtnLeft.classList.add('active');
        admissionBtnRight.classList.remove('active');

        moveBlock.style.transform = "translateX(0%)";
        admissionBtnBg.style.transform = "translateX(0%)";
        admissionBtnBg.classList.add('animate');
        admissionBtnBg.classList.add('animate-left');
        setTimeout(() => {
          admissionBtnBg.classList.remove('animate-left');
        }, 600);
      }
    });

    admissionBtnRight.addEventListener('click', function () {
      if (admissionBtnLeft.classList.contains('active')) {
        admissionBtnRight.classList.add('active');
        admissionBtnLeft.classList.remove('active');

        moveBlock.style.transform = "translateX(-50%)";
        admissionBtnBg.style.transform = "translateX(104%)";
        admissionBtnBg.classList.add('animate');
        admissionBtnBg.classList.add('animate-right');
        setTimeout(() => {
          admissionBtnBg.classList.remove('animate-right');
        }, 600);
      }
    });
  }   
});