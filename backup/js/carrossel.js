const itens = document.querySelectorAll("#carrossel .item");
let nextIndex = 0;

function carrosselActive(index) {
  const item = itens[index];
  item.classList.add("active");
}

function next() {
  itens[nextIndex].classList.remove('active')
  nextIndex = nextIndex >= itens.length - 1 ? 0 : nextIndex + 1;
  carrosselActive(nextIndex)  
}
function prev() {
  itens[nextIndex].classList.remove('active')
  nextIndex = nextIndex <= 0 ? itens.length - 1 : nextIndex - 1;
  carrosselActive(nextIndex)
}
carrosselActive(nextIndex);

