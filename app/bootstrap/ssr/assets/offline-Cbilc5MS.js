import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { S as Switch } from "./switch-CWwfKOpa.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { usePage, useForm } from "@inertiajs/react";
import { Editor } from "richtor";
/* empty css                 */
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./switch-CNsdrSya.js";
import "@radix-ui/react-switch";
import "@radix-ui/react-label";
const Offline = ({ payment }) => {
  const { props } = usePage();
  const { translate } = props;
  const { button, common } = translate;
  const { data, setData, post, errors, processing } = useForm({
    ...payment.fields,
    type: "offline"
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("settings.payment.update", { id: payment.id }));
  };
  return /* @__PURE__ */ jsxs(Card, { className: "p-4 sm:p-6", children: [
    /* @__PURE__ */ jsxs("div", { className: "mb-6 flex items-center justify-between", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("h2", { className: "text-xl font-semibold", children: "Offline Payment Settings" }),
        /* @__PURE__ */ jsx("p", { className: "text-gray-500", children: "Configure manual payment options for your students" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
        /* @__PURE__ */ jsx(Label, { htmlFor: "status", children: data.active ? common.enabled : common.disabled }),
        /* @__PURE__ */ jsx(Switch, { id: "status", checked: data.active, onCheckedChange: (checked) => setData("active", checked) })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-6", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsxs(Label, { children: [
          "Payment Instructions ",
          /* @__PURE__ */ jsx("span", { className: "font-light", children: "(for student)" })
        ] }),
        /* @__PURE__ */ jsx(
          Editor,
          {
            output: "html",
            placeholder: {
              paragraph: "Enter instructions here...",
              imageCaption: "Enter image caption here..."
            },
            contentMinHeight: 260,
            contentMaxHeight: 600,
            initialContent: data.payment_instructions,
            onContentChange: (value) => setData("payment_instructions", value)
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.payment_instructions }),
        /* @__PURE__ */ jsx("p", { className: "mt-1 text-sm text-gray-500", children: "These instructions will be shown to students when they select offline payment" })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Payment Details" }),
        /* @__PURE__ */ jsx(
          Editor,
          {
            output: "html",
            placeholder: {
              paragraph: "Enter payment details here...",
              imageCaption: "Enter image caption here..."
            },
            contentMinHeight: 260,
            contentMaxHeight: 600,
            initialContent: data.payment_details,
            onContentChange: (value) => setData("payment_details", value)
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.payment_details }),
        /* @__PURE__ */ jsx("p", { className: "mt-1 text-sm text-gray-500", children: "These payment/bank details will be displayed to students for making offline payments" })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "rounded-lg border border-yellow-200 bg-yellow-50 p-4", children: /* @__PURE__ */ jsxs("div", { className: "flex", children: [
        /* @__PURE__ */ jsx("svg", { className: "mr-2 h-5 w-5 shrink-0 text-yellow-600", fill: "currentColor", viewBox: "0 0 20 20", children: /* @__PURE__ */ jsx(
          "path",
          {
            fillRule: "evenodd",
            d: "M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z",
            clipRule: "evenodd"
          }
        ) }),
        /* @__PURE__ */ jsxs("div", { className: "text-sm text-yellow-800", children: [
          /* @__PURE__ */ jsx("p", { className: "mb-1 font-medium", children: "Important Notice" }),
          /* @__PURE__ */ jsx("p", { children: "Offline payments require manual verification. You will need to approve each payment in the Payment History section before the student can access the course." })
        ] })
      ] }) }),
      /* @__PURE__ */ jsx(LoadingButton, { loading: processing, type: "submit", className: "w-full", children: button.save_changes })
    ] })
  ] });
};
export {
  Offline as default
};
