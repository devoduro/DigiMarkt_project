import { jsx, jsxs } from "react/jsx-runtime";
import { C as Card, b as CardContent, a as CardHeader, c as CardTitle } from "./card-D8SB2yrw.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { TrendingUp, TrendingDown, ArrowLeft, Edit, Users, Award, DollarSign, Eye, BookOpen, Calendar } from "lucide-react";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { S as Separator } from "./separator-R7EO2G8T.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { Head, Link } from "@inertiajs/react";
import { format, parseISO } from "date-fns";
import "react";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-separator";
import "./sidebar-6wqj6oXO.js";
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
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./app-logo-42nmPdEQ.js";
import "./accordion-DVAMjldm.js";
import "@radix-ui/react-accordion";
import "./route-DlE7FdTW.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "./use-lang-44ndmTOc.js";
const ExamStatsCard = ({ icon: Icon, label, value, trend, className }) => {
  return /* @__PURE__ */ jsx(Card, { className: cn(className), children: /* @__PURE__ */ jsx(CardContent, { className: "p-6", children: /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-3", children: [
      /* @__PURE__ */ jsx("div", { className: "bg-primary/10 flex h-12 w-12 items-center justify-center rounded-lg", children: /* @__PURE__ */ jsx(Icon, { className: "text-primary h-6 w-6" }) }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("p", { className: "text-sm font-medium text-gray-600", children: label }),
        /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold text-gray-900", children: value })
      ] })
    ] }),
    trend && /* @__PURE__ */ jsxs(
      "div",
      {
        className: cn(
          "flex items-center gap-1 rounded-full px-2 py-1 text-xs font-medium",
          trend.isPositive ? "bg-green-100 text-green-700" : "bg-red-100 text-red-700"
        ),
        children: [
          trend.isPositive ? /* @__PURE__ */ jsx(TrendingUp, { className: "h-3 w-3" }) : /* @__PURE__ */ jsx(TrendingDown, { className: "h-3 w-3" }),
          Math.abs(trend.value),
          "%"
        ]
      }
    )
  ] }) }) });
};
const ShowExam = ({ exam, stats }) => {
  const recentEnrollments = exam.enrollments.slice(0, 5);
  const recentAttempts = exam.attempts.slice(0, 5);
  return /* @__PURE__ */ jsxs(DashboardLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: exam.title }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-4", children: [
          /* @__PURE__ */ jsx(Link, { href: route("exams.index"), children: /* @__PURE__ */ jsxs(Button, { variant: "outline", size: "sm", children: [
            /* @__PURE__ */ jsx(ArrowLeft, { className: "mr-2 h-4 w-4" }),
            "Back"
          ] }) }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("h1", { className: "text-3xl font-bold text-gray-900", children: exam.title }),
            /* @__PURE__ */ jsx("p", { className: "mt-1 text-gray-600", children: exam.exam_category.title })
          ] })
        ] }),
        /* @__PURE__ */ jsx("div", { className: "flex gap-2", children: /* @__PURE__ */ jsx(Link, { href: route("exams.edit", exam.id), children: /* @__PURE__ */ jsxs(Button, { size: "sm", children: [
          /* @__PURE__ */ jsx(Edit, { className: "mr-2 h-4 w-4" }),
          "Edit"
        ] }) }) })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4", children: [
        /* @__PURE__ */ jsx(ExamStatsCard, { icon: Users, label: "Total Enrollments", value: stats.total_enrollments.toString() }),
        /* @__PURE__ */ jsx(ExamStatsCard, { icon: TrendingUp, label: "Active Students", value: stats.active_enrollments.toString() }),
        /* @__PURE__ */ jsx(ExamStatsCard, { icon: Award, label: "Pass Rate", value: `${stats.pass_rate.toFixed(1)}%` }),
        /* @__PURE__ */ jsx(ExamStatsCard, { icon: DollarSign, label: "Revenue", value: `$${stats.total_revenue.toFixed(2)}` })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-6 lg:grid-cols-3", children: [
        /* @__PURE__ */ jsxs("div", { className: "space-y-6 lg:col-span-2", children: [
          /* @__PURE__ */ jsxs(Card, { children: [
            /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { children: "Exam Details" }) }),
            /* @__PURE__ */ jsx(CardContent, { className: "space-y-4", children: /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-2 gap-4", children: [
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Status" }),
                /* @__PURE__ */ jsx(Badge, { variant: exam.status === "published" ? "default" : exam.status === "draft" ? "secondary" : "outline", children: exam.status })
              ] }),
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Pricing" }),
                /* @__PURE__ */ jsx("p", { className: "font-semibold", children: exam.pricing_type === "free" ? "Free" : `$${exam.discount_price || exam.price}` })
              ] }),
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Total Questions" }),
                /* @__PURE__ */ jsx("p", { className: "font-semibold", children: exam.total_questions })
              ] }),
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Total Marks" }),
                /* @__PURE__ */ jsx("p", { className: "font-semibold", children: exam.total_marks })
              ] }),
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Duration" }),
                /* @__PURE__ */ jsxs("p", { className: "font-semibold", children: [
                  exam.duration_hours > 0 && `${exam.duration_hours}h `,
                  exam.duration_minutes > 0 && `${exam.duration_minutes}m`
                ] })
              ] }),
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Pass Mark" }),
                /* @__PURE__ */ jsx("p", { className: "font-semibold", children: exam.pass_mark })
              ] }),
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Max Attempts" }),
                /* @__PURE__ */ jsx("p", { className: "font-semibold", children: exam.max_attempts })
              ] }),
              /* @__PURE__ */ jsxs("div", { children: [
                /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Level" }),
                /* @__PURE__ */ jsx("p", { className: "font-semibold", children: exam.level || "Not set" })
              ] })
            ] }) })
          ] }),
          /* @__PURE__ */ jsxs(Card, { children: [
            /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { children: "Performance Analytics" }) }),
            /* @__PURE__ */ jsx(CardContent, { children: /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
              /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
                /* @__PURE__ */ jsx("span", { className: "text-sm text-gray-600", children: "Total Attempts" }),
                /* @__PURE__ */ jsx("span", { className: "font-semibold", children: stats.total_attempts })
              ] }),
              /* @__PURE__ */ jsx(Separator, {}),
              /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
                /* @__PURE__ */ jsx("span", { className: "text-sm text-gray-600", children: "Completed Attempts" }),
                /* @__PURE__ */ jsx("span", { className: "font-semibold", children: stats.completed_attempts })
              ] }),
              /* @__PURE__ */ jsx(Separator, {}),
              /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
                /* @__PURE__ */ jsx("span", { className: "text-sm text-gray-600", children: "Average Score" }),
                /* @__PURE__ */ jsxs("span", { className: "font-semibold", children: [
                  stats.average_score.toFixed(1),
                  "%"
                ] })
              ] }),
              /* @__PURE__ */ jsx(Separator, {}),
              /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
                /* @__PURE__ */ jsx("span", { className: "text-sm text-gray-600", children: "Pass Rate" }),
                /* @__PURE__ */ jsxs(Badge, { variant: stats.pass_rate >= 70 ? "default" : "destructive", children: [
                  stats.pass_rate.toFixed(1),
                  "%"
                ] })
              ] })
            ] }) })
          ] }),
          /* @__PURE__ */ jsxs(Card, { children: [
            /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { children: "Recent Attempts" }) }),
            /* @__PURE__ */ jsx(CardContent, { children: recentAttempts.length > 0 ? /* @__PURE__ */ jsx("div", { className: "space-y-3", children: recentAttempts.map((attempt) => {
              var _a;
              return /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between rounded-lg border p-3", children: [
                /* @__PURE__ */ jsxs("div", { children: [
                  /* @__PURE__ */ jsx("p", { className: "font-semibold", children: (_a = attempt.user) == null ? void 0 : _a.name }),
                  /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: format(parseISO(attempt.start_time), "MMM dd, yyyy HH:mm") })
                ] }),
                /* @__PURE__ */ jsxs("div", { className: "text-right", children: [
                  /* @__PURE__ */ jsx(
                    Badge,
                    {
                      variant: attempt.status === "completed" ? "default" : attempt.status === "abandoned" ? "destructive" : "secondary",
                      children: attempt.status
                    }
                  ),
                  /* @__PURE__ */ jsxs("p", { className: "mt-1 text-sm font-semibold", children: [
                    attempt.obtained_marks,
                    "/",
                    attempt.total_marks
                  ] })
                ] })
              ] }, attempt.id);
            }) }) : /* @__PURE__ */ jsx("p", { className: "text-center text-sm text-gray-600", children: "No attempts yet" }) })
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
          /* @__PURE__ */ jsxs(Card, { children: [
            /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { className: "text-base", children: "Quick Actions" }) }),
            /* @__PURE__ */ jsxs(CardContent, { className: "space-y-2", children: [
              /* @__PURE__ */ jsx(Link, { href: route("student.exams.show", exam.slug), target: "_blank", children: /* @__PURE__ */ jsxs(Button, { variant: "outline", className: "w-full justify-start", children: [
                /* @__PURE__ */ jsx(Eye, { className: "mr-2 h-4 w-4" }),
                "View as Student"
              ] }) }),
              /* @__PURE__ */ jsx(Link, { href: route("exams.questions.index", exam.id), children: /* @__PURE__ */ jsxs(Button, { variant: "outline", className: "w-full justify-start", children: [
                /* @__PURE__ */ jsx(BookOpen, { className: "mr-2 h-4 w-4" }),
                "Manage Questions"
              ] }) })
            ] })
          ] }),
          /* @__PURE__ */ jsxs(Card, { children: [
            /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { className: "text-base", children: "Recent Enrollments" }) }),
            /* @__PURE__ */ jsx(CardContent, { children: recentEnrollments.length > 0 ? /* @__PURE__ */ jsx("div", { className: "space-y-3", children: recentEnrollments.map((enrollment) => {
              var _a;
              return /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-3", children: [
                /* @__PURE__ */ jsx(Calendar, { className: "h-4 w-4 text-gray-400" }),
                /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
                  /* @__PURE__ */ jsx("p", { className: "text-sm font-semibold", children: (_a = enrollment.user) == null ? void 0 : _a.name }),
                  /* @__PURE__ */ jsx("p", { className: "text-xs text-gray-600", children: format(parseISO(enrollment.entry_date), "MMM dd, yyyy") })
                ] })
              ] }, enrollment.id);
            }) }) : /* @__PURE__ */ jsx("p", { className: "text-center text-sm text-gray-600", children: "No enrollments yet" }) })
          ] }),
          exam.reviews.length > 0 && /* @__PURE__ */ jsxs(Card, { children: [
            /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { className: "text-base", children: "Reviews" }) }),
            /* @__PURE__ */ jsx(CardContent, { children: /* @__PURE__ */ jsxs("div", { className: "text-center", children: [
              /* @__PURE__ */ jsx("p", { className: "text-3xl font-bold", children: (exam.reviews.reduce((sum, r) => sum + r.rating, 0) / exam.reviews.length).toFixed(1) }),
              /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
                exam.reviews.length,
                " reviews"
              ] })
            ] }) })
          ] })
        ] })
      ] })
    ] })
  ] });
};
export {
  ShowExam as default
};
