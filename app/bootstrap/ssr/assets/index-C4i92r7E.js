import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { D as DeleteModal } from "./delete-modal-BIvxKwRf.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, b as CardContent } from "./card-D8SB2yrw.js";
import { S as Separator } from "./separator-R7EO2G8T.js";
import { u as useAuth } from "./use-auth-8FvJer_G.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { Head } from "@inertiajs/react";
import { Plus, Pencil, Trash2 } from "lucide-react";
import { DynamicIcon } from "lucide-react/dynamic";
import CategoryForm from "./category-form-BpUVE3CH.js";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-separator";
import "./sidebar-6wqj6oXO.js";
import "./sheet-CuVwNO0O.js";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "./main-BqrosZ6t.js";
import "next-themes";
import "sonner";
import "./appearance-Df_e7R4w.js";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./language-BbuOCfpR.js";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./app-logo-42nmPdEQ.js";
import "./accordion-DVAMjldm.js";
import "@radix-ui/react-accordion";
import "./route-DlE7FdTW.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "./use-lang-44ndmTOc.js";
import "./icon-picker-dialog-Dd2jM1Vs.js";
import "./icon-picker-_EIJQgy3.js";
import "./debounce-ZFxqVthq.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./input-C6-Ta46A.js";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./textarea-DctRxpgE.js";
import "./inertia-BtwbgBI3.js";
const CategoriesIndex = ({ categories }) => {
  const { isAdmin } = useAuth();
  const defaultCategory = categories.find((category) => category.slug === "default");
  const otherCategories = categories.filter((category) => category.slug !== "default");
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Exam Categories" }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx("h1", { className: "text-3xl font-bold text-gray-900", children: "Exam Categories" }),
          /* @__PURE__ */ jsx("p", { className: "mt-1 text-sm text-gray-600", children: "Manage exam categories and organize your exams" })
        ] }),
        /* @__PURE__ */ jsx(
          CategoryForm,
          {
            title: "Create Category",
            handler: /* @__PURE__ */ jsxs(Button, { children: [
              /* @__PURE__ */ jsx(Plus, { className: "mr-2 h-4 w-4" }),
              "Add Category"
            ] })
          }
        )
      ] }),
      categories.length > 0 ? /* @__PURE__ */ jsxs("div", { className: "mt-6 grid grid-cols-1 gap-6 border-t border-gray-300 py-6 md:grid-cols-2 lg:grid-cols-3", children: [
        defaultCategory && /* @__PURE__ */ jsxs(Card, { className: "p-6", children: [
          /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
            /* @__PURE__ */ jsx(DynamicIcon, { size: 20, name: defaultCategory.icon }),
            /* @__PURE__ */ jsx("h2", { children: defaultCategory.title })
          ] }),
          /* @__PURE__ */ jsx(Separator, { className: "my-4" }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: "When a category is deleted, its exams are moved to the default category. The default category cannot be edited or removed." })
        ] }, defaultCategory.id),
        otherCategories.map((category) => /* @__PURE__ */ jsxs(Card, { className: "p-6", children: [
          /* @__PURE__ */ jsxs("div", { className: "relative text-center", children: [
            /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
              /* @__PURE__ */ jsx(DynamicIcon, { size: 20, name: category.icon }),
              /* @__PURE__ */ jsx("h2", { children: category.title })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "absolute -top-1 right-0 space-x-1", children: [
              /* @__PURE__ */ jsx(
                CategoryForm,
                {
                  title: "Edit Category",
                  category,
                  handler: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "ghost", className: "bg-muted hover:bg-muted-foreground/10 h-8 w-8 rounded-full p-0", children: /* @__PURE__ */ jsx(Pencil, { className: "text-sm" }) })
                }
              ),
              isAdmin && /* @__PURE__ */ jsx(
                DeleteModal,
                {
                  message: "Are you sure you want to delete this category?",
                  routePath: route("exam-categories.destroy", category.id),
                  actionComponent: /* @__PURE__ */ jsx(
                    Button,
                    {
                      size: "icon",
                      variant: "ghost",
                      className: "bg-destructive/8 hover:bg-destructive/6 h-8 w-8 rounded-full p-0",
                      children: /* @__PURE__ */ jsx(Trash2, { className: "text-destructive text-sm" })
                    }
                  )
                }
              )
            ] })
          ] }),
          /* @__PURE__ */ jsx(Separator, { className: "my-4" }),
          /* @__PURE__ */ jsxs(CardContent, { className: "p-0", children: [
            /* @__PURE__ */ jsx("p", { className: "mb-3 text-sm text-gray-600", children: category.description || "No description" }),
            /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
              /* @__PURE__ */ jsx(Badge, { variant: category.status ? "default" : "secondary", children: category.status ? "Active" : "Inactive" }),
              /* @__PURE__ */ jsxs("span", { className: "text-sm text-gray-500", children: [
                category.exams_count || 0,
                " exams"
              ] })
            ] })
          ] })
        ] }, category.id))
      ] }) : /* @__PURE__ */ jsx("div", { className: "col-span-full", children: /* @__PURE__ */ jsx(Card, { children: /* @__PURE__ */ jsxs(CardContent, { className: "flex flex-col items-center justify-center py-12", children: [
        /* @__PURE__ */ jsx("p", { className: "mb-4 text-gray-600", children: "No categories found. Create your first category!" }),
        /* @__PURE__ */ jsx(
          CategoryForm,
          {
            title: "Create Category",
            handler: /* @__PURE__ */ jsxs(Button, { children: [
              /* @__PURE__ */ jsx(Plus, { className: "mr-2 h-4 w-4" }),
              "Add Category"
            ] })
          }
        )
      ] }) }) })
    ] })
  ] });
};
CategoriesIndex.layout = (page) => /* @__PURE__ */ jsx(DashboardLayout, { children: page });
export {
  CategoriesIndex as default
};
