import { jsx, jsxs } from "react/jsx-runtime";
import { Q as QuestionStatusIcon, a as QuestionStatusBadge, b as QuestionAnswerResult } from "./question-status-icon-ClIa4D5f.js";
import { Q as QuestionTypeBadge } from "./question-type-badge-BPZv8bmY.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, a as CardHeader, c as CardTitle, b as CardContent } from "./card-D8SB2yrw.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { Link, router } from "@inertiajs/react";
import { ArrowLeft, Clock } from "lucide-react";
import { useState } from "react";
import { Renderer } from "richtor";
/* empty css                 */
import "./badge-B4crNM73.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-label";
const ExamAttemptReview = ({ attempt }) => {
  const [manualGrades, setManualGrades] = useState({});
  const [submitting, setSubmitting] = useState(false);
  const answers = attempt.attempt_answers ?? [];
  const safeQuestion = (answer) => answer.exam_question ?? {};
  const handleManualGradeChange = (questionId, value) => {
    const numValue = parseFloat(value) || 0;
    setManualGrades((prev) => ({
      ...prev,
      [questionId]: numValue
    }));
  };
  const handleSubmitGrades = () => {
    setSubmitting(true);
    router.post(
      route("exam-attempts.grade", attempt.id),
      {
        manual_grades: manualGrades
      },
      {
        preserveScroll: true,
        onSuccess: () => {
          setSubmitting(false);
          setManualGrades({});
        },
        onError: () => {
          setSubmitting(false);
        }
      }
    );
  };
  const needsManualGrading = answers.some((answer) => {
    const question = safeQuestion(answer);
    return question.question_type === "listening" || question.question_type === "short_answer";
  });
  if (!attempt) {
    return /* @__PURE__ */ jsx("div", { className: "flex h-full items-center justify-center p-10", children: /* @__PURE__ */ jsxs("div", { className: "text-center", children: [
      /* @__PURE__ */ jsx("h1", { className: "text-2xl font-semibold text-gray-800", children: "Attempt data unavailable" }),
      /* @__PURE__ */ jsx("p", { className: "mt-2 text-sm text-gray-600", children: "Please return to the exam list and try again." }),
      /* @__PURE__ */ jsx("div", { className: "mt-4", children: /* @__PURE__ */ jsx(Link, { href: route("student.index", "exams"), children: /* @__PURE__ */ jsx(Button, { variant: "outline", children: "Back to My Exams" }) }) })
    ] }) });
  }
  return /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
    /* @__PURE__ */ jsxs(Card, { children: [
      /* @__PURE__ */ jsx(CardHeader, { children: /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsx(CardTitle, { children: "Detailed Analysis" }),
        /* @__PURE__ */ jsx(Button, { asChild: true, variant: "outline", children: /* @__PURE__ */ jsxs(Link, { href: route("exams.edit", { exam: attempt.exam_id, tab: "attempts" }), children: [
          /* @__PURE__ */ jsx(ArrowLeft, { className: "h-4 w-4" }),
          "Back Attempts"
        ] }) })
      ] }) }),
      /* @__PURE__ */ jsx(CardContent, { children: /* @__PURE__ */ jsx("div", { className: "space-y-6", children: answers.map((answer, index) => {
        const question = safeQuestion(answer);
        const questionId = question.id;
        return /* @__PURE__ */ jsxs("div", { className: "overflow-hidden rounded-lg border-2 border-gray-200 bg-white", children: [
          /* @__PURE__ */ jsx("div", { className: "border-b border-gray-200 bg-gray-50 p-4", children: /* @__PURE__ */ jsxs("div", { className: "flex items-start justify-between gap-4", children: [
            /* @__PURE__ */ jsxs("div", { className: "flex flex-1 items-start gap-3", children: [
              /* @__PURE__ */ jsx("div", { className: "mt-1 flex-shrink-0", children: /* @__PURE__ */ jsx(QuestionStatusIcon, { answer }) }),
              /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
                /* @__PURE__ */ jsxs("div", { className: "mb-2 flex flex-wrap items-center gap-2", children: [
                  /* @__PURE__ */ jsxs("span", { className: "text-lg font-semibold", children: [
                    "Question ",
                    index + 1
                  ] }),
                  question.question_type && /* @__PURE__ */ jsx(QuestionTypeBadge, { type: question.question_type }),
                  /* @__PURE__ */ jsx(QuestionStatusBadge, { answer })
                ] }),
                /* @__PURE__ */ jsx("p", { className: "text-sm font-medium text-gray-700", children: question.title })
              ] })
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "flex-shrink-0 text-right", children: [
              /* @__PURE__ */ jsxs("p", { className: "text-lg font-bold text-gray-900", children: [
                answer.marks_obtained || 0,
                "/",
                question.marks || 0
              ] }),
              /* @__PURE__ */ jsx("p", { className: "text-xs text-gray-500", children: "marks" })
            ] })
          ] }) }),
          /* @__PURE__ */ jsxs("div", { className: "p-4", children: [
            question.description && /* @__PURE__ */ jsx(Renderer, { value: question.description }),
            /* @__PURE__ */ jsx("div", { className: "mb-4", children: /* @__PURE__ */ jsx(QuestionAnswerResult, { answer, question }) }),
            (question.question_type === "listening" || question.question_type === "short_answer") && /* @__PURE__ */ jsxs("div", { className: "mt-4 rounded-lg border-t border-gray-200 bg-yellow-50 p-4 pt-4", children: [
              /* @__PURE__ */ jsxs(Label, { htmlFor: `grade-${questionId}`, className: "text-sm font-semibold text-gray-700", children: [
                "Assign Marks (Max: ",
                question.marks || 0,
                ")"
              ] }),
              /* @__PURE__ */ jsx(
                Input,
                {
                  id: `grade-${questionId}`,
                  type: "number",
                  min: "0",
                  max: question.marks || 0,
                  step: "0.5",
                  placeholder: "Enter marks",
                  value: manualGrades[questionId] ?? answer.marks_obtained ?? "",
                  onChange: (e) => handleManualGradeChange(questionId, e.target.value),
                  className: "mt-1 w-full"
                }
              ),
              answer.is_correct === null && /* @__PURE__ */ jsxs("p", { className: "mt-2 flex items-center gap-1 text-xs text-yellow-700", children: [
                /* @__PURE__ */ jsx(Clock, { className: "h-3 w-3" }),
                "This question requires manual grading"
              ] })
            ] })
          ] })
        ] }, answer.id ?? index);
      }) }) })
    ] }),
    needsManualGrading && /* @__PURE__ */ jsxs("div", { className: "flex justify-end gap-4", children: [
      /* @__PURE__ */ jsx(Button, { variant: "outline", onClick: () => window.history.back(), children: "Cancel" }),
      /* @__PURE__ */ jsx(Button, { onClick: handleSubmitGrades, disabled: submitting || Object.keys(manualGrades).length === 0, children: submitting ? "Submitting..." : "Submit Grades" })
    ] })
  ] });
};
export {
  ExamAttemptReview as default
};
