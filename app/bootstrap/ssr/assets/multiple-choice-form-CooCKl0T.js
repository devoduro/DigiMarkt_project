import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Checkbox } from "./checkbox-CO4DegBm.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { Plus, Trash2 } from "lucide-react";
import * as React from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-checkbox";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
const MultipleChoiceForm = ({ data, setData, errors, isMultipleSelect }) => {
  const options = data.question_options || [];
  const addOption = () => {
    const newOptions = [
      ...options,
      {
        option_text: "",
        is_correct: false,
        sort: options.length
      }
    ];
    setData("question_options", newOptions);
  };
  const removeOption = (index) => {
    const newOptions = options.filter((_, i) => i !== index);
    setData("question_options", newOptions);
  };
  const updateOption = (index, field, value) => {
    const newOptions = [...options];
    newOptions[index] = { ...newOptions[index], [field]: value };
    setData("question_options", newOptions);
  };
  const updateCorrectAnswer = (index, checked) => {
    const newOptions = [...options];
    if (isMultipleSelect) {
      newOptions[index].is_correct = checked;
    } else {
      newOptions.forEach((opt, i) => {
        newOptions[i].is_correct = i === index ? checked : false;
      });
    }
    setData("question_options", newOptions);
  };
  const [initialized, setInitialized] = React.useState(false);
  React.useEffect(() => {
    if (!initialized && options.length === 0) {
      setData("question_options", [
        { option_text: "", is_correct: false, sort: 0 },
        { option_text: "", is_correct: false, sort: 1 },
        { option_text: "", is_correct: false, sort: 2 },
        { option_text: "", is_correct: false, sort: 3 }
      ]);
      setInitialized(true);
    }
  }, [initialized, options.length]);
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsx(Label, { children: "Answer Options *" }),
      /* @__PURE__ */ jsxs(Button, { type: "button", variant: "outline", size: "sm", onClick: addOption, children: [
        /* @__PURE__ */ jsx(Plus, { className: "h-4 w-4" }),
        "Add Option"
      ] })
    ] }),
    /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: isMultipleSelect ? "Check all correct answers (students can select multiple options)" : "Select the correct answer (students can select only one)" }),
    /* @__PURE__ */ jsx("div", { className: "space-y-3", children: options.map((option, index) => /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-3", children: [
      isMultipleSelect ? /* @__PURE__ */ jsx(
        Checkbox,
        {
          checked: option.is_correct,
          onCheckedChange: (checked) => updateCorrectAnswer(index, checked === true),
          className: "mt-3"
        }
      ) : /* @__PURE__ */ jsx(
        RadioGroup,
        {
          value: options.findIndex((opt) => opt.is_correct).toString(),
          onValueChange: (val) => updateCorrectAnswer(parseInt(val), true),
          children: /* @__PURE__ */ jsx(RadioGroupItem, { value: index.toString(), className: "mt-3" })
        }
      ),
      /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
        /* @__PURE__ */ jsx(
          Input,
          {
            placeholder: `Option ${index + 1}`,
            value: option.option_text,
            onChange: (e) => updateOption(index, "option_text", e.target.value),
            className: option.is_correct ? "border-green-500 bg-green-50" : ""
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors[`question_options.${index}.option_text`] })
      ] }),
      options.length > 2 && /* @__PURE__ */ jsx(Button, { type: "button", variant: "ghost", size: "sm", onClick: () => removeOption(index), className: "mt-2 text-red-600", children: /* @__PURE__ */ jsx(Trash2, { className: "h-4 w-4" }) })
    ] }, index)) }),
    options.length > 0 && !options.some((opt) => opt.is_correct) && /* @__PURE__ */ jsx("p", { className: "text-sm text-amber-600", children: "⚠️ Please mark at least one option as correct" }),
    /* @__PURE__ */ jsx(InputError, { message: errors.question_options })
  ] });
};
export {
  MultipleChoiceForm as default
};
