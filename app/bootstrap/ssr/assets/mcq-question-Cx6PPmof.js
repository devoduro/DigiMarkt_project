import { jsxs, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { X } from "lucide-react";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
const McqQuestion = ({ question, answer, onAnswerChange }) => {
  var _a;
  const selectedOption = (answer == null ? void 0 : answer.selected_option_id) || "";
  const handleChange = (value) => {
    onAnswerChange({
      selected_option_id: parseInt(value)
    });
  };
  const handleClear = () => {
    onAnswerChange(null);
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-start justify-between", children: [
      /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Select the correct answer:" }),
      selectedOption && /* @__PURE__ */ jsxs(Button, { variant: "ghost", size: "sm", onClick: handleClear, children: [
        /* @__PURE__ */ jsx(X, { className: "mr-2 h-4 w-4" }),
        "Clear Selection"
      ] })
    ] }),
    /* @__PURE__ */ jsx(RadioGroup, { value: selectedOption.toString(), onValueChange: handleChange, children: /* @__PURE__ */ jsx("div", { className: "space-y-3", children: (_a = question.question_options) == null ? void 0 : _a.map((option) => /* @__PURE__ */ jsxs(
      "div",
      {
        className: `flex items-start space-x-3 rounded-lg border-2 p-4 transition-colors ${selectedOption === option.id ? "border-primary bg-primary/5" : "border-gray-200 hover:border-gray-300"}`,
        children: [
          /* @__PURE__ */ jsx(RadioGroupItem, { value: option.id.toString(), id: `option-${option.id}`, className: "mt-0.5" }),
          /* @__PURE__ */ jsx(Label, { htmlFor: `option-${option.id}`, className: "flex-1 cursor-pointer font-normal", children: option.option_text })
        ]
      },
      option.id
    )) }) })
  ] });
};
export {
  McqQuestion as default
};
