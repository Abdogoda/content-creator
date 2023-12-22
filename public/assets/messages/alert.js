const removeToast = (toast) => {
    toast.classList.add("hide");
    if (toast.timeoutId) clearTimeout(toast.timeoutId);
    setTimeout(() => toast.remove(), 500);
};

const createToast = (type, message) => {
    const toasts = [
        { type: "success", icon: "fa-circle-check" },
        { type: "warning", icon: "fa-circle-xmark" },
        { type: "info", icon: "fa-triangle-exclamation" },
        { type: "danger", icon: "fa-circle-info" },
    ];
    const matchedToast = toasts.find((toast) => toast.type.includes(type));
    if (matchedToast) {
        const notifsContainer = document.querySelector(".notifications");
        newId = notifsContainer.childElementCount + 1;
        notifsContainer.innerHTML += `
        <div class="alert-toast ${type}" id="alert-toast-${newId}">
        <div class="column">
        <i class="fa-solid ${matchedToast.icon}"></i>
        <div class="text">
        <span>${type}</span>
        <p>${message}.</p>
        </div>
        </div>
        <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>
        </div>
        `;
        setTimeout(() => {
            ourToast = document.getElementById(`alert-toast-${newId}`);
            if (ourToast) {
                removeToast(document.getElementById(`alert-toast-${newId}`));
            }
        }, 5000);
    }
};
