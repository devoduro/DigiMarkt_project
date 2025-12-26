import { jsx, jsxs } from "react/jsx-runtime";
import { Q as QuestionStatusIcon, a as QuestionStatusBadge, b as QuestionAnswerResult } from "./question-status-icon-ClIa4D5f.js";
import { Q as QuestionTypeBadge } from "./question-type-badge-BPZv8bmY.js";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, b as CardContent, a as CardHeader, c as CardTitle } from "./card-D8SB2yrw.js";
import { P as Progress } from "./progress-BuQTjce4.js";
import { usePage, Link } from "@inertiajs/react";
import { ArrowLeft, Check, X, Clock, TrendingUp } from "lucide-react";
import { useMemo } from "react";
import { Renderer } from "richtor";
/* empty css                 */
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-progress";
const safeQuestion = (answer) => answer.exam_question ?? {};
const ExamResult = () => {
  const { attempt } = usePage().props;
  const answers = (attempt == null ? void 0 : attempt.attempt_answers) ?? [];
  const answersByType = useMemo(() => {
    return answers.reduce(
      (acc, answer) => {
        const question = safeQuestion(answer);
        const type = question.question_type;
        if (!type) return acc;
        if (!acc[type]) {
          acc[type] = { correct: 0, total: 0, marks: 0, totalMarks: 0 };
        }
        acc[type].total += 1;
        acc[type].totalMarks += question.marks ?? 0;
        acc[type].marks += answer.marks_obtained || 0;
        if (answer.is_correct) acc[type].correct += 1;
        return acc;
      },
      {}
    );
  }, [answers]);
  if (!attempt) {
    return /* @__PURE__ */ jsx("div", { className: "flex h-full items-center justify-center p-10", children: /* @__PURE__ */ jsxs("div", { className: "text-center", children: [
      /* @__PURE__ */ jsx("h1", { className: "text-2xl font-semibold text-gray-800", children: "Attempt data unavailable" }),
      /* @__PURE__ */ jsx("p", { className: "mt-2 text-sm text-gray-600", children: "Please return to the exam list and try again." }),
      /* @__PURE__ */ jsx("div", { className: "mt-4", children: /* @__PURE__ */ jsx(Link, { href: route("student.index", "exams"), children: /* @__PURE__ */ jsx(Button, { variant: "outline", children: "Back to My Exams" }) }) })
    ] }) });
  }
  const isPassed = attempt.is_passed;
  const percentage = attempt.percentage || 0;
  const correctAnswers = answers.filter((a) => a.is_correct).length;
  const incorrectAnswers = answers.filter((a) => a.is_correct === false).length;
  const pendingAnswers = answers.filter((a) => a.is_correct === null).length;
  return /* @__PURE__ */ jsxs("div", { className: "space-y-6", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsxs("h6", { className: "text-xl font-semibold", children: [
        "Attempt ",
        attempt.attempt_number,
        " Result"
      ] }),
      /* @__PURE__ */ jsx(Button, { asChild: true, variant: "outline", children: /* @__PURE__ */ jsxs(
        Link,
        {
          href: route("student.exam.show", {
            id: attempt.exam_id,
            tab: "attempts"
          }),
          children: [
            /* @__PURE__ */ jsx(ArrowLeft, { className: "h-4 w-4" }),
            "Back Attempts"
          ]
        }
      ) })
    ] }),
    /* @__PURE__ */ jsx(Card, { className: `border-2 ${isPassed ? "border-green-500 bg-green-50" : "border-red-500 bg-red-50"}`, children: /* @__PURE__ */ jsx(CardContent, { className: "p-6", children: /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4", children: [
      /* @__PURE__ */ jsxs("div", { className: "text-center", children: [
        /* @__PURE__ */ jsxs("h6", { className: `mb-2 text-4xl font-bold ${isPassed ? "text-green-600" : "text-red-600"}`, children: [
          percentage.toFixed(1),
          "%"
        ] }),
        /* @__PURE__ */ jsx("p", { className: "text-sm font-semibold tracking-wide text-gray-600 uppercase", children: "Score" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "text-center", children: [
        /* @__PURE__ */ jsxs("h6", { className: "mb-2 text-4xl font-bold", children: [
          attempt.obtained_marks,
          "/",
          attempt.total_marks
        ] }),
        /* @__PURE__ */ jsx("p", { className: "text-sm font-semibold tracking-wide text-gray-600 uppercase", children: "Marks" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "text-center", children: [
        /* @__PURE__ */ jsx(Badge, { variant: isPassed ? "default" : "destructive", className: "mb-2 px-6 py-1 text-lg", children: isPassed ? "PASSED" : "FAILED" }),
        /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
          "Pass mark: ",
          /* @__PURE__ */ jsx("span", { className: "font-semibold", children: attempt.exam.pass_mark })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "text-center", children: [
        /* @__PURE__ */ jsxs("div", { className: "mb-2 text-3xl font-bold", children: [
          Math.floor((new Date(attempt.end_time).getTime() - new Date(attempt.start_time).getTime()) / 6e4),
          " min"
        ] }),
        /* @__PURE__ */ jsx("p", { className: "text-sm font-semibold tracking-wide text-gray-600 uppercase", children: "Time Taken" })
      ] })
    ] }) }) }),
    /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-6 md:grid-cols-3", children: [
      /* @__PURE__ */ jsxs(Card, { children: [
        /* @__PURE__ */ jsxs(CardHeader, { className: "flex flex-row items-center justify-between space-y-0 pb-2", children: [
          /* @__PURE__ */ jsx(CardTitle, { className: "text-sm font-medium", children: "Correct Answers" }),
          /* @__PURE__ */ jsx(Check, { className: "h-4 w-4 text-green-600" })
        ] }),
        /* @__PURE__ */ jsxs(CardContent, { children: [
          /* @__PURE__ */ jsx("div", { className: "text-2xl font-bold text-green-600", children: correctAnswers }),
          /* @__PURE__ */ jsx(Progress, { value: answers.length ? correctAnswers / answers.length * 100 : 0, className: "mt-2" })
        ] })
      ] }),
      /* @__PURE__ */ jsxs(Card, { children: [
        /* @__PURE__ */ jsxs(CardHeader, { className: "flex flex-row items-center justify-between space-y-0 pb-2", children: [
          /* @__PURE__ */ jsx(CardTitle, { className: "text-sm font-medium", children: "Incorrect Answers" }),
          /* @__PURE__ */ jsx(X, { className: "h-4 w-4 text-red-600" })
        ] }),
        /* @__PURE__ */ jsxs(CardContent, { children: [
          /* @__PURE__ */ jsx("div", { className: "text-2xl font-bold text-red-600", children: incorrectAnswers }),
          /* @__PURE__ */ jsx(Progress, { value: answers.length ? incorrectAnswers / answers.length * 100 : 0, className: "mt-2" })
        ] })
      ] }),
      /* @__PURE__ */ jsxs(Card, { children: [
        /* @__PURE__ */ jsxs(CardHeader, { className: "flex flex-row items-center justify-between space-y-0 pb-2", children: [
          /* @__PURE__ */ jsx(CardTitle, { className: "text-sm font-medium", children: "Pending Review" }),
          /* @__PURE__ */ jsx(Clock, { className: "h-4 w-4 text-yellow-600" })
        ] }),
        /* @__PURE__ */ jsxs(CardContent, { children: [
          /* @__PURE__ */ jsx("div", { className: "text-2xl font-bold text-yellow-600", children: pendingAnswers }),
          pendingAnswers > 0 && /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-600", children: "Manual grading in progress" })
        ] })
      ] })
    ] }),
    Object.keys(answersByType).length > 0 && /* @__PURE__ */ jsxs(Card, { children: [
      /* @__PURE__ */ jsx(CardHeader, { className: "p-5 sm:p-6", children: /* @__PURE__ */ jsxs(CardTitle, { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(TrendingUp, { className: "h-5 w-5" }),
        "Performance by Question Type"
      ] }) }),
      /* @__PURE__ */ jsx(CardContent, { className: "p-4 pt-0 sm:p-6 md:pt-0", children: /* @__PURE__ */ jsx("div", { className: "space-y-4", children: Object.entries(answersByType).map(([type, stats]) => /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsxs("div", { className: "mb-2 flex flex-col justify-between sm:flex-row sm:items-center", children: [
          /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
            /* @__PURE__ */ jsx(QuestionTypeBadge, { type }),
            /* @__PURE__ */ jsxs("span", { className: "text-sm text-gray-600", children: [
              stats.correct,
              "/",
              stats.total,
              " correct"
            ] })
          ] }),
          /* @__PURE__ */ jsxs("span", { className: "text-sm font-semibold", children: [
            stats.marks,
            "/",
            stats.totalMarks,
            " marks"
          ] })
        ] }),
        /* @__PURE__ */ jsx(Progress, { value: stats.correct / stats.total * 100 })
      ] }, type)) }) })
    ] }),
    /* @__PURE__ */ jsxs(Card, { children: [
      /* @__PURE__ */ jsx(CardHeader, { className: "p-5 sm:p-6", children: /* @__PURE__ */ jsx(CardTitle, { children: "Detailed Analysis" }) }),
      /* @__PURE__ */ jsx(CardContent, { className: "p-4 pt-0 sm:p-6 md:pt-0", children: /* @__PURE__ */ jsx("div", { className: "space-y-6", children: answers.map((answer, index) => {
        const question = safeQuestion(answer);
        return /* @__PURE__ */ jsxs("div", { className: "overflow-hidden rounded-lg border-2 border-gray-200 bg-white", children: [
          /* @__PURE__ */ jsxs("div", { className: "border-b border-gray-200 bg-gray-50 p-4", children: [
            /* @__PURE__ */ jsxs("div", { className: "flex items-start justify-between gap-4", children: [
              /* @__PURE__ */ jsxs("div", { className: "flex flex-1 items-start gap-3", children: [
                /* @__PURE__ */ jsx("div", { className: "mt-1 flex-shrink-0", children: /* @__PURE__ */ jsx(QuestionStatusIcon, { answer }) }),
                /* @__PURE__ */ jsx("div", { className: "flex-1", children: /* @__PURE__ */ jsxs("div", { className: "mb-2 flex flex-wrap items-center gap-2", children: [
                  /* @__PURE__ */ jsxs("span", { className: "text-lg font-semibold", children: [
                    "Question ",
                    index + 1
                  ] }),
                  question.question_type && /* @__PURE__ */ jsx(QuestionTypeBadge, { type: question.question_type }),
                  /* @__PURE__ */ jsx(QuestionStatusBadge, { answer })
                ] }) })
              ] }),
              /* @__PURE__ */ jsxs("div", { className: "flex-shrink-0 text-right", children: [
                /* @__PURE__ */ jsxs("p", { className: "flex flex-col items-center text-lg font-bold sm:flex-row", children: [
                  /* @__PURE__ */ jsx("span", { className: "border-primary border-b sm:border-none", children: answer.marks_obtained || 0 }),
                  /* @__PURE__ */ jsx("span", { className: "hidden sm:block", children: "/" }),
                  /* @__PURE__ */ jsx("span", { children: question.marks || 0 })
                ] }),
                /* @__PURE__ */ jsx("p", { className: "text-xs text-gray-500", children: "marks" })
              ] })
            ] }),
            /* @__PURE__ */ jsx("p", { className: "text-sm font-medium text-gray-700", children: question.title })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "p-4", children: [
            question.description && /* @__PURE__ */ jsx(Renderer, { value: question.description }),
            /* @__PURE__ */ jsx("div", { className: "mb-4", children: /* @__PURE__ */ jsx(QuestionAnswerResult, { answer, question }) })
          ] })
        ] }, answer.id ?? index);
      }) }) })
    ] })
  ] });
};
export {
  ExamResult as default
};
