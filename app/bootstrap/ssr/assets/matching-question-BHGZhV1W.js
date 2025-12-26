import { jsxs, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { S as Select, a as SelectTrigger, b as SelectValue, c as SelectContent, d as SelectItem } from "./select-BxPdBi6V.js";
import { useState, useEffect, useMemo } from "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-label";
import "@radix-ui/react-select";
import "lucide-react";
const MatchingQuestion = ({ question, answer, onAnswerChange }) => {
  var _a;
  const matches = ((_a = question.options) == null ? void 0 : _a.matches) || [];
  const buildInitialMatches = () => {
    if (Array.isArray(answer == null ? void 0 : answer.matches)) {
      const arrayMatches = answer.matches;
      return arrayMatches.reduce((acc, item) => {
        acc[item.id] = item.answer;
        return acc;
      }, {});
    }
    if ((answer == null ? void 0 : answer.matches) && typeof answer.matches === "object") {
      return { ...answer.matches };
    }
    return {};
  };
  const [selectedMatches, setSelectedMatches] = useState(buildInitialMatches);
  useEffect(() => {
    setSelectedMatches(buildInitialMatches());
  }, [question.id]);
  const emitChange = (newMatches) => {
    setSelectedMatches(newMatches);
    const formatted = Object.entries(newMatches).map(([id, value]) => ({
      id: Number(id),
      answer: value
    }));
    onAnswerChange({
      matches: formatted
    });
  };
  const handleMatch = (leftId, answerValue) => {
    emitChange({
      ...selectedMatches,
      [leftId]: answerValue
    });
  };
  const handleClearAll = () => {
    emitChange({});
  };
  const leftItems = useMemo(() => matches.map((pair) => ({ id: pair.id, text: pair.question })), [matches]);
  const rightItems = useMemo(() => matches.map((pair) => ({ id: pair.id, text: pair.answer })), [matches]);
  const shuffledRightItems = useMemo(() => [...rightItems].sort(() => Math.random() - 0.5), [rightItems]);
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Match each item on the left with the correct item on the right:" }),
      /* @__PURE__ */ jsx(Button, { variant: "ghost", size: "sm", onClick: handleClearAll, disabled: Object.keys(selectedMatches).length === 0, children: "Clear All" })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "space-y-3", children: leftItems.map((leftItem) => /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-1 gap-3 rounded-lg border p-4 md:grid-cols-2", children: [
      /* @__PURE__ */ jsx("div", { className: "flex items-center", children: /* @__PURE__ */ jsx("div", { className: "flex-1", children: /* @__PURE__ */ jsx(Label, { className: "font-normal", children: leftItem.text }) }) }),
      /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsxs(Select, { value: selectedMatches[leftItem.id] || "", onValueChange: (value) => handleMatch(leftItem.id, value), children: [
        /* @__PURE__ */ jsx(SelectTrigger, { children: /* @__PURE__ */ jsx(SelectValue, { placeholder: "Select a match..." }) }),
        /* @__PURE__ */ jsx(SelectContent, { children: shuffledRightItems.map((rightItem) => /* @__PURE__ */ jsx(SelectItem, { value: rightItem.text, children: rightItem.text }, rightItem.id)) })
      ] }) })
    ] }, leftItem.id)) }),
    Object.keys(selectedMatches).length > 0 && /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
      "Matched: ",
      /* @__PURE__ */ jsx("span", { className: "font-semibold", children: Object.keys(selectedMatches).length }),
      " of ",
      leftItems.length
    ] })
  ] });
};
export {
  MatchingQuestion as default
};
