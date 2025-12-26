import { jsxs, jsx } from "react/jsx-runtime";
import { T as Tabs } from "./tabs-CPx41tqt.js";
import { T as TabsList, a as TabsTrigger, b as TabsContent } from "./tabs-BOXC0x8t.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { router } from "@inertiajs/react";
import { HelpCircle, ListTodo, Settings, CircleDollarSign, BookText, FileText, FolderInput, FlaskConical } from "lucide-react";
import { nanoid } from "nanoid";
import ExamUpdateHeader from "./exam-update-header-DvJD2w3_.js";
import Attempts from "./attempts-CJQEqtNQ.js";
import Basic from "./basic-DpP3-nu2.js";
import Info from "./info-C-S9AT_y.js";
import Media from "./media-B7NDJ2lY.js";
import Pricing from "./pricing-DcC0jZLE.js";
import Questions from "./questions-RO5FaIRK.js";
import Resources from "./resources-DLbicrL_.js";
import SEO from "./seo-CcW6ZSP5.js";
import ExamSettings from "./settings-CKE8pGdt.js";
import "react";
import "@radix-ui/react-tabs";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./sidebar-6wqj6oXO.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./button-jZyzwgdo.js";
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
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./dialog-DD5SXV81.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "richtor";
/* empty css                 */
import "./table-filter-Fsgky9hE.js";
import "./debounce-ZFxqVthq.js";
import "./table-page-size-Xj85uK4t.js";
import "./table-footer-Bf3DvTcP.js";
import "./table-header-C_F4x8YG.js";
import "./table-tRsx9RfJ.js";
import "@tanstack/react-table";
import "./card-D8SB2yrw.js";
import "./exam-attempt-review-rHnWYyo-.js";
import "./question-status-icon-ClIa4D5f.js";
import "./badge-B4crNM73.js";
import "./question-type-badge-BPZv8bmY.js";
import "./input-C6-Ta46A.js";
import "./exam-attempt-table-columns-CWFaMBb8.js";
import "./combobox-CtfF3flG.js";
import "cmdk";
import "./textarea-DctRxpgE.js";
import "./inertia-BtwbgBI3.js";
import "./faq-form-DBHf2G2T.js";
import "./outcome-form-DLObovd-.js";
import "./requirement-form-BnfNyXwS.js";
import "./datetime-picker-Bln2jqxu.js";
import "react-day-picker";
import "./checkbox-CO4DegBm.js";
import "@radix-ui/react-checkbox";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "./data-sort-modal-CzOtsWqf.js";
import "nprogress";
import "./delete-modal-BIvxKwRf.js";
import "./question-dialog-BrDPBeN7.js";
import "./fill-blank-form-BxaDP-BU.js";
import "./listening-form-DuPlEhoB.js";
import "./chunked-uploader-input-MwXGR7K4.js";
import "axios";
import "./matching-form-6MBJ4F_R.js";
import "./multiple-choice-form-CooCKl0T.js";
import "./ordering-form-bzyxM0f6.js";
import "./short-answer-form-BD8f78V5.js";
import "./resource-form-DW267VF7.js";
import "./file-metadata-CvVo69cP.js";
const Update = (props) => {
  const { tab, exam } = props;
  const tabs = [
    {
      id: nanoid(),
      name: "Questions",
      slug: "questions",
      Icon: HelpCircle,
      Component: Questions
    },
    {
      id: nanoid(),
      name: "Resources",
      slug: "resources",
      Icon: ListTodo,
      Component: Resources
    },
    {
      id: nanoid(),
      name: "Attempts",
      slug: "attempts",
      Icon: ListTodo,
      Component: Attempts
    },
    {
      id: nanoid(),
      name: "Basic",
      slug: "basic",
      Icon: Settings,
      Component: Basic
    },
    {
      id: nanoid(),
      name: "Pricing",
      slug: "pricing",
      Icon: CircleDollarSign,
      Component: Pricing
    },
    {
      id: nanoid(),
      name: "Settings",
      slug: "settings",
      Icon: BookText,
      Component: ExamSettings
    },
    {
      id: nanoid(),
      name: "Info",
      slug: "info",
      Icon: FileText,
      Component: Info
    },
    {
      id: nanoid(),
      name: "Media",
      slug: "media",
      Icon: FolderInput,
      Component: Media
    },
    {
      id: nanoid(),
      name: "SEO",
      slug: "seo",
      Icon: FlaskConical,
      Component: SEO
    }
  ];
  return /* @__PURE__ */ jsxs("section", { className: "space-y-8", children: [
    /* @__PURE__ */ jsx(ExamUpdateHeader, {}),
    /* @__PURE__ */ jsxs(Tabs, { value: tab ?? tabs[0].slug, className: "grid grid-rows-1 gap-5 md:grid-cols-4", children: [
      /* @__PURE__ */ jsx("div", { className: "col-span-full md:col-span-1", children: /* @__PURE__ */ jsx(TabsList, { className: "horizontal-tabs-list space-y-1", children: tabs.map(({ id, name, slug, Icon }) => /* @__PURE__ */ jsxs(
        TabsTrigger,
        {
          value: slug,
          className: "horizontal-tabs-trigger",
          onClick: () => router.get(
            route("exams.edit", {
              exam: exam.id,
              tab: slug
            })
          ),
          children: [
            /* @__PURE__ */ jsx(Icon, { className: "h-4 w-4" }),
            /* @__PURE__ */ jsx("span", { children: name })
          ]
        },
        id
      )) }) }),
      /* @__PURE__ */ jsx("div", { className: "col-span-full md:col-span-3", children: tabs.map(({ id, slug, Component }) => /* @__PURE__ */ jsx(TabsContent, { value: slug, className: "m-0", children: /* @__PURE__ */ jsx(Component, {}) }, id)) })
    ] })
  ] });
};
Update.layout = (page) => /* @__PURE__ */ jsx(DashboardLayout, { children: page });
export {
  Update as default
};
