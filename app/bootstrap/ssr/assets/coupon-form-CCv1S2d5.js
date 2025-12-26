import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { D as Dialog, a as DialogTrigger, b as DialogContent, c as DialogHeader, d as DialogTitle, e as DialogFooter, f as DialogClose } from "./dialog-DD5SXV81.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { S as Switch } from "./switch-CNsdrSya.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import { useForm } from "@inertiajs/react";
import { Shuffle } from "lucide-react";
import { useState, useEffect } from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-dialog";
import "@radix-ui/react-label";
import "@radix-ui/react-select";
import "@radix-ui/react-switch";
const CouponForm = ({ title, handler, coupon, exams }) => {
  var _a;
  const [open, setOpen] = useState(false);
  const formatDatetimeLocal = (datetime) => {
    if (!datetime) return "";
    return datetime.replace(" ", "T").substring(0, 16);
  };
  const { data, setData, post, put, reset, processing, errors } = useForm({
    exam_id: (coupon == null ? void 0 : coupon.exam_id) || "",
    code: (coupon == null ? void 0 : coupon.code) || "",
    discount_type: (coupon == null ? void 0 : coupon.discount_type) || "percentage",
    discount: (coupon == null ? void 0 : coupon.discount) || 0,
    valid_from: formatDatetimeLocal(coupon == null ? void 0 : coupon.valid_from),
    valid_to: formatDatetimeLocal(coupon == null ? void 0 : coupon.valid_to),
    is_active: (coupon == null ? void 0 : coupon.is_active) ?? true
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    if (coupon) {
      put(route("exam-coupons.update", coupon.id), {
        preserveScroll: true,
        onSuccess: () => {
          setOpen(false);
        }
      });
    } else {
      post(route("exam-coupons.store"), {
        preserveScroll: true,
        onSuccess: () => {
          reset();
          setOpen(false);
        }
      });
    }
  };
  const generateCode = () => {
    const code = Math.random().toString(36).substring(2, 10).toUpperCase();
    setData("code", code);
  };
  useEffect(() => {
    if (open && coupon) {
      setData({
        exam_id: coupon.exam_id || "",
        code: coupon.code || "",
        discount_type: coupon.discount_type || "percentage",
        discount: coupon.discount || 0,
        valid_from: formatDatetimeLocal(coupon.valid_from),
        valid_to: formatDatetimeLocal(coupon.valid_to),
        is_active: coupon.is_active ?? true
      });
    } else if (!open) {
      reset();
    }
  }, [open, coupon]);
  return /* @__PURE__ */ jsxs(Dialog, { open, onOpenChange: setOpen, children: [
    /* @__PURE__ */ jsx(DialogTrigger, { asChild: true, children: handler }),
    /* @__PURE__ */ jsxs(DialogContent, { className: "max-w-2xl", children: [
      /* @__PURE__ */ jsx(DialogHeader, { children: /* @__PURE__ */ jsx(DialogTitle, { children: title }) }),
      /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, children: [
        /* @__PURE__ */ jsx("div", { className: "space-y-4 py-4", children: /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-2 gap-4", children: [
          /* @__PURE__ */ jsxs("div", { className: "col-span-2", children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "code", children: "Coupon Code *" }),
            /* @__PURE__ */ jsxs("div", { className: "flex gap-2", children: [
              /* @__PURE__ */ jsx(
                Input,
                {
                  id: "code",
                  name: "code",
                  value: data.code,
                  onChange: (e) => setData("code", e.target.value.toUpperCase()),
                  placeholder: "SUMMER2024",
                  required: true
                }
              ),
              /* @__PURE__ */ jsx(Button, { type: "button", variant: "outline", onClick: generateCode, children: /* @__PURE__ */ jsx(Shuffle, { className: "h-4 w-4" }) })
            ] }),
            /* @__PURE__ */ jsx(InputError, { message: errors.code })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "discount_type", children: "Discount Type *" }),
            /* @__PURE__ */ jsxs(Select, { name: "discount_type", value: data.discount_type, onValueChange: (value) => setData("discount_type", value), children: [
              /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select type" }) }),
              /* @__PURE__ */ jsxs(SelectContent, { children: [
                /* @__PURE__ */ jsx(SelectItem, { value: "percentage", children: "Percentage (%)" }),
                /* @__PURE__ */ jsx(SelectItem, { value: "fixed", children: "Fixed Amount ($)" })
              ] })
            ] }),
            /* @__PURE__ */ jsx(InputError, { message: errors.discount_type })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "discount", children: "Discount Value *" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                id: "discount",
                name: "discount",
                type: "number",
                value: data.discount,
                onChange: (e) => onHandleChange(e, setData),
                min: "0",
                step: "0.01",
                required: true
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.discount })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "col-span-2", children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "exam_id", children: "Select Exam" }),
            /* @__PURE__ */ jsxs(
              Select,
              {
                name: "exam_id",
                value: (_a = data.exam_id) == null ? void 0 : _a.toString(),
                onValueChange: (value) => setData("exam_id", value ? parseInt(value) : ""),
                children: [
                  /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "All exams (global coupon)" }) }),
                  /* @__PURE__ */ jsx(SelectContent, { children: exams.map((exam) => /* @__PURE__ */ jsx(SelectItem, { value: exam.id.toString(), children: exam.title }, exam.id)) })
                ]
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.exam_id })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "valid_from", children: "Valid From" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                id: "valid_from",
                name: "valid_from",
                type: "datetime-local",
                value: data.valid_from,
                onChange: (e) => onHandleChange(e, setData)
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.valid_from })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "valid_to", children: "Valid To" }),
            /* @__PURE__ */ jsx(
              Input,
              {
                id: "valid_to",
                name: "valid_to",
                type: "datetime-local",
                value: data.valid_to,
                onChange: (e) => onHandleChange(e, setData)
              }
            ),
            /* @__PURE__ */ jsx(InputError, { message: errors.valid_to })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
            /* @__PURE__ */ jsx(Label, { htmlFor: "is_active", children: "Active" }),
            /* @__PURE__ */ jsx(Switch, { id: "is_active", checked: data.is_active, onCheckedChange: (checked) => setData("is_active", checked) })
          ] })
        ] }) }),
        /* @__PURE__ */ jsxs(DialogFooter, { className: "gap-2", children: [
          /* @__PURE__ */ jsx(DialogClose, { asChild: true, children: /* @__PURE__ */ jsx(Button, { type: "button", variant: "outline", children: "Cancel" }) }),
          /* @__PURE__ */ jsx(LoadingButton, { loading: processing, disabled: processing, children: coupon ? "Update" : "Create" })
        ] })
      ] })
    ] })
  ] });
};
export {
  CouponForm as default
};
