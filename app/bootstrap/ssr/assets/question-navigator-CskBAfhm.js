import { jsxs, jsx } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, a as CardHeader, c as CardTitle, b as CardContent } from "./card-D8SB2yrw.js";
import { Check, Flag, Circle } from "lucide-react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
const QuestionNavigator = ({ questions, currentQuestionIndex, answeredQuestions, markedQuestions, onNavigate }) => {
  const getQuestionStatus = (questionId) => {
    if (answeredQuestions.has(questionId)) return "answered";
    if (markedQuestions.has(questionId)) return "marked";
    return "unanswered";
  };
  const getStatusIcon = (questionId) => {
    const status = getQuestionStatus(questionId);
    if (status === "answered") return /* @__PURE__ */ jsx(Check, { className: "h-3 w-3" });
    if (status === "marked") return /* @__PURE__ */ jsx(Flag, { className: "h-3 w-3" });
    return /* @__PURE__ */ jsx(Circle, { className: "h-3 w-3" });
  };
  const getButtonVariant = (index, questionId) => {
    if (index === currentQuestionIndex) return "default";
    const status = getQuestionStatus(questionId);
    if (status === "answered") return "secondary";
    if (status === "marked") return "outline";
    return "ghost";
  };
  return /* @__PURE__ */ jsxs(Card, { children: [
    /* @__PURE__ */ jsx(CardHeader, { className: "pb-3", children: /* @__PURE__ */ jsx(CardTitle, { className: "text-base", children: "Question Navigator" }) }),
    /* @__PURE__ */ jsxs(CardContent, { className: "space-y-4", children: [
      /* @__PURE__ */ jsxs("div", { className: "space-y-2 text-sm", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          /* @__PURE__ */ jsx(Badge, { variant: "secondary", className: "h-6 w-6 p-0", children: /* @__PURE__ */ jsx(Check, { className: "h-3 w-3" }) }),
          /* @__PURE__ */ jsxs("span", { className: "text-gray-600", children: [
            "Answered (",
            answeredQuestions.size,
            ")"
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          /* @__PURE__ */ jsx(Badge, { variant: "outline", className: "h-6 w-6 p-0", children: /* @__PURE__ */ jsx(Flag, { className: "h-3 w-3" }) }),
          /* @__PURE__ */ jsxs("span", { className: "text-gray-600", children: [
            "Marked (",
            markedQuestions.size,
            ")"
          ] })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          /* @__PURE__ */ jsx(Badge, { variant: "ghost", className: "h-6 w-6 p-0", children: /* @__PURE__ */ jsx(Circle, { className: "h-3 w-3" }) }),
          /* @__PURE__ */ jsxs("span", { className: "text-gray-600", children: [
            "Not Answered (",
            questions.length - answeredQuestions.size,
            ")"
          ] })
        ] })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "grid grid-cols-5 gap-2", children: questions.map((question, index) => /* @__PURE__ */ jsxs(
        Button,
        {
          variant: getButtonVariant(index, question.id),
          size: "sm",
          onClick: () => onNavigate(index),
          className: "relative h-10 w-full",
          children: [
            /* @__PURE__ */ jsx("span", { className: "text-sm", children: index + 1 }),
            /* @__PURE__ */ jsx("span", { className: "absolute right-1 top-1", children: getStatusIcon(question.id) })
          ]
        },
        question.id
      )) }),
      /* @__PURE__ */ jsxs("div", { className: "rounded-lg bg-gray-50 p-3", children: [
        /* @__PURE__ */ jsx("p", { className: "text-sm font-semibold text-gray-700", children: "Progress Summary" }),
        /* @__PURE__ */ jsxs("div", { className: "mt-2 space-y-1 text-sm text-gray-600", children: [
          /* @__PURE__ */ jsxs("p", { children: [
            "Total Questions: ",
            /* @__PURE__ */ jsx("span", { className: "font-semibold", children: questions.length })
          ] }),
          /* @__PURE__ */ jsxs("p", { children: [
            "Answered: ",
            /* @__PURE__ */ jsx("span", { className: "font-semibold text-green-600", children: answeredQuestions.size })
          ] }),
          /* @__PURE__ */ jsxs("p", { children: [
            "Remaining: ",
            /* @__PURE__ */ jsx("span", { className: "font-semibold text-orange-600", children: questions.length - answeredQuestions.size })
          ] })
        ] })
      ] })
    ] })
  ] });
};
export {
  QuestionNavigator as default
};
