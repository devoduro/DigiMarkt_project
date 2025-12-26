import { jsxs, jsx } from "react/jsx-runtime";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { useState, useEffect } from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-label";
import "class-variance-authority";
const FillBlankQuestion = ({ question, answer, onAnswerChange }) => {
  var _a, _b;
  const blanks = (_a = question.options) == null ? void 0 : _a.blanks;
  const totalInputs = (blanks == null ? void 0 : blanks.length) ?? 1;
  const buildInitialValues = () => {
    if (Array.isArray(answer == null ? void 0 : answer.answers)) {
      const existing = answer == null ? void 0 : answer.answers;
      return Array.from({ length: totalInputs }, (_, index) => existing[index] || "");
    }
    if ((answer == null ? void 0 : answer.answers) && typeof answer.answers === "object") {
      const record = answer.answers;
      return Array.from({ length: totalInputs }, (_, index) => record[index] || "");
    }
    return Array.from({ length: totalInputs }, () => "");
  };
  const [values, setValues] = useState(buildInitialValues);
  useEffect(() => {
    setValues(buildInitialValues());
  }, [question.id]);
  const emitChange = (newValues) => {
    setValues(newValues);
    onAnswerChange({
      answers: newValues
    });
  };
  const handleChange = (index, value) => {
    const newValues = [...values];
    newValues[index] = value;
    emitChange(newValues);
  };
  const questionText = question.description || "";
  const parts = blanks ? questionText.split(/\[BLANK_(\d+)\]/g) : [questionText];
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Fill in the blanks with appropriate answers:" }),
    /* @__PURE__ */ jsx("div", { className: "rounded-lg bg-gray-50 p-6", children: /* @__PURE__ */ jsx("div", { className: "prose prose-sm max-w-none", children: blanks ? parts.map((part, index) => {
      if (index % 2 === 0) {
        return /* @__PURE__ */ jsx("span", { dangerouslySetInnerHTML: { __html: part } }, index);
      }
      const placeholderIndex = parseInt(part, 10);
      return /* @__PURE__ */ jsx("span", { className: "inline-block align-middle", children: /* @__PURE__ */ jsx(
        Input,
        {
          type: "text",
          value: values[placeholderIndex] || "",
          onChange: (e) => handleChange(placeholderIndex, e.target.value),
          placeholder: `Blank ${placeholderIndex + 1}`,
          className: "mx-2 inline-block w-48",
          autoComplete: "off"
        }
      ) }, index);
    }) : /* @__PURE__ */ jsx("span", { dangerouslySetInnerHTML: { __html: questionText } }) }) }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-2", children: [
      /* @__PURE__ */ jsx(Label, { className: "text-sm font-semibold", children: "Your Answers:" }),
      Array.from({ length: totalInputs }).map((_, index) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-3 rounded border p-2", children: [
        /* @__PURE__ */ jsxs("span", { className: "text-sm font-semibold text-gray-600", children: [
          "Blank ",
          index + 1,
          ":"
        ] }),
        /* @__PURE__ */ jsx(
          Input,
          {
            type: "text",
            value: values[index] || "",
            onChange: (e) => handleChange(index, e.target.value),
            placeholder: "Your answer",
            className: "flex-1",
            autoComplete: "off"
          }
        )
      ] }, index))
    ] }),
    ((_b = question.options) == null ? void 0 : _b.case_sensitive) && /* @__PURE__ */ jsxs("p", { className: "text-sm text-yellow-600", children: [
      /* @__PURE__ */ jsx("span", { className: "font-semibold", children: "Note:" }),
      " Answers are case-sensitive."
    ] })
  ] });
};
export {
  FillBlankQuestion as default
};
