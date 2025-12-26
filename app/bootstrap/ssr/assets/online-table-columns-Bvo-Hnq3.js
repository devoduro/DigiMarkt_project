import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { format } from "date-fns";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const TableColumn = () => {
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
      accessorKey: "payment_type",
      header: "Payment Method",
      cell: ({ row }) => /* @__PURE__ */ jsx(Badge, { variant: "outline", className: "capitalize", children: row.original.payment_type })
    },
    {
      accessorKey: "transaction_id",
      header: "Transaction ID",
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "font-mono text-xs", children: row.original.transaction_id })
    },
    {
      accessorKey: "created_at",
      header: () => /* @__PURE__ */ jsx("div", { className: "pr-4 text-end", children: "Date" }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "pr-4 text-end text-sm", children: format(new Date(row.original.created_at), "MMM dd, yyyy HH:mm") })
    }
  ];
};
export {
  TableColumn as default
};
