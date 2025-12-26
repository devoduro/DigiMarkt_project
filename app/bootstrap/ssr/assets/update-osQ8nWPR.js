import { jsxs, jsx } from "react/jsx-runtime";
import { T as Tabs } from "./tabs-CPx41tqt.js";
import { T as TabsList, a as TabsTrigger, b as TabsContent } from "./tabs-BOXC0x8t.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { router } from "@inertiajs/react";
import { FilePenLine, TvMinimalPlay, FileText, Settings, CircleDollarSign, BookText, FolderInput, FlaskConical } from "lucide-react";
import { nanoid } from "nanoid";
import Assignment from "./assignment-CY9c-AjS.js";
import Basic from "./basic-dFiJGr3W.js";
import CourseUpdateHeader from "./course-update-header-C5MVfmKW.js";
import Curriculum from "./curriculum-CxakuyNI.js";
import Info from "./info-CgUIm6cO.js";
import LiveClass from "./live-class-ikUbNysH.js";
import Media from "./media-BCvw7JVH.js";
import Pricing from "./pricing-DeVT4azl.js";
import SEO from "./seo-DWA9jpAs.js";
import Submissions from "./submissions-DWRdYcIH.js";
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
import "./table-header-C_F4x8YG.js";
import "./table-tRsx9RfJ.js";
import "@tanstack/react-table";
import "./card-D8SB2yrw.js";
import "./assignment-table-column-DVLHG28w.js";
import "./badge-B4crNM73.js";
import "./assignment-form-DtrfEFkl.js";
import "./datetime-picker-Bln2jqxu.js";
import "react-day-picker";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./checkbox-CO4DegBm.js";
import "@radix-ui/react-checkbox";
import "./dialog-DD5SXV81.js";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./inertia-BtwbgBI3.js";
import "richtor";
/* empty css                 */
import "./combobox-CtfF3flG.js";
import "cmdk";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "./textarea-DctRxpgE.js";
import "./course-languages-oEC7DuVF.js";
import "./data-sort-modal-CzOtsWqf.js";
import "nprogress";
import "./delete-modal-BIvxKwRf.js";
import "./lesson-form-G5xV6cu7.js";
import "./chunked-uploader-input-MwXGR7K4.js";
import "axios";
import "./file-metadata-CvVo69cP.js";
import "./question-questions-B9AtnhXc.js";
import "./question-form-B_1Xh1W6.js";
import "./tag-input-HUjy_nfZ.js";
import "@yaireo/tagify";
import "./quiz-form-BmhLN3ZE.js";
import "./section-form-3uK8X9At.js";
import "./resource-modal-BgClk7WV.js";
import "./resource-form-DzQB08Jf.js";
import "./resource-list-CI4-EHCo.js";
import "./faq-form-CBKzs-KY.js";
import "./outcome-form-VvRrePrq.js";
import "./requirement-form-BArab6xl.js";
import "./live-class-form-CDeMRZR0.js";
import "./live-class-status-BWDhzVZN.js";
import "./video-player-DbcUPn7s.js";
import "plyr-react";
/* empty css                */
import "./table-filter-Fsgky9hE.js";
import "./debounce-ZFxqVthq.js";
import "./table-page-size-Xj85uK4t.js";
import "./table-footer-Bf3DvTcP.js";
import "./submissions-table-column-CuAA9en5.js";
import "./grade-submission-dialog-BhpH7r-2.js";
import "./assignment-grade-form-Dr4nrhG3.js";
const Update = (props) => {
  const { tab, assignment, course, translate } = props;
  const { button } = translate;
  const tabs = [
    {
      id: nanoid(),
      name: button.curriculum,
      slug: "curriculum",
      Icon: FilePenLine,
      Component: Curriculum
    },
    {
      id: nanoid(),
      name: button.live_class,
      slug: "live-class",
      Icon: TvMinimalPlay,
      Component: LiveClass
    },
    {
      id: nanoid(),
      name: "Assignment",
      slug: "assignment",
      Icon: FileText,
      Component: assignment ? Submissions : Assignment
    },
    {
      id: nanoid(),
      name: button.basic,
      slug: "basic",
      Icon: Settings,
      Component: Basic
    },
    {
      id: nanoid(),
      name: button.pricing,
      slug: "pricing",
      Icon: CircleDollarSign,
      Component: Pricing
    },
    {
      id: nanoid(),
      name: button.info,
      slug: "info",
      Icon: BookText,
      Component: Info
    },
    {
      id: nanoid(),
      name: button.media,
      slug: "media",
      Icon: FolderInput,
      Component: Media
    },
    {
      id: nanoid(),
      name: button.seo,
      slug: "seo",
      Icon: FlaskConical,
      Component: SEO
    }
  ];
  return /* @__PURE__ */ jsxs("section", { className: "space-y-8", children: [
    /* @__PURE__ */ jsx(CourseUpdateHeader, {}),
    /* @__PURE__ */ jsxs(Tabs, { value: tab ?? tabs[0].slug, className: "grid grid-rows-1 gap-5 md:grid-cols-4", children: [
      /* @__PURE__ */ jsx("div", { className: "col-span-full md:col-span-1", children: /* @__PURE__ */ jsx(TabsList, { className: "horizontal-tabs-list space-y-1", children: tabs.map(({ id, name, slug, Icon }) => /* @__PURE__ */ jsxs(
        TabsTrigger,
        {
          value: slug,
          className: "horizontal-tabs-trigger",
          onClick: () => router.get(
            route("courses.edit", {
              course: course.id,
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
