import { jsxs, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { usePage } from "@inertiajs/react";
import { Plus, Pencil, Eye, Download } from "lucide-react";
import { useState } from "react";
import ResourceForm from "./resource-form-DW267VF7.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "./chunked-uploader-input-MwXGR7K4.js";
import "./input-C6-Ta46A.js";
import "axios";
import "sonner";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./file-metadata-CvVo69cP.js";
import "./inertia-BtwbgBI3.js";
const Resources = () => {
  const [editId, setEditId] = useState("");
  const { exam } = usePage().props;
  const handleDownload = async (resource, e) => {
    e.preventDefault();
    try {
      const url = route("exam-resources.download", resource.id);
      window.open(url, "_blank");
    } catch (error) {
      window.open(resource.resource, "_blank");
    }
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4 py-3", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("h3", { className: "text-lg font-semibold", children: "Exam Resources" }),
        /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Exam Resources List" })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "flex items-center gap-2", children: /* @__PURE__ */ jsx(
        ResourceForm,
        {
          title: "Add new exam resource",
          handler: /* @__PURE__ */ jsxs(Button, { children: [
            /* @__PURE__ */ jsx(Plus, { className: "h-4 w-4" }),
            "Add Resource"
          ] })
        }
      ) })
    ] }),
    /* @__PURE__ */ jsx(Card, { className: "space-y-4 p-5 shadow-none", children: exam.resources.length > 0 ? exam.resources.map((resource) => /* @__PURE__ */ jsx("div", { className: "border-border rounded-md border p-2", children: /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between gap-2", children: [
      /* @__PURE__ */ jsx("div", { className: "w-full px-1", children: resource.type === "link" ? /* @__PURE__ */ jsx("a", { target: "_blank", href: resource.resource, className: "cursor-pointer text-sm hover:underline", children: resource.title.slice(0, 50) + (resource.title.length > 50 ? "..." : "") }) : /* @__PURE__ */ jsx("span", { className: "cursor-pointer text-sm hover:underline", onClick: (e) => handleDownload(resource, e), children: resource.title.slice(0, 50) + (resource.title.length > 50 ? "..." : "") }) }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-end space-x-2", children: [
        /* @__PURE__ */ jsx(
          ResourceForm,
          {
            title: "Update new exam resource",
            resource,
            handler: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "secondary", className: "h-7 w-7", children: /* @__PURE__ */ jsx(Pencil, { className: "h-3 w-3" }) })
          }
        ),
        resource.type !== "link" ? /* @__PURE__ */ jsx(Button, { asChild: true, size: "icon", variant: "secondary", className: "h-7 w-7", children: /* @__PURE__ */ jsx("a", { target: "_blank", href: resource.resource, children: /* @__PURE__ */ jsx(Eye, { className: "h-3 w-3" }) }) }) : /* @__PURE__ */ jsx(Button, { size: "icon", variant: "secondary", className: "h-7 w-7", onClick: (e) => handleDownload(resource, e), children: /* @__PURE__ */ jsx(Download, { className: "h-3 w-3" }) })
      ] })
    ] }, resource.id) })) : /* @__PURE__ */ jsx("div", { className: "rounded-md p-1.5", children: /* @__PURE__ */ jsx("div", { className: "w-full px-1 py-6 text-center", children: /* @__PURE__ */ jsx("p", { className: "text-sm", children: "No resources available" }) }) }) })
  ] });
};
export {
  Resources as default
};
