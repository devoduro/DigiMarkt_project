import { jsxs, jsx, Fragment } from "react/jsx-runtime";
import { C as Card, a as CardHeader, b as CardContent } from "./card-D8SB2yrw.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { Link, Head } from "@inertiajs/react";
import { B as ButtonGradientPrimary } from "./button-gradient-primary-Dgn8gIzu.js";
import { A as Avatar, a as AvatarImage, b as AvatarFallback } from "./avatar-Cr_jqfHL.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { P as Progress } from "./progress-BuQTjce4.js";
import { T as Tabs } from "./tabs-CPx41tqt.js";
import { S as Separator } from "./separator-R7EO2G8T.js";
import { T as TabsList, a as TabsTrigger, b as TabsContent } from "./tabs-BOXC0x8t.js";
import Layout from "./layout-DUOJKmA0.js";
import ExamAttempts from "./exam-attempts-BGQTZf8n.js";
import ExamCertificate from "./exam-certificate-C2rfWjzV.js";
import ExamResources from "./exam-resources-C_KFq2g1.js";
import ExamResult from "./exam-result-Bf5b3wxT.js";
import "react";
import "clsx";
import "tailwind-merge";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-avatar";
import "@radix-ui/react-progress";
import "@radix-ui/react-separator";
import "@radix-ui/react-tabs";
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
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./profile-toggle-D0g01Tbw.js";
import "nanoid";
import "./tab-lists-BfyVckOO.js";
import "./table-header-C_F4x8YG.js";
import "./table-tRsx9RfJ.js";
import "@tanstack/react-table";
import "./exam-attempt-columns-xajfKlmg.js";
import "./route-DlE7FdTW.js";
import "./dynamic-marksheet-ZCMuXUx1.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "jspdf";
import "./alert-BK2pCJOe.js";
import "./question-status-icon-ClIa4D5f.js";
import "./question-type-badge-BPZv8bmY.js";
import "richtor";
/* empty css                 */
const ExamCard7 = ({ exam, attempts, bestAttempt, className }) => {
  var _a, _b, _c, _d, _e, _f;
  const totalAttempts = (attempts == null ? void 0 : attempts.length) || 0;
  (attempts == null ? void 0 : attempts.filter((a) => a.status === "completed").length) || 0;
  const progress = exam.max_attempts > 0 ? totalAttempts / exam.max_attempts * 100 : 0;
  const progressPercentage = Math.min(progress, 100);
  const bestScore = bestAttempt && Number(bestAttempt.total_marks) > 0 ? Math.round(Number(bestAttempt.obtained_marks) / Number(bestAttempt.total_marks) * 100 * 100) / 100 : 0;
  return /* @__PURE__ */ jsxs(Card, { className: cn("flex flex-col justify-between overflow-hidden !border md:flex-row", className), children: [
    /* @__PURE__ */ jsx(CardHeader, { className: "h-full w-full p-0 md:min-h-full md:max-w-[340px]", children: /* @__PURE__ */ jsx(
      "img",
      {
        src: exam.thumbnail || "/assets/images/blank-image.jpg",
        alt: exam.title,
        className: "h-full w-full object-cover md:min-h-[220px]",
        onError: (e) => {
          const target = e.target;
          target.src = "/assets/images/blank-image.jpg";
        }
      }
    ) }),
    /* @__PURE__ */ jsxs(CardContent, { className: "flex w-full flex-col justify-between p-4", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("div", { className: "mb-3 flex items-center gap-2", children: /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          /* @__PURE__ */ jsxs(Avatar, { className: "h-8 w-8", children: [
            /* @__PURE__ */ jsx(AvatarImage, { src: ((_b = (_a = exam.instructor) == null ? void 0 : _a.user) == null ? void 0 : _b.photo) || "", alt: (_d = (_c = exam.instructor) == null ? void 0 : _c.user) == null ? void 0 : _d.name, className: "object-cover" }),
            /* @__PURE__ */ jsx(AvatarFallback, { children: "IM" })
          ] }),
          /* @__PURE__ */ jsx("p", { className: "text-sm font-medium", children: ((_f = (_e = exam.instructor) == null ? void 0 : _e.user) == null ? void 0 : _f.name) || "Instructor" })
        ] }) }),
        /* @__PURE__ */ jsx("p", { className: "hover:text-secondary-foreground text-sm font-semibold", children: exam.title })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
        /* @__PURE__ */ jsxs("div", { className: "w-full space-y-2 pt-4 pb-2", children: [
          /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-4 md:grid-cols-2", children: [
            /* @__PURE__ */ jsxs("div", { className: "w-full", children: [
              /* @__PURE__ */ jsxs("p", { className: "text-muted-foreground flex items-center justify-between text-sm font-medium", children: [
                /* @__PURE__ */ jsx("span", { children: "Attempts" }),
                /* @__PURE__ */ jsxs("span", { children: [
                  totalAttempts,
                  " / ",
                  exam.max_attempts
                ] })
              ] }),
              /* @__PURE__ */ jsx(Progress, { value: progressPercentage, className: "h-1.5" })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "w-full", children: [
              /* @__PURE__ */ jsxs("p", { className: "text-muted-foreground flex items-center justify-between text-sm font-medium", children: [
                /* @__PURE__ */ jsx("span", { children: "Best Score" }),
                /* @__PURE__ */ jsxs("span", { children: [
                  (bestAttempt == null ? void 0 : bestAttempt.obtained_marks) ?? 0,
                  " / ",
                  (bestAttempt == null ? void 0 : bestAttempt.total_marks) ?? 0,
                  " (",
                  bestScore,
                  "%)"
                ] })
              ] }),
              /* @__PURE__ */ jsx(Progress, { value: bestScore, className: "h-1.5" })
            ] })
          ] }),
          bestAttempt && /* @__PURE__ */ jsxs("div", { className: "mt-2 flex items-center gap-2", children: [
            bestAttempt.is_passed ? /* @__PURE__ */ jsx(Badge, { className: "bg-green-600", children: "Passed" }) : /* @__PURE__ */ jsx(Badge, { variant: "destructive", children: "Failed" }),
            /* @__PURE__ */ jsxs("span", { className: "text-muted-foreground text-xs", children: [
              "Pass Mark: ",
              exam.pass_mark,
              "%"
            ] })
          ] })
        ] }),
        totalAttempts < exam.max_attempts && /* @__PURE__ */ jsx(
          ButtonGradientPrimary,
          {
            asChild: true,
            shadow: false,
            containerClass: "w-full",
            className: "to-primary-light hover:to-primary-light h-9 w-full",
            children: /* @__PURE__ */ jsx(Link, { method: "post", href: route("exam-attempts.start", exam.id), data: { exam_id: exam.id }, children: "Start Exam" })
          }
        )
      ] })
    ] })
  ] });
};
const Exam = (props) => {
  const { tab, exam, attempt, attempts, bestAttempt } = props;
  const tabs = [
    // {
    //    value: 'modules',
    //    label: 'Modules',
    // },
    // {
    //    value: 'questions',
    //    label: 'Questions',
    // },
    {
      value: "attempts",
      label: "Attempts"
    },
    {
      value: "resources",
      label: "Resources"
    },
    {
      value: "certificate",
      label: "Certificate"
    }
  ];
  const renderContent = () => {
    switch (tab) {
      // case 'modules':
      //    return <ExamModules />;
      // case 'questions':
      //    return <ExamQuestions />;
      case "attempts":
        return attempt ? /* @__PURE__ */ jsx(ExamResult, {}) : /* @__PURE__ */ jsx(ExamAttempts, {});
      case "resources":
        return /* @__PURE__ */ jsx(ExamResources, {});
      case "certificate":
        return /* @__PURE__ */ jsx(ExamCertificate, {});
      default:
        return /* @__PURE__ */ jsx(Fragment, {});
    }
  };
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: exam.title }),
    /* @__PURE__ */ jsx(ExamCard7, { exam, attempts: attempts || [], bestAttempt }),
    /* @__PURE__ */ jsx(Card, { className: "mt-6", children: /* @__PURE__ */ jsxs(Tabs, { value: tab, className: "bg-card w-full overflow-hidden rounded-md", children: [
      /* @__PURE__ */ jsx("div", { className: "overflow-x-auto overflow-y-hidden", children: /* @__PURE__ */ jsx(TabsList, { className: "bg-transparent px-0 py-6", children: tabs.map(({ label, value }) => {
        return /* @__PURE__ */ jsx(
          TabsTrigger,
          {
            value,
            className: "border-primary data-[state=active]:!bg-muted data-[state=active]:before:bg-primary relative flex cursor-pointer items-center justify-start gap-3 rounded-none bg-transparent px-8 py-4 text-start !shadow-none before:absolute before:right-0 before:bottom-0 before:left-0 before:h-1 before:rounded-t-xl data-[state=active]:before:content-['.']",
            asChild: true,
            children: /* @__PURE__ */ jsx(
              Link,
              {
                href: route("student.exam.show", {
                  id: exam.id,
                  tab: value
                }),
                children: /* @__PURE__ */ jsx("span", { children: label })
              }
            )
          },
          value
        );
      }) }) }),
      /* @__PURE__ */ jsx(Separator, { className: "mt-[1px]" }),
      /* @__PURE__ */ jsx(TabsContent, { value: tab, className: "m-0 p-5", children: renderContent() })
    ] }) })
  ] });
};
Exam.layout = (page) => /* @__PURE__ */ jsx(Layout, { children: page, tab: "exams" });
export {
  Exam as default
};
