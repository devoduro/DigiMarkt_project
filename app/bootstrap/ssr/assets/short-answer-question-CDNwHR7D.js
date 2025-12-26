import { jsxs, jsx } from "react/jsx-runtime";
import { L as Label } from "./label-Dd_w2I6M.js";
import { T as Textarea } from "./textarea-DctRxpgE.js";
import "react";
import "@radix-ui/react-label";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const ShortAnswerQuestion = ({ question, answer, onAnswerChange }) => {
  var _a, _b;
  const answerText = (answer == null ? void 0 : answer.answer_text) || "";
  const wordLimit = ((_a = question.options) == null ? void 0 : _a.word_limit) || 500;
  const handleChange = (value) => {
    onAnswerChange({
      question_id: question.id,
      answer_text: value
    });
  };
  const wordCount = answerText.trim().split(/\s+/).filter(Boolean).length;
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsx("div", { className: "rounded-lg bg-blue-50 p-3", children: /* @__PURE__ */ jsxs("p", { className: "text-sm text-blue-800", children: [
      /* @__PURE__ */ jsx("span", { className: "font-semibold", children: "Note:" }),
      " This answer will be manually graded by the instructor. Write a clear and detailed response."
    ] }) }),
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { htmlFor: "answer", children: "Your Answer" }),
      /* @__PURE__ */ jsx(
        Textarea,
        {
          id: "answer",
          value: answerText,
          onChange: (e) => handleChange(e.target.value),
          placeholder: "Type your answer here...",
          rows: 8,
          className: "mt-2"
        }
      )
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between text-sm", children: [
      /* @__PURE__ */ jsxs("span", { className: "text-gray-600", children: [
        "Word count: ",
        /* @__PURE__ */ jsx("span", { className: `font-semibold ${wordCount > wordLimit ? "text-destructive" : ""}`, children: wordCount }),
        ` / ${wordLimit}`
      ] }),
      wordCount > wordLimit && /* @__PURE__ */ jsx("span", { className: "text-destructive", children: "Word limit exceeded!" })
    ] }),
    ((_b = question.options) == null ? void 0 : _b.expected_answer) && /* @__PURE__ */ jsxs("div", { className: "rounded-lg bg-gray-50 p-3", children: [
      /* @__PURE__ */ jsx("p", { className: "mb-1 text-sm font-semibold text-gray-700", children: "Guidance:" }),
      /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: question.options.expected_answer })
    ] })
  ] });
};
export {
  ShortAnswerQuestion as default
};
