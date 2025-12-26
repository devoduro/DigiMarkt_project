import { jsxs, jsx } from "react/jsx-runtime";
import { Head } from "@inertiajs/react";
import Blogs from "./blogs-LP2VE29k.js";
import CallToAction from "./call-to-action--9ctu4rW.js";
import CategoryCourses from "./category-courses-CNghK-4C.js";
import Features from "./features-BElGsk1e.js";
import Hero from "./hero-DtRPysuY.js";
import NewCourses from "./new-courses-BsiUKz8C.js";
import Overview from "./overview-DoQiwdKk.js";
import Testimonials from "./testimonials-CJaCQXTg.js";
import TopCategories from "./top-categories-DHis8Zvd.js";
import TopInstructors from "./top-instructors-BKWOtDSE.js";
import Layout from "./layout-D_pioccL.js";
import "./blog-card-1-Bph0lmT4.js";
import "./card-D8SB2yrw.js";
import "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "date-fns";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./carousel-EYxgwHQ0.js";
import "embla-carousel-react";
import "./section-CjRvJkrt.js";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "lucide-react";
import "./use-lang-44ndmTOc.js";
import "./chunked-uploader-input-MwXGR7K4.js";
import "./input-C6-Ta46A.js";
import "axios";
import "sonner";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./textarea-DctRxpgE.js";
import "./inertia-BtwbgBI3.js";
import "./icon-picker-dialog-Dd2jM1Vs.js";
import "./icon-picker-_EIJQgy3.js";
import "./debounce-ZFxqVthq.js";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "lucide-react/dynamic";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./table-header-C_F4x8YG.js";
import "./table-tRsx9RfJ.js";
import "@tanstack/react-table";
import "./table-page-size-Xj85uK4t.js";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./route-DlE7FdTW.js";
import "embla-carousel-autoplay";
import "./subscribe-input-X-VTQ_3G.js";
import "./button-gradient-primary-Dgn8gIzu.js";
import "./course-card-2-CkYsUCLz.js";
import "./tabs-CPx41tqt.js";
import "./tabs-BOXC0x8t.js";
import "@radix-ui/react-tabs";
import "./partners-e0iWsp7L.js";
import "./instructor-socials-Dio3oqYc.js";
import "./data-sort-modal-CzOtsWqf.js";
import "nprogress";
import "./switch-CWwfKOpa.js";
import "./switch-CNsdrSya.js";
import "@radix-ui/react-switch";
import "./landing-layout-BL814gaK.js";
import "./index-C5IRp7HU.js";
import "./app-logo-42nmPdEQ.js";
import "./main-BqrosZ6t.js";
import "next-themes";
import "./use-auth-8FvJer_G.js";
import "./use-screen-B7SDA5zE.js";
import "./appearance-Df_e7R4w.js";
import "./language-BbuOCfpR.js";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "./profile-toggle-D0g01Tbw.js";
import "nanoid";
const Home2 = ({ page, system }) => {
  const { sections } = page;
  const components = [];
  sections.filter((section) => section.active).map((section) => {
    switch (section.slug) {
      case "hero":
        components.push(Hero);
        break;
      case "overview":
        components.push(Overview);
        break;
      case "category_courses":
        components.push(CategoryCourses);
        break;
      case "top_instructors":
        components.push(TopInstructors);
        break;
      case "features":
        components.push(Features);
        break;
      case "top_categories":
        components.push(TopCategories);
        break;
      case "new_courses":
        components.push(NewCourses);
        break;
      case "testimonials":
        components.push(Testimonials);
        break;
      case "call_to_action":
        components.push(CallToAction);
        break;
      case "blogs":
        components.push(Blogs);
        break;
    }
  });
  return /* @__PURE__ */ jsxs(Layout, { children: [
    /* @__PURE__ */ jsx(Head, { title: system.fields.name }),
    components.map((Component, index) => /* @__PURE__ */ jsx(Component, {}, `home-2-${index}`))
  ] });
};
export {
  Home2 as default
};
