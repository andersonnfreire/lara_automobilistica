function exibirSenha() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}
function retornaValor(valor) {
    document.getElementById("myInput").value = valor;
}