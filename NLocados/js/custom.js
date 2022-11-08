const tbody = document.querySelector(".listar-patrimonios");
const cadForm = document.getElementById("cad-ptr-form");
const edtForm = document.getElementById("edt-ptr-form");
const msgAlerta = document.getElementById("msgAlerta");
const msgAlertaErrorCad = document.getElementById("msgAlertaErrorCad");
const msgAlertaErrorEdt = document.getElementById("msgAlertaErrorEdt");
const cadModal = new bootstrap.Modal(document.getElementById("cadptrModal"));

const listarPatrimonios = async (pagina) => {
  const dados = await fetch("./list.php?pagina=" + pagina);
  const resposta = await dados.text();
  tbody.innerHTML = resposta;
};

listarPatrimonios(1);

//cadastrar
cadForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const dadosForm = new FormData(cadForm);
  dadosForm.append("add", 1);

  //enquanto "Salvando..." está carregando, em caso de problemas com o codigo, banco de dados ou rede
  //o "Salvando..." ira manter escrito no botão onde fica o "cadastrar, no formulario para cadastro de novo
  //patrimonio, o await fetch("cadastrar.php") ira justamente aguardar todo o processo de cadastrar.php para prosseguir o codigo.
  document.getElementById("cad-ptr-btn").value = "Salvando...";
  const dados = await fetch("cadastrar.php", {
    method: "POST",
    body: dadosForm,
  });

  const resposta = await dados.json();
  if (resposta["erro"]) {
    msgAlertaErrorCad.innerHTML = resposta["msg"];
    setTimeout(function () {
      msgAlertaErrorCad.innerHTML = "";
    }, 1200);
  } else {
    msgAlerta.innerHTML = resposta["msg"];
    cadForm.reset();
    cadModal.hide();
    setTimeout(function () {
      msgAlerta.innerHTML = "";
    }, 1200);
  }
  listarPatrimonios(1);

  document.getElementById("cad-ptr-btn").value = "Cadastrar";
});

//visualizar
async function visPtr(id) {
  //console.log(`Acessou ${id}`);

  const dados = await fetch("visualizar.php?id=" + id);
  const resposta = await dados.json();
  //console.log(resposta);

  if (resposta["erro"]) {
    msgAlerta.innerHTML = resposta["msg"];
    setTimeout(function () {
      msgAlerta.innerHTML = "";
    }, 1200);
  } else {
    const visModal = new bootstrap.Modal(
      document.getElementById("visPtrModal")
    );
    visModal.show();

    document.getElementById("nserieptr").innerHTML = resposta["dados"].nserie;

    document.getElementById("npatrimonioptr").innerHTML =
      resposta["dados"].npatrimonio;

    document.getElementById("nomeptr").innerHTML = resposta["dados"].nome;

    document.getElementById("obsptr").innerHTML = resposta["dados"].obs;

    document.getElementById("mdfptr").innerHTML = resposta["dados"].modified;

    document.getElementById("cdtptr").innerHTML = resposta["dados"].created;
  }
}

//editar

async function edtPtr(id) {
  const dados = await fetch("visualizar.php?id=" + id);
  const resposta = await dados.json();

  if (resposta["erro"]) {
    msgAlerta.innerHTML = resposta["msg"];
  } else {
    const edtModal = new bootstrap.Modal(
      document.getElementById("edtptrModal")
    );
    edtModal.show();
    document.getElementById("editid").value = resposta["dados"].id;
    document.getElementById("edtnserie").value = resposta["dados"].nserie;
    document.getElementById("edtnpatrimonio").value =
      resposta["dados"].npatrimonio;
    document.getElementById("edtnome").value = resposta["dados"].nome;
    document.getElementById("edtobs").value = resposta["dados"].obs;
  }
}

edtForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  document.getElementById("edt-ptr-btn").value = "Aplicando Edição...";

  const dadosForm = new FormData(edtForm);
  //console.log(dadosForm);
  for (var dadosFormEdt of dadosForm.entries()) {
    console.log(dadosFormEdt[0] + " - " + dadosFormEdt[1]);
  }

  const dados = await fetch("editar.php", {
    method: "POST",
    body: dadosForm,
  });

  const resposta = await dados.json();

  //console.log(resposta);

  if (resposta["erro"]) {
    msgAlertaErrorEdt.innerHTML = resposta["msg"];
    setTimeout(function () {
      msgAlertaErrorEdt.innerHTML = "";
    }, 1600);
    listarPatrimonios(1);
  } else {
    msgAlertaErrorEdt.innerHTML = resposta["msg"];
    setTimeout(function () {
      msgAlertaErrorEdt.innerHTML = "";
    }, 1350);
    listarPatrimonios(1);
  }
  document.getElementById("edt-ptr-btn").value = "Aplicar Edição";
});

//Excluir
async function excPtr(id) {
  var confirmar = confirm(`Realmente deseja prosseguir com esta exclusão?`);

  if (confirmar == true) {
    const dados = await fetch("excluir.php?id=" + id);

    const resposta = await dados.json();
    if (resposta["erro"]) {
      msgAlerta.innerHTML = resposta["msg"];
    } else {
      msgAlerta.innerHTML = resposta["msg"];
    }
    setTimeout(function () {
      msgAlerta.innerHTML = "";
    }, 1350);

    listarPatrimonios(1);
  } else {
  }
}
