import { jsxs, jsx } from "react/jsx-runtime";
import { S as SidebarProvider, a as Sidebar, b as SidebarInset } from "./sidebar-6wqj6oXO.js";
import { M as Main } from "./main-BqrosZ6t.js";
import { g as getCompletedContents, a as getCourseCompletion } from "./utils-BmtPBcb0.js";
import Footer from "./footer-DBtLeQd5.js";
import { useState, useEffect } from "react";
import Navbar from "./navbar-BOAMCpKs.js";
import ContentList from "./content-list-Cvbd8gTc.js";
import ContentSummery from "./content-summery-CHXBMj07.js";
import LessonViewer from "./lesson-viewer-DD8vyPIh.js";
import QuizViewer from "./quiz-viewer-ClD5B8U2.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "lucide-react";
import "./button-jZyzwgdo.js";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./sheet-CuVwNO0O.js";
import "@radix-ui/react-dialog";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "next-themes";
import "sonner";
import "@inertiajs/react";
import "clsx";
import "tailwind-merge";
import "./app-logo-42nmPdEQ.js";
import "lucide-react/dynamic";
import "./appearance-Df_e7R4w.js";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./profile-toggle-D0g01Tbw.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "nanoid";
import "./use-screen-B7SDA5zE.js";
import "./live-class-status-DAOLYBAD.js";
import "./tabs-CPx41tqt.js";
import "./tabs-BOXC0x8t.js";
import "@radix-ui/react-tabs";
import "./accordion-DVAMjldm.js";
import "@radix-ui/react-accordion";
import "./card-D8SB2yrw.js";
import "./progress-BuQTjce4.js";
import "@radix-ui/react-progress";
import "richtor";
/* empty css                 */
import "./lesson-5TyQSzUm.js";
import "./lesson-icons-CrjzYJr0.js";
import "./quiz-XhaYKC48.js";
import "./student-feedback-C9_Duvqa.js";
import "./use-lang-44ndmTOc.js";
import "./review-BnOkQIGs.js";
import "./delete-modal-BIvxKwRf.js";
import "./dialog-DD5SXV81.js";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./table-footer-Bf3DvTcP.js";
import "./route-DlE7FdTW.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./textarea-DctRxpgE.js";
import "./review-edit-DiN0groi.js";
import "./forum-DfAwoseh.js";
import "./input-C6-Ta46A.js";
import "./inertia-BtwbgBI3.js";
import "./forum-edit-D3R71Qy3.js";
import "./forum-reply-DIGF5RIA.js";
import "./resource-DG0THxN3.js";
import "./video-player-DbcUPn7s.js";
import "plyr-react";
/* empty css                */
import "./document-viewer-Cu3KnL-a.js";
import "./embed-viewer-CRjXuKs5.js";
import "./lesson-control-2pONF3aa.js";
import "./checkbox-CO4DegBm.js";
import "@radix-ui/react-checkbox";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
const Index = (props) => {
  const { type, watching, watchHistory } = props;
  const [sidebarWidth, setSidebarWidth] = useState("calc(var(--spacing) * 100)");
  const completed = getCompletedContents(watchHistory);
  const completion = getCourseCompletion(props.course, completed);
  useEffect(() => {
    const handleResize = () => {
      if (window.innerWidth < 880) {
        setSidebarWidth("calc(var(--spacing) * 70)");
      } else if (window.innerWidth < 1024) {
        setSidebarWidth("calc(var(--spacing) * 80)");
      } else {
        setSidebarWidth("calc(var(--spacing) * 100)");
      }
    };
    handleResize();
    window.addEventListener("resize", handleResize);
    return () => window.removeEventListener("resize", handleResize);
  }, []);
  return /* @__PURE__ */ jsxs(
    SidebarProvider,
    {
      className: "flex-col",
      style: {
        "--sidebar-width": sidebarWidth
      },
      children: [
        /* @__PURE__ */ jsx(Navbar, {}),
        /* @__PURE__ */ jsxs("div", { className: "flex w-full flex-row-reverse", children: [
          /* @__PURE__ */ jsx(Sidebar, { side: "right", className: "top-[60px] shadow-lg", children: /* @__PURE__ */ jsx(ContentList, { completedContents: completed, courseCompletion: completion }) }),
          /* @__PURE__ */ jsx(SidebarInset, { children: /* @__PURE__ */ jsxs(Main, { children: [
            type === "lesson" ? /* @__PURE__ */ jsx(LessonViewer, { lesson: watching }) : /* @__PURE__ */ jsx(QuizViewer, { quiz: watching }),
            /* @__PURE__ */ jsx(ContentSummery, {}),
            /* @__PURE__ */ jsx(Footer, {})
          ] }) })
        ] })
      ]
    }
  );
};
export {
  Index as default
};
