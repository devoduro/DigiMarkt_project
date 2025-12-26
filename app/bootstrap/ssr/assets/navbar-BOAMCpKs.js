import { jsx, jsxs } from "react/jsx-runtime";
import { A as AppLogo } from "./app-logo-42nmPdEQ.js";
import { A as Appearance } from "./appearance-Df_e7R4w.js";
import { N as Notification } from "./notification-BXalLCUz.js";
import { P as ProfileToggle } from "./profile-toggle-D0g01Tbw.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { u as useSidebar } from "./sidebar-6wqj6oXO.js";
import { u as useScreen } from "./use-screen-B7SDA5zE.js";
import { usePage, Link } from "@inertiajs/react";
import { Expand, Minimize, Menu } from "lucide-react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./dropdown-menu-BIfW6iuW.js";
import "react";
import "@radix-ui/react-dropdown-menu";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "nanoid";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./sheet-CuVwNO0O.js";
import "@radix-ui/react-dialog";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
const Navbar = () => {
  const { screen } = useScreen();
  const { open, toggleSidebar } = useSidebar();
  const { props } = usePage();
  const { translate } = props;
  const { button } = translate;
  props.auth.user;
  return /* @__PURE__ */ jsx("header", { className: "bg-primary dark:bg-primary-dark text-primary-foreground dark:text-primary sticky top-0 z-50 h-[60px]", children: /* @__PURE__ */ jsxs("div", { className: "flex h-full items-center justify-between gap-3 px-4 md:px-8", children: [
    /* @__PURE__ */ jsx(Link, { href: "/", children: /* @__PURE__ */ jsx(AppLogo, { theme: "light" }) }),
    /* @__PURE__ */ jsx("p", { className: "hidden font-semibold sm:block", children: props.course.title }),
    /* @__PURE__ */ jsxs("div", { className: "mr-0 flex items-center gap-2", children: [
      /* @__PURE__ */ jsx(Appearance, {}),
      /* @__PURE__ */ jsx(Notification, {}),
      screen > 768 && /* @__PURE__ */ jsx(
        Button,
        {
          size: "icon",
          variant: "secondary",
          onClick: () => toggleSidebar(),
          className: "border-secondary-light text-secondary-foreground hover:text-secondary-foreground rounded-full",
          children: open ? /* @__PURE__ */ jsx(Expand, {}) : /* @__PURE__ */ jsx(Minimize, {})
        }
      ),
      /* @__PURE__ */ jsx(ProfileToggle, {}),
      screen < 768 && /* @__PURE__ */ jsx(
        Button,
        {
          size: "icon",
          variant: "secondary",
          onClick: () => toggleSidebar(),
          className: "border-secondary-light text-secondary-foreground hover:text-secondary-foreground rounded-full",
          children: /* @__PURE__ */ jsx(Menu, {})
        }
      )
    ] })
  ] }) });
};
export {
  Navbar as default
};
