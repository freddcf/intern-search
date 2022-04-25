const selectEstado = document.querySelector("#estados");
const selectCidade = document.querySelector("#municipios");

async function getEstadosApi() {
  await fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados")
    .then((response) => response.json())
    .then((data) => {
      data.map((item) => {
        const option = document.createElement("option");
        option.setAttribute("value", item.sigla);
        option.innerHTML = item.nome;
        selectEstado.appendChild(option);
      });
    });
}

getEstadosApi();

selectEstado.addEventListener("change", () => {
  const value = selectEstado.options[selectEstado.selectedIndex].value;
  fetch(
    `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${value}/municipios`
  )
    .then((response) => response.json())
    .then((data) => {
      data.map((item) => {
        const option = document.createElement("option");
        // option.setAttribute("value", item.sigla);
        option.innerHTML = item.nome;
        selectCidade.appendChild(option);
      });
    });
});
