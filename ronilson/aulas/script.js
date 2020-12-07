const listareas = document.querySelectorAll(".listarea")
let marginLeft = 0
let widthWindow = screen.width;
console.log(widthWindow);

for (var i = 0; i <= listareas.length - 1; i++) {
  let widthArea = listareas[i].querySelectorAll('.item').length
  widthArea = (widthArea + 1) * 250;
  listareas[i].style.width = widthArea + "px";
}

const handleLeftArrow = () => {
  if (marginLeft > 0) {
    marginLeft = 0;
  }
  listareas[0].style.marginLeft = marginLeft + "px";
}
const handleRightArrow = () => {
  let listArea = listareas[0].querySelectorAll('.item').length * 250;
  let marginTotal = listArea - widthWindow
  if( marginLeft < marginTotal){
    marginLeft += 250
  }
  if(listArea < widthWindow){
    marginLeft = 0;
  }
  listareas[0].style.marginLeft = - marginLeft + "px";
}