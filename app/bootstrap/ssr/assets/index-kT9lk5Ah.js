import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { A as Alert, b as AlertDescription } from "./alert-BK2pCJOe.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, b as CardContent, a as CardHeader, c as CardTitle } from "./card-D8SB2yrw.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { M as Main } from "./main-BqrosZ6t.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { usePage, useForm, Head } from "@inertiajs/react";
import { Info, CreditCard, CheckCircle2, XCircle } from "lucide-react";
import { Editor } from "richtor";
/* empty css                 */
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "class-variance-authority";
import "react";
import "@radix-ui/react-slot";
import "@radix-ui/react-label";
import "next-themes";
import "sonner";
const Index = () => {
  const { props } = usePage();
  const { user, item, amount, currency, payment_instructions, payment_details, errors } = props;
  const { data, setData, post, processing } = useForm({
    payment_info: "",
    payment_date: (/* @__PURE__ */ new Date()).toISOString().split("T")[0],
    attachment: null
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("payments.offline.submit"));
  };
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Offline Payment" }),
    /* @__PURE__ */ jsx("div", { className: "flex min-h-screen items-center justify-center bg-gray-50 py-8", children: /* @__PURE__ */ jsx("div", { className: "mx-auto w-full max-w-[900px] p-6", children: /* @__PURE__ */ jsxs(Card, { className: "overflow-hidden shadow-sm", children: [
      /* @__PURE__ */ jsxs("div", { className: "bg-blue-500 p-6 text-white", children: [
        /* @__PURE__ */ jsx("h1", { className: "mb-2 text-2xl font-bold", children: "Offline Payment Instructions" }),
        /* @__PURE__ */ jsx("p", { className: "text-blue-100", children: "Please complete the payment and submit your transaction details below" })
      ] }),
      /* @__PURE__ */ jsxs(CardContent, { className: "space-y-6 p-6", children: [
        /* @__PURE__ */ jsxs(Card, { className: "border bg-gray-50", children: [
          /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { className: "text-lg", children: "Order Summary" }) }),
          /* @__PURE__ */ jsxs(CardContent, { className: "space-y-3", children: [
            /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
              /* @__PURE__ */ jsx("span", { className: "text-gray-600", children: "Item:" }),
              /* @__PURE__ */ jsx("span", { className: "font-medium text-gray-900", children: item.title })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
              /* @__PURE__ */ jsx("span", { className: "text-gray-600", children: "Customer:" }),
              /* @__PURE__ */ jsx("span", { className: "font-medium text-gray-900", children: user.name })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between border-t pt-3", children: [
              /* @__PURE__ */ jsx("span", { className: "text-lg font-semibold text-gray-800", children: "Total Amount:" }),
              /* @__PURE__ */ jsxs("span", { className: "text-2xl font-bold text-blue-600", children: [
                currency,
                " ",
                Number(amount).toFixed(2)
              ] })
            ] })
          ] })
        ] }),
        payment_instructions && /* @__PURE__ */ jsxs(Alert, { className: "border-yellow-200 bg-yellow-50", children: [
          /* @__PURE__ */ jsx(Info, { className: "h-5 w-5 text-yellow-600" }),
          /* @__PURE__ */ jsxs(AlertDescription, { children: [
            /* @__PURE__ */ jsx("h2", { className: "mb-3 text-lg font-semibold text-gray-800", children: "Payment Instructions" }),
            /* @__PURE__ */ jsx("div", { className: "prose prose-sm max-w-none text-gray-700", dangerouslySetInnerHTML: { __html: payment_instructions } })
          ] })
        ] }),
        payment_details && /* @__PURE__ */ jsxs(Alert, { className: "border-blue-200 bg-blue-50", children: [
          /* @__PURE__ */ jsx(CreditCard, { className: "h-5 w-5 text-blue-600" }),
          /* @__PURE__ */ jsxs(AlertDescription, { children: [
            /* @__PURE__ */ jsx("h2", { className: "mb-4 text-lg font-semibold text-gray-800", children: "Payment Details" }),
            /* @__PURE__ */ jsx("div", { className: "prose prose-sm max-w-none text-gray-700", dangerouslySetInnerHTML: { __html: payment_details } })
          ] })
        ] }),
        /* @__PURE__ */ jsxs(Card, { children: [
          /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx(CardTitle, { className: "text-lg", children: "Submit Payment Details" }) }),
          /* @__PURE__ */ jsx(CardContent, { children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
            /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
              /* @__PURE__ */ jsxs(Label, { htmlFor: "payment_method", children: [
                "Payment Method Used ",
                /* @__PURE__ */ jsx("span", { className: "text-red-500", children: "*" })
              ] }),
              /* @__PURE__ */ jsx(
                Editor,
                {
                  output: "html",
                  placeholder: {
                    paragraph: "Enter payment details here...",
                    imageCaption: "Enter image caption here..."
                  },
                  contentMinHeight: 220,
                  contentMaxHeight: 600,
                  initialContent: data.payment_info,
                  onContentChange: (value) => setData("payment_info", value)
                }
              ),
              /* @__PURE__ */ jsx(InputError, { message: errors.payment_info })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
              /* @__PURE__ */ jsxs(Label, { children: [
                "Payment Date ",
                /* @__PURE__ */ jsx("span", { className: "text-red-500", children: "*" })
              ] }),
              /* @__PURE__ */ jsx(
                Input,
                {
                  required: true,
                  type: "date",
                  name: "payment_date",
                  max: (/* @__PURE__ */ new Date()).toISOString().split("T")[0],
                  value: data.payment_date,
                  onChange: (e) => onHandleChange(e, setData)
                }
              ),
              /* @__PURE__ */ jsx(InputError, { message: errors.payment_date })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
              /* @__PURE__ */ jsxs(Label, { children: [
                "Transaction Attachment ",
                /* @__PURE__ */ jsx("span", { className: "font-light", children: "(Optional)" })
              ] }),
              /* @__PURE__ */ jsx(
                Input,
                {
                  type: "file",
                  name: "attachment",
                  placeholder: "Enter transaction attachment",
                  onChange: (e) => onHandleChange(e, setData)
                }
              ),
              /* @__PURE__ */ jsx(InputError, { message: errors.attachment })
            ] }),
            /* @__PURE__ */ jsxs(Alert, { className: "border-blue-200 bg-blue-50", children: [
              /* @__PURE__ */ jsx(Info, { className: "h-4 w-4 text-blue-600" }),
              /* @__PURE__ */ jsxs(AlertDescription, { className: "text-sm text-blue-800", children: [
                /* @__PURE__ */ jsx("p", { className: "mb-1 font-medium", children: "Important Notice" }),
                /* @__PURE__ */ jsx("p", { children: "Your enrollment will be activated once our team verifies your payment. This usually takes 1-2 business days. You will receive an email notification once your payment is confirmed." })
              ] })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "flex gap-3 pt-4", children: [
              /* @__PURE__ */ jsxs(Button, { type: "submit", className: "flex flex-1 items-center justify-center gap-2", disabled: processing, children: [
                /* @__PURE__ */ jsx(CheckCircle2, { className: "h-5 w-5" }),
                processing ? "Submitting..." : "Submit Payment Details"
              ] }),
              /* @__PURE__ */ jsx(Button, { asChild: true, type: "button", variant: "secondary", disabled: processing, className: "gap-2", children: /* @__PURE__ */ jsxs("a", { href: route("payments.offline.cancel"), children: [
                /* @__PURE__ */ jsx(XCircle, { className: "h-4 w-4" }),
                "Cancel"
              ] }) })
            ] })
          ] }) })
        ] })
      ] })
    ] }) }) })
  ] });
};
Index.layout = (page) => /* @__PURE__ */ jsx(Main, { children: page });
export {
  Index as default
};
