import { jsx, jsxs } from "react/jsx-runtime";
import { C as Card } from "./card-D8SB2yrw.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { usePage } from "@inertiajs/react";
import { FileQuestion, CheckCircle2 } from "lucide-react";
import "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
const ExamQuestions = () => {
  const { props } = usePage();
  const { questions } = props;
  const getQuestionTypeBadge = (type) => {
    const colors = {
      multiple_choice: "bg-blue-600",
      multiple_select: "bg-purple-600",
      matching: "bg-green-600",
      fill_blank: "bg-yellow-600",
      ordering: "bg-orange-600",
      short_answer: "bg-red-600",
      listening: "bg-pink-600"
    };
    return /* @__PURE__ */ jsx(Badge, { className: colors[type] || "bg-gray-600", variant: "default", children: type.replace("_", " ").replace(/\b\w/g, (l) => l.toUpperCase()) });
  };
  return /* @__PURE__ */ jsx("div", { className: "space-y-4", children: questions && questions.length > 0 ? questions.map((question, index) => /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsx("div", { className: "flex items-start justify-between gap-4", children: /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
    /* @__PURE__ */ jsxs("div", { className: "mb-2 flex items-center gap-2", children: [
      /* @__PURE__ */ jsx(FileQuestion, { className: "h-4 w-4 text-muted-foreground" }),
      /* @__PURE__ */ jsxs("span", { className: "text-sm font-semibold", children: [
        "Question ",
        index + 1
      ] }),
      getQuestionTypeBadge(question.question_type),
      /* @__PURE__ */ jsxs(Badge, { variant: "outline", children: [
        question.marks,
        " marks"
      ] })
    ] }),
    /* @__PURE__ */ jsx("p", { className: "text-base font-medium", children: question.title }),
    question.description && /* @__PURE__ */ jsx("p", { className: "text-muted-foreground mt-2 text-sm", children: question.description }),
    question.question_options && question.question_options.length > 0 && /* @__PURE__ */ jsxs("div", { className: "mt-3 space-y-1", children: [
      /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs font-medium", children: "Options:" }),
      /* @__PURE__ */ jsx("ul", { className: "text-muted-foreground ml-4 list-disc space-y-1 text-sm", children: question.question_options.map((option, optIndex) => /* @__PURE__ */ jsxs("li", { children: [
        option.option_text || option.text || "Option",
        option.is_correct && /* @__PURE__ */ jsx(CheckCircle2, { className: "text-green-600 ml-1 inline h-3 w-3" })
      ] }, option.id || optIndex)) })
    ] })
  ] }) }) }, question.id)) : /* @__PURE__ */ jsx(Card, { className: "p-6 text-center", children: /* @__PURE__ */ jsx("p", { className: "text-muted-foreground", children: "No questions available for this exam yet." }) }) });
};
export {
  ExamQuestions as default
};
