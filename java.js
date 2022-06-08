let b1 = document.getElementById('b1');
let winSize = 'width=400, height=200';
b1.addEventListener('click', moveWindowTo);
b1.addEventListener ('click',openWindow);
function openWindow(){
    fenetre = window.open('merci.html','', winSize);
}
function moveWindowTo(){
    fenetre.moveTo(5000,5000);
}