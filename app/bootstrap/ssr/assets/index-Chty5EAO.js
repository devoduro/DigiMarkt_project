import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { Head } from "@inertiajs/react";
import Layout from "./layout-DUOJKmA0.js";
import BecomeInstructor from "./become-instructor-DFBWoB1x.js";
import MyCourses from "./my-courses-SbJAH9pB.js";
import MyExams from "./my-exams-cF7vxsKO.js";
import MyProfile from "./my-profile-3gGCar68.js";
import Settings from "./settings-DkPVGUJS.js";
import Wishlist from "./wishlist-CLMc2Bgl.js";
import "./tabs-CPx41tqt.js";
import "./tabs-BOXC0x8t.js";
import "react";
import "@radix-ui/react-tabs";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./card-D8SB2yrw.js";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./sheet-CuVwNO0O.js";
import "@radix-ui/react-dialog";
import "lucide-react";
import "./use-screen-B7SDA5zE.js";
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
import "./tab-lists-BfyVckOO.js";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./tag-input-HUjy_nfZ.js";
import "@yaireo/tagify";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./textarea-DctRxpgE.js";
import "./inertia-BtwbgBI3.js";
import "./badge-B4crNM73.js";
import "./forget-password-3yhJCIlw.js";
import "./course-card-1-BLS66nbX.js";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "./exam-card-1-DbrZWQ_h.js";
const Index = (props) => {
  const { translate } = props;
  const { frontend } = translate;
  const renderContent = () => {
    switch (props.tab) {
      case "courses":
        return /* @__PURE__ */ jsx(MyCourses, {});
      case "exams":
        return /* @__PURE__ */ jsx(MyExams, {});
      case "wishlist":
        return /* @__PURE__ */ jsx(Wishlist, {});
      case "profile":
        return /* @__PURE__ */ jsx(MyProfile, {});
      case "settings":
        return /* @__PURE__ */ jsx(Settings, {});
      case "instructor":
        return /* @__PURE__ */ jsx(BecomeInstructor, {});
      default:
        return /* @__PURE__ */ jsx(Fragment, {});
    }
  };
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: frontend.student_dashboard }),
    renderContent()
  ] });
};
Index.layout = (page) => /* @__PURE__ */ jsx(Layout, { children: page, tab: page.tab });
export {
  Index as default
};
