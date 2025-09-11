const button = document.querySelector('.chat-open');
index = 0;
const icons = ['https://cdn-icons-png.flaticon.com/512/3670/3670051.png','https://cdn-icons-png.flaticon.com/512/7044/7044732.png']
const color = ['green','#2c5ca9'];

setInterval(()=>{
index = (index + 1) % icons.length;
  button.style.backgroundImage = `url(${icons[index]})`;
  button.style.backgroundSize = "cover"; 
  button.style.setProperty('--indigoblue-font', color[index]);
},3000);

button.addEventListener('click',()=>{
    document.querySelector('.chat-whatsapp').classList.toggle('active');
    document.querySelector('.chat-phone').classList.toggle('active');
    document.querySelector('.chat-bot').classList.toggle('active');

})