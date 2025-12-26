import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { Head, Link } from "@inertiajs/react";
import { ArrowLeft } from "lucide-react";
import JobCircularForm from "./job-circular-form-BRpjcXUF.js";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./sidebar-6wqj6oXO.js";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./sheet-CuVwNO0O.js";
import "@radix-ui/react-dialog";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "./main-BqrosZ6t.js";
import "next-themes";
import "sonner";
import "./appearance-Df_e7R4w.js";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./language-BbuOCfpR.js";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./app-logo-42nmPdEQ.js";
import "./accordion-DVAMjldm.js";
import "@radix-ui/react-accordion";
import "./route-DlE7FdTW.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "./use-lang-44ndmTOc.js";
import "./combobox-CtfF3flG.js";
import "cmdk";
import "./datetime-picker-Bln2jqxu.js";
import "react-day-picker";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./input-error-CEW4jhey.js";
import "./switch-CWwfKOpa.js";
import "./switch-CNsdrSya.js";
import "@radix-ui/react-switch";
import "./tag-input-HUjy_nfZ.js";
import "@yaireo/tagify";
import "./card-D8SB2yrw.js";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "richtor";
/* empty css                 */
const CreateJobCircular = ({ translate }) => {
  const { button } = translate;
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: button.create_job }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
      /* @__PURE__ */ jsx("div", { className: "flex items-center justify-between", children: /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-4", children: [
        /* @__PURE__ */ jsx(Button, { variant: "outline", size: "icon", asChild: true, children: /* @__PURE__ */ jsx(Link, { href: route("job-circulars.index"), children: /* @__PURE__ */ jsx(ArrowLeft, { className: "h-4 w-4" }) }) }),
        /* @__PURE__ */ jsx("h1", { className: "text-xl font-semibold", children: button.create_job })
      ] }) }),
      /* @__PURE__ */ jsx(JobCircularForm, {})
    ] })
  ] });
};
CreateJobCircular.layout = (page) => /* @__PURE__ */ jsx(DashboardLayout, { children: page });
export {
  CreateJobCircular as default
};
