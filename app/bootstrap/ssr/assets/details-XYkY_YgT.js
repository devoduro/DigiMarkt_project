import { jsxs, jsx } from "react/jsx-runtime";
import { S as Separator } from "./separator-R7EO2G8T.js";
import { usePage } from "@inertiajs/react";
import { Clock, BookOpen, Target, Award, Users, Calendar, Check } from "lucide-react";
import "react";
import "@radix-ui/react-separator";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const Details = () => {
  var _a, _b;
  const { exam, translate } = usePage().props;
  const { frontend } = translate;
  return /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
    /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-2 gap-6", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-3", children: [
        /* @__PURE__ */ jsx(Clock, { className: "mt-1 h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("p", { className: "font-semibold", children: "Duration" }),
          /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
            exam.duration_hours > 0 && `${exam.duration_hours}h `,
            exam.duration_minutes > 0 && `${exam.duration_minutes}m`
          ] })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-3", children: [
        /* @__PURE__ */ jsx(BookOpen, { className: "mt-1 h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("p", { className: "font-semibold", children: "Questions" }),
          /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
            exam.total_questions,
            " questions"
          ] })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-3", children: [
        /* @__PURE__ */ jsx(Target, { className: "mt-1 h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("p", { className: "font-semibold", children: "Pass Mark" }),
          /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
            exam.pass_mark,
            " marks"
          ] })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-3", children: [
        /* @__PURE__ */ jsx(Award, { className: "mt-1 h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("p", { className: "font-semibold", children: "Max Attempts" }),
          /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
            exam.max_attempts,
            " attempts"
          ] })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-3", children: [
        /* @__PURE__ */ jsx(Users, { className: "mt-1 h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("p", { className: "font-semibold", children: "Enrolled Students" }),
          /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: exam.enrollments_count ?? 0 })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-3", children: [
        /* @__PURE__ */ jsx(Calendar, { className: "mt-1 h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("p", { className: "font-semibold", children: "Access" }),
          /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: exam.expiry_type === "lifetime" ? "Lifetime" : `${exam.expiry_duration} days` })
        ] })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-6 md:grid-cols-2", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("h6", { className: "mb-4 text-xl font-semibold", children: frontend.requirements }),
        /* @__PURE__ */ jsx(Separator, { className: "my-4" }),
        /* @__PURE__ */ jsx("div", { className: "space-y-4", children: (_a = exam.requirements) == null ? void 0 : _a.map(({ id, requirement }) => /* @__PURE__ */ jsxs("div", { className: "flex gap-3", children: [
          /* @__PURE__ */ jsx("div", { className: "bg-secondary-light mt-0.5 flex h-5 w-full max-w-5 items-center justify-center rounded-full", children: /* @__PURE__ */ jsx(Check, { className: "text-secondary-foreground h-4 w-4 shrink-0" }) }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground", children: requirement })
        ] }, id)) })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("h6", { className: "mb-4 text-xl font-semibold", children: frontend.outcomes }),
        /* @__PURE__ */ jsx(Separator, { className: "my-4" }),
        /* @__PURE__ */ jsx("div", { className: "space-y-4", children: (_b = exam.outcomes) == null ? void 0 : _b.map(({ id, outcome }) => /* @__PURE__ */ jsxs("div", { className: "flex gap-3", children: [
          /* @__PURE__ */ jsx("div", { className: "bg-secondary-light mt-0.5 flex h-5 w-full max-w-5 items-center justify-center rounded-full", children: /* @__PURE__ */ jsx(Check, { className: "text-secondary-foreground h-4 w-4 shrink-0" }) }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground", children: outcome })
        ] }, id)) })
      ] })
    ] })
  ] });
};
export {
  Details as default
};
