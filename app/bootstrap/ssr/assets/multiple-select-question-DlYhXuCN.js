import { jsxs, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Checkbox } from "./checkbox-CO4DegBm.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-checkbox";
import "lucide-react";
import "@radix-ui/react-label";
const MultipleSelectQuestion = ({ question, answer, onAnswerChange }) => {
  var _a;
  const selectedOptions = (answer == null ? void 0 : answer.selected_option_ids) || [];
  const handleChange = (optionId, checked) => {
    const newSelectedOptions = checked ? [...selectedOptions, optionId] : selectedOptions.filter((id) => id !== optionId);
    onAnswerChange({
      selected_option_ids: newSelectedOptions
    });
  };
  const handleSelectAll = () => {
    var _a2;
    const allOptionIds = ((_a2 = question.question_options) == null ? void 0 : _a2.map((opt) => opt.id)) || [];
    onAnswerChange({
      selected_option_ids: allOptionIds
    });
  };
  const handleClearAll = () => {
    onAnswerChange({
      selected_option_ids: []
    });
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Select all correct answers:" }),
      /* @__PURE__ */ jsxs("div", { className: "flex gap-2", children: [
        /* @__PURE__ */ jsx(Button, { variant: "ghost", size: "sm", onClick: handleSelectAll, children: "Select All" }),
        /* @__PURE__ */ jsx(Button, { variant: "ghost", size: "sm", onClick: handleClearAll, disabled: selectedOptions.length === 0, children: "Clear All" })
      ] })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "space-y-3", children: (_a = question.question_options) == null ? void 0 : _a.map((option) => {
      const isChecked = selectedOptions.includes(option.id);
      return /* @__PURE__ */ jsxs(
        "div",
        {
          className: `flex items-start space-x-3 rounded-lg border-2 p-4 transition-colors ${isChecked ? "border-primary bg-primary/5" : "border-gray-200 hover:border-gray-300"}`,
          children: [
            /* @__PURE__ */ jsx(
              Checkbox,
              {
                id: `option-${option.id}`,
                checked: isChecked,
                onCheckedChange: (checked) => handleChange(option.id, checked),
                className: "mt-0.5"
              }
            ),
            /* @__PURE__ */ jsx(Label, { htmlFor: `option-${option.id}`, className: "flex-1 cursor-pointer font-normal", children: option.option_text })
          ]
        },
        option.id
      );
    }) }),
    selectedOptions.length > 0 && /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
      "Selected: ",
      /* @__PURE__ */ jsx("span", { className: "font-semibold", children: selectedOptions.length }),
      " option(s)"
    ] })
  ] });
};
export {
  MultipleSelectQuestion as default
};
