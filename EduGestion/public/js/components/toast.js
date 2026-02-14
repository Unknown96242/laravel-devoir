/**
 *
 * @param {Object} config
 * @param {"success" | "error" | "info" | "warning"} [config.type="info"]
 * @param {number} [config.duration=3000]
 * @param {string} config.title
 * @param {string} [config.description]
 * @param {boolean} [config.showDismiss]
 * @param {string} [config.dismissText="Dismiss"]
 * @param {(action: HTMLElement)=> void} [config.onActionRendered]
 */
function toast(config) {
    if (!config.type) {
        config.type = "info";
    }
    if (!config.duration) {
        config.duration = 3000;
    }
    if (!config.dismissText) {
        config.dismissText = "Dismiss";
    }
    let wrapper = document.querySelector("[data-toast-wrapper]");
    if (!wrapper) {
        wrapper = document.createElement("div");
        wrapper.classList.add("toast-wrapper");
        wrapper.setAttribute("data-toast-wrapper", "");
        document.body.appendChild(wrapper);
    }
    const toastEl = createToastEl();
    wrapper.appendChild(toastEl);
    toastEl.appendChild(createToastIconEl());
    toastEl.appendChild(createToastBodyEl());
    toastEl.appendChild(createToastCloseEl());

    const timeout = setTimeout(function () {
        removeToastEl();
    }, config.duration);

    function createToastEl() {
        const toast = document.createElement("div");
        toast.classList.add("custom-toast", `toast-${config.type}`);
        return toast;
    }
    function createToastIconEl() {
        const iconType = {
            success: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>`,
            error: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>`,
            info: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 7H13V9H11V7ZM11 11H13V17H11V11Z"></path></svg>`,
            warning: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12.8659 3.00017L22.3922 19.5002C22.6684 19.9785 22.5045 20.5901 22.0262 20.8662C21.8742 20.954 21.7017 21.0002 21.5262 21.0002H2.47363C1.92135 21.0002 1.47363 20.5525 1.47363 20.0002C1.47363 19.8246 1.51984 19.6522 1.60761 19.5002L11.1339 3.00017C11.41 2.52187 12.0216 2.358 12.4999 2.63414C12.6519 2.72191 12.7782 2.84815 12.8659 3.00017ZM4.20568 19.0002H19.7941L11.9999 5.50017L4.20568 19.0002ZM10.9999 16.0002H12.9999V18.0002H10.9999V16.0002ZM10.9999 9.00017H12.9999V14.0002H10.9999V9.00017Z"></path></svg>`,
        };
        const icon = document.createElement("div");
        icon.classList.add("toast-icon");
        icon.innerHTML = iconType[config.type];
        return icon;
    }
    function createToastBodyEl() {
        const body = document.createElement("div");
        body.classList.add("toast-body");
        const title = document.createElement("p");
        title.classList.add("toast-title");
        title.textContent = config.title;
        body.appendChild(title);
        if (config.description) {
            const description = document.createElement("p");
            description.classList.add("toast-description");
            description.textContent = config.description;
            body.appendChild(description);
        }
        const action = document.createElement("div");
        action.classList.add("toast-action");
        body.appendChild(action);
        if (config.showDismiss) {
            const dismissButton = createDismissButtonEl({
                className: "toast-link toast-link-secondary",
                html: config.dismissText,
            });
            action.appendChild(dismissButton);
        }
        if (config.onActionRendered) {
            config.onActionRendered(action);
        }
        return body;
    }
    function createToastCloseEl() {
        const closeButton = createDismissButtonEl({
            className: "toast-close",
            html: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>`,
        });
        return closeButton;
    }
    /**
     *
     * @param {Object} option
     * @param {string} [option.className]
     * @param {string} option.html
     */
    function createDismissButtonEl(option) {
        const dismissButton = document.createElement("button");
        dismissButton.type = "button";
        if (option.className) {
            dismissButton.className = option.className;
        }
        dismissButton.innerHTML = option.html;
        dismissButton.addEventListener("click", function () {
            removeToastEl();
            clearTimeout(timeout);
        });
        return dismissButton;
    }
    function removeToastEl() {
        toastEl.classList.add("toast-fade-out");
        setTimeout(function () {
            toastEl.remove();
            if (!wrapper.children.length) {
                wrapper.remove();
            }
        }, 150);
    }
}


