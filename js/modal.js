const modal = document.querySelector(".modal");
const modalContent = document.querySelector(".modal .content");
const overlay = document.querySelector(".overlay");
const btnCloseModal = document.querySelector(".modal button.close-modal");
const btnsOpenModal = document.querySelectorAll(".announcement");

// close and open modal functions
function closeModal() {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
}
function openModal() {
  modalContent.innerHTML = `<img class="loader" style="width: 50px;" src="img/loader.gif" alt="">`;
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
}

async function modalInfo(id) {
  fetch("visualize.php?id=" + id)
    .then((response) => response.json())
    .then((data) => {
      setTimeout(() => {
        function formatarMoeda(moeda) {
          let valor = moeda;

          valor = valor + "";
          valor = parseInt(valor.replace(/[\D]+/g, ""));
          valor = valor + "";
          valor = valor.replace(/([0-9]{2})$/g, ",$1");

          if (valor.length > 6) {
            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
          }

          return valor;
        }

        const modalRes = `

            <h3 class="title">${data.data.cargo}</h3>
            <div class="companyName">${data.data.empresa}</div>
            <div class="localization">${data.data.localizacao}</div>
            <div class="tags">
              <div class="tag work-time">
                <img src="img/work-time.svg" alt="icon">
                ${data.data.jornada}
              </div>
              <div class="tag day-time">
                <img src="img/time.svg" alt="icon">
                ${data.data.horaEntrada}
              </div>
              <div class="tag cash">
                <img src="img/cash.svg" alt="icon">
                R$${formatarMoeda(data.data.pagamento)} por mês
              </div>
            </div>
            <p class="description">${data.data.descricao}</p>

            <div class="option">
              <img src="img/send.svg" alt="icon">

              <form enctype="multipart/form-data" action="" method="post">
                
                <label for="modalFile" class="upload-btn">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.3275 11.3023C24.4874 9.3718 23.0374 7.77003 21.1998 6.74242C19.3623 5.71481 17.2385 5.31806 15.1538 5.61297C13.0692 5.90788 11.1388 6.87817 9.65835 8.37516C8.17793 9.87215 7.22919 11.8133 6.9575 13.901C5.64656 14.215 4.49656 14.9994 3.72589 16.1054C2.95523 17.2114 2.61757 18.5619 2.77704 19.9005C2.93651 21.239 3.58201 22.4724 4.59094 23.3664C5.59988 24.2603 6.90199 24.7526 8.25 24.7498C8.61467 24.7498 8.96441 24.6049 9.22227 24.3471C9.48014 24.0892 9.625 23.7395 9.625 23.3748C9.625 23.0101 9.48014 22.6604 9.22227 22.4025C8.96441 22.1447 8.61467 21.9998 8.25 21.9998C7.52066 21.9998 6.82118 21.7101 6.30546 21.1943C5.78973 20.6786 5.5 19.9791 5.5 19.2498C5.5 18.5204 5.78973 17.821 6.30546 17.3053C6.82118 16.7895 7.52066 16.4998 8.25 16.4998C8.61467 16.4998 8.96441 16.3549 9.22227 16.0971C9.48014 15.8392 9.625 15.4895 9.625 15.1248C9.62851 13.4986 10.2084 11.9262 11.2616 10.6871C12.3148 9.44799 13.7732 8.62235 15.3777 8.35687C16.9821 8.09139 18.6287 8.40325 20.0249 9.23706C21.4211 10.0709 22.4766 11.3726 23.0038 12.911C23.0823 13.1473 23.2236 13.3578 23.4125 13.5201C23.6014 13.6823 23.8308 13.7902 24.0763 13.8323C24.9921 14.0054 25.8223 14.4835 26.4317 15.1888C27.041 15.8941 27.3935 16.7849 27.4318 17.7162C27.4701 18.6474 27.1918 19.5642 26.6424 20.3171C26.093 21.07 25.3048 21.6147 24.4063 21.8623C24.0525 21.9535 23.7495 22.1814 23.5638 22.496C23.3782 22.8106 23.3251 23.1861 23.4163 23.5398C23.5074 23.8935 23.7354 24.1966 24.05 24.3822C24.3646 24.5679 24.74 24.621 25.0938 24.5298C26.5408 24.1474 27.8235 23.3033 28.7471 22.1256C29.6708 20.9478 30.1848 19.5009 30.2113 18.0044C30.2377 16.5079 29.7751 15.0437 28.8937 13.8341C28.0122 12.6245 26.7601 11.7356 25.3275 11.3023V11.3023ZM17.4763 14.1485C17.3455 14.0234 17.1913 13.9252 17.0225 13.8598C16.6877 13.7223 16.3123 13.7223 15.9775 13.8598C15.8087 13.9252 15.6545 14.0234 15.5238 14.1485L11.3988 18.2735C11.1398 18.5325 10.9944 18.8836 10.9944 19.2498C10.9944 19.616 11.1398 19.9671 11.3988 20.226C11.6577 20.485 12.0088 20.6304 12.375 20.6304C12.7412 20.6304 13.0923 20.485 13.3513 20.226L15.125 18.4385V26.1248C15.125 26.4895 15.2699 26.8392 15.5277 27.0971C15.7856 27.3549 16.1353 27.4998 16.5 27.4998C16.8647 27.4998 17.2144 27.3549 17.4723 27.0971C17.7301 26.8392 17.875 26.4895 17.875 26.1248V18.4385L19.6488 20.226C19.7766 20.3549 19.9287 20.4572 20.0962 20.527C20.2638 20.5968 20.4435 20.6328 20.625 20.6328C20.8065 20.6328 20.9862 20.5968 21.1538 20.527C21.3214 20.4572 21.4734 20.3549 21.6013 20.226C21.7301 20.0982 21.8324 19.9461 21.9022 19.7786C21.972 19.611 22.008 19.4313 22.008 19.2498C22.008 19.0683 21.972 18.8886 21.9022 18.721C21.8324 18.5534 21.7301 18.4014 21.6013 18.2735L17.4763 14.1485Z" fill=""/>
                </svg>
                <input type="text" name="getEmpresa" value="${
                  data.data.empresa
                }" hidden="hidden">
                <input type="text" name="getCargo" value="${
                  data.data.cargo
                }" hidden="hidden">
                  <span class="text">Selecionar Currículo</span>
                </label>
                <input type="file" name="arquivo" id="modalFile">
  
                <button id="formBtn" type="submit">Enviar</button>
              </form>
            </div>
            <div class="option">
              <img src="img/candidate.svg" alt="icon"> Contratando ${
                data.data.numVagas
              } candidatos
            </div>

        `;
        modalContent.innerHTML = modalRes;

        const inputFile = document.querySelector("#modalFile");
        const text = document.querySelector(".option form .text");
        const uploadBtn = document.querySelector(".upload-btn");

        inputFile.addEventListener("change", () => {
          const path = inputFile.value.split("\\");
          const fileName = path[path.length - 1];

          text.innerText = fileName ? fileName : "Selecionar Currículo";

          if (fileName) uploadBtn.classList.add("chosen");
          else uploadBtn.classList.remove("chosen");
        });
      }, 800);
    })
    .catch((error) => console.error(error));
}

// open modal
for (let i = 0; i < btnsOpenModal.length; i++) {
  btnsOpenModal[i].addEventListener("click", openModal);
  btnsOpenModal[i].addEventListener("click", (e) => {
    e.target;
  });
}
btnCloseModal.addEventListener("click", closeModal);
// close modal
overlay.addEventListener("click", closeModal);
document.addEventListener("keydown", (event) => {
  if (event.key === "Escape" && !modal.classList.contains("hidden"))
    closeModal();
});

// Files input styled functionalities
