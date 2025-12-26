import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { Plus, Trash2 } from "lucide-react";
import { useEffect } from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-label";
const MatchingForm = ({ data, setData, errors }) => {
  var _a;
  const matches = ((_a = data.options) == null ? void 0 : _a.matches) || [];
  useEffect(() => {
    if (matches.length === 0) {
      const initialMatches = [
        { id: 1, question: "", answer: "" },
        { id: 2, question: "", answer: "" },
        { id: 3, question: "", answer: "" }
      ];
      setData("options", { matches: initialMatches });
    }
  }, []);
  const addMatch = () => {
    const newMatches = [...matches, { id: Date.now(), question: "", answer: "" }];
    setData("options", { matches: newMatches });
  };
  const removeMatch = (id) => {
    const newMatches = matches.filter((m) => m.id !== id);
    setData("options", { matches: newMatches });
  };
  const updateMatch = (id, field, value) => {
    const newMatches = matches.map((m) => m.id === id ? { ...m, [field]: value } : m);
    setData("options", { matches: newMatches });
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsx(Label, { children: "Matching Pairs *" }),
      /* @__PURE__ */ jsxs(Button, { type: "button", variant: "outline", size: "sm", onClick: addMatch, children: [
        /* @__PURE__ */ jsx(Plus, { className: "h-4 w-4" }),
        "Add Pair"
      ] })
    ] }),
    /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Students will match items from the left column with items on the right" }),
    /* @__PURE__ */ jsx("div", { className: "space-y-3", children: matches.map((match, index) => /* @__PURE__ */ jsxs("div", { className: "grid grid-cols-2 gap-3 items-start", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        index === 0 && /* @__PURE__ */ jsx(Label, { className: "text-xs text-gray-500 mb-1", children: "Question/Item" }),
        /* @__PURE__ */ jsx(Input, { placeholder: `Item ${index + 1}`, value: match.question, onChange: (e) => updateMatch(match.id, "question", e.target.value) })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex gap-2", children: [
        /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
          index === 0 && /* @__PURE__ */ jsx(Label, { className: "text-xs text-gray-500 mb-1", children: "Correct Match" }),
          /* @__PURE__ */ jsx(Input, { placeholder: `Match ${index + 1}`, value: match.answer, onChange: (e) => updateMatch(match.id, "answer", e.target.value) })
        ] }),
        matches.length > 2 && /* @__PURE__ */ jsx(Button, { type: "button", variant: "ghost", size: "sm", onClick: () => removeMatch(match.id), className: "text-red-600 mt-5", children: /* @__PURE__ */ jsx(Trash2, { className: "h-4 w-4" }) })
      ] })
    ] }, match.id)) }),
    /* @__PURE__ */ jsx(InputError, { message: errors.options })
  ] });
};
export {
  MatchingForm as default
};
