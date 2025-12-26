import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { Head, Link } from "@inertiajs/react";
import { Plus, ClipboardList } from "lucide-react";
import MarkSheetCard from "./marksheet-card-4J6_G7QM.js";
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
import "./dialog-DD5SXV81.js";
import "./marksheet-preview-DooqmHxo.js";
const MarksheetIndex = ({ templates }) => {
  templates.filter((template) => template.type === "exam");
  const courseTemplates = templates.filter((template) => template.type === "course");
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Certificate & Marksheet Templates" }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("h2", { className: "text-xl font-semibold", children: "Marksheet Templates" }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Design marksheets showing course grades" })
        ] }),
        /* @__PURE__ */ jsx(Link, { href: route("marksheet.templates.create"), children: /* @__PURE__ */ jsxs(Button, { children: [
          /* @__PURE__ */ jsx(Plus, { className: "mr-2 h-4 w-4" }),
          "Create Template"
        ] }) })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "py-6", children: [
        /* @__PURE__ */ jsx("h6", { className: "mb-3 text-xl font-semibold", children: "Course Marksheet Templates" }),
        courseTemplates.length === 0 ? /* @__PURE__ */ jsx(Card, { className: "p-12", children: /* @__PURE__ */ jsxs("div", { className: "flex flex-col items-center justify-center text-center", children: [
          /* @__PURE__ */ jsx(ClipboardList, { className: "text-muted-foreground mb-4 h-16 w-16" }),
          /* @__PURE__ */ jsx("h3", { className: "mb-2 text-xl font-semibold", children: "No marksheet templates yet" }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground mb-4", children: "Create your first marksheet template to get started" }),
          /* @__PURE__ */ jsx(Link, { href: route("marksheet.templates.create"), children: /* @__PURE__ */ jsxs(Button, { children: [
            /* @__PURE__ */ jsx(Plus, { className: "mr-2 h-4 w-4" }),
            "Create Your First Template"
          ] }) })
        ] }) }) : /* @__PURE__ */ jsx("div", { className: "grid gap-6 md:grid-cols-2 lg:grid-cols-3", children: courseTemplates.map((template) => /* @__PURE__ */ jsx(MarkSheetCard, { type: "course", template }, template.id)) })
      ] })
    ] })
  ] });
};
MarksheetIndex.layout = (page) => /* @__PURE__ */ jsx(DashboardLayout, { children: page });
export {
  MarksheetIndex as default
};
