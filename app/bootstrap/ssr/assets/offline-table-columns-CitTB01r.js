import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { format } from "date-fns";
import { CheckCircle2, XCircle, Clock, Eye } from "lucide-react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
const TableColumn = (onVerifyClick) => {
  return [
    {
      accessorKey: "id",
      header: () => /* @__PURE__ */ jsx("div", { className: "pl-4", children: "ID" }),
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "pl-4 font-medium", children: [
        "#",
        row.original.id
      ] })
    },
    {
      accessorKey: "user.name",
      header: "Customer",
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("div", { className: "font-medium", children: row.original.user.name }),
        /* @__PURE__ */ jsx("div", { className: "text-muted-foreground text-xs", children: row.original.user.email })
      ] })
    },
    {
      accessorKey: "purchase.title",
      header: "Item",
      cell: ({ row }) => {
        var _a;
        return /* @__PURE__ */ jsx("div", { className: "max-w-[200px] truncate", children: ((_a = row.original.purchase) == null ? void 0 : _a.title) || "N/A" });
      }
    },
    {
      accessorKey: "amount",
      header: "Amount",
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "font-medium", children: [
        "$",
        Number(row.original.amount).toFixed(2)
      ] })
    },
    {
      accessorKey: "meta.payment_date",
      header: "Payment Date",
      cell: ({ row }) => {
        var _a;
        return /* @__PURE__ */ jsx("div", { className: "text-sm", children: ((_a = row.original.meta) == null ? void 0 : _a.payment_date) ? format(new Date(row.original.meta.payment_date), "MMM dd, yyyy") : "N/A" });
      }
    },
    {
      accessorKey: "meta.status",
      header: "Status",
      cell: ({ row }) => {
        var _a;
        const status = ((_a = row.original.meta) == null ? void 0 : _a.status) || "pending";
        return /* @__PURE__ */ jsxs(Badge, { variant: status === "verified" ? "default" : status === "rejected" ? "destructive" : "secondary", className: "gap-1", children: [
          status === "verified" ? /* @__PURE__ */ jsx(CheckCircle2, { className: "h-3 w-3" }) : status === "rejected" ? /* @__PURE__ */ jsx(XCircle, { className: "h-3 w-3" }) : /* @__PURE__ */ jsx(Clock, { className: "h-3 w-3" }),
          /* @__PURE__ */ jsx("span", { children: status })
        ] });
      }
    },
    {
      accessorKey: "created_at",
      header: "Submitted At",
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "text-sm", children: format(new Date(row.original.created_at), "MMM dd, yyyy HH:mm") })
    },
    {
      id: "actions",
      header: () => /* @__PURE__ */ jsx("div", { className: "pr-4 text-end", children: "Actions" }),
      cell: ({ row }) => {
        var _a;
        const status = ((_a = row.original.meta) == null ? void 0 : _a.status) || "pending";
        return /* @__PURE__ */ jsx("div", { className: "flex justify-end gap-2 pr-4", children: /* @__PURE__ */ jsxs(Button, { size: "sm", variant: "outline", onClick: () => onVerifyClick(row.original), className: "gap-1", children: [
          /* @__PURE__ */ jsx(Eye, { className: "h-3 w-3" }),
          status === "pending" ? "Verify" : "View"
        ] }) });
      }
    }
  ];
};
export {
  TableColumn as default
};
