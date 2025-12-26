import { jsxs, jsx } from "react/jsx-runtime";
import { D as DeleteModal } from "./delete-modal-BIvxKwRf.js";
import { A as Avatar, a as AvatarImage, b as AvatarFallback } from "./avatar-Cr_jqfHL.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { ArrowUpDown, Pencil, Trash2 } from "lucide-react";
import ApplicationApproval from "./application-approval-Bb-0fUzq.js";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@inertiajs/react";
import "react";
import "@radix-ui/react-avatar";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "richtor";
/* empty css                 */
const InstructorsTableColumn = (isAdmin, translate) => {
  const { table } = translate;
  return [
    {
      accessorKey: "name",
      header: ({ column }) => {
        return /* @__PURE__ */ jsx("div", { className: "flex items-center", children: /* @__PURE__ */ jsxs(Button, { variant: "ghost", className: "p-0 hover:bg-transparent", onClick: () => column.toggleSorting(column.getIsSorted() === "asc"), children: [
          table.name,
          /* @__PURE__ */ jsx(ArrowUpDown, {})
        ] }) });
      },
      cell: ({ row }) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsxs(Avatar, { className: "h-11 w-11", children: [
          /* @__PURE__ */ jsx(AvatarImage, { src: row.original.user.photo || "", className: "object-cover" }),
          /* @__PURE__ */ jsx(AvatarFallback, { children: "CN" })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("p", { className: "mb-0.5 text-base font-medium", children: row.original.user.name }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: row.original.user.email })
        ] })
      ] })
    },
    {
      accessorKey: "courses",
      header: table.number_of_course,
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "capitalize", children: /* @__PURE__ */ jsxs("p", { children: [
        row.original.courses_count,
        " ",
        table.courses_count
      ] }) })
    },
    {
      accessorKey: "status",
      header: table.status,
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "capitalize", children: /* @__PURE__ */ jsx("span", { children: row.original.status }) })
    },
    {
      id: "actions",
      header: () => /* @__PURE__ */ jsx("div", { className: "text-end", children: table.action }),
      cell: ({ row }) => {
        return /* @__PURE__ */ jsxs("div", { className: "flex justify-end gap-2 py-1", children: [
          /* @__PURE__ */ jsx(
            ApplicationApproval,
            {
              instructor: row.original,
              actionComponent: /* @__PURE__ */ jsxs(Button, { variant: "secondary", className: "h-8", children: [
                /* @__PURE__ */ jsx(Pencil, {}),
                table.status
              ] })
            }
          ),
          isAdmin && /* @__PURE__ */ jsx(
            DeleteModal,
            {
              routePath: route("instructors.destroy", row.original.id),
              message: table.delete_instructor_warning,
              actionComponent: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "ghost", className: "bg-destructive/8 hover:bg-destructive/6 h-8 w-8 p-0", children: /* @__PURE__ */ jsx(Trash2, { className: "text-destructive text-sm" }) })
            }
          )
        ] });
      }
    }
  ];
};
export {
  InstructorsTableColumn as default
};
