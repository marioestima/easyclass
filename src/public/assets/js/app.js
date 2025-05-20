const token = localStorage.getItem("token");

const searchField = document.getElementById("search-value");
const icon = document.getElementById("icon-search");
const starSpan = document.querySelectorAll(".approved");
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

const materialNames = document.querySelectorAll("[data-name]");

document.addEventListener("DOMContentLoaded", function () {
  searchField.addEventListener("focus", showResultsContainer);
  searchField.addEventListener("blur", showResultsContainer);

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

  async function updateResults(searchTerm) {
    // os resultados tem de ser apresentados a medida que usuario digita
    try {
      const response = await fetch("http://localhost:5000/");
      if (!response.ok)
        console.log("internal server error", response.error);
      const data = await response.json();

      if (data) {
        data.map((result) => {
          ResultsContainer.innerHTML += `
           <div class="result-items">
                <span class="item">
                    <p class="resutado">${results.name} - ${result.date}</p>
                    <i class="fas fa-magnifying-glass"></i>
                </span>
            </div>
          `.join("");
        });
        searchMaterial();
      }
    } catch (err) {
      console.err("not match results :(", err);
    }
  }

  function searchMaterial() {
    const value = searchField.value.toLowerCase();

    materialNames.forEach((materialName) => {
      if (materialName.textContent.toLowerCase().includes(value)) {
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

  function showResultsContainer() {
    if (icon.classList.contains("fa-magnifying-glass")) {
      icon.classList.replace("fa-magnifying-glass", "fa-xmark");
      ResultsContainer.classList.toggle("hidden");
      icon.addEventListener("click", () => searchField.value = "");
    } else if (icon.classList.contains("fa-xmark")) {
      icon.classList.replace("fa-xmark", "fa-magnifying-glass");
      ResultsContainer.classList.toggle("hidden");
    }
    return null;
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

  starSpan.forEach(item => {
    item.addEventListener("click", () => {
      const starIcon = item.querySelector("i");
      starIcon.classList.toggle("liked");
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
