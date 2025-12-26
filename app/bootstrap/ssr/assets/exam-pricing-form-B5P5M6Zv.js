import { jsxs, jsx, Fragment } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { useEffect } from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-label";
import "class-variance-authority";
import "@radix-ui/react-radio-group";
import "lucide-react";
const ExamPricingForm = ({ data, setData, errors }) => {
  useEffect(() => {
    if (data.price && data.discount) {
      const discountAmount = data.price * data.discount / 100;
      const discountPrice = data.price - discountAmount;
      setData("discount_price", discountPrice.toFixed(2));
    } else {
      setData("discount_price", data.price || 0);
    }
  }, [data.price, data.discount]);
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Pricing Type *" }),
      /* @__PURE__ */ jsxs(
        RadioGroup,
        {
          value: data.pricing_type,
          onValueChange: (value) => setData("pricing_type", value),
          className: "flex items-center space-x-4 pt-2",
          children: [
            /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
              /* @__PURE__ */ jsx(RadioGroupItem, { value: "free", id: "free" }),
              /* @__PURE__ */ jsx(Label, { htmlFor: "free", className: "cursor-pointer font-normal", children: "Free" })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
              /* @__PURE__ */ jsx(RadioGroupItem, { value: "paid", id: "paid" }),
              /* @__PURE__ */ jsx(Label, { htmlFor: "paid", className: "cursor-pointer font-normal", children: "Paid" })
            ] })
          ]
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.pricing_type })
    ] }),
    data.pricing_type === "paid" && /* @__PURE__ */ jsxs(Fragment, { children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { htmlFor: "price", children: "Price (USD) *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            id: "price",
            name: "price",
            type: "number",
            value: data.price,
            onChange: (e) => onHandleChange(e, setData),
            placeholder: "0.00",
            step: "0.01",
            min: "0",
            required: true
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.price })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { htmlFor: "discount", children: "Discount (%)" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            id: "discount",
            name: "discount",
            type: "number",
            value: data.discount,
            onChange: (e) => onHandleChange(e, setData),
            placeholder: "0",
            min: "0",
            max: "100"
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.discount })
      ] }),
      data.discount > 0 && /* @__PURE__ */ jsx("div", { className: "rounded-lg bg-green-50 p-4", children: /* @__PURE__ */ jsxs("p", { className: "text-sm text-green-800", children: [
        /* @__PURE__ */ jsx("span", { className: "font-semibold", children: "Final Price:" }),
        " $",
        data.discount_price,
        " (",
        data.discount,
        "% off from $",
        data.price,
        ")"
      ] }) })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "border-t pt-4", children: [
      /* @__PURE__ */ jsx(Label, { children: "Access Duration *" }),
      /* @__PURE__ */ jsxs(
        RadioGroup,
        {
          value: data.expiry_type || "lifetime",
          onValueChange: (value) => setData("expiry_type", value),
          className: "space-y-3 pt-2",
          children: [
            /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
              /* @__PURE__ */ jsx(RadioGroupItem, { value: "lifetime", id: "lifetime" }),
              /* @__PURE__ */ jsx(Label, { htmlFor: "lifetime", className: "cursor-pointer font-normal", children: "Lifetime Access" })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
              /* @__PURE__ */ jsx(RadioGroupItem, { value: "limited", id: "limited" }),
              /* @__PURE__ */ jsx(Label, { htmlFor: "limited", className: "cursor-pointer font-normal", children: "Limited Access" })
            ] })
          ]
        }
      ),
      /* @__PURE__ */ jsx(InputError, { message: errors.expiry_type })
    ] }),
    data.expiry_type === "limited" && /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "expiry_duration", children: "Access Duration (Days) *" }),
      /* @__PURE__ */ jsx(
        Input,
        {
          id: "expiry_duration",
          name: "expiry_duration",
          type: "number",
          value: data.expiry_duration,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "30",
          min: "1",
          required: true
        }
      ),
      /* @__PURE__ */ jsx("p", { className: "mt-1 text-sm text-gray-500", children: "Students will have access for this many days after enrollment" }),
      /* @__PURE__ */ jsx(InputError, { message: errors.expiry_duration })
    ] })
  ] });
};
export {
  ExamPricingForm as default
};
