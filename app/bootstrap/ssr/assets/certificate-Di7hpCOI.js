import { jsxs, jsx } from "react/jsx-runtime";
import { D as DynamicCertificate, a as DynamicMarksheet } from "./dynamic-marksheet-ZCMuXUx1.js";
import { A as Alert, a as AlertTitle, b as AlertDescription } from "./alert-BK2pCJOe.js";
import { C as Card, b as CardContent } from "./card-D8SB2yrw.js";
import { c as Tabs, T as TabsList, a as TabsTrigger, b as TabsContent } from "./tabs-BOXC0x8t.js";
import { usePage } from "@inertiajs/react";
import { format, parseISO } from "date-fns";
import { Lock, Award, ClipboardList } from "lucide-react";
import "./button-jZyzwgdo.js";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "jspdf";
import "sonner";
import "@radix-ui/react-tabs";
const Certificate = () => {
  const { props } = usePage();
  const { course, watchHistory, completion, certificateTemplate, marksheetTemplate, studentMarks, auth } = props;
  const isCompleted = (watchHistory == null ? void 0 : watchHistory.completion_date) || (completion == null ? void 0 : completion.completion) === 100;
  if (!isCompleted) {
    return /* @__PURE__ */ jsxs(Alert, { children: [
      /* @__PURE__ */ jsx(Lock, { className: "h-4 w-4" }),
      /* @__PURE__ */ jsx(AlertTitle, { children: "Certificate & Marksheet Locked" }),
      /* @__PURE__ */ jsxs(AlertDescription, { children: [
        "Complete all course modules to unlock your certificate and marksheet. Your current progress: ",
        (completion == null ? void 0 : completion.completion) || 0,
        "%"
      ] })
    ] });
  }
  const completionDate = (watchHistory == null ? void 0 : watchHistory.completion_date) ? format(parseISO(watchHistory.completion_date), "MMMM d, yyyy") : format(/* @__PURE__ */ new Date(), "MMMM d, yyyy");
  if (!certificateTemplate && !marksheetTemplate) {
    return /* @__PURE__ */ jsx("div", { className: "p-6", children: /* @__PURE__ */ jsx(Card, { children: /* @__PURE__ */ jsxs(CardContent, { className: "flex flex-col items-center justify-center p-12 text-center", children: [
      /* @__PURE__ */ jsx(Award, { className: "text-muted-foreground mb-4 h-16 w-16" }),
      /* @__PURE__ */ jsx("h3", { className: "mb-2 text-xl font-semibold", children: "No Certificate or Marksheet Available" }),
      /* @__PURE__ */ jsx("p", { className: "text-muted-foreground", children: "The instructor hasn't set up certificates or marksheets for this course yet." })
    ] }) }) });
  }
  return /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsxs(Tabs, { defaultValue: "certificate", className: "w-full", children: [
    /* @__PURE__ */ jsxs(TabsList, { className: "mb-6 grid h-11 w-full grid-cols-2", children: [
      /* @__PURE__ */ jsxs(TabsTrigger, { value: "certificate", className: "flex h-9 cursor-pointer items-center gap-2", children: [
        /* @__PURE__ */ jsx(Award, { className: "h-4 w-4" }),
        "Certificate"
      ] }),
      /* @__PURE__ */ jsxs(TabsTrigger, { value: "marksheet", className: "flex h-9 cursor-pointer items-center gap-2", children: [
        /* @__PURE__ */ jsx(ClipboardList, { className: "h-4 w-4" }),
        "Marksheet"
      ] })
    ] }),
    /* @__PURE__ */ jsx(TabsContent, { value: "certificate", children: !certificateTemplate ? /* @__PURE__ */ jsx(Card, { children: /* @__PURE__ */ jsxs(CardContent, { className: "flex flex-col items-center justify-center p-12 text-center", children: [
      /* @__PURE__ */ jsx(Award, { className: "text-muted-foreground mb-4 h-16 w-16" }),
      /* @__PURE__ */ jsx("h3", { className: "mb-2 text-xl font-semibold", children: "No Certificate Available" }),
      /* @__PURE__ */ jsx("p", { className: "text-muted-foreground", children: "The instructor hasn't set up certificates for this course yet." })
    ] }) }) : /* @__PURE__ */ jsx(
      DynamicCertificate,
      {
        template: certificateTemplate,
        courseName: course.title,
        studentName: auth.user.name,
        completionDate
      }
    ) }),
    /* @__PURE__ */ jsx(TabsContent, { value: "marksheet", children: !marksheetTemplate || !studentMarks ? /* @__PURE__ */ jsx(Card, { children: /* @__PURE__ */ jsxs(CardContent, { className: "flex flex-col items-center justify-center p-12 text-center", children: [
      /* @__PURE__ */ jsx(ClipboardList, { className: "text-muted-foreground mb-4 h-16 w-16" }),
      /* @__PURE__ */ jsx("h3", { className: "mb-2 text-xl font-semibold", children: "No Marksheet Available" }),
      /* @__PURE__ */ jsx("p", { className: "text-muted-foreground", children: !marksheetTemplate ? "The instructor hasn't set up marksheets for this course yet." : "No marks data available. Complete assignments and quizzes to view your marksheet." })
    ] }) }) : /* @__PURE__ */ jsx(
      DynamicMarksheet,
      {
        template: marksheetTemplate,
        courseName: course.title,
        studentName: auth.user.name,
        completionDate,
        studentMarks
      }
    ) })
  ] }) });
};
export {
  Certificate as default
};
