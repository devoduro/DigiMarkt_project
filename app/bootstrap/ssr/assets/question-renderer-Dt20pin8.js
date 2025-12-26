import { jsxs, jsx } from "react/jsx-runtime";
import { Q as QuestionTypeBadge } from "./question-type-badge-BPZv8bmY.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { C as Card, a as CardHeader, b as CardContent } from "./card-D8SB2yrw.js";
import FillBlankQuestion from "./fill-blank-question-BLzWDNqo.js";
import ListeningQuestion from "./listening-question-BONEL7e8.js";
import MatchingQuestion from "./matching-question-BHGZhV1W.js";
import McqQuestion from "./mcq-question-Cx6PPmof.js";
import MultipleSelectQuestion from "./multiple-select-question-DlYhXuCN.js";
import OrderingQuestion from "./ordering-question-D9_lg7ca.js";
import ShortAnswerQuestion from "./short-answer-question-CDNwHR7D.js";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "react";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./button-jZyzwgdo.js";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "./slider-BogRbGTU.js";
import "@radix-ui/react-slider";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./checkbox-CO4DegBm.js";
import "@radix-ui/react-checkbox";
import "./textarea-DctRxpgE.js";
const QuestionRenderer = ({ question, questionNumber, answer, onAnswerChange }) => {
  const renderQuestionInput = () => {
    switch (question.question_type) {
      case "multiple_choice":
        return /* @__PURE__ */ jsx(McqQuestion, { question, answer, onAnswerChange });
      case "multiple_select":
        return /* @__PURE__ */ jsx(MultipleSelectQuestion, { question, answer, onAnswerChange });
      case "matching":
        return /* @__PURE__ */ jsx(MatchingQuestion, { question, answer, onAnswerChange });
      case "fill_blank":
        return /* @__PURE__ */ jsx(FillBlankQuestion, { question, answer, onAnswerChange });
      case "ordering":
        return /* @__PURE__ */ jsx(OrderingQuestion, { question, answer, onAnswerChange });
      case "short_answer":
        return /* @__PURE__ */ jsx(ShortAnswerQuestion, { question, answer, onAnswerChange });
      case "listening":
        return /* @__PURE__ */ jsx(ListeningQuestion, { question, answer, onAnswerChange });
      default:
        return /* @__PURE__ */ jsx("div", { className: "rounded-lg bg-yellow-50 p-4 text-center", children: /* @__PURE__ */ jsxs("p", { className: "text-sm text-yellow-800", children: [
          'Question type "',
          question.question_type,
          '" is not yet implemented in the interface.'
        ] }) });
    }
  };
  return /* @__PURE__ */ jsxs(Card, { children: [
    /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsx("div", { className: "flex items-start justify-between", children: /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
      /* @__PURE__ */ jsxs("div", { className: "mb-3 flex items-center gap-2", children: [
        /* @__PURE__ */ jsxs(Badge, { variant: "outline", children: [
          "Question ",
          questionNumber
        ] }),
        /* @__PURE__ */ jsx(QuestionTypeBadge, { type: question.question_type }),
        /* @__PURE__ */ jsxs(Badge, { variant: "secondary", children: [
          question.marks,
          " marks"
        ] })
      ] }),
      /* @__PURE__ */ jsx("h3", { className: "text-lg font-semibold text-gray-900", children: question.title }),
      question.description && /* @__PURE__ */ jsx("div", { className: "prose prose-sm mt-2 max-w-none", dangerouslySetInnerHTML: { __html: question.description } })
    ] }) }) }),
    /* @__PURE__ */ jsx(CardContent, { children: renderQuestionInput() })
  ] });
};
export {
  QuestionRenderer as default
};
