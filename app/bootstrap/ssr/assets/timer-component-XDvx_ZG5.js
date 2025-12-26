import { jsx, jsxs } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { C as Card, b as CardContent } from "./card-D8SB2yrw.js";
import { router } from "@inertiajs/react";
import { AlertTriangle, Clock } from "lucide-react";
import { useState, useEffect } from "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const TimerComponent = ({ endTime, onTimeUp, attempt, questionIndex }) => {
  const [timeLeft, setTimeLeft] = useState(0);
  const [isWarning, setIsWarning] = useState(false);
  useEffect(() => {
    const calculateTimeLeft = () => {
      if (!endTime) {
        return 0;
      }
      const end = new Date(endTime).getTime();
      if (Number.isNaN(end)) {
        return 0;
      }
      const now = (/* @__PURE__ */ new Date()).getTime();
      const difference = end - now;
      return Math.max(0, Math.floor(difference / 1e3));
    };
    setTimeLeft(calculateTimeLeft());
    const interval = setInterval(() => {
      const remaining = calculateTimeLeft();
      setTimeLeft(remaining);
      if (remaining <= 300 && remaining > 0) {
        setIsWarning(true);
      }
      if (remaining === 0) {
        clearInterval(interval);
        if (onTimeUp) {
          onTimeUp();
        } else {
          router.post(route("exam-attempts.submit", attempt.id));
        }
      }
    }, 1e3);
    return () => clearInterval(interval);
  }, [endTime, attempt.id, onTimeUp]);
  const formatTime = (seconds) => {
    const hours = Math.floor(seconds / 3600);
    const minutes = Math.floor(seconds % 3600 / 60);
    const secs = seconds % 60;
    return `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${secs.toString().padStart(2, "0")}`;
  };
  return /* @__PURE__ */ jsx(Card, { className: `${isWarning ? "border-destructive" : ""}`, children: /* @__PURE__ */ jsxs(CardContent, { className: "p-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsxs("h6", { className: "flex items-center gap-2", children: [
        isWarning ? /* @__PURE__ */ jsx(AlertTriangle, { className: "text-destructive h-5 w-5" }) : /* @__PURE__ */ jsx(Clock, { className: "h-5 w-5 text-gray-600" }),
        /* @__PURE__ */ jsx("span", { className: "font-semibold text-gray-700", children: "Time Remaining" })
      ] }),
      /* @__PURE__ */ jsx(Badge, { variant: isWarning ? "destructive" : "secondary", className: "font-mono text-lg", children: formatTime(timeLeft) })
    ] }),
    /* @__PURE__ */ jsxs("p", { className: "pl-7 text-sm text-gray-600", children: [
      "Question ",
      questionIndex + 1,
      " of ",
      attempt.exam.questions.length
    ] }),
    isWarning && /* @__PURE__ */ jsx("p", { className: "text-destructive mt-2 text-sm", children: "Less than 5 minutes remaining! The exam will auto-submit when time runs out." })
  ] }) });
};
export {
  TimerComponent as default
};
