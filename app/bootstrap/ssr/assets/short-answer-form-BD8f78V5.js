import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "@radix-ui/react-label";
import "class-variance-authority";
const ShortAnswerForm = ({ data, setData, errors }) => {
  var _a;
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Instructions" }),
      /* @__PURE__ */ jsxs("div", { className: "rounded-md bg-blue-50 p-3 text-sm text-blue-900", children: [
        /* @__PURE__ */ jsx("p", { className: "mb-1 font-medium", children: "About short answer questions:" }),
        /* @__PURE__ */ jsx("p", { children: "• Students will type their answer in a text box" }),
        /* @__PURE__ */ jsx("p", { children: "• These questions require manual grading by the instructor" }),
        /* @__PURE__ */ jsx("p", { children: "• You can optionally provide a sample answer or grading rubric below" })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Guidelines (Optional)" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          placeholder: "Enter a sample answer or guidelines for grading this question...",
          rows: 5,
          value: ((_a = data.options) == null ? void 0 : _a.sample_answer) || "",
          onChange: (e) => setData("options", {
            ...data.options,
            sample_answer: e.target.value
          })
        }
      ),
      /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-500", children: "This will help you or other graders evaluate student responses consistently" }),
      /* @__PURE__ */ jsx(InputError, { message: errors.options })
    ] })
  ] });
};
export {
  ShortAnswerForm as default
};
