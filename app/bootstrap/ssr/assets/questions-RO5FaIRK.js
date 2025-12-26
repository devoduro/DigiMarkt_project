import { jsx, jsxs } from "react/jsx-runtime";
import { D as DataSortModal } from "./data-sort-modal-CzOtsWqf.js";
import { Q as QuestionTypeBadge } from "./question-type-badge-BPZv8bmY.js";
import { D as DeleteModal } from "./delete-modal-BIvxKwRf.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, b as CardContent } from "./card-D8SB2yrw.js";
import { usePage, router } from "@inertiajs/react";
import { HelpCircle, Plus, ArrowUpDown, Copy, Edit, Trash2, CircleCheck, Circle, ArrowRight, CheckCircle2 } from "lucide-react";
import { Renderer } from "richtor";
/* empty css                 */
import QuestionDialog from "./question-dialog-BrDPBeN7.js";
import "nprogress";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "./dialog-DD5SXV81.js";
import "@radix-ui/react-dialog";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./badge-B4crNM73.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./input-error-CEW4jhey.js";
import "./loading-button-C4Hk_jCd.js";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./inertia-BtwbgBI3.js";
import "./fill-blank-form-BxaDP-BU.js";
import "./listening-form-DuPlEhoB.js";
import "./chunked-uploader-input-MwXGR7K4.js";
import "axios";
import "sonner";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "./textarea-DctRxpgE.js";
import "./matching-form-6MBJ4F_R.js";
import "./multiple-choice-form-CooCKl0T.js";
import "./checkbox-CO4DegBm.js";
import "@radix-ui/react-checkbox";
import "./ordering-form-bzyxM0f6.js";
import "./short-answer-form-BD8f78V5.js";
const Questions = () => {
  const { props } = usePage();
  const { exam } = props;
  const { questions } = exam;
  const handleDuplicateQuestion = (questionId) => {
    router.post(
      route("exam-questions.duplicate", { question: questionId }),
      {},
      {
        preserveScroll: true
      }
    );
  };
  if (questions.length === 0) {
    return /* @__PURE__ */ jsx(Card, { children: /* @__PURE__ */ jsxs(CardContent, { className: "flex flex-col items-center justify-center py-16", children: [
      /* @__PURE__ */ jsx("div", { className: "mb-4 rounded-full bg-gray-100 p-6", children: /* @__PURE__ */ jsx(HelpCircle, { className: "h-12 w-12 text-gray-400" }) }),
      /* @__PURE__ */ jsx("h3", { className: "mb-2 text-xl font-semibold text-gray-900", children: "No Questions Yet" }),
      /* @__PURE__ */ jsx("p", { className: "mb-6 max-w-md text-center text-gray-600", children: "Start building your exam by adding questions. You can create multiple choice, short answer, and many other question types." }),
      /* @__PURE__ */ jsx(
        QuestionDialog,
        {
          exam,
          handler: /* @__PURE__ */ jsxs(Button, { children: [
            /* @__PURE__ */ jsx(Plus, { className: "h-4 w-4" }),
            "Add First Question"
          ] })
        }
      )
    ] }) });
  }
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx("h3", { className: "text-lg font-semibold", children: "Exam Questions" }),
        /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
          questions.length,
          " ",
          questions.length === 1 ? "question" : "questions",
          " • Total: ",
          exam.total_marks,
          " marks"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(
          DataSortModal,
          {
            title: "Questions",
            data: questions,
            handler: /* @__PURE__ */ jsxs(Button, { variant: "outline", className: "flex items-center gap-2", children: [
              /* @__PURE__ */ jsx(ArrowUpDown, { className: "h-4 w-4" }),
              "Reorder"
            ] }),
            onOrderChange: (newOrder, setOpen) => {
              router.post(
                route("exam-questions.reorder"),
                {
                  sortedData: newOrder
                },
                {
                  preserveScroll: true,
                  onSuccess: () => setOpen && setOpen(false)
                }
              );
            },
            renderContent: (item) => /* @__PURE__ */ jsx(Card, { className: "flex w-full items-center justify-between px-4 py-3", children: /* @__PURE__ */ jsx("p", { children: item.title }) })
          }
        ),
        /* @__PURE__ */ jsx(
          QuestionDialog,
          {
            exam,
            handler: /* @__PURE__ */ jsxs(Button, { children: [
              /* @__PURE__ */ jsx(Plus, { className: "h-4 w-4" }),
              "Add Question"
            ] })
          }
        )
      ] })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "space-y-3", children: questions.map((question, index) => {
      var _a, _b, _c, _d, _e, _f;
      return /* @__PURE__ */ jsx(Card, { className: "transition-shadow hover:shadow-md", children: /* @__PURE__ */ jsxs(CardContent, { className: "p-5", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
          /* @__PURE__ */ jsxs("div", { className: "mb-1 flex items-center gap-2", children: [
            /* @__PURE__ */ jsxs("span", { className: "text-sm font-medium text-gray-500", children: [
              "Q",
              index + 1
            ] }),
            /* @__PURE__ */ jsx(QuestionTypeBadge, { type: question.question_type }),
            /* @__PURE__ */ jsxs("span", { className: "text-sm font-medium text-blue-600", children: [
              question.marks,
              " marks"
            ] })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
            /* @__PURE__ */ jsx(
              Button,
              {
                size: "icon",
                variant: "ghost",
                className: "bg-muted hover:bg-muted-foreground/10 h-8 w-8 rounded-full p-0",
                onClick: () => handleDuplicateQuestion(question.id),
                children: /* @__PURE__ */ jsx(Copy, { className: "h-4 w-4" })
              }
            ),
            /* @__PURE__ */ jsx(
              QuestionDialog,
              {
                exam,
                question,
                handler: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "ghost", className: "bg-muted hover:bg-muted-foreground/10 h-8 w-8 rounded-full p-0", children: /* @__PURE__ */ jsx(Edit, { className: "h-4 w-4" }) })
              }
            ),
            /* @__PURE__ */ jsx(
              DeleteModal,
              {
                message: "Are you sure you want to delete this question?",
                routePath: route("exam-questions.destroy", question.id),
                actionComponent: /* @__PURE__ */ jsx(Button, { size: "icon", variant: "ghost", className: "bg-destructive/8 hover:bg-destructive/6 h-8 w-8 rounded-full p-0", children: /* @__PURE__ */ jsx(Trash2, { className: "text-destructive text-sm" }) })
              }
            )
          ] })
        ] }),
        /* @__PURE__ */ jsx("h4", { className: "mb-1 font-medium text-gray-900", children: question.title }),
        /* @__PURE__ */ jsx(Renderer, { value: question.description || "" }),
        (question.question_type === "multiple_choice" || question.question_type === "multiple_select") && question.question_options && question.question_options.length > 0 && /* @__PURE__ */ jsx("div", { className: "mt-3 flex flex-wrap items-center gap-x-6 gap-y-3", children: question.question_options.map((option) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2 text-sm", children: [
          option.is_correct ? /* @__PURE__ */ jsx(CircleCheck, { strokeWidth: 3, className: "h-4 w-4 text-green-500" }) : /* @__PURE__ */ jsx(Circle, { strokeWidth: 3, className: "h-4 w-4 text-gray-300" }),
          /* @__PURE__ */ jsx("span", { className: option.is_correct ? "font-medium text-green-700" : "text-gray-600", children: option.option_text })
        ] }, option.id)) }),
        question.question_type === "matching" && ((_a = question.options) == null ? void 0 : _a.matches) && question.options.matches.length > 0 && /* @__PURE__ */ jsxs("div", { className: "mt-3 space-y-2", children: [
          /* @__PURE__ */ jsx("p", { className: "text-xs font-medium text-gray-500", children: "Matching Pairs:" }),
          /* @__PURE__ */ jsx("div", { className: "grid gap-2 sm:grid-cols-2", children: question.options.matches.map((match, idx) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2 rounded-md bg-gray-50 p-2 text-sm", children: [
            /* @__PURE__ */ jsx("span", { className: "text-gray-700", children: match.question }),
            /* @__PURE__ */ jsx(ArrowRight, { className: "h-3 w-3 text-gray-400" }),
            /* @__PURE__ */ jsx("span", { className: "font-medium text-green-600", children: match.answer })
          ] }, idx)) })
        ] }),
        question.question_type === "fill_blank" && ((_b = question.options) == null ? void 0 : _b.answers) && question.options.answers.length > 0 && /* @__PURE__ */ jsxs("div", { className: "mt-3", children: [
          /* @__PURE__ */ jsx("p", { className: "mb-1 text-xs font-medium text-gray-500", children: "Accepted Answers:" }),
          /* @__PURE__ */ jsx("div", { className: "flex flex-wrap gap-2", children: question.options.answers.map((answer, idx) => /* @__PURE__ */ jsxs(
            "span",
            {
              className: "inline-flex items-center gap-1 rounded-md bg-green-50 px-2 py-1 text-sm font-medium text-green-700",
              children: [
                /* @__PURE__ */ jsx(CheckCircle2, { className: "h-3 w-3" }),
                answer
              ]
            },
            idx
          )) })
        ] }),
        question.question_type === "ordering" && ((_c = question.options) == null ? void 0 : _c.items) && question.options.items.length > 0 && /* @__PURE__ */ jsxs("div", { className: "mt-3", children: [
          /* @__PURE__ */ jsx("p", { className: "mb-1 text-xs font-medium text-gray-500", children: "Correct Order:" }),
          /* @__PURE__ */ jsx("ol", { className: "list-inside list-decimal space-y-1 text-sm text-gray-700", children: question.options.items.map((item, idx) => /* @__PURE__ */ jsx("li", { children: item }, idx)) })
        ] }),
        question.question_type === "short_answer" && ((_d = question.options) == null ? void 0 : _d.sample_answer) && /* @__PURE__ */ jsxs("div", { className: "mt-3", children: [
          /* @__PURE__ */ jsx("p", { className: "mb-1 text-xs font-medium text-gray-500", children: "Guidelines:" }),
          /* @__PURE__ */ jsx("p", { className: "rounded-md bg-gray-50 p-2 text-sm text-gray-700", children: question.options.sample_answer })
        ] }),
        question.question_type === "listening" && /* @__PURE__ */ jsxs("div", { className: "mt-3 space-y-2", children: [
          ((_e = question.options) == null ? void 0 : _e.audio_url) && /* @__PURE__ */ jsxs("audio", { controls: true, className: "h-11 w-full", children: [
            /* @__PURE__ */ jsx("source", { src: question.options.audio_url, type: "audio/mpeg" }),
            "Your browser does not support the audio element."
          ] }),
          ((_f = question.options) == null ? void 0 : _f.instructions) && /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("p", { className: "mb-1 text-xs font-medium text-gray-500", children: "Instructions:" }),
            /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-700", children: question.options.instructions })
          ] })
        ] })
      ] }) }, question.id);
    }) })
  ] });
};
export {
  Questions as default
};
