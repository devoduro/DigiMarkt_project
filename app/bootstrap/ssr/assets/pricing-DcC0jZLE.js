import { jsx, jsxs } from "react/jsx-runtime";
import { D as DateTimePicker } from "./datetime-picker-Bln2jqxu.js";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { A as Accordion, a as AccordionItem, c as AccordionContent } from "./accordion-DVAMjldm.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { C as Checkbox } from "./checkbox-CO4DegBm.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { usePage, useForm } from "@inertiajs/react";
import "./button-jZyzwgdo.js";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "react-day-picker";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./use-lang-44ndmTOc.js";
import "date-fns";
import "@radix-ui/react-accordion";
import "@radix-ui/react-checkbox";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
const Pricing = () => {
  const { props } = usePage();
  const { tab, exam } = props;
  const { data, setData, post, errors, processing } = useForm({
    tab,
    pricing_type: exam.pricing_type || "paid",
    price: exam.price || "",
    discount: Boolean(exam.discount) || false,
    discount_price: exam.discount_price || "",
    expiry_type: exam.expiry_type || "",
    expiry_duration: exam.expiry_duration ? new Date(exam.expiry_duration) : /* @__PURE__ */ new Date()
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("exams.update", { exam: exam.id }));
  };
  const pricingTypes = ["free", "paid"];
  return /* @__PURE__ */ jsx(Card, { className: "container p-4 sm:p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
    /* @__PURE__ */ jsxs(Accordion, { collapsible: true, type: "single", value: data.pricing_type, children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Pricing Type *" }),
        /* @__PURE__ */ jsx(
          RadioGroup,
          {
            defaultValue: data.pricing_type,
            className: "flex items-center space-x-4 pt-2 pb-1",
            onValueChange: (value) => setData("pricing_type", value),
            children: pricingTypes.map((type) => /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
              /* @__PURE__ */ jsx(RadioGroupItem, { className: "cursor-pointer", id: type, value: type }),
              /* @__PURE__ */ jsx(Label, { htmlFor: type, className: "cursor-pointer capitalize", children: type })
            ] }, type))
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.pricing_type })
      ] }),
      /* @__PURE__ */ jsx(AccordionItem, { value: "paid", className: "border-none", children: /* @__PURE__ */ jsxs(AccordionContent, { className: "space-y-4 p-0.5", children: [
        /* @__PURE__ */ jsxs("div", { className: "pt-3", children: [
          /* @__PURE__ */ jsx(Label, { children: "Price *" }),
          /* @__PURE__ */ jsx(
            Input,
            {
              type: "number",
              name: "price",
              value: data.price.toString(),
              onChange: (e) => setData("price", e.target.value),
              placeholder: "Enter your exam price ($0)"
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.price })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
          /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
            /* @__PURE__ */ jsx(
              Checkbox,
              {
                id: "discount",
                name: "discount",
                checked: data.discount,
                onCheckedChange: (checked) => {
                  setData("discount", checked === true);
                }
              }
            ),
            /* @__PURE__ */ jsx(Label, { htmlFor: "discount", className: "cursor-pointer", children: "Exam Discount" })
          ] }),
          data.discount && /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(
              Input,
              {
                type: "number",
                name: "discount_price",
                value: data.discount_price.toString(),
                onChange: (e) => setData("discount_price", e.target.value),
                placeholder: "Enter discount price"
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.discount_price })
          ] })
        ] })
      ] }) })
    ] }),
    /* @__PURE__ */ jsxs(Accordion, { collapsible: true, type: "single", value: data.expiry_type, children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Expiry period type" }),
        /* @__PURE__ */ jsx(
          RadioGroup,
          {
            defaultValue: data.expiry_type,
            className: "flex items-center space-x-4 pt-2 pb-1",
            onValueChange: (value) => setData("expiry_type", value),
            children: ["lifetime", "limited_time"].map((expiry) => /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
              /* @__PURE__ */ jsx(RadioGroupItem, { className: "cursor-pointer", id: expiry, value: expiry }),
              /* @__PURE__ */ jsx(Label, { htmlFor: expiry, className: "capitalize", children: expiry })
            ] }, expiry))
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.expiry_type })
      ] }),
      /* @__PURE__ */ jsx(AccordionItem, { value: "limited_time", className: "border-none", children: /* @__PURE__ */ jsx(AccordionContent, { className: "space-y-4 p-0.5", children: /* @__PURE__ */ jsxs("div", { className: "pt-3", children: [
        /* @__PURE__ */ jsx(Label, { children: "Expiry date" }),
        /* @__PURE__ */ jsx(DateTimePicker, { date: data.expiry_duration, setDate: (date) => setData("expiry_duration", date) }),
        /* @__PURE__ */ jsx(InputError, { message: errors.expiry_duration })
      ] }) }) })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "mt-8", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, children: "Save Changes" }) })
  ] }) });
};
export {
  Pricing as default
};
