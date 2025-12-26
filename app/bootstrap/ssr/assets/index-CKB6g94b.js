import { jsxs, jsx } from "react/jsx-runtime";
import { Head } from "@inertiajs/react";
import { Renderer } from "richtor";
/* empty css                 */
import Layout from "./layout-D_pioccL.js";
import Hero from "./hero-DL-8otSj.js";
import Index$1 from "./index-Dv-xGj1D.js";
import Career from "./career-BZcUwL25.js";
import "./data-sort-modal-CzOtsWqf.js";
import "nprogress";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "react";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./switch-CWwfKOpa.js";
import "./switch-CNsdrSya.js";
import "@radix-ui/react-switch";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./card-D8SB2yrw.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./landing-layout-BL814gaK.js";
import "./index-C5IRp7HU.js";
import "./app-logo-42nmPdEQ.js";
import "lucide-react/dynamic";
import "./main-BqrosZ6t.js";
import "next-themes";
import "sonner";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./use-auth-8FvJer_G.js";
import "./use-screen-B7SDA5zE.js";
import "./appearance-Df_e7R4w.js";
import "./language-BbuOCfpR.js";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./profile-toggle-D0g01Tbw.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "nanoid";
import "./call-to-action-Sixp5Z7D.js";
import "./subscribe-input-X-VTQ_3G.js";
import "./use-lang-44ndmTOc.js";
import "./button-gradient-primary-Dgn8gIzu.js";
import "./input-error-CEW4jhey.js";
import "./section-CjRvJkrt.js";
import "./chunked-uploader-input-MwXGR7K4.js";
import "./input-C6-Ta46A.js";
import "axios";
import "./loading-button-C4Hk_jCd.js";
import "./textarea-DctRxpgE.js";
import "./inertia-BtwbgBI3.js";
import "./icon-picker-dialog-Dd2jM1Vs.js";
import "./icon-picker-_EIJQgy3.js";
import "./debounce-ZFxqVthq.js";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "./table-header-C_F4x8YG.js";
import "./table-tRsx9RfJ.js";
import "@tanstack/react-table";
import "./table-page-size-Xj85uK4t.js";
import "./route-DlE7FdTW.js";
import "./hero-VGkG1p69.js";
import "./success-statistics-C53j3Hwr.js";
import "./team-tiX_V91r.js";
import "./top-instructors-BqDDhGqV.js";
import "./table-filter-Fsgky9hE.js";
import "./table-footer-Bf3DvTcP.js";
import "./badge-B4crNM73.js";
const Index = ({ innerPage, jobCirculars }) => {
  return /* @__PURE__ */ jsxs(Layout, { page: innerPage, navbarHeight: false, children: [
    /* @__PURE__ */ jsx(Head, { title: innerPage.name }),
    /* @__PURE__ */ jsx(Hero, { innerPage }),
    innerPage.sections.length > 0 && /* @__PURE__ */ jsx(Index$1, { sections: innerPage.sections }),
    innerPage.slug === "careers" && jobCirculars && /* @__PURE__ */ jsx(Career, { jobCirculars }),
    /* @__PURE__ */ jsx("div", { className: "container", children: innerPage.description && /* @__PURE__ */ jsx("div", { className: "bg-muted mx-auto my-20 max-w-3xl rounded-2xl px-6 py-10 md:px-20", children: /* @__PURE__ */ jsx(Renderer, { value: innerPage.description }) }) })
  ] });
};
export {
  Index as default
};
