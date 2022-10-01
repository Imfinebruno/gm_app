const btnMobile = document.getElementById('btn-mobile');

function toggleMenu() {
  const nav = document.getElementById('nav');
  nav.classList.toggle('active');
}

btnMobile.addEventListener('click', toggleMenu);


// function abrirPopup(){
//   document.getElementById('popup').style.display = 'block';
//   document.getElementById('header').classList.add('blur');
//   document.getElementById('pedido').classList.add('blur');

// }

// function fecharPopup(event){
//   document.getElementById('popup').style.display = 'none';
//   document.getElementById('header').classList.remove('blur');
//   document.getElementById('pedido').classList.remove('blur');
// }

// window.addEventListener('click', fecharPopup);

function SitPedido(id){
  location.href = "verPedidoSit.php?id="+id;
}
function verPedido(id){
  location.href = "verPedido.php?id="+id;
}

$.ajax({
  url: 'enviar.php',
  method: 'POST',
  data: {enviado: enviado, concluido: concluido, cancelado: cancelado},
  success: function(result){
    $('form').trigger("reset");
    alert('Alterado com sucesso')
  }
})