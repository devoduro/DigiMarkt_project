import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { T as TableFilter } from "./table-filter-Fsgky9hE.js";
import { T as TableFooter } from "./table-footer-Bf3DvTcP.js";
import { T as TableHeader } from "./table-header-C_F4x8YG.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { T as Table, a as TableBody, b as TableRow, c as TableCell } from "./table-tRsx9RfJ.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { Head } from "@inertiajs/react";
import { useReactTable, getFilteredRowModel, getSortedRowModel, getCoreRowModel, flexRender } from "@tanstack/react-table";
import { Plus } from "lucide-react";
import * as React from "react";
import CouponForm from "./coupon-form-CCv1S2d5.js";
import CouponTableColumns from "./coupon-table-columns-Dpo_lz50.js";
import "./use-lang-44ndmTOc.js";
import "./debounce-ZFxqVthq.js";
import "./route-DlE7FdTW.js";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./table-page-size-Xj85uK4t.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./sidebar-6wqj6oXO.js";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./sheet-CuVwNO0O.js";
import "@radix-ui/react-dialog";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "./main-BqrosZ6t.js";
import "next-themes";
import "sonner";
import "./appearance-Df_e7R4w.js";
import "./language-BbuOCfpR.js";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./app-logo-42nmPdEQ.js";
import "./accordion-DVAMjldm.js";
import "@radix-ui/react-accordion";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./dialog-DD5SXV81.js";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./switch-CNsdrSya.js";
import "@radix-ui/react-switch";
import "./inertia-BtwbgBI3.js";
import "./badge-B4crNM73.js";
const CouponsIndex = ({ coupons, exams }) => {
  var _a;
  const [sorting, setSorting] = React.useState([]);
  const table = useReactTable({
    data: coupons.data,
    columns: CouponTableColumns({ exams }),
    onSortingChange: setSorting,
    getCoreRowModel: getCoreRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    state: { sorting }
  });
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Exam Coupons" }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("h1", { className: "text-3xl font-bold text-gray-900", children: "Exam Coupons" }),
          /* @__PURE__ */ jsx("p", { className: "mt-1 text-sm text-gray-600", children: "Manage discount coupons for your exams" })
        ] }),
        /* @__PURE__ */ jsx(
          CouponForm,
          {
            title: "Create Coupon",
            exams,
            handler: /* @__PURE__ */ jsxs(Button, { children: [
              /* @__PURE__ */ jsx(Plus, { className: "mr-2 h-4 w-4" }),
              "Add Coupon"
            ] })
          }
        )
      ] }),
      /* @__PURE__ */ jsxs(Card, { children: [
        /* @__PURE__ */ jsx(TableFilter, { data: coupons, title: "Coupon List", globalSearch: true, tablePageSizes: [10, 15, 20, 25], routeName: "exam-coupons.index" }),
        /* @__PURE__ */ jsxs(Table, { className: "border-border border-y", children: [
          /* @__PURE__ */ jsx(TableHeader, { table }),
          /* @__PURE__ */ jsx(TableBody, { children: ((_a = table.getRowModel().rows) == null ? void 0 : _a.length) ? table.getRowModel().rows.map((row) => /* @__PURE__ */ jsx(TableRow, { "data-state": row.getIsSelected() && "selected", children: row.getVisibleCells().map((cell) => /* @__PURE__ */ jsx(TableCell, { children: flexRender(cell.column.columnDef.cell, cell.getContext()) }, cell.id)) }, row.id)) : /* @__PURE__ */ jsx(TableRow, { children: /* @__PURE__ */ jsx(TableCell, { colSpan: table.getAllColumns().length, className: "h-24 text-center", children: "No coupons found." }) }) })
        ] }),
        /* @__PURE__ */ jsx(TableFooter, { className: "p-5 sm:p-7", routeName: "exam-coupons.index", paginationInfo: coupons })
      ] })
    ] })
  ] });
};
CouponsIndex.layout = (page) => /* @__PURE__ */ jsx(DashboardLayout, { children: page });
export {
  CouponsIndex as default
};
