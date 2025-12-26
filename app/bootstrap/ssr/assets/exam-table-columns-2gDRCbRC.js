import { jsxs, jsx } from "react/jsx-runtime";
import { D as DeleteModal } from "./delete-modal-BIvxKwRf.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as DropdownMenu, a as DropdownMenuTrigger, b as DropdownMenuContent, c as DropdownMenuItem } from "./dropdown-menu-BIfW6iuW.js";
import { g as getQueryParams } from "./route-DlE7FdTW.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { usePage, Link, router } from "@inertiajs/react";
import { ArrowUpDown, ChevronsUpDown, Eye, Pencil, Trash2 } from "lucide-react";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-dropdown-menu";
import "clsx";
import "tailwind-merge";
const ExamTableColumn = (isAdmin) => {
  const page = usePage();
  const urlParams = getQueryParams(page.url);
  const statuses = ["all", "draft", "published", "archived"];
  return [
    {
      accessorKey: "instructor",
      header: ({ column }) => {
        return /* @__PURE__ */ jsx("div", { className: "flex items-center pl-4", children: /* @__PURE__ */ jsxs(Button, { variant: "ghost", className: "p-0 hover:bg-transparent", onClick: () => column.toggleSorting(column.getIsSorted() === "asc"), children: [
          "Instructor",
          /* @__PURE__ */ jsx(ArrowUpDown, {})
        ] }) });
      },
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "pl-4", children: [
        /* @__PURE__ */ jsx("p", { className: "mb-0.5 text-base font-medium", children: row.original.instructor.user.name }),
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: row.original.instructor.user.email })
      ] })
    },
    {
      accessorKey: "title",
      header: "Exam Title",
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "py-1", children: [
        /* @__PURE__ */ jsx(Link, { href: route("exams.details", { slug: row.original.slug, id: row.original.id }), className: "font-medium hover:underline", children: row.getValue("title") }),
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: row.original.exam_category.title })
      ] })
    },
    {
      accessorKey: "status",
      header: ({ column }) => /* @__PURE__ */ jsx("div", { className: "flex justify-center", children: /* @__PURE__ */ jsxs(DropdownMenu, { children: [
        /* @__PURE__ */ jsx(DropdownMenuTrigger, { className: "flex items-center justify-center", children: /* @__PURE__ */ jsxs(Button, { variant: "ghost", className: "text-muted-foreground capitalize", children: [
          /* @__PURE__ */ jsx("span", { children: urlParams["status"] ?? "Status" }),
          /* @__PURE__ */ jsx(ChevronsUpDown, { className: "h-3 w-3 text-gray-700" })
        ] }) }),
        /* @__PURE__ */ jsx(DropdownMenuContent, { align: "center", className: "min-w-[72px]", children: statuses.map((status) => /* @__PURE__ */ jsx(
          DropdownMenuItem,
          {
            onClick: () => router.get(
              route("exams.index", {
                ...urlParams,
                status
              })
            ),
            className: cn("cursor-pointer text-center capitalize", urlParams["status"] === status && "bg-gray-100"),
            children: status
          },
          status
        )) })
      ] }) }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "flex justify-center py-1", children: /* @__PURE__ */ jsx(Badge, { variant: row.getValue("status") === "published" ? "default" : "secondary", className: "capitalize", children: row.getValue("status") }) })
    },
    {
      accessorKey: "level",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Level" }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: row.getValue("level") ? /* @__PURE__ */ jsx(Badge, { variant: "outline", className: "capitalize", children: row.getValue("level") }) : "--" })
    },
    {
      accessorKey: "total_questions",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Questions" }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: row.getValue("total_questions") })
    },
    {
      accessorKey: "total_marks",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Total Marks" }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: row.getValue("total_marks") })
    },
    {
      accessorKey: "enrollments_count",
      header: ({ column }) => /* @__PURE__ */ jsx("div", { className: "flex items-center justify-center", children: /* @__PURE__ */ jsxs(Button, { variant: "ghost", onClick: () => column.toggleSorting(column.getIsSorted() === "asc"), children: [
        "Enrollments",
        /* @__PURE__ */ jsx(ArrowUpDown, {})
      ] }) }),
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: row.getValue("enrollments_count") || 0 })
    },
    {
      accessorKey: "pricing_type",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-center", children: "Price" }),
      cell: ({ row }) => {
        const discountPrice = row.original.discount_price ? Number(row.original.discount_price) : null;
        const price = row.original.price ? Number(row.original.price) : 0;
        const displayPrice = discountPrice || price;
        return /* @__PURE__ */ jsx("div", { className: "py-1 text-center", children: row.original.pricing_type === "paid" ? /* @__PURE__ */ jsxs("span", { className: "font-semibold", children: [
          "$",
          displayPrice.toFixed(2)
        ] }) : /* @__PURE__ */ jsx(Badge, { variant: "outline", className: "bg-green-50 text-green-600", children: "Free" }) });
      }
    },
    {
      id: "actions",
      header: () => /* @__PURE__ */ jsx("div", { className: "pr-4 text-end", children: "Actions" }),
      cell: ({ row }) => {
        const exam = row.original;
        return /* @__PURE__ */ jsxs("div", { className: "flex justify-end gap-2 py-1 pr-4", children: [
          /* @__PURE__ */ jsx(
            Button,
            {
              size: "icon",
              variant: "ghost",
              className: "h-8 w-8",
              onClick: () => router.get(route("exams.details", { slug: exam.slug, id: exam.id })),
              children: /* @__PURE__ */ jsx(Eye, { className: "h-4 w-4" })
            }
          ),
          /* @__PURE__ */ jsx(Button, { size: "icon", variant: "secondary", className: "h-8 w-8", onClick: () => router.get(route("exams.edit", exam.id)), children: /* @__PURE__ */ jsx(Pencil, {}) }),
          isAdmin && /* @__PURE__ */ jsx(
            DeleteModal,
            {
              routePath: route("exams.destroy", exam.id),
              message: `Are you sure you want to delete "${exam.title}"? This action cannot be undone.`,
              actionComponent: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "ghost", className: "bg-destructive/8 hover:bg-destructive/6 h-8 w-8 p-0", children: /* @__PURE__ */ jsx(Trash2, { className: "text-destructive text-sm" }) })
            }
          )
        ] });
      }
    }
  ];
};
export {
  ExamTableColumn as default
};
