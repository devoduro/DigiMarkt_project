import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { C as Card, b as CardContent } from "./card-D8SB2yrw.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { Link, usePage } from "@inertiajs/react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "react";
import "clsx";
import "tailwind-merge";
const ExamCard2 = ({ enrollment, className }) => {
  var _a, _b;
  const { exam } = enrollment;
  const examUrl = route("student.exam.show", { id: exam.id, tab: "attempts" });
  return /* @__PURE__ */ jsxs(Card, { className: cn("group", className), children: [
    /* @__PURE__ */ jsx(Link, { href: examUrl, children: /* @__PURE__ */ jsxs("div", { className: cn("relative overflow-hidden", "aspect-video"), children: [
      exam.thumbnail ? /* @__PURE__ */ jsx("img", { src: exam.thumbnail, alt: exam.title, className: "h-full w-full object-cover transition-transform group-hover:scale-105" }) : /* @__PURE__ */ jsx("div", { className: "from-primary/20 to-primary/5 flex h-full items-center justify-center bg-gradient-to-br", children: /* @__PURE__ */ jsx("span", { className: "text-primary/30 text-4xl font-bold", children: exam.title.charAt(0) }) }),
      exam.level && /* @__PURE__ */ jsx(Badge, { className: "absolute top-2 left-2 capitalize", children: exam.level })
    ] }) }),
    /* @__PURE__ */ jsx("div", { className: cn("flex flex-col"), children: /* @__PURE__ */ jsxs(CardContent, { className: "p-4", children: [
      /* @__PURE__ */ jsx(Link, { href: examUrl, children: /* @__PURE__ */ jsx("h3", { className: "group-hover:text-primary mb-2 line-clamp-2 text-lg font-semibold transition-colors", children: exam.title }) }),
      exam.short_description && /* @__PURE__ */ jsx("p", { className: "text-muted-foreground mb-3 line-clamp-2 text-sm", children: exam.short_description }),
      /* @__PURE__ */ jsxs("div", { className: "text-muted-foreground mb-3 flex items-center gap-1 text-sm", children: [
        /* @__PURE__ */ jsx("span", { children: "by" }),
        /* @__PURE__ */ jsx("span", { className: "font-medium", children: ((_b = (_a = exam.instructor) == null ? void 0 : _a.user) == null ? void 0 : _b.name) || "Instructor" })
      ] })
    ] }) })
  ] });
};
const MyExams = () => {
  const { examEnrollments, translate } = usePage().props;
  const { frontend } = translate;
  return examEnrollments && examEnrollments.length > 0 ? /* @__PURE__ */ jsx("div", { className: "grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3", children: examEnrollments.map((enrollment) => /* @__PURE__ */ jsx(ExamCard2, { enrollment }, enrollment.id)) }) : /* @__PURE__ */ jsx(Card, { className: "flex items-center justify-center p-6", children: /* @__PURE__ */ jsx("p", { children: frontend.no_courses_found }) });
};
export {
  MyExams as default
};
