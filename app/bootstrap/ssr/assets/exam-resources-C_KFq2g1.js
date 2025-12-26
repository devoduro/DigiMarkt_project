import { jsx, jsxs } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { T as Table, d as TableHeader, b as TableRow, e as TableHead, a as TableBody, c as TableCell } from "./table-tRsx9RfJ.js";
import { usePage } from "@inertiajs/react";
import { format } from "date-fns";
import { ExternalLink, Download } from "lucide-react";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const ExamResources = () => {
  const { exam } = usePage().props;
  const formatDate = (dateString) => {
    const date = new Date(dateString);
    return format(date, "MMMM dd, yyyy, hh:mm a");
  };
  const handleDownload = async (resource, e) => {
    e.preventDefault();
    try {
      const url = route("exam-resources.download", resource.id);
      window.open(url, "_blank");
    } catch (error) {
      window.open(resource.resource, "_blank");
    }
  };
  return /* @__PURE__ */ jsx("div", { className: "space-y-8", children: exam.resources.length > 0 ? /* @__PURE__ */ jsxs(Card, { children: [
    /* @__PURE__ */ jsx("div", { className: "bg-muted rounded-t-lg px-4 py-3", children: /* @__PURE__ */ jsx("h3", { className: "text-lg font-semibold", children: "Exam Resources" }) }),
    /* @__PURE__ */ jsx("div", { className: "overflow-hidden border-t", children: /* @__PURE__ */ jsxs(Table, { children: [
      /* @__PURE__ */ jsx(TableHeader, { className: "bg-muted/50", children: /* @__PURE__ */ jsxs(TableRow, { children: [
        /* @__PURE__ */ jsx(TableHead, { className: "px-4 font-semibold", children: "Title" }),
        /* @__PURE__ */ jsx(TableHead, { className: "px-4 font-semibold", children: "Date & Time" }),
        /* @__PURE__ */ jsx(TableHead, { className: "px-4 text-right font-semibold", children: "Action" })
      ] }) }),
      /* @__PURE__ */ jsx(TableBody, { children: exam.resources.map((resource, index) => /* @__PURE__ */ jsxs(TableRow, { className: "hover:bg-muted/30", children: [
        /* @__PURE__ */ jsx(TableCell, { className: "px-4 py-3 font-medium", children: resource.title }),
        /* @__PURE__ */ jsx(TableCell, { className: "text-muted-foreground px-4 py-3", children: formatDate(resource.created_at) }),
        /* @__PURE__ */ jsx(TableCell, { className: "px-4 py-3 text-right", children: /* @__PURE__ */ jsx("div", { className: "flex items-center justify-end gap-2", children: resource.type === "link" ? /* @__PURE__ */ jsx(Button, { asChild: true, size: "sm", variant: "secondary", children: /* @__PURE__ */ jsxs("a", { target: "_blank", href: resource.resource, children: [
          /* @__PURE__ */ jsx(ExternalLink, { className: "h-3 w-3" }),
          "Check"
        ] }) }) : /* @__PURE__ */ jsxs(Button, { size: "sm", variant: "secondary", onClick: (e) => handleDownload(resource, e), children: [
          /* @__PURE__ */ jsx(Download, { className: "h-3 w-3" }),
          "Download"
        ] }) }) })
      ] }, resource.id)) })
    ] }) })
  ] }) : /* @__PURE__ */ jsx("div", { className: "py-12 text-center", children: /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-lg", children: "No resources available for this exam yet." }) }) });
};
export {
  ExamResources as default
};
