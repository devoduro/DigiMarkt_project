import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as DropdownMenu, a as DropdownMenuTrigger, b as DropdownMenuContent, c as DropdownMenuItem } from "./dropdown-menu-BIfW6iuW.js";
import { g as getQueryParams } from "./route-DlE7FdTW.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { usePage, router, Link } from "@inertiajs/react";
import { Award, ChevronsUpDown } from "lucide-react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "react";
import "@radix-ui/react-dropdown-menu";
import "clsx";
import "tailwind-merge";
const ExamAttemptColumn = (examId, bestAttemptId) => {
  const page = usePage();
  const urlParams = getQueryParams(page.url);
  const statuses = ["all", "in_progress", "completed", "abandoned", "submitted"];
  return [
    {
      accessorKey: "attempt_number",
      header: ({ column }) => {
        return /* @__PURE__ */ jsx("div", { className: "flex items-center pl-4", children: /* @__PURE__ */ jsx("span", { children: "Attempt" }) });
      },
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "py-1 pl-4", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          /* @__PURE__ */ jsxs("p", { className: "font-medium", children: [
            "Attempt #",
            row.getValue("attempt_number")
          ] }),
          bestAttemptId === row.original.id && /* @__PURE__ */ jsxs(Badge, { variant: "outline", className: "border-amber-500 text-amber-600", children: [
            /* @__PURE__ */ jsx(Award, { className: "mr-1 h-3 w-3" }),
            "Best"
          ] })
        ] }),
        /* @__PURE__ */ jsxs("p", { className: "text-muted-foreground text-xs", children: [
          new Date(row.original.start_time).toLocaleDateString(),
          " • ",
          new Date(row.original.start_time).toLocaleTimeString()
        ] })
      ] })
    },
    {
      accessorKey: "obtained_marks",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Score" }),
      cell: ({ row }) => {
        const bestScore = row.original && Number(row.original.total_marks) > 0 ? Math.round(Number(row.original.obtained_marks) / Number(row.original.total_marks) * 100 * 100) / 100 : 0;
        return /* @__PURE__ */ jsxs("div", { className: "py-1 text-center", children: [
          /* @__PURE__ */ jsxs("p", { className: "font-semibold", children: [
            row.getValue("obtained_marks"),
            "/",
            row.original.total_marks
          ] }),
          /* @__PURE__ */ jsxs("p", { className: "text-muted-foreground text-xs", children: [
            bestScore,
            "%"
          ] })
        ] });
      }
    },
    {
      accessorKey: "status",
      header: ({ column }) => /* @__PURE__ */ jsx("div", { className: "flex justify-center", children: /* @__PURE__ */ jsxs(DropdownMenu, { children: [
        /* @__PURE__ */ jsx(DropdownMenuTrigger, { className: "flex items-center justify-center", children: /* @__PURE__ */ jsxs(Button, { variant: "ghost", className: "text-muted-foreground capitalize", children: [
          /* @__PURE__ */ jsx("span", { children: urlParams["status"] ?? "Status" }),
          /* @__PURE__ */ jsx(ChevronsUpDown, { className: "h-3 w-3 text-gray-700" })
        ] }) }),
        /* @__PURE__ */ jsx(DropdownMenuContent, { align: "center", className: "min-w-[120px]", children: statuses.map((status) => /* @__PURE__ */ jsx(
          DropdownMenuItem,
          {
            onClick: () => router.get(
              route("student.exam.show", {
                id: examId,
                tab: "attempts",
                status
              })
            ),
            className: cn("cursor-pointer text-center capitalize", urlParams["status"] === status && "bg-gray-100"),
            children: status.replace("_", " ")
          },
          status
        )) })
      ] }) }),
      cell: ({ row }) => {
        const status = row.getValue("status");
        const variant = status === "completed" ? "secondary" : status === "in_progress" ? "default" : "destructive";
        return /* @__PURE__ */ jsx("div", { className: "flex justify-center py-1", children: /* @__PURE__ */ jsx(Badge, { variant, className: "capitalize", children: status.replace("_", " ") }) });
      }
    },
    {
      accessorKey: "correct_answers",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Answers" }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: /* @__PURE__ */ jsxs("p", { className: "text-sm", children: [
        /* @__PURE__ */ jsx("span", { className: "text-green-600", children: row.getValue("correct_answers") }),
        " /",
        " ",
        /* @__PURE__ */ jsx("span", { className: "text-red-600", children: row.original.incorrect_answers })
      ] }) })
    },
    {
      accessorKey: "end_time",
      header: "Duration",
      cell: ({ row }) => {
        const startTime = row.original.start_time;
        const endTime = row.getValue("end_time");
        if (!endTime) {
          return /* @__PURE__ */ jsx("div", { className: "text-muted-foreground py-1 text-center", children: "—" });
        }
        const start = new Date(startTime);
        const end = new Date(endTime);
        const diffMinutes = Math.max(0, Math.round((end.getTime() - start.getTime()) / 6e4));
        return /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: /* @__PURE__ */ jsxs("p", { className: "text-sm", children: [
          diffMinutes,
          " min"
        ] }) });
      }
    },
    {
      id: "actions",
      header: () => /* @__PURE__ */ jsx("div", { className: "pr-4 text-end", children: "Actions" }),
      cell: ({ row }) => {
        const attempt = row.original;
        return /* @__PURE__ */ jsxs("div", { className: "flex justify-end gap-2 py-1 pr-4", children: [
          attempt.status === "completed" ? /* @__PURE__ */ jsx(Button, { asChild: true, variant: "secondary", className: "h-8", children: /* @__PURE__ */ jsx(Link, { href: route("student.exam.show", { id: examId, tab: "attempts", attempt: attempt.id }), children: "Result" }) }) : /* @__PURE__ */ jsx(Button, { disabled: true, variant: "secondary", className: "h-8", children: "Pending" }),
          attempt.status === "in_progress" || attempt.status === "abandoned" && /* @__PURE__ */ jsx(Button, { asChild: true, variant: "default", className: "h-8", children: /* @__PURE__ */ jsx(Link, { href: route("exam-attempts.take", attempt.id), children: "Continue" }) })
        ] });
      }
    }
  ];
};
export {
  ExamAttemptColumn as default
};
