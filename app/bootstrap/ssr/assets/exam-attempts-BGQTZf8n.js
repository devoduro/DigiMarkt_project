import { jsx, jsxs } from "react/jsx-runtime";
import { T as TableHeader } from "./table-header-C_F4x8YG.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { C as Card, a as CardHeader, c as CardTitle, b as CardContent } from "./card-D8SB2yrw.js";
import { T as Table, a as TableBody, b as TableRow, c as TableCell } from "./table-tRsx9RfJ.js";
import ExamAttemptColumn from "./exam-attempt-columns-xajfKlmg.js";
import { usePage } from "@inertiajs/react";
import { useReactTable, getFilteredRowModel, getSortedRowModel, getCoreRowModel, flexRender } from "@tanstack/react-table";
import { Clock, Award } from "lucide-react";
import * as React from "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./button-jZyzwgdo.js";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./route-DlE7FdTW.js";
const ExamAttempts = () => {
  var _a;
  const { exam, attempts, bestAttempt } = usePage().props;
  const [sorting, setSorting] = React.useState([]);
  const table = useReactTable({
    data: attempts || [],
    columns: ExamAttemptColumn((exam == null ? void 0 : exam.id) ?? 0, bestAttempt == null ? void 0 : bestAttempt.id),
    onSortingChange: setSorting,
    getCoreRowModel: getCoreRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    state: { sorting }
  });
  if (!attempts || attempts.length === 0) {
    return /* @__PURE__ */ jsx("div", { className: "flex h-full items-center justify-center rounded-lg border border-dashed text-center", children: /* @__PURE__ */ jsxs("div", { className: "space-y-2 p-10", children: [
      /* @__PURE__ */ jsx(Clock, { className: "text-muted-foreground mx-auto h-10 w-10" }),
      /* @__PURE__ */ jsx("h2", { className: "text-xl font-semibold", children: "No attempts yet" }),
      /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Your exam attempts will appear here once you start the exam." })
    ] }) });
  }
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "grid gap-4 md:grid-cols-4", children: [
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Total Attempts" }),
        /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold", children: attempts.length })
      ] }) }),
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Completed" }),
        /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold text-green-600", children: attempts.filter((a) => a.status === "completed").length })
      ] }) }),
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "In Progress" }),
        /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold text-blue-600", children: attempts.filter((a) => a.status === "in_progress").length })
      ] }) }),
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Best Score" }),
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold text-purple-600", children: bestAttempt == null ? void 0 : bestAttempt.obtained_marks }),
          bestAttempt && /* @__PURE__ */ jsx(Award, { className: "h-5 w-5 text-amber-500" })
        ] })
      ] }) })
    ] }),
    /* @__PURE__ */ jsxs(Card, { children: [
      /* @__PURE__ */ jsxs(CardHeader, { className: "flex flex-col gap-3 md:flex-row md:items-center md:justify-between", children: [
        /* @__PURE__ */ jsx(CardTitle, { className: "text-xl font-semibold", children: "Exam Attempts" }),
        bestAttempt && /* @__PURE__ */ jsxs(Badge, { variant: "secondary", className: "flex items-center gap-1 bg-amber-100 text-amber-700", children: [
          /* @__PURE__ */ jsx(Award, { className: "h-4 w-4" }),
          "Best Score ",
          bestAttempt.obtained_marks
        ] })
      ] }),
      /* @__PURE__ */ jsx(CardContent, { className: "p-0", children: /* @__PURE__ */ jsxs(Table, { className: "border-border border-y", children: [
        /* @__PURE__ */ jsx(TableHeader, { table }),
        /* @__PURE__ */ jsx(TableBody, { children: ((_a = table.getRowModel().rows) == null ? void 0 : _a.length) ? table.getRowModel().rows.map((row) => /* @__PURE__ */ jsx(TableRow, { "data-state": row.getIsSelected() && "selected", children: row.getVisibleCells().map((cell) => /* @__PURE__ */ jsx(TableCell, { children: flexRender(cell.column.columnDef.cell, cell.getContext()) }, cell.id)) }, row.id)) : /* @__PURE__ */ jsx(TableRow, { children: /* @__PURE__ */ jsx(TableCell, { colSpan: table.getAllColumns().length, className: "h-24 text-center", children: "No exam attempts found." }) }) })
      ] }) })
    ] })
  ] });
};
export {
  ExamAttempts as default
};
