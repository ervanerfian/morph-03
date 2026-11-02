type SidebarElements = {
  sidebar: HTMLElement;
  toggle: HTMLButtonElement;
  close: HTMLButtonElement;
  backdrop: HTMLDivElement;
};

const sidebar = document.querySelector<HTMLElement>("[data-app-sidebar]");
const toggle = document.querySelector<HTMLButtonElement>("[data-sidebar-toggle]");
const close = sidebar?.querySelector<HTMLButtonElement>("[data-sidebar-close]");
const backdrop = document.querySelector<HTMLDivElement>("[data-sidebar-backdrop]");
const mobileViewport = window.matchMedia("(max-width: 62rem)");

function getSidebarElements(): SidebarElements | null {
  if (!sidebar || !toggle || !close || !backdrop) {
    return null;
  }

  return { sidebar, toggle, close, backdrop };
}

const elements = getSidebarElements();

if (elements) {
  document.documentElement.dataset.jsEnabled = "true";

  const isOpen = (): boolean => elements.sidebar.dataset.open === "true";

  const focusableItems = (): HTMLElement[] =>
    Array.from(
      elements.sidebar.querySelectorAll<HTMLElement>(
        'a[href]:not([aria-disabled="true"]), button:not(:disabled), [tabindex="0"]',
      ),
    ).filter((element) => !element.hasAttribute("hidden"));

  const setOpen = (open: boolean, restoreFocus = true): void => {
    const shouldOpen = open && mobileViewport.matches;

    elements.sidebar.dataset.open = String(shouldOpen);
    elements.toggle.setAttribute("aria-expanded", String(shouldOpen));
    elements.toggle.setAttribute("aria-label", shouldOpen ? "Close navigation" : "Open navigation");
    elements.backdrop.hidden = !shouldOpen;
    document.body.classList.toggle("sidebar-is-open", shouldOpen);

    if (shouldOpen) {
      elements.close.focus();
      return;
    }

    if (restoreFocus && mobileViewport.matches) {
      elements.toggle.focus();
    }
  };

  elements.toggle.addEventListener("click", () => {
    setOpen(!isOpen());
  });

  elements.close.addEventListener("click", () => {
    setOpen(false);
  });

  elements.backdrop.addEventListener("click", () => {
    setOpen(false);
  });

  elements.sidebar.querySelectorAll<HTMLAnchorElement>("a[href]").forEach((link) => {
    link.addEventListener("click", () => {
      if (mobileViewport.matches) {
        setOpen(false, false);
      }
    });
  });

  document.addEventListener("keydown", (event: KeyboardEvent) => {
    if (!mobileViewport.matches || !isOpen()) {
      return;
    }

    if (event.key === "Escape") {
      event.preventDefault();
      setOpen(false);
      return;
    }

    if (event.key !== "Tab") {
      return;
    }

    const items = focusableItems();
    const first = items[0];
    const last = items.at(-1);

    if (!first || !last) {
      event.preventDefault();
      elements.close.focus();
      return;
    }

    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  });

  mobileViewport.addEventListener("change", () => {
    setOpen(false, false);
  });
}

export {};
