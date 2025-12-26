import { jsx, jsxs } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as Dialog, a as DialogTrigger, b as DialogContent, c as DialogHeader, d as DialogTitle } from "./dialog-DD5SXV81.js";
import { S as ScrollArea } from "./scroll-area-DPHRDnwL.js";
import DocumentViewer from "./document-viewer-Cu3KnL-a.js";
import { ArrowUpDown, Edit } from "lucide-react";
import ApplicationApproval from "./application-approval-Bb-0fUzq.js";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-dialog";
import "@radix-ui/react-scroll-area";
import "@inertiajs/react";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "richtor";
/* empty css                 */
const ApplicationsTableColumn = (translate) => {
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
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "capitalize", children: /* @__PURE__ */ jsx("p", { children: row.original.user.name }) })
    },
    {
      accessorKey: "resume",
      header: table.resume,
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "capitalize", children: /* @__PURE__ */ jsxs(Dialog, { children: [
        /* @__PURE__ */ jsx(DialogTrigger, { children: /* @__PURE__ */ jsx(Button, { children: table.view_resume }) }),
        /* @__PURE__ */ jsx(DialogContent, { className: "max-w-2xl p-0", children: /* @__PURE__ */ jsxs(ScrollArea, { className: "min-h-[90vh]", children: [
          /* @__PURE__ */ jsx(DialogHeader, { className: "p-6", children: /* @__PURE__ */ jsx(DialogTitle, { children: table.resume }) }),
          /* @__PURE__ */ jsx(DocumentViewer, { src: row.original.resume || "", className: "min-h-[80vh]" })
        ] }) })
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
      cell: ({ row }) => /* @__PURE__ */ jsx("div", { className: "flex items-center justify-end", children: /* @__PURE__ */ jsx(
        ApplicationApproval,
        {
          instructor: row.original,
          actionComponent: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "secondary", children: /* @__PURE__ */ jsx(Edit, {}) })
        }
      ) })
    }
  ];
};
export {
  ApplicationsTableColumn as default
};
