import { jsxs, jsx } from "react/jsx-runtime";
import { T as TableFilter } from "./table-filter-Fsgky9hE.js";
import { T as TableFooter } from "./table-footer-Bf3DvTcP.js";
import { T as TableHeader } from "./table-header-C_F4x8YG.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { T as Table, a as TableBody, b as TableRow, c as TableCell } from "./table-tRsx9RfJ.js";
import { usePage } from "@inertiajs/react";
import { useReactTable, getFilteredRowModel, getSortedRowModel, getCoreRowModel, flexRender } from "@tanstack/react-table";
import * as React from "react";
import ExamAttemptReview from "./exam-attempt-review-rHnWYyo-.js";
import ExamAttemptTableColumn from "./exam-attempt-table-columns-CWFaMBb8.js";
import "./use-lang-44ndmTOc.js";
import "./debounce-ZFxqVthq.js";
import "./route-DlE7FdTW.js";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./table-page-size-Xj85uK4t.js";
import "./question-status-icon-ClIa4D5f.js";
import "./badge-B4crNM73.js";
import "./question-type-badge-BPZv8bmY.js";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "richtor";
/* empty css                 */
const Attempts = () => {
  var _a;
  const { attempts, exam, attempt } = usePage().props;
  const [sorting, setSorting] = React.useState([]);
  const table = useReactTable({
    data: attempts.data,
    columns: ExamAttemptTableColumn(),
    onSortingChange: setSorting,
    getCoreRowModel: getCoreRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    state: { sorting }
  });
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "grid gap-4 md:grid-cols-4", children: [
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Total Attempts" }),
        /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold", children: attempts.total })
      ] }) }),
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Completed" }),
        /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold text-green-600", children: attempts.data.filter((a) => a.status === "completed").length })
      ] }) }),
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "In Progress" }),
        /* @__PURE__ */ jsx("p", { className: "text-2xl font-bold text-blue-600", children: attempts.data.filter((a) => a.status === "in_progress").length })
      ] }) }),
      /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "space-y-1", children: [
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "Pass Rate" }),
        /* @__PURE__ */ jsxs("p", { className: "text-2xl font-bold text-purple-600", children: [
          attempts.data.length > 0 ? (attempts.data.filter((a) => a.is_passed && a.status === "completed").length / attempts.data.filter((a) => a.status === "completed").length * 100 || 0).toFixed(1) : 0,
          "%"
        ] })
      ] }) })
    ] }),
    attempt ? /* @__PURE__ */ jsx(ExamAttemptReview, { attempt }) : /* @__PURE__ */ jsxs(Card, { children: [
      /* @__PURE__ */ jsx(
        TableFilter,
        {
          data: attempts,
          title: "Exam Attempts",
          globalSearch: true,
          tablePageSizes: [10, 15, 20, 25],
          routeName: "exams.edit",
          routeParams: { exam: exam.id, tab: "attempts" }
        }
      ),
      /* @__PURE__ */ jsxs(Table, { className: "border-border border-y", children: [
        /* @__PURE__ */ jsx(TableHeader, { table }),
        /* @__PURE__ */ jsx(TableBody, { children: ((_a = table.getRowModel().rows) == null ? void 0 : _a.length) ? table.getRowModel().rows.map((row) => /* @__PURE__ */ jsx(TableRow, { "data-state": row.getIsSelected() && "selected", children: row.getVisibleCells().map((cell) => /* @__PURE__ */ jsx(TableCell, { children: flexRender(cell.column.columnDef.cell, cell.getContext()) }, cell.id)) }, row.id)) : /* @__PURE__ */ jsx(TableRow, { children: /* @__PURE__ */ jsx(TableCell, { colSpan: table.getAllColumns().length, className: "h-24 text-center", children: "No exam attempts found." }) }) })
      ] }),
      /* @__PURE__ */ jsx(
        TableFooter,
        {
          className: "p-5 sm:p-7",
          routeName: "exams.edit",
          paginationInfo: attempts,
          routeParams: { exam: exam.id, tab: "attempts" }
        }
      )
    ] })
  ] });
};
export {
  Attempts as default
};
