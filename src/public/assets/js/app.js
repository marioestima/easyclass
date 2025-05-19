const token = localStorage.getItem("token");

const searchField = document.getElementById("search-value");
const icone = document.getElementById("icon-search");
const heartSpan = document.querySelectorAll(".approved-heart");
const bellIcon = document.getElementById("toggleNotificationPanel");
const notificationPanel = document.querySelector(".notification-panel");
const closePanel = document.getElementById("close-panel");
const ResultsContainer = document.querySelector(".search-results");

const closeCreate = document.querySelector(".close-create-class");

const joinClassPanel = document.querySelector(".join-class");
const closeJoin = document.querySelector(".close-join-class");
const joinClassButton = document.querySelector(".join-class-button");

const sendMaterialPanel = document.querySelector(".send-material");
const toggleSendMaterialButton = document.querySelector(".send-material-button");
const closeMaterialPanel = document.querySelector(".close-send-material");

const imageWrapper = document.querySelectorAll(".img-wrapper");
const menuItemButtons = document.querySelectorAll(".menu-container .menu-item li");

const treeDotsNotificationOption = document.querySelectorAll(".action");
const notificationAction = document.querySelectorAll(".notification");
const logOutallert = document.querySelector(".logOutAlert");
const logOutAccepted = document.querySelector(".outBtn");
const notLogout = document.querySelector(".continueBtn");
const logOutBtn = document.querySelector(".logout");
const settingsButton = document.querySelector(".settings");

const materialNames = document.querySelectorAll("[data-name]"); // Definido para filtrar materiais

document.addEventListener("DOMContentLoaded", function () {
  searchField.addEventListener("focus", focusOn);
  searchField.addEventListener("blur", bluerOn);

  bellIcon.addEventListener("click", toggleNotificationPanel);
  settingsButton.addEventListener("click", rendirectSettingsPage);
  closeMaterialPanel.addEventListener("click", closeAllPanels);
  closeJoin.addEventListener("click", closeAllPanels);

  const panels = [
    { panel: sendMaterialPanel },
    { panel: joinClassPanel }
  ];
 
  // VerifyIsAutheticated("/home");

  toggleNotificationAction();

  function searchMaterial() {
    const value = searchField.value.toLowerCase();

    materialNames.forEach((materialName) => {
      if (materialName.textContent.toLowerCase().includes(value)) { // Corrigido: agora busca pelo conteúdo do nome
        materialName.style.display = "flex";
      } else {
        materialName.style.display = "none";
      }
    });
  }

  function activateOnlyThisOption(optionClass) {
    menuItemButtons.forEach(item => {
      if (item.classList.contains(optionClass)) {  
      } else {
        item.classList.remove("active");
      }
    });
  }

  function openOnlyThisPanel(targetPanel) {
    panels.forEach(({ panel }) => {
      if (panel === targetPanel) {
        panel.classList.remove("hidden");
        activateOnlyThisOption();
      } else {
        panel.classList.add("hidden");
      }
    });
  }

  function closeAllPanels() {
    panels.forEach(({ panel }) => panel.classList.add("hidden"));
    activateOnlyThisOption("");
  }

  function focusOn() {
    if (icone.classList.contains("bi-search")) {
      icone.classList.replace("bi-search", "bi-trash");
      ResultsContainer.classList.remove("hidden");
      icone.style.color = "#fa4e41";
      icone.addEventListener("click", () => searchField.value = "");
    }
  }

  function bluerOn() {
    if (icone.classList.contains("bi-trash")) {
      icone.classList.replace("bi-trash", "bi-search");
      icone.style.color = "#444343";
      ResultsContainer.classList.add("hidden");
    }
  }

  function toggleNotificationPanel() {
    notificationPanel.classList.toggle("hidden");
  }

  function toggleNotificationAction() {
    treeDotsNotificationOption.forEach((dot) => {
      dot.addEventListener("click", () => {
        notificationAction.forEach((action) => {
          const ntfAction = action.querySelector(".notification-action");
          ntfAction.classList.toggle("hide");
        });
      });
    });
  }

  imageWrapper.forEach(el => {
    const description = el.querySelector("p");
    el.addEventListener("mouseover", () => description.classList.remove("hidden"));
    el.addEventListener("mouseleave", () => description.classList.add("hidden"));
  });

  heartSpan.forEach(item => {
    item.addEventListener("click", () => {
      const hearticone = item.querySelector("i");
      hearticone.classList.toggle("bi-heart");
      hearticone.classList.toggle("bi-heart-fill");
    });
  });

  function rendirectSettingsPage() {
    window.location.href = "/settings";
  }

  function rendirectLoginPage(url) {
    window.location.href = url;
  }

  function toggleAlertPanel(alertPanel) {
    alertPanel.classList.toggle("alerted");
  }

  function logOutAlert() {
    toggleAlertPanel(logOutallert);
  }

  notLogout.addEventListener("click", () => {
    logOutAlert();
  });
  logOutAccepted.addEventListener("click", () => {
    rendirectLoginPage("/login");
  });

  logOutBtn.addEventListener("click", () => {
    logOutAlert();
  });

  toggleSendMaterialButton.addEventListener("click", () => {
    const isHidden = sendMaterialPanel.classList.contains("hidden");
    if (isHidden) openOnlyThisPanel(sendMaterialPanel);
    else closeAllPanels();
  });

  joinClassButton.addEventListener("click", () => {
    const isHidden = joinClassPanel.classList.contains("hidden");
    if (isHidden) openOnlyThisPanel(joinClassPanel);
    else closeAllPanels();
  });

  // async function VerifyIsAutheticated(url) {
  //   try {
  //     const response = fetch(url, {
  //       method: "GET",
  //       headers: {
  //         Authorization: `Bearer ${token}`,
  //       }
  //     });
  //     const data = await response.json();

  //     if (!response.ok)
  //       throw new Error("Acesso negado! :(")
  //     return data;

  //   } catch (err) {
  //     alert("Você precisa estar logado!");
  //     console.error("Erro no servidor :( Tente novamente mais tarde!");
  //     window.location.href = "/login";
  //   }
  // }
});
