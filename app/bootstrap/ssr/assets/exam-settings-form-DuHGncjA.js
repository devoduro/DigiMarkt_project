import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { S as Slider } from "./slider-BogRbGTU.js";
import { o as onHandleChange } from "./inertia-BtwbgBI3.js";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "@radix-ui/react-label";
import "class-variance-authority";
import "@radix-ui/react-select";
import "lucide-react";
import "@radix-ui/react-slider";
const ExamSettingsForm = ({ data, setData, errors }) => {
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-2 gap-4", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { htmlFor: "duration_hours", children: "Duration (Hours) *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            id: "duration_hours",
            name: "duration_hours",
            type: "number",
            value: data.duration_hours,
            onChange: (e) => onHandleChange(e, setData),
            min: "0",
            max: "24",
            required: true
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.duration_hours })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { htmlFor: "duration_minutes", children: "Duration (Minutes) *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            id: "duration_minutes",
            name: "duration_minutes",
            type: "number",
            value: data.duration_minutes,
            onChange: (e) => onHandleChange(e, setData),
            min: "0",
            max: "59",
            required: true
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.duration_minutes })
      ] })
    ] }),
    (data.duration_hours > 0 || data.duration_minutes > 0) && /* @__PURE__ */ jsx("div", { className: "rounded-lg bg-blue-50 p-3", children: /* @__PURE__ */ jsxs("p", { className: "text-sm text-blue-800", children: [
      "Total exam duration:",
      " ",
      /* @__PURE__ */ jsxs("span", { className: "font-semibold", children: [
        data.duration_hours > 0 && `${data.duration_hours} hour${data.duration_hours > 1 ? "s" : ""} `,
        data.duration_minutes > 0 && `${data.duration_minutes} minute${data.duration_minutes > 1 ? "s" : ""}`
      ] })
    ] }) }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "pass_mark", children: "Pass Mark *" }),
      /* @__PURE__ */ jsx(
        Input,
        {
          id: "pass_mark",
          name: "pass_mark",
          type: "number",
          value: data.pass_mark,
          onChange: (e) => onHandleChange(e, setData),
          placeholder: "0",
          step: "0.01",
          min: "0",
          required: true
        }
      ),
      /* @__PURE__ */ jsx("p", { className: "mt-1 text-sm text-gray-500", children: "Minimum marks required to pass the exam" }),
      /* @__PURE__ */ jsx(InputError, { message: errors.pass_mark })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "max_attempts", children: "Maximum Attempts Allowed *" }),
      /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
        /* @__PURE__ */ jsx(
          Slider,
          {
            value: [data.max_attempts || 1],
            onValueChange: (values) => setData("max_attempts", values[0]),
            min: 1,
            max: 10,
            step: 1,
            className: "py-4"
          }
        ),
        /* @__PURE__ */ jsxs("div", { className: "flex justify-between text-sm text-gray-600", children: [
          /* @__PURE__ */ jsx("span", { children: "1 attempt" }),
          /* @__PURE__ */ jsxs("span", { className: "font-semibold text-gray-900", children: [
            data.max_attempts || 1,
            " attempt(s)"
          ] }),
          /* @__PURE__ */ jsx("span", { children: "10 attempts" })
        ] })
      ] }),
      /* @__PURE__ */ jsx(InputError, { message: errors.max_attempts })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "status", children: "Exam Status *" }),
      /* @__PURE__ */ jsxs(Select, { name: "status", value: data.status, onValueChange: (value) => setData("status", value), children: [
        /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select status" }) }),
        /* @__PURE__ */ jsxs(SelectContent, { children: [
          /* @__PURE__ */ jsx(SelectItem, { value: "draft", children: "Draft" }),
          /* @__PURE__ */ jsx(SelectItem, { value: "published", children: "Published" }),
          /* @__PURE__ */ jsx(SelectItem, { value: "archived", children: "Archived" })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("p", { className: "mt-1 text-sm text-gray-500", children: [
        data.status === "draft" && "Only visible to you",
        data.status === "published" && "Visible to all students",
        data.status === "archived" && "Hidden from students"
      ] }),
      /* @__PURE__ */ jsx(InputError, { message: errors.status })
    ] })
  ] });
};
export {
  ExamSettingsForm as default
};
