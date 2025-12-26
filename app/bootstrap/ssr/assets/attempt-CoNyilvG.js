import { jsx, jsxs } from "react/jsx-runtime";
import { c as cn } from "./utils-BmtPBcb0.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { I as Index } from "./index-C5IRp7HU.js";
import { M as Main } from "./main-BqrosZ6t.js";
import { Head, router } from "@inertiajs/react";
import { ChevronLeft, ChevronRight, AlertTriangle } from "lucide-react";
import { useState, useEffect } from "react";
import AttemptNavbar from "./attempt-navbar-DJrOSAi9.js";
import QuestionNavigator from "./question-navigator-CskBAfhm.js";
import QuestionRenderer from "./question-renderer-Dt20pin8.js";
import TimerComponent from "./timer-component-XDvx_ZG5.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./app-logo-42nmPdEQ.js";
import "lucide-react/dynamic";
import "next-themes";
import "sonner";
import "./use-screen-B7SDA5zE.js";
import "./badge-B4crNM73.js";
import "./card-D8SB2yrw.js";
import "./question-type-badge-BPZv8bmY.js";
import "./fill-blank-question-BLzWDNqo.js";
import "./input-C6-Ta46A.js";
import "./label-Dd_w2I6M.js";
import "@radix-ui/react-label";
import "./listening-question-BONEL7e8.js";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
import "./slider-BogRbGTU.js";
import "@radix-ui/react-slider";
import "./matching-question-BHGZhV1W.js";
import "./select-BxPdBi6V.js";
import "@radix-ui/react-select";
import "./mcq-question-Cx6PPmof.js";
import "./multiple-select-question-DlYhXuCN.js";
import "./checkbox-CO4DegBm.js";
import "@radix-ui/react-checkbox";
import "./ordering-question-D9_lg7ca.js";
import "./short-answer-question-CDNwHR7D.js";
import "./textarea-DctRxpgE.js";
const AlertDialog = ({ open, onOpenChange, children }) => {
  if (!open) return null;
  return /* @__PURE__ */ jsxs("div", { className: "fixed inset-0 z-50 flex items-center justify-center", children: [
    /* @__PURE__ */ jsx(
      "div",
      {
        className: "fixed inset-0 bg-black/80",
        onClick: () => onOpenChange(false)
      }
    ),
    /* @__PURE__ */ jsx("div", { className: "relative z-50", children })
  ] });
};
const AlertDialogContent = ({ className, children, ...props }) => /* @__PURE__ */ jsx(
  "div",
  {
    className: cn(
      "w-full max-w-lg bg-white border rounded-lg shadow-lg p-6 space-y-4",
      className
    ),
    ...props,
    children
  }
);
const AlertDialogHeader = ({
  className,
  children,
  ...props
}) => /* @__PURE__ */ jsx(
  "div",
  {
    className: cn("space-y-2", className),
    ...props,
    children
  }
);
const AlertDialogFooter = ({
  className,
  children,
  ...props
}) => /* @__PURE__ */ jsx(
  "div",
  {
    className: cn("flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2", className),
    ...props,
    children
  }
);
const AlertDialogTitle = ({
  className,
  children,
  ...props
}) => /* @__PURE__ */ jsx(
  "h2",
  {
    className: cn("text-lg font-semibold", className),
    ...props,
    children
  }
);
const AlertDialogDescription = ({
  className,
  children,
  ...props
}) => /* @__PURE__ */ jsx(
  "p",
  {
    className: cn("text-sm text-gray-600", className),
    ...props,
    children
  }
);
const AlertDialogAction = ({
  className,
  children,
  ...props
}) => /* @__PURE__ */ jsx(
  Button,
  {
    className: cn("", className),
    ...props,
    children
  }
);
const AlertDialogCancel = ({
  className,
  children,
  ...props
}) => /* @__PURE__ */ jsx(
  Button,
  {
    variant: "outline",
    className: cn("mt-2 sm:mt-0", className),
    ...props,
    children
  }
);
const TakeExam = ({ attempt }) => {
  const [currentQuestionIndex, setCurrentQuestionIndex] = useState(0);
  const [answers, setAnswers] = useState({});
  const [markedQuestions, setMarkedQuestions] = useState(/* @__PURE__ */ new Set());
  const [showSubmitDialog, setShowSubmitDialog] = useState(false);
  const [isSubmitting, setIsSubmitting] = useState(false);
  const durationSeconds = ((attempt.exam.duration_hours || 0) * 60 + (attempt.exam.duration_minutes || 0)) * 60;
  const attemptStart = attempt.start_time ? new Date(attempt.start_time).getTime() : Date.now();
  const effectiveDuration = durationSeconds > 0 ? durationSeconds : 60 * 60;
  const computedDeadline = attempt.end_time ? attempt.end_time : new Date(attemptStart + effectiveDuration * 1e3).toISOString();
  const questions = attempt.exam.questions || [];
  const currentQuestion = questions[currentQuestionIndex];
  const answeredQuestions = new Set(Object.keys(answers).map(Number));
  useEffect(() => {
    const savedAnswers = localStorage.getItem(`exam-attempt-${attempt.id}`);
    if (savedAnswers) {
      try {
        const parsed = JSON.parse(savedAnswers);
        setAnswers(parsed.answers || {});
        setMarkedQuestions(new Set(parsed.marked || []));
      } catch (error) {
        console.error("Failed to load saved answers:", error);
      }
    }
  }, [attempt.id]);
  useEffect(() => {
    const interval = setInterval(() => {
      saveToLocalStorage();
    }, 3e4);
    return () => clearInterval(interval);
  }, [answers, markedQuestions]);
  useEffect(() => {
    const handleBeforeUnload = (e) => {
      e.preventDefault();
      e.returnValue = "";
    };
    window.addEventListener("beforeunload", handleBeforeUnload);
    return () => window.removeEventListener("beforeunload", handleBeforeUnload);
  }, []);
  const saveToLocalStorage = () => {
    localStorage.setItem(
      `exam-attempt-${attempt.id}`,
      JSON.stringify({
        answers,
        marked: Array.from(markedQuestions),
        lastSaved: (/* @__PURE__ */ new Date()).toISOString()
      })
    );
  };
  const saveAnswerToBackend = async (questionId, answer) => {
    await router.post(
      route("exam-attempts.answer", attempt.id),
      {
        question_id: questionId,
        answer_data: answer
      },
      {
        preserveScroll: true,
        preserveState: true
      }
    );
  };
  const handleAnswerChange = (answer) => {
    if (!currentQuestion) return;
    setAnswers((prev) => ({
      ...prev,
      [currentQuestion.id]: answer
    }));
    saveAnswerToBackend(currentQuestion.id, answer);
    saveToLocalStorage();
  };
  const handlePrevious = () => {
    if (currentQuestionIndex > 0) {
      setCurrentQuestionIndex(currentQuestionIndex - 1);
    }
  };
  const handleNext = () => {
    if (currentQuestionIndex < questions.length - 1) {
      setCurrentQuestionIndex(currentQuestionIndex + 1);
    }
  };
  const handleSubmit = async () => {
    setIsSubmitting(true);
    saveToLocalStorage();
    const formattedAnswers = Object.entries(answers).map(([questionId, value]) => ({
      exam_question_id: Number(questionId),
      answer_data: value
    }));
    router.post(
      route("exam-attempts.submit", attempt.id),
      {
        exam_attempt_id: attempt.id,
        answers: formattedAnswers
      },
      {
        onError: (errors) => {
          console.log(errors);
        },
        onSuccess: () => {
          localStorage.removeItem(`exam-attempt-${attempt.id}`);
        },
        onFinish: () => {
          setIsSubmitting(false);
        }
      }
    );
  };
  useEffect(() => {
    const handleKeyPress = (e) => {
      if (e.key === "ArrowRight" && currentQuestionIndex < questions.length - 1) {
        handleNext();
      } else if (e.key === "ArrowLeft" && currentQuestionIndex > 0) {
        handlePrevious();
      }
    };
    window.addEventListener("keydown", handleKeyPress);
    return () => window.removeEventListener("keydown", handleKeyPress);
  }, [currentQuestionIndex, questions.length]);
  const unansweredCount = questions.length - answeredQuestions.size;
  return /* @__PURE__ */ jsxs(Main, { children: [
    /* @__PURE__ */ jsx(Head, { title: `Taking: ${attempt.exam.title}` }),
    /* @__PURE__ */ jsxs("main", { className: "flex min-h-screen flex-col justify-between overflow-x-hidden", children: [
      /* @__PURE__ */ jsx(AttemptNavbar, { attempt, questionIndex: currentQuestionIndex }),
      /* @__PURE__ */ jsxs("div", { className: "container py-12", children: [
        /* @__PURE__ */ jsx("div", { className: "space-y-4", children: /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-4 lg:grid-cols-4", children: [
          /* @__PURE__ */ jsxs("div", { className: "space-y-4 lg:col-span-3", children: [
            /* @__PURE__ */ jsx(TimerComponent, { attempt, endTime: computedDeadline, questionIndex: currentQuestionIndex }),
            currentQuestion && /* @__PURE__ */ jsx(
              QuestionRenderer,
              {
                question: currentQuestion,
                questionNumber: currentQuestionIndex + 1,
                answer: answers[currentQuestion.id],
                onAnswerChange: handleAnswerChange
              }
            ),
            /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between rounded-lg bg-white p-4 shadow", children: [
              /* @__PURE__ */ jsxs(Button, { onClick: handlePrevious, disabled: currentQuestionIndex === 0, variant: "outline", children: [
                /* @__PURE__ */ jsx(ChevronLeft, { className: "mr-2 h-4 w-4" }),
                "Previous"
              ] }),
              currentQuestionIndex < questions.length - 1 ? /* @__PURE__ */ jsxs(Button, { onClick: handleNext, children: [
                "Next",
                /* @__PURE__ */ jsx(ChevronRight, { className: "ml-2 h-4 w-4" })
              ] }) : /* @__PURE__ */ jsx(Button, { onClick: () => setShowSubmitDialog(true), variant: "default", children: "Submit Exam" })
            ] })
          ] }),
          /* @__PURE__ */ jsx("div", { className: "lg:col-span-1", children: /* @__PURE__ */ jsx(
            QuestionNavigator,
            {
              questions,
              currentQuestionIndex,
              answeredQuestions,
              markedQuestions,
              onNavigate: setCurrentQuestionIndex
            }
          ) })
        ] }) }),
        /* @__PURE__ */ jsx(AlertDialog, { open: showSubmitDialog, onOpenChange: setShowSubmitDialog, children: /* @__PURE__ */ jsxs(AlertDialogContent, { children: [
          /* @__PURE__ */ jsxs(AlertDialogHeader, { children: [
            /* @__PURE__ */ jsxs(AlertDialogTitle, { className: "flex items-center gap-2", children: [
              /* @__PURE__ */ jsx(AlertTriangle, { className: "h-5 w-5 text-yellow-600" }),
              "Submit Exam?"
            ] }),
            /* @__PURE__ */ jsxs(AlertDialogDescription, { className: "space-y-3", children: [
              /* @__PURE__ */ jsx("p", { children: "Are you sure you want to submit your exam? This action cannot be undone." }),
              unansweredCount > 0 && /* @__PURE__ */ jsx("div", { className: "rounded-lg bg-yellow-50 p-3", children: /* @__PURE__ */ jsxs("p", { className: "text-sm font-semibold text-yellow-800", children: [
                "Warning: You have ",
                unansweredCount,
                " unanswered question",
                unansweredCount > 1 ? "s" : "",
                "!"
              ] }) }),
              /* @__PURE__ */ jsxs("div", { className: "text-sm", children: [
                /* @__PURE__ */ jsxs("p", { children: [
                  /* @__PURE__ */ jsx("strong", { children: "Answered:" }),
                  " ",
                  answeredQuestions.size,
                  " / ",
                  questions.length
                ] }),
                /* @__PURE__ */ jsxs("p", { children: [
                  /* @__PURE__ */ jsx("strong", { children: "Marked for review:" }),
                  " ",
                  markedQuestions.size
                ] })
              ] })
            ] })
          ] }),
          /* @__PURE__ */ jsxs(AlertDialogFooter, { children: [
            /* @__PURE__ */ jsx(AlertDialogCancel, { onClick: () => setShowSubmitDialog(false), children: "Cancel" }),
            /* @__PURE__ */ jsx(AlertDialogAction, { onClick: handleSubmit, disabled: isSubmitting, children: isSubmitting ? "Submitting..." : "Yes, Submit Exam" })
          ] })
        ] }) })
      ] }),
      /* @__PURE__ */ jsx(Index, {})
    ] })
  ] });
};
export {
  TakeExam as default
};
