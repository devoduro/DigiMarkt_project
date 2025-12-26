import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import { D as DashboardLayout } from "./layout-DIhWWVaG.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { usePage, useForm, Head, Link } from "@inertiajs/react";
import { ChevronLeft } from "lucide-react";
import { Editor } from "richtor";
/* empty css                 */
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
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
const Update = ({ page }) => {
  const { props } = usePage();
  const { translate } = props;
  const { settings, input, common, button } = translate;
  const { data, setData, put, errors, processing } = useForm({
    name: page.name,
    slug: page.slug,
    title: page.title,
    description: page.description,
    meta_description: page.meta_description,
    meta_keywords: page.meta_keywords,
    active: page.active
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    put(route("settings.custom-page.update", page.id));
  };
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: settings.edit_custom_page }),
    /* @__PURE__ */ jsxs("div", { className: "container mx-auto space-y-10 px-4 py-6", children: [
      /* @__PURE__ */ jsxs("div", { className: "mb-6 flex items-center justify-between", children: [
        /* @__PURE__ */ jsx("h1", { className: "text-2xl font-bold text-gray-800", children: settings.edit_custom_page }),
        /* @__PURE__ */ jsx(Button, { asChild: true, children: /* @__PURE__ */ jsxs(Link, { href: route("settings.pages"), children: [
          /* @__PURE__ */ jsx(ChevronLeft, {}),
          " ",
          /* @__PURE__ */ jsx("span", { children: "Back" })
        ] }) })
      ] }),
      /* @__PURE__ */ jsx(Card, { className: "p-4 sm:p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: common.title }),
          /* @__PURE__ */ jsx(Input, { name: "title", value: data.title, onChange: (e) => onHandleChange(e, setData), placeholder: input.page_title_placeholder }),
          /* @__PURE__ */ jsx(InputError, { message: errors.title })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: common.description }),
          /* @__PURE__ */ jsx(
            Editor,
            {
              ssr: true,
              output: "html",
              placeholder: {
                paragraph: input.description,
                imageCaption: input.description_placeholder
              },
              contentMinHeight: 256,
              contentMaxHeight: 640,
              initialContent: data.description,
              onContentChange: (value) => setData((prev) => ({
                ...prev,
                description: value
              }))
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.description })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: input.meta_description }),
          /* @__PURE__ */ jsx(
            Textarea,
            {
              rows: 3,
              name: "meta_description",
              value: data.meta_description,
              onChange: (e) => onHandleChange(e, setData),
              placeholder: input.meta_description_placeholder
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.meta_description })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: input.meta_keywords }),
          /* @__PURE__ */ jsx(
            Input,
            {
              name: "meta_keywords",
              value: data.meta_keywords,
              onChange: (e) => onHandleChange(e, setData),
              placeholder: input.meta_keywords_placeholder
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.meta_keywords })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: common.active }),
          /* @__PURE__ */ jsxs(
            RadioGroup,
            {
              defaultValue: data.active ? "on" : "off",
              className: "flex items-center space-x-4 pt-2 pb-1",
              onValueChange: (value) => setData("active", value == "on" ? true : false),
              children: [
                /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
                  /* @__PURE__ */ jsx(RadioGroupItem, { className: "cursor-pointer", id: "off", value: "off" }),
                  /* @__PURE__ */ jsx(Label, { htmlFor: "off", children: common.off })
                ] }),
                /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
                  /* @__PURE__ */ jsx(RadioGroupItem, { className: "cursor-pointer", id: "on", value: "on" }),
                  /* @__PURE__ */ jsx(Label, { htmlFor: "on", children: common.on })
                ] })
              ]
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.active })
        ] }),
        /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx(Button, { type: "submit", disabled: processing, children: processing ? button.saving : button.save_changes }) })
      ] }) })
    ] })
  ] });
};
Update.layout = (page) => /* @__PURE__ */ jsx(DashboardLayout, { children: page });
export {
  Update as default
};
