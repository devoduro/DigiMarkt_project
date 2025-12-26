import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { format, parseISO, isPast, isFuture } from "date-fns";
import { Copy, Pencil } from "lucide-react";
import CouponForm from "./coupon-form-fJshY3mY.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./switch-CNsdrSya.js";
import "@radix-ui/react-switch";
import "./inertia-BtwbgBI3.js";
import "@inertiajs/react";
const CouponTableColumns = ({ courses }) => {
  const getCouponStatus = (coupon) => {
    if (!coupon.is_active) return { label: "Inactive", variant: "secondary" };
    if (coupon.valid_to && isPast(parseISO(coupon.valid_to))) return { label: "Expired", variant: "destructive" };
    if (coupon.valid_from && isFuture(parseISO(coupon.valid_from))) return { label: "Scheduled", variant: "secondary" };
    if (coupon.usage_limit && coupon.used_count >= coupon.usage_limit) return { label: "Used Up", variant: "destructive" };
    return { label: "Active", variant: "default" };
  };
  const copyCouponCode = (code) => {
    navigator.clipboard.writeText(code);
    alert("Coupon code copied to clipboard!");
  };
  return [
    {
      accessorKey: "code",
      header: () => /* @__PURE__ */ jsx("p", { className: "pl-4", children: "Coupon Code" }),
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2 pl-4", children: [
        /* @__PURE__ */ jsx("code", { className: "rounded bg-gray-100 px-2 py-1 font-bold", children: row.original.code }),
        /* @__PURE__ */ jsx(Button, { variant: "ghost", size: "icon", className: "h-6 w-6", onClick: () => copyCouponCode(row.original.code), children: /* @__PURE__ */ jsx(Copy, { className: "h-3 w-3" }) })
      ] })
    },
    {
      accessorKey: "discount",
      header: "Discount",
      cell: ({ row }) => /* @__PURE__ */ jsx(Badge, { variant: "outline", children: row.original.discount_type === "percentage" ? `${row.original.discount}% OFF` : `$${row.original.discount} OFF` })
    },
    {
      accessorKey: "course",
      header: "Course",
      cell: ({ row }) => row.original.course ? /* @__PURE__ */ jsx("span", { className: "font-medium", children: row.original.course.title }) : /* @__PURE__ */ jsx("span", { className: "text-primary font-medium", children: "Global Coupon" })
    },
    {
      accessorKey: "usage",
      header: "Usage",
      cell: ({ row }) => {
        const limited = row.original.usage_type === "limited";
        return limited ? /* @__PURE__ */ jsxs("span", { children: [
          row.original.used_count,
          " / ",
          row.original.usage_limit
        ] }) : /* @__PURE__ */ jsx("span", { children: "Unlimited" });
      }
    },
    {
      accessorKey: "valid_from",
      header: "Valid From",
      cell: ({ row }) => row.original.valid_from ? format(parseISO(row.original.valid_from), "MMM dd, yyyy HH:mm") : "-"
    },
    {
      accessorKey: "valid_to",
      header: "Valid To",
      cell: ({ row }) => row.original.valid_to ? format(parseISO(row.original.valid_to), "MMM dd, yyyy HH:mm") : "-"
    },
    {
      accessorKey: "status",
      header: "Status",
      cell: ({ row }) => {
        const status = getCouponStatus(row.original);
        return /* @__PURE__ */ jsx(Badge, { variant: status.variant, children: status.label });
      }
    },
    {
      id: "actions",
      header: () => /* @__PURE__ */ jsx("p", { className: "pr-4 text-end", children: "Actions" }),
      cell: ({ row }) => {
        const coupon = row.original;
        return /* @__PURE__ */ jsx("div", { className: "flex items-center justify-end py-2 pr-4", children: /* @__PURE__ */ jsx(
          CouponForm,
          {
            title: "Edit Coupon",
            coupon,
            courses,
            handler: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "secondary", className: "h-8 w-8", children: /* @__PURE__ */ jsx(Pencil, {}) })
          }
        ) });
      }
    }
  ];
};
export {
  CouponTableColumns as default
};
