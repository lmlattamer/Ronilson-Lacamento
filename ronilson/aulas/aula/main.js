
function handleMenu(){
  const menu = document.querySelector(".menu")
  menu.classList.add('active')
}
function handleCloseMenu(){
  const menu = document.querySelector(".menu")
  menu.classList.remove('active')
}

function handleMenuVideo(index){
  const id = document.querySelector('#'+index.id)
  const dataName = document.querySelectorAll('[data-name]')
  const content = document.querySelector('.content[data-name=' + index.id + ']')
  

  dataName.forEach(element => {
    element.classList.remove('active')
  });
  content.classList.add('active')

  const active = document.querySelectorAll(".menu--video--item ul li .active")
  active.forEach(element => {
    element.classList.remove('active')
  });
  id.classList.add('active')
}
