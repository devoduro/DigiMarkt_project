import { jsx, jsxs } from "react/jsx-runtime";
import { Check, X, Clock } from "lucide-react";
import { B as Badge } from "./badge-B4crNM73.js";
const QuestionAnswerResult = ({ question, answer }) => {
  var _a, _b, _c, _d;
  const answerData = answer.answer_data;
  if (!answerData) {
    return /* @__PURE__ */ jsx("p", { className: "text-gray-500 italic", children: "No answer provided" });
  }
  switch (question.question_type) {
    case "multiple_choice": {
      const selectedId = typeof answerData === "object" ? answerData.selected_option_id : answerData;
      const options = question.question_options || [];
      return /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
        /* @__PURE__ */ jsx("p", { className: "font-semibold text-gray-700", children: "Select the option that best matches:" }),
        /* @__PURE__ */ jsx("div", { className: "space-y-2", children: options.map((option, idx) => {
          const isSelected = option.id === selectedId;
          const isCorrect = option.is_correct;
          return /* @__PURE__ */ jsx(
            "div",
            {
              className: `rounded-lg border-2 p-3 ${isSelected && isCorrect ? "border-green-500 bg-green-50" : isSelected && !isCorrect ? "border-red-500 bg-red-50" : isCorrect ? "border-green-300 bg-green-50" : "border-gray-200 bg-white"}`,
              children: /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-2", children: [
                /* @__PURE__ */ jsx("div", { className: "mt-0.5 flex-shrink-0", children: isSelected ? isCorrect ? /* @__PURE__ */ jsx(Check, { className: "h-5 w-5 text-green-600" }) : /* @__PURE__ */ jsx(X, { className: "h-5 w-5 text-red-600" }) : isCorrect ? /* @__PURE__ */ jsx(Check, { className: "h-5 w-5 text-green-600" }) : /* @__PURE__ */ jsx("div", { className: "h-5 w-5 rounded-full border-2 border-gray-300" }) }),
                /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
                  /* @__PURE__ */ jsx("p", { className: "text-sm", children: option.option_text }),
                  isSelected && /* @__PURE__ */ jsx("span", { className: "text-xs font-semibold text-blue-600", children: "Selected Answer " }),
                  isCorrect && !isSelected && /* @__PURE__ */ jsx("span", { className: "text-xs font-semibold text-green-600", children: "(Correct Answer)" })
                ] })
              ] })
            },
            option.id || idx
          );
        }) })
      ] });
    }
    case "multiple_select": {
      const selectedIds = Array.isArray(answerData) ? answerData : answerData.selected_option_ids || [];
      const options = question.question_options || [];
      return /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
        /* @__PURE__ */ jsx("p", { className: "font-semibold text-gray-700", children: "Select all statements that apply:" }),
        /* @__PURE__ */ jsx("div", { className: "space-y-2", children: options.map((option, idx) => {
          const isSelected = selectedIds.includes(option.id);
          const isCorrect = option.is_correct;
          return /* @__PURE__ */ jsx(
            "div",
            {
              className: `rounded-lg border-2 p-3 ${isSelected && isCorrect ? "border-green-500 bg-green-50" : isSelected && !isCorrect ? "border-red-500 bg-red-50" : "border-gray-200 bg-white"}`,
              children: /* @__PURE__ */ jsxs("div", { className: "flex items-start gap-2", children: [
                /* @__PURE__ */ jsx("div", { className: "mt-0.5 flex-shrink-0", children: isSelected ? isCorrect ? /* @__PURE__ */ jsx(Check, { className: "h-5 w-5 text-green-600" }) : /* @__PURE__ */ jsx(X, { className: "h-5 w-5 text-red-600" }) : isCorrect ? /* @__PURE__ */ jsx(Check, { className: "h-5 w-5 text-green-600" }) : /* @__PURE__ */ jsx("div", { className: "h-5 w-5 rounded border-2 border-gray-300" }) }),
                /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
                  /* @__PURE__ */ jsx("p", { className: "text-sm", children: option.option_text }),
                  isSelected && isCorrect && /* @__PURE__ */ jsx("span", { className: "text-xs font-semibold text-green-600", children: "(Selected Answer - Correct)" }),
                  isSelected && !isCorrect && /* @__PURE__ */ jsx("span", { className: "text-xs font-semibold text-red-600", children: "(Selected Answer - Wrong)" }),
                  isCorrect && !isSelected && /* @__PURE__ */ jsx("span", { className: "text-xs font-semibold text-green-600", children: "(Correct Answer - Not Selected)" })
                ] })
              ] })
            },
            option.id || idx
          );
        }) })
      ] });
    }
    case "fill_blank": {
      const userAnswers = Array.isArray(answerData) ? answerData : answerData.answers || [];
      const correctAnswers = ((_a = question.options) == null ? void 0 : _a.answers) || [];
      return /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
        /* @__PURE__ */ jsx("p", { className: "font-semibold text-gray-700", children: "Fill in the blanks:" }),
        /* @__PURE__ */ jsx("div", { className: "space-y-3", children: userAnswers.map((userAns, idx) => {
          const correctOptions = correctAnswers;
          const isCorrect = correctOptions.some((ans) => (ans == null ? void 0 : ans.toLowerCase().trim()) === (userAns == null ? void 0 : userAns.toLowerCase().trim()));
          return /* @__PURE__ */ jsxs("div", { className: "rounded-lg border p-3", children: [
            /* @__PURE__ */ jsxs("div", { className: "mb-2 flex items-start gap-2", children: [
              isCorrect ? /* @__PURE__ */ jsx(Check, { className: "mt-0.5 h-5 w-5 flex-shrink-0 text-green-600" }) : /* @__PURE__ */ jsx(X, { className: "mt-0.5 h-5 w-5 flex-shrink-0 text-red-600" }),
              /* @__PURE__ */ jsx("div", { className: "flex-1", children: /* @__PURE__ */ jsxs("p", { className: "text-sm font-semibold text-gray-700", children: [
                "Blank ",
                idx + 1
              ] }) })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "ml-7 space-y-1", children: [
              /* @__PURE__ */ jsxs("p", { className: "text-sm", children: [
                /* @__PURE__ */ jsx("span", { className: "font-medium", children: "Student Answer:" }),
                " ",
                /* @__PURE__ */ jsx("span", { className: isCorrect ? "text-green-600" : "text-red-600", children: userAns || "(empty)" })
              ] }),
              correctAnswers.length > 0 && /* @__PURE__ */ jsxs("p", { className: "text-sm", children: [
                /* @__PURE__ */ jsxs("span", { className: "font-medium", children: [
                  "Correct Answer",
                  correctAnswers.length > 1 ? "s" : "",
                  ":"
                ] }),
                " ",
                /* @__PURE__ */ jsx("span", { className: "text-green-600", children: correctAnswers.join(", ") })
              ] })
            ] })
          ] }, idx);
        }) })
      ] });
    }
    case "ordering": {
      const userOrder = Array.isArray(answerData) ? answerData : answerData.order || [];
      const items = ((_b = question.options) == null ? void 0 : _b.items) || [];
      const correctOrder = ((_c = question.options) == null ? void 0 : _c.correct_order) || [];
      return /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
        /* @__PURE__ */ jsx("p", { className: "font-semibold text-gray-700", children: "Arrange in the correct order:" }),
        /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-4 md:grid-cols-2", children: [
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("p", { className: "mb-2 text-sm font-semibold text-gray-600", children: "Your Order:" }),
            /* @__PURE__ */ jsx("div", { className: "space-y-2", children: userOrder.map((itemIndex, idx) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2 rounded border border-blue-200 bg-blue-50 p-2", children: [
              /* @__PURE__ */ jsx("span", { className: "flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-blue-600 text-xs font-semibold text-white", children: idx + 1 }),
              /* @__PURE__ */ jsx("span", { className: "text-sm", children: items[itemIndex] || `Item ${itemIndex}` })
            ] }, idx)) })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("p", { className: "mb-2 text-sm font-semibold text-gray-600", children: "Correct Order:" }),
            /* @__PURE__ */ jsx("div", { className: "space-y-2", children: correctOrder.map((itemIndex, idx) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2 rounded border border-green-200 bg-green-50 p-2", children: [
              /* @__PURE__ */ jsx("span", { className: "flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-green-600 text-xs font-semibold text-white", children: idx + 1 }),
              /* @__PURE__ */ jsx("span", { className: "text-sm", children: items[itemIndex] || `Item ${itemIndex}` })
            ] }, idx)) })
          ] })
        ] })
      ] });
    }
    case "matching": {
      const userMatches = answerData.matches || [];
      const correctMatches = ((_d = question.options) == null ? void 0 : _d.matches) || [];
      return /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
        /* @__PURE__ */ jsx("p", { className: "font-semibold text-gray-700", children: "Match each item with its pair:" }),
        /* @__PURE__ */ jsx("div", { className: "space-y-3", children: userMatches.map((match, idx) => {
          const correctMatch = correctMatches.find((cm) => cm.id === match.id);
          const isCorrect = correctMatch && correctMatch.answer === match.answer;
          return /* @__PURE__ */ jsxs(
            "div",
            {
              className: `rounded-lg border-2 p-3 ${isCorrect ? "border-green-500 bg-green-50" : "border-red-500 bg-red-50"}`,
              children: [
                /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-3", children: [
                  isCorrect ? /* @__PURE__ */ jsx(Check, { className: "h-5 w-5 flex-shrink-0 text-green-600" }) : /* @__PURE__ */ jsx(X, { className: "h-5 w-5 flex-shrink-0 text-red-600" }),
                  /* @__PURE__ */ jsxs("div", { className: "grid flex-1 grid-cols-1 gap-2 md:grid-cols-2", children: [
                    /* @__PURE__ */ jsx("div", { className: "text-sm font-medium", children: (correctMatch == null ? void 0 : correctMatch.question) || "Unknown" }),
                    /* @__PURE__ */ jsxs("div", { className: "text-sm", children: [
                      "→ ",
                      match.answer || "Unknown"
                    ] })
                  ] })
                ] }),
                !isCorrect && correctMatch && /* @__PURE__ */ jsxs("div", { className: "mt-2 ml-8 text-xs text-green-600", children: [
                  "Correct: ",
                  correctMatch.question,
                  " → ",
                  correctMatch.answer
                ] })
              ]
            },
            idx
          );
        }) })
      ] });
    }
    case "short_answer":
    case "listening": {
      const userAnswer = typeof answerData === "string" ? answerData : answerData.answer_text || JSON.stringify(answerData);
      return /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
        /* @__PURE__ */ jsx("p", { className: "font-semibold text-gray-700", children: "Student's Answer:" }),
        /* @__PURE__ */ jsx("div", { className: "rounded-lg border-2 border-gray-300 bg-gray-50 p-4", children: /* @__PURE__ */ jsx("p", { className: "text-sm whitespace-pre-wrap", children: userAnswer }) })
      ] });
    }
    default:
      return /* @__PURE__ */ jsxs("div", { className: "rounded bg-gray-100 p-3", children: [
        /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Answer data:" }),
        /* @__PURE__ */ jsx("pre", { className: "mt-2 overflow-auto text-xs", children: JSON.stringify(answerData, null, 2) })
      ] });
  }
};
const QuestionStatusBadge = ({ answer }) => {
  const safeQuestion = (answer2) => answer2.exam_question ?? {};
  const question = safeQuestion(answer);
  const marksObtained = answer.marks_obtained || 0;
  const totalMarks = question.marks || 0;
  const isFullMarks = totalMarks > 0 && marksObtained === totalMarks;
  if (answer.is_correct === null) return /* @__PURE__ */ jsx(Badge, { variant: "secondary", children: "Pending Review" });
  if (answer.is_correct || isFullMarks)
    return /* @__PURE__ */ jsx(Badge, { variant: "default", className: "bg-green-600", children: "Correct" });
  return /* @__PURE__ */ jsx(Badge, { variant: "destructive", children: "Incorrect" });
};
const QuestionStatusIcon = ({ answer }) => {
  const safeQuestion = (answer2) => answer2.exam_question ?? {};
  const question = safeQuestion(answer);
  const marksObtained = answer.marks_obtained || 0;
  const totalMarks = question.marks || 0;
  const isFullMarks = totalMarks > 0 && marksObtained === totalMarks;
  if (answer.is_correct === null) return /* @__PURE__ */ jsx(Clock, { className: "h-5 w-5 text-yellow-600" });
  if (answer.is_correct || isFullMarks) return /* @__PURE__ */ jsx(Check, { className: "h-5 w-5 text-green-600" });
  return /* @__PURE__ */ jsx(X, { className: "h-5 w-5 text-red-600" });
};
export {
  QuestionStatusIcon as Q,
  QuestionStatusBadge as a,
  QuestionAnswerResult as b
};
