var linha = document.querySelector('.linha-vertical');

linha.addEventListener('click', function(event) {
  var alturaPagina = document.documentElement.scrollHeight - window.innerHeight;
  var posY = event.clientY / window.innerHeight * alturaPagina;

  window.scrollTo({
    top: posY,
    behavior: 'smooth'
  });
});

